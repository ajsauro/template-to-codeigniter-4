<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Search extends BaseController
{
    public function index()
    {
        session_start();
        session->set('searchData', $this->request->getGet('s'));
        var_dump($_SESSION['searchData']);
    }
}
