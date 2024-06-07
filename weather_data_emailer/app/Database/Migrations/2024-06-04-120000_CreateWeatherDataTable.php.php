<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWeatherTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'temperature' => [
                'type' => 'FLOAT',
            ],
            'humidity' => [
                'type' => 'FLOAT',
            ],
            'weather_description' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('weather');
    }

    public function down()
    {
        $this->forge->dropTable('weather');
    }
}
