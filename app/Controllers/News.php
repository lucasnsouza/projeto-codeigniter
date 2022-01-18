<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function index()
    {
        //esse método busca e retorna todas as notícias
        $model = model(NewsModel::class);

        $data = [
            'title' => 'Acervo de notícias',
            'news' => $model->getNews()
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = null) 
    {
        //esse método busca uma notícia pelo slug
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Não encontramos o item: ' . $slug);
        }

        //o título da página será o valor do campo title na tabela news
        $data['title'] = $data['news']['title'];

        echo view('templates/header', $data);
        echo view('news/view', $data);
        echo view('templates/footer', $data);
    }
}
