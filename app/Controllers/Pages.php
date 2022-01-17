<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        //it checks whether the page actually exists. PHP’s native is_file() function is used to check whether the file is where it’s expected to be. 
        if(!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            //caso não encontre a página
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
