<?php

use App\Lib\Image;
use App\Lib\Property;

require 'autoloader.php';

if(isset($_GET['property_id'])){
    $propertyOb = new Property;
    $property = $propertyOb->getPropertyById($_GET['property_id']);

    $imageOb = new Image;
    $images = $imageOb->getImageByPropertyIdAll($property['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/2112736a95.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
    <title>Real Estate WebApp</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        #pages {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(images/slide2.jpg);
            background-position: top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: #fff;
            overflow: hidden;
        }

        #projects .row img:hover {
            transform: scale(1.1);
            transition: .3s;
        }

        #services .card {
            box-shadow: 1px 1px 35px #000;
            margin-bottom: 50px;
        }

        #services .card:hover {
            margin-top: -10px;
            transition: .3s;
        }

        .activeItem {
            border-bottom: 1px solid #000;
            transition: .2s;
        }
    </style>
</head>

<body>

    <!-- Navigimi -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #fff;border-bottom: 1px solid #000;">
        <a class="navbar-brand text-dark" href="#"><img src="images/logo.png" class="img-fluid" width="100" height="50" alt=""></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                <li class="nav-item activeItem">
                    <a class="nav-link text-dark" href="index.php">Home</a>
                </li>
            </ul>
        </div>
        <span class="d-inline-block" style="margin-right: 100px;">
            <div class="dropdown">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clirim Kastrati
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="your_properties.php">Your properties</a>
                    <a class="dropdown-item" href="add_new_property.php">Add new property</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </span>
        <span class="d-inline-block mr-5">
            <a href="login.php" style="color:black;padding-right: 5px;">Login</a>
        </span>
    </nav>

    <!-- Property Details -->
    <section id="property_details" class="py-5 my-5">
        <div class="container text-center mb-5 pb-5">
            <h1 class="display-4 pb-1 border-bottom w-50 mx-auto pt-5">Property Details</h1>
            <div class="row pt-5">
                <div class="col-12">
                                <div id="slider3" class="carousel" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                    <?php
                        $i=0;
                        foreach($images as $image):?>

                        <li data-target="#slider3" data-slide-to="<?php echo $i ?>"></li>
                    <?php $i++; endforeach;?>
                    </ol>
                    <div class="carousel-inner">

                        <?php
                        $i=0;
                        foreach($images as $image):
                        ?>


                        <div class="carousel-item <?php if($i==0): echo ' active'; endif;?>">
                            <img src="images/<?php echo $image['image'];?>" alt="First Slide" style="width:900px;height:300px;">
                        </div>
                        <?php $i++;
                             endforeach;?>
                    </div>


                    <a href="#slider3" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#slider3" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                </div>
            </div>
            <div class="row pt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Number of rooms</th>
                            <th>Number of bathrooms</th>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $property['title']; ?></td>
                            <td><?php echo $property['description']; ?></td>
                            <td><?php echo $property['rooms']; ?></td>
                            <td><?php echo $property['bathrooms']; ?></td>
                            <td><?php echo $property['category']; ?></td>
                            <td><?php echo $property['price']; ?> &euro;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row pt-5 text-left">
                <div class="col-6">
                    <p>Added by: <b><?php echo $property['first_name'] . " " . $property['last_name']; ?></b></p>
                    <p>Kontakto pronarin permes email-it <a href="mailto:<?php echo $property['email'];?>">ketu</a>! </p>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>