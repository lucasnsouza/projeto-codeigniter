<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Caffeination, Yes!',
            'slug' => 'caffeination-yes',
            'body' => 'World\'s largest coffee shop open onsite nested coffee shop for staff only.'
        ];

        $this->db->table('news')->insert($data);
    }
}

/*
(1,'Elvis sighted','elvis-sighted','Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.'),
(2,'Say it isn\'t so!','say-it-isnt-so','Scientists conclude that some programmers have a sense of humor.'),
(3,'Caffeination, Yes!','caffeination-yes','World\'s largest coffee shop open onsite nested coffee shop for staff only.');
*/
