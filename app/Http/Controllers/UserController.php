<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::latest()->get();
        $roles = Role::latest()->get();
        return view('user.index', compact('users', 'roles'));
    }
    public function show(User $users){
        $roles = Role::latest()->get();
        return view('user.show',[
            'users' => $users,
            'roles' => $roles,
        ]);    
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        $validatedData['password'] =  bcrypt($request->password);

        if($request->input('role_id') == 1){
            User::create($validatedData)->assignRole('admin');
        }else{
            User::create($validatedData)->assignRole('user');
        }
        
        return redirect('/home/user')->with('success','Tamu Berhasil di Tambahkan!');
    }
    public function update(Request $request, User $users){

        switch ($request->input('action')) {
            case 'update':
                $rules = [
                    'name' => 'required',
                    'email' => 'required',
                ];
                $validatedData = $request->validate($rules);

                if($request->input('role_id') == 1){
                    $users->syncRoles('admin');
                    
                }else{
                    $users->syncRoles('user');
                }
                User::where('id', $users->id)->update($validatedData);
                return redirect('/home/user')->with('warning', 'Tamu Berhasil di Update!');
                break;
            case 'update_password':
                $request->validate([
                    'new_password' => ['required'],
                    'new_confirm_password' => ['same:new_password'],
                ]);
                User::where('id', $users->id)->update(['password'=> Hash::make($request->new_password)]);
                return redirect('/home/user')->with('success','Password Berhasil di Update!');
                break;
        }
        
        
        
    }
    public function destroy(User $users){
        User::destroy($users->id);
        return redirect('/home/user')->with('danger', 'Tamu berhasil di Hapus!.');
    }
}
