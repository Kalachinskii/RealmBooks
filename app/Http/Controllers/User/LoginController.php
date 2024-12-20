<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __invoke(Request $request)
    {
        $rules = [
            'login' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'login.required' => 'Поле не должно быть пустным',
            'login.unique' => 'Пользователь существует',
            'password.min' => 'Слабый пароль',
            'password.max' => 'Превышено кол-во симовлов в пароле',
            'password.confirmed' => 'Пароли не совпадают',
            'password.required' => 'Поле не должно быть пустным',
        ];

        $cred = Validator::make($request->all(), $rules, $messages)->validate();

        if (Auth::attempt($cred)) {
            if (auth()->user()->role === 1) {
                return redirect()->to('admin/post');
            } else {
                return redirect('/');
            }
        }

        return back()->with('login-error', 'Некоректный логин или пароль');
    }
}
