<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStokToProduk extends Migration
{
    public function up() {
    $this->forge->addColumn('produk', [
        'stok' => ['type' => 'INT', 'constraint' => 5, 'default' => 0, 'after' => 'harga']
    ]);
}

    public function down() {
        $this->forge->dropColumn('produk', 'stok');
    }
}
