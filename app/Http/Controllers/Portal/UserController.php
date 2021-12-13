<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\DBConstant;
use App\Http\Requests\User\StoreRequest;
use DB;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $users = DB::table('users')
            ->where('id', '!=', $auth->id)
            ->where('role', '<', $auth->role)
            ->get();

        return view('portal.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $auth = Auth::user();
        if ($auth->role == DBConstant::SUPPER_ADMIN) {
            return view('portal.users.form');
        }
        
        return redirect()->route('user.list');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->only([
            'name', 'email', 'password', 'role'
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
            return view('portal.users.form');
        }
        
        return redirect()->route('user.list');
    }

    public function update(StoreRequest $request, $id)
    {
        $data = $request->only([
            'name', 'email', 'password', 'role'
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
