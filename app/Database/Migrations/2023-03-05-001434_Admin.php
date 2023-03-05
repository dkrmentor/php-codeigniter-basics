<?php

// This is a migration file for creating the 'admin' table in the database.
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        //forge is a CodeIgniter database library method that is used to create the structure of database tables with defined columns and attributes
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                // 'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fname' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'lname' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_type' => [
                'type' => 'ENUM("admin","user")',
                'default' => 'user',
                'null' => false,
            ],
            'created_at' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'updated_at' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');

    }
}
