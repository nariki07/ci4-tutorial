<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * タスクテーブルのマイグレーション
 */
class CreateTasksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'due_date'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'is_deleted'  => [
                'type'    => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at'  => [
                'type'    => 'TIMESTAMP'
            ],
            'updated_at'  => [
                'type'    => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}
