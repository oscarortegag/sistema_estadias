<?php

namespace App\Http\Controllers;

use App\admin\vinculacion\seguimiento\Student;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::Leftjoin('students','students.id','=','users.id')
                 ->join('role_user','role_user.user_id','=','users.id')->select('users.id','users.name','users.email','students.code','role_user.role_id')->get();
        $data = [];
        foreach ($users as $user) {
                $obj = new \stdClass;
                $obj->id = $user->id;
                $obj->name = $user->name;
                $obj->email = $user->email;
                if($user->role_id == 1){
                   $role = "admin";
                }else{
                      $role = "alumno";
                }
                $obj->role = $role;
                $code ="";
                if(!is_null($user->code)){
                   $code = decrypt($user->code);
                }
                $obj->code = $code;
                $data[]=$obj;
        }

        return view('users.index', compact('data'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|alpha_num|min:8',
        ]);

        $role_admin = Role::where('name', 'admin')->first();

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->roles()
            ->attach($role_admin);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:100|unique:users,email,'.$id,
            ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if (!is_null($request->input('password'))){
            //$user->password = Hash::make($request->input('password'));
            $user->update(['password' => Hash::make($request->input('password'))]);
            if ($user->hasRole('alumno')){
                $student = Student::where('id', $user->id);
                //$student->code = $request->input('password');
                $student->update(['code' =>Crypt::encrypt($request->input('password'))]);
                //$student->save();
            }
           }

        return redirect()->route('users.index');
    }


}
