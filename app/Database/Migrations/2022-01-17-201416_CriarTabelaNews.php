<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaNews extends Migration
{
    public function up()
    {
        //criar campos da tabela
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false
            ],
            'body' => [
                'type' => 'TEXT',
                'null' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');

        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
