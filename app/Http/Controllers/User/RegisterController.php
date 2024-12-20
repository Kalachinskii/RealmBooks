<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function __invoke(Request $request)
    {
        // переоприделение сообщений ошибок
        $messages = [
            'email.required' => 'Поле не должно быть пустным',
            'email.unique' => 'Пользователь существует',
            'email.email' => 'Значение должно быть почтой',
            'password.min' => 'Слабый пароль',
            'password.max' => 'Превышено кол-во симовлов в пароле',
            'password.confirmed' => 'Пароли не совпадают',
            'password.required' => 'Поле не должно быть пустным',
        ];
        // правила
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|max:16',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        // закешированный пароль
        $req = $request->all();
        $req['password'] = bcrypt($req['password']);

        // Создание в БД пользовотеля
        $user = User::create($req);

        // Вход в сессию
        Auth::login($user);

        // Сообщение по ключу - success
        session()->flash('success', 'Регистрация пройдена');

        return redirect('/');
    }
}
