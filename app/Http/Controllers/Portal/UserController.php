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
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $users = User::where('id', '!=', $auth->id)
            ->where('role', '<=', $auth->role)
            ->get();

        return view('portal.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $auth = Auth::user();
        if ($auth->role == DBConstant::ADMIN) {
            return view('portal.users.create');
        }
        
        return redirect()->route('users.index');
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $authUser = Auth::user();
            if ($authUser->role == DBConstant::ADMIN) {
                $data = $request->all();
                $data['password'] = bcrypt($data['password']);
                $user = User::create($data);
                if ($request->hasFile('avatar')) {
                    $image = $request->file('avatar');
                    $name = 'avatar_' . $user->id . '_' . Carbon::now()->format('Y_m_d_his') . '.' . $image->getClientOriginalExtension();
                    $path = config('filesystems.file_upload_path.user_path');
                    $image->move($path, $name, 'public');
                    $user->update(['avatar' => $path . $name]);
                }
            }
            DB::commit();

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $authUser = Auth::user();
        $user = User::findOrFail($id);
        if ($authUser->id == $user->id) {
            return view('portal.users.profile', compact('user'));
        } elseif ($authUser->role == DBConstant::ADMIN && $authUser->role > $user->role) {
            return view('portal.users.edit', compact('user'));
        }
        
        return redirect()->route('users.index');
    }

    public function update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $authUser = Auth::user();
            $user = User::findOrFail($id);
            if (($authUser->role == DBConstant::ADMIN && $authUser->role > $user->role) || $authUser->id == $user->id) {
                if ($authUser->id == $user->id) {
                    $data = $request->except(['email']);
                } else {
                    $data = $request->all();
                }
                if ($request->has('password')) {
                    $data['password'] = bcrypt($data['password']);
                }
                if ($request->hasFile('avatar')) {
                    if (File::exists($user->avatar)) {
                        File::delete($user->avatar);
                    }
                    $image = $request->file('avatar');
                    $name = 'avatar_' . $user->id . '_' . Carbon::now()->format('Y_m_d_his') . '.' . $image->getClientOriginalExtension();
                    $path = config('filesystems.file_upload_path.user_path');
                    $image->move($path, $name, 'public');
                    $data['avatar'] = $path . $name;
                }
                $user->update($data);
            }
            DB::commit();

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back();
        }
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
            $authUser = Auth::user();
            $user = User::findOrFail($id);
            if (!isset($user) || $authUser->role <= $user->role || $authUser->id == $id || $authUser->role != DBConstant::ADMIN) {
                return redirect()->back();
            }
            $user->delete();
            DB::commit();

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back();
        }
    }
}
