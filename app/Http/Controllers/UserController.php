<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;



use Validator;
use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        $users=User::orderBy('id', 'DESC')->paginate(25);

        return view('user.index', compact('users'));
    }

    public function create()
    {

        $users= new User();
        $roles=Role::all();
        return view('user.create',compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $password = $request->password_confirmation;

        $Hashpassword = Hash::make($password);

        $users= new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $Hashpassword;
        $users->role_id = $request->role_id;
        $users->status = $request->status;

        $users->save();
        return redirect('users');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users=User::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $password = $request->password_confirmation;

        $Hashpassword = Hash::make($password);

        $users = User::findOrFail($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $Hashpassword;
        $users->role_id = $request->role_id;
        $users->status = $request->status;
        $users->update();
        return redirect('users');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('users');
    }


    public function search(Request $request)
    {
        $users= User::where('name', 'like', '%'.$request->search.'%')
        ->orWhere('email', 'like', '%'.$request->search.'%')
        ->orWhereHas('role', function($role) use($request){
            $role->where('name', 'like', '%'.$request->search.'%');
        })
        ->paginate(25);


    return view('user.index' , compact('users'));
    }

}
