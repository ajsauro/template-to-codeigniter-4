<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        return view('contact');
    }
    public function store()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'name' => [
                'required' => 'O campo nome é obrigatório.'
            ],
            'subject' => [
                'required' => 'O campo assunto é obrigatório.'
            ],
            'message' => [
                'required' => 'O campo mensagem é obrigatório.'
            ],

        ]);

        if (!$validated) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->route('contact');
        }
        //
        $email = \Config\Services::email();
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'sandbox.smtp.mailtrap.io',
            'SMTPUser' => '7fce0e33a4a446',
            'SMTPPass' => 'd704fc90146310',
            'SMTPPort' => 2525,
            'wordWrap' => true,
            'mailType' => 'html',
        ];

        $email->initialize($config);

        $email->setFrom($this->request->getPost('email'), $this->request->getPost('name'));
        $email->setTo('ajsaurobr@yahoo.com.br');

        $template = view('emails/contact', [
            'name' => 'ajSauro',
            'from' => $this->request->getPost('email'),
            'message' => strip_tags((string)$this->request->getPost('message')),
        ]);

        $email->setSubject($this->request->getPost('subject'));
        //        $email->setMessage($this->request->getPost('email'));

        $email->setMessage($template);

        //Enviar o e-mail
        $sent = $email->send();
        if (!$sent) { //Não foi enviado?
            session()->setFlashdata('email_error', 'Não foi possível enviar o email, tente novamente daqui a alguns segundos.');
        } else {
            session()->setFlashdata('success', "Email enviado com sucesso, responderemos em no máximo 24 horas.");
        }

        return redirect()->route('contact');
    }
}
