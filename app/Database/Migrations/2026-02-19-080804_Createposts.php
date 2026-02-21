<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createposts extends Migration
{
     public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'content' => ['type' => 'TEXT'],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('posts', true);
    }
    public function down() {
        $this->forge->dropTable('posts');
    }
}
