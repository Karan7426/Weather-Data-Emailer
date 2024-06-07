<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="<?php echo base_url('public/style2.css'); ?>">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            background-image: url('<?php echo base_url('public/cloud.gif'); ?>');
            background-size: cover;
            background-position: center;
            padding: 20px;
        }

        

        .container {
            width: 100%;
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .weather-card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            background-image: url('<?php echo base_url('public/card.gif'); ?>');
            background-size: cover;
            background-position: center;
            padding: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-top: 20px;
        }

        .weather-card:hover {
            transform: scale(1.0);
        }

        #city-name {
            font-size: 24px;
            font-weight: bold;
        }

        #date {
            font-size: 14px;
            color: #555;
        }

        #weather-icon {
            width: 100px;
            height: 100px;
        }

        #temperature {
            font-size: 32px;
            font-weight: bold;
            margin: 8px 0;
        }

        #description {
            font-size: 18px;
            margin-bottom: 10px;
        }

        #humidity, #pressure {
            font-size: 16px;
            color: #333;
        }

        .forecast-container {
            margin-top: 20px;
        }

        .forecast-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .forecast-item:last-child {
            border-bottom: none;
        }

        .forecast-time, .forecast-date {
            flex: 1;
            text-align: left;
        }

        .forecast-temp {
            flex: 1;
            text-align: center;
        }

        .forecast-condition {
            flex: 2;
            text-align: right;
        }

        .forecast-day {
            flex: 1;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 10px;
            }

            .weather-card {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            #temperature {
                font-size: 28px;
            }

            #description {
                font-size: 16px;
            }

            #humidity, #pressure {
                font-size: 14px;
            }

            .forecast-time, .forecast-date {
                font-size: 12px;
            }

            .forecast-temp {
                font-size: 14px;
            }

            .forecast-condition {
                font-size: 12px;
            }

            .forecast-day {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

 
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
             <ul class="navbar-nav">
                 <li class="nav-item">
                 <a class="nav-link" href="<?php echo base_url('signup'); ?>" style="font-weight: bold;">Signup</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url('login'); ?>" style="font-weight: bold;">Login</a>
                 </li>
             </ul>
         </div>
     </nav>
    <h1 class="mt-3">Get Weather Report</h1>
    <form id="weatherForm" class="mt-3">
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <button type="submit" class="btn btn-primary">Get Weather</button>
    </form>
    <div id="weatherDetails"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#weatherForm').submit(function(e) {
            e.preventDefault();  
            
            var location = $('#location').val();
            $.post("<?php echo base_url('getWeather'); ?>", { location: location }, function(response) {
                if (response.error_message) {
                    $('#weatherDetails').html('<p>' + response.error_message + '</p>');
                } else {
                    var weatherData = response.weather_summary;
                    var html = '<div class="weather-card"><h1 style="color: green;">Weather Details</h1>' +
                        '<div id="weather-info" class="animate__animated animate__fadeIn">' +
                        '<h3 id="city-name">' + weatherData.location + '</h3>' +
                        '<p id="date">' + weatherData.date + '</p>' +
                        '<img id="weather-icon" src="' + weatherData.weather_icon + '" alt="Weather Icon">' +
                        '<p id="temperature">' + weatherData.temperature + '°C</p>' +
                        '<p id="description">' + weatherData.weather_description + '</p>' +
                        '<p id="humidity">Humidity: ' + weatherData.humidity + '%</p>' +
                        '<p id="pressure">Pressure: ' + weatherData.pressure + ' mb</p></div></div>';

                    html += '<div class="forecast-container"><div class="d-flex justify-content-between text-center">';
                    $.each(weatherData.forecast, function(index, day) {
                        html += '<div class="mt-5"><strong class="d-block mb-2 forecast-day">' +
                            new Date(day.date).toLocaleDateString('en-US', { weekday: 'short' }) +
                            '</strong><img id="wrapper-icon-hour-now" src="' + day.day.condition.icon +
                            '" alt="" /><strong class="d-block forecast-temp">' + day.day.maxtemp_c +
                            '°C / ' + day.day.mintemp_c + '°C</strong></div>';
                    });
                    html += '</div></div>';

                    $('#weatherDetails').html(html);
                }
            }, 'json');
        });
    });
</script>

</body>
</html>
