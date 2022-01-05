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

class UserController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $users = DB::table('users')
            ->where('id', '!=', $auth->id)
            ->where('role', '<=', $auth->role)
            ->get();
        $departments = DB::table('departments')->get();

        return view('portal.users.index', compact('users', 'departments'));
    }

    public function create(Request $request)
    {
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $departments = DB::table('departments')->get();
            $levels = DB::table('levels')->get();
            $positions = DB::table('positions')->get();

            return view('portal.users.form', compact('departments', 'levels', 'positions'));
        }
        
        return redirect()->route('user.list');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->only([
            'name', 'email', 'password', 'role', 'phone', 'department_id', 'level', 'position'
        ]);
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $data['password'] = bcrypt($data['password']);
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $users = DB::table('users')->insert($data);

            return redirect()->route('user.list');
        }

        return view('portal.users.form');
    }

    public function edit($id)
    {
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $departments = DB::table('departments')->get();
            $levels = DB::table('levels')->get();
            $positions = DB::table('positions')->get();
            $user = DB::table('users')->where('id', $id)->first();

            return view('portal.users.form', compact('departments', 'levels', 'user', 'positions'));
        }
        
        return redirect()->route('user.list');
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $data = $request->only([
            'name', 'email', 'password', 'role', 'phone', 'department_id', 'level', 'position'
        ]);
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            $data['password'] = bcrypt($data['password']);
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $users = DB::table('users')->where('id', $id)->update($data);

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

        $data = $request->only([
            'name', 'sex', 'phone', 'facebook_link', 'department_id', 'date_of_birth', 'position', 'info', 'info_en'
        ]);

        if (isset($auth->avatar)) File::delete($auth->avatar);
        $data['updated_at'] = now();
        if (!is_null($data['date_of_birth'])) {
            $data['date_of_birth'] = $data['date_of_birth'];
        }
        if (isset($request->avatar)) $data['avatar'] = "/avatar/" . $path;

        $user = DB::table('users')->where('id', $auth->id)->update($data);

        $departments = DB::table('departments')->get();

        return redirect()->route('user.profile', compact('user', 'departments'));
    }

    public function profile()
    {
        $user = Auth::user();
        $departments = DB::table('departments')->get();

        return view('portal.users.profile', compact('user', 'departments'));
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
