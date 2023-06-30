<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Libraries\login as LibrariesLogin;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Util\Xml\Validator;
use stdClass;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function store()
    {
        $validated = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);
        if (!$validated) {
            return redirect()->route('login.login')->with('errors', $this->validator->getErrors());
        }

        $users = new User();
        $user = $users->where('email', $this->request->getPost('email'))->first();
        if (!$user) {
            return redirect()->route('login.login')->with('error', 'Email e/ou senha invalidos.');
        }
        if (!password_verify((string)$this->request->getPost('password'), $user->password)) {
            //            dd($validated);
            return redirect()->route('login.login')->with('error', 'Email e/ou senha invalidos.');
        }

        LibrariesLogin::login($user);

        return redirect()->route('home');
    }
    public function destroy()
    {
        session()->remove('auth');
        session()->remove('user');

        return redirect()->route('home');
    }
}
