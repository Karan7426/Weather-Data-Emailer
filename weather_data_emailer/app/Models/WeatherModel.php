<?php

namespace App\Models;

use CodeIgniter\Model;

class WeatherModel extends Model
{
    protected $table = 'weather_data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','location', 'date', 'temperature', 'humidity', 'weather_description','pressure'];
}