<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WeatherModel;
use App\Models\UserModel;

class Weather extends BaseController
{
    private $weatherApiKey = '4c6379499c7845edb9e93721240506';

    public function index()
    {
        return view('weather');
    }

    public function getDetails()
    {
        if ($this->request->getMethod() == 'post') {
            $location = $this->request->getPost('location');
    
           
            if (!session()->get('isLoggedIn')) {
                return $this->response->setJSON(['error_message' => 'You must be logged in to view weather data.']);
            }
    
            
            $userId = session()->get('id');
            $userModel = new UserModel();
            $userExists = $userModel->find($userId);
    
            if (!$userExists) {
                return $this->response->setJSON(['error_message' => 'User not found.']);
            }
    
           
            $weatherData = $this->fetchWeatherData($location);
    
            if ($weatherData) {
                
                $this->storeWeatherData($location, $weatherData);
    
              
                $this->sendWeatherEmail($weatherData);
    
                 
                return $this->response->setJSON(['weather_summary' => $weatherData]);
            } else {
                
                return $this->response->setJSON(['error_message' => 'Failed to fetch weather data']);
            }
        } else {
            return $this->response->setStatusCode(405)->setJSON(['error_message' => 'Method Not Allowed']);
        }
    }
    

    private function fetchWeatherData($location)
    {
        $client = \Config\Services::curlrequest();
        $currentUrl = "http://api.weatherapi.com/v1/current.json?key={$this->weatherApiKey}&q={$location}";
        $forecastUrl = "http://api.weatherapi.com/v1/forecast.json?key={$this->weatherApiKey}&q={$location}&days=7";

        try {
            $currentResponse = $client->get($currentUrl);
            $forecastResponse = $client->get($forecastUrl);
            $currentData = json_decode($currentResponse->getBody(), true);
            $forecastData = json_decode($forecastResponse->getBody(), true);

            if (isset($currentData['current']) && isset($forecastData['forecast'])) {
                return [
                    'location' => $currentData['location']['name'],
                    'region' => $currentData['location']['region'],
                    'country' => $currentData['location']['country'],
                    'temperature' => $currentData['current']['temp_c'],
                    'humidity' => $currentData['current']['humidity'],
                    'weather_description' => $currentData['current']['condition']['text'],
                    'weather_icon' => $currentData['current']['condition']['icon'],
                    'pressure' => $currentData['current']['pressure_mb'],
                    'date' => date('Y-m-d'),
                    'forecast' => $forecastData['forecast']['forecastday'],
                ];
            }

            return null;
        } catch (\Exception $e) {
            log_message('error', "Weather API Error: " . $e->getMessage());
            return null;
        }
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    private function storeWeatherData($location, $weatherData)
    {
        $model = new WeatherModel();
        $data = [
            'user_id' => session()->get('id'), 
            'location' => $weatherData['location'],
            'date' => $weatherData['date'],
            'temperature' => $weatherData['temperature'],
            'humidity' => $weatherData['humidity'],
            'weather_description' => $weatherData['weather_description'],
            'pressure' => $weatherData['pressure'],
        ];

        //print_r($data);die();
        $model->save($data);
    }

    private function sendWeatherEmail($weatherData)
    {
        $apiKey = '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';
        $toEmail = session()->get('email'); 
        $fromEmail = 'no-reply@gmail.com';

        $url = 'https://api.brevo.com/v3/smtp/email';

        $emailContent = "<html>
<head>
<title>Weather Report</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<table>
    <tr>
        <th>Location</th>
        <th>Temperature</th>
        <th>Humidity</th>
        <th>Weather Description</th>
        <th>Pressure</th>
        <th>Date</th>
    </tr>
    <tr>
        <td>{$weatherData['location']}</td>
        <td>{$weatherData['temperature']}°C</td>
        <td>{$weatherData['humidity']}%</td>
        <td>{$weatherData['weather_description']}</td>
        <td>{$weatherData['pressure']}</td>
        <td>{$weatherData['date']}</td>
    </tr>
</table>

</body>
</html>";

        $postData = [
            'sender' => [
                'email' => $fromEmail,
                'name' => 'Weather App'
            ],
            'to' => [
                [
                    'email' => $toEmail,
                    'name' => session()->get('full_name')  
                ]
            ],
            'subject' => 'Weather Report',
            'htmlContent' => $emailContent
        ];

        $headers = [
            'accept: application/json',
            'api-key: ' . $apiKey,
            'content-type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        log_message('info', "Email sent. Response: " . $response);
    }

    public function viewHistory()
    {
         
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        

        return view('history');
    }
}