 <?php 



  $model = model('App\Models\SqlModel', false);
  $session = session();
  $userId = session()->get('id');
  $historyData = $model->runQuery("SELECT * FROM `weather_data` WHERE `user_id` = $userId  ORDER BY `id` DESC ");
?>


<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> 
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
        function hideURLbar(){ window.scrollTo(0,1); } 
    </script>

    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
     
    
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('public/css/style-responsive.css'); ?>" rel='stylesheet' type='text/css' />
    
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    
    <!-- font-awesome icons -->
    <link href="<?php echo base_url('public/css/font.css'); ?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('public/css/font-awesome.css'); ?>" rel='stylesheet' type='text/css' />
    
     

   
   
    <link rel="stylesheet" href="<?php echo base_url('public/style2.css'); ?>">

     
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
 
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        
        <!-- settings end -->
        <!-- inbox dropdown start-->
        
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
         
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    
    <ul class="nav pull-right top-menu">
         
       
       
    </ul>
 
</div>
</header>
<!--header end-->


<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="<?php echo base_url('index'); ?>">
                        <i class="fa fa-cloud"></i>
                        <span>Check Weather</span>
                    </a>
                </li>

                <li>
                    <a class="active" href="<?php echo base_url('history'); ?>">
                        <i class="fa fa-history"></i>
                        <span>History</span>
                    </a>
                </li>
                
           
                <li>
                    <a href="<?php echo base_url('logout'); ?>">
                        <i class="fa fa-user"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->



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
		#tableSearch {
        width: 25% !important;
        min-width: 150px;  
    }
    .table td, .table th {
        font-weight: bold;
    }

    .custom-bg {
        background-color: #f8f9fa;  
        padding: 20px;
        border-radius: 10px;
    }

    .table-custom {
        background-color: #ffffff; 
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

<section id="main-content">
    <section class="wrapper">
    <div class="container mt-4 custom-bg">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>View History</h1>
                <input class="form-control w-25" id="tableSearch" type="text" placeholder="Search history..">
            </div>
            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody id="historyTable">
                    <?php foreach ($historyData as $item): ?>
                        <tr>
                            <td><strong><?= $item->date ?></strong></td>
                            <td><strong><?= $item->location ?></strong></td>
                            <td><strong><?= $item->temperature ?></strong></td>
                            <td><strong><?= $item->humidity ?></strong></td>
                            <td><strong><?= $item->weather_description ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="<?php echo base_url('public/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="<?php echo base_url('public/js/scripts.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.slimscroll.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.nicescroll.js'); ?>"></script>


 

      
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script>
<![endif]-->
 


<script>
    $(document).ready(function(){
        $("#tableSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#historyTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
 

</body>
</html>



