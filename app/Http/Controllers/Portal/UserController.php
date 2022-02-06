<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\DBConstant;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UpdateUserRequest;
use DB;
use Auth;
use File;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $users = DB::table('users')
            ->where('id', '!=', $auth->id)
            ->where('role', '<=', $auth->role)
            ->get();

        return view('portal.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $levels = DB::table('levels')->get();
            $positions = DB::table('positions')->get();

            return view('portal.users.form', compact('levels', 'positions'));
        }
        
        return redirect()->route('user.list');
    }

    public function store(StoreRequest $request)
    {
        $auth = Auth::user();
        $data = $request->all();

        if (isset($request->avatar)) {
            $file = $request->file('avatar');
            $originalname = $file->getClientOriginalName();
            $arrOriName = explode('.', $originalname);
            $mine = $arrOriName[count($arrOriName) - 1];
            $fileName = $auth->id . "." . $mine;
            $path = $file->storeAs('', $fileName, 'avatar_path');
        }
        
        if (!isset($data['level'])) $data['level'] = [];

        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $data['password'] = bcrypt($data['password']);
            if (isset($request->avatar)) $data['avatar'] = "/avatar/" . $path;
            $user = User::create($data);

            foreach ($data['level'] as $key => $level) {
                $checkUserLevel = DB::table("user_level")
                    ->where('user_id', $user->id)
                    ->where('level_id', $level)
                    ->first();

                if (!is_null($level) && !isset($checkUserLevel)) {
                    DB::table("user_level")->insert([
                        'user_id' => $user->id,
                        'level_id' => $level,
                        'position_id' => $data['position'][$key],
                    ]);
                }
            }

            return redirect()->route('user.list');
        }

        return view('portal.users.form');
    }

    public function edit($id)
    {
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $levels = DB::table('levels')->get();
            $positions = DB::table('positions')->get();
            $user = DB::table('users')
                ->where('users.id', $id)
                ->leftJoin('user_level', 'users.id', '=', 'user_level.user_id')
                ->leftJoin('levels', 'levels.id', '=', 'user_level.level_id')
                ->leftJoin('positions', 'positions.id', '=', 'user_level.position_id')
                ->select(
                    'users.*', 
                    'levels.title as level_title', 
                    'levels.id as level_id', 
                    'positions.name as position_title', 
                    'positions.id as position_id'
                )->get();

            return view('portal.users.form', compact('levels', 'user', 'positions'));
        }
        
        return redirect()->route('user.list');
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        $auth = Auth::user();

        if (isset($request->avatar)) {
            $file = $request->file('avatar');
            $originalname = $file->getClientOriginalName();
            $arrOriName = explode('.', $originalname);
            $mine = $arrOriName[count($arrOriName) - 1];
            $fileName = $auth->id . "." . $mine;
            $path = $file->storeAs('', $fileName, 'avatar_path');
        }

        if (!isset($data['level'])) $data['level'] = [];

        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $data['password'] = bcrypt($data['password']);

            if (isset($request->avatar)) $data['avatar'] = "/avatar/" . $path;
            
            $user = User::findOrFail($id);
            $user->update($data);

            DB::table("user_level")->where('user_id', $user->id)->delete();

            foreach ($data['level'] as $key => $level) {
                $checkUserLevel = DB::table("user_level")
                    ->where('user_id', $user->id)
                    ->where('level_id', $level)
                    ->first();

                if (!is_null($level) && !isset($checkUserLevel)) {
                    DB::table("user_level")->insert([
                        'user_id' => $user->id,
                        'level_id' => $level,
                        'position_id' => $data['position'][$key],
                    ]);
                }
            }

            return redirect()->route('user.list');
        }

        return view('portal.users.form');
    }

    public function update(UpdateRequest $request)
    {
        $auth = Auth::user();
        if (isset($request->avatar)) {
            $file = $request->file('avatar');
            $originalname = $file->getClientOriginalName();
            $arrOriName = explode('.', $originalname);
            $mine = $arrOriName[count($arrOriName) - 1];
            $fileName = $auth->id . "." . $mine;
            $path = $file->storeAs('', $fileName, 'avatar_path');
        }

        $data = $request->all();

        if (isset($auth->avatar)) File::delete($auth->avatar);
        $data['updated_at'] = now();
        if (!is_null($data['date_of_birth'])) {
            $data['date_of_birth'] = $data['date_of_birth'];
        }
        if (isset($request->avatar)) $data['avatar'] = "/avatar/" . $path;

        $user = DB::table('users')->where('id', $auth->id)->update($data);


        return redirect()->route('user.profile', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('portal.users.profile', compact('user'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $auth = Auth::user();
            $user = DB::table('users')->where('id', '=', $id)->first();
            if (!isset($user) || $auth->role <= $user->role || $auth->id == $id) {
                return redirect()->route('user.list');
            }
            $user = DB::table('users')->where('id', '=', $id)->delete();
            DB::commit();

            return redirect()->route('user.list');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('user.list');
        }
    }
}
