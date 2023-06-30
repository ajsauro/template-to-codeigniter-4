<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Login;
use App\Models\User;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }
    public function store()
    {
        $validated = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required'
        ], [
            'firstName' => [
                'required' => 'O campo nome é obrigatório.'
            ],
            'lastName' => [
                'required' => 'O campo sobrenome é obrigatório.'
            ],
            'email' => [
                'required' => 'O campo email é obrigatório.'
            ],
            'password' => [
                'required' => 'O campo password é obrigatório.'
            ],
        ]);

        if (!$validated) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->route('register');
        }

        $user = $this->request->getGetPost();
        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
        $user['photo'] = 'https://randomuser.me/api/portraits/lego/5.jpg';
        $imgid = rand(1, 95);
        if ($user['gender'] === '1') {
            $user['photo'] = 'https://randomuser.me/api/portraits/men/' . $imgid . '.jpg';
        } elseif ($user['gender'] === '2') {
            $user['photo'] = 'https://randomuser.me/api/portraits/women/' . $imgid . '.jpg';
        }

        $users = new User();
        $userCreated = $users->insert($user);
        if ($userCreated) {
            session()->setFlashdata('user_created', 'Usuário cadastrado com sucesso.');
        } else {
            session()->setFlashdata('user_not_created', 'Ocorreu um erro ao cadastrar o usuário, tente novamente.');
        };

        $user = $users->find($userCreated);
        Login::login($user);

        return redirect()->route('register');
    }
}
