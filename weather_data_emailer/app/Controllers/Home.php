<?php

namespace App\Controllers;
use App\Models\WeatherModel;

class Home extends BaseController
{

    private $weatherApiKey = '4c6379499c7845edb9e93721240506';

    public function index()
    {
        return view('index');
    }

    public function getWeather()
    {
        if ($this->request->getMethod() == 'post') {
            $location = $this->request->getPost('location');
            $weatherData = $this->fetchWeatherData($location);

            if ($weatherData) {
                return $this->response->setJSON(['weather_summary' => $weatherData]);
            } else {
                return $this->response->setJSON(['error_message' => 'Failed to fetch weather data']);
            }
        } else {
            return redirect()->to('/');
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

}