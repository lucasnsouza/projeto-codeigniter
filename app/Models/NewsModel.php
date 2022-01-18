<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'body'];
 
    public function getNews($slug = false)
    {
        if ($slug === false) {
            //se o slug não for passado
            //busca todas as notícias
            return $this->findAll();
        }
        //retorna a primeira notícia que o slug bate com o da tabela news
        return $this->where(['slug' => $slug])->first();
    }
}
