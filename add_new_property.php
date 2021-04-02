<?php 

use App\Lib\Property;
use App\Lib\Image;
use App\Lib\Session;

require('autoloader.php');


?>


<?php


$property = new Property;
$session = new Session;

if(isset($_POST['add_new_property'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $rooms = $_POST['rooms'];
    $price = $_POST['price'];
    $bathrooms = $_POST['bathrooms'];
    $created_at = $_POST['created_at'];
    $property->addProperty($session->user_id, $title, $description, $category, $rooms, $bathrooms, $price,$created_at);

    
    $lastProperty = $property->getLastProperty()['id'];
    // echo $lastProperty;
    $imageObj = new Image();
    foreach($_FILES['image']['tmp_name'] as $key => $value){
        $imagename = $_FILES['image']['name'][$key];
        $imagetempname = $_FILES['image']['tmp_name'][$key];
        $imageObj->addImages($lastProperty, $imagename);
        move_uploaded_file($imagetempname, "images/$imagename");
    }
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
                            Profile
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

    <!-- Add new property -->
    <section id="contact" class="py-5 h-100 bg-light">
        <div class="container text-center py-5">
            <h1 class="display-4 pb-1 border-bottom w-50 mx-auto pt-5">Add new property</h1>
            <div class="row mx-auto">
                <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                    <form class="p-5  my-5 bg-white" method="post" enctype="multipart/form-data">
                        <div class="form-group text-left">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Description</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Category</label>
                            <select name="category" class="form-control" id="">
                                <option value="Sale">Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Number of rooms</label>
                            <input type="text" name="rooms" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Number of bathrooms</label>
                            <input type="text" name="bathrooms" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Image</label>
                            <input type="file" name="image[]" class="form-control" multiple>
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Date</label>
                            <input type="date" name="created_at" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <button type="submit" name="add_new_property" class="btn btn-block btn-outline-secondary mt-5">Add property</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>