<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\registrRequest;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $rule =[
            'email'      => 'required|email',
            'pwd'       => 'required|min:3|max:32'
        ];
        $mesage = [
            'email.required'        => 'Tài khoản không được trống',
            'pwd.required'          => 'Mật khẩu không được để trống',
            'pwd.min'               => 'Mật khẩu phải có ít nhất 3 kí tự',
            'pwd.max'               => 'Mật khẩu không quá 32 kí tự',
            'email.email'           => 'Không đúng định dạng email'
        ];

        $request->validate($rule,$mesage);

        $remember = $request->remember;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->pwd, 'level' => 2],$remember)){
            
            return redirect()->route('product.index');
        }
        else if(Auth::attempt(['email' => $request->email, 'password' => $request->pwd, 'level' => 1],$remember)){
            return redirect()->route('loginUser');
        }
        else{
            return redirect()->route('login')->with('msg','Đăng nhập không thành công')->with('status','danger');
        }
    }

    public function getRegister(){
        return view('register');
    }

    public function postRegister(registrRequest $request){
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->birthday = $request->birthday;
        $user->password = bcrypt($request->password);
        $user->level = 1;
        $user->save();

        return redirect()->route('index')->with('msg','Đăng nhập thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
