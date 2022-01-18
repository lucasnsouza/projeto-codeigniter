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

    public function create ()
    {
        $model = model(NewsModel::class);
        //confirmar se o form foi enviado e os campos passam nos rquisitos de validação
        if($this->request->getPost() && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required'
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug' => url_title($this->request->getPost('title'), '-', true),
                'bodey' => $this->request->getPost('body'),
            ]);

            echo view('news/success');
        } else {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }
}
