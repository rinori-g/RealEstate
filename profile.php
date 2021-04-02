<?php

use App\Lib\Session;
use App\Lib\User;

require('autoloader.php');
$user = new User;
$session = new Session;
$user_data = $user->get_user_by_id($session->user_id);

if(isset($_POST['modify'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $user->modify_user($session->user_id, $first_name, $last_name, $email, $username);
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

    <!-- Profile -->
    <section id="profile" class="py-5 my-5">
        <div class="container text-center mb-5 pb-5">
            <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">Profile</h1>
            <h4 class="text-left">Hi, <b><?php echo $user_data['first_name'] . " " .$user_data['last_name'] ?></b></h4>
            <p class="text-left">Below are your data, u can modify them by clicking the <i>Modify</i> button.</p>
            <div class="row text-left">
                <div class="col-3 col-sm-3 col-md-2">
                    <p>First Name:</p>
                    <p>Last Name:</p>
                    <p>Email:</p>
                    <p>Username: </p>
                </div>
                <div class="col-9 col-sm-9 col-md-10">
                    <p><?php echo $user_data['first_name'] ?></p>
                    <p><?php echo $user_data['last_name'] ?></p>
                    <p><?php echo $user_data['email'] ?></p>
                    <p><?php echo $user_data['username'] ?></p>
                </div>
            </div>
            <div class="row text-left pt-5">
                <div class="col-12">
                    <button class="btn btn-outline-primary mb-5 w-25" data-toggle="modal" data-target="#exampleModal">Modify</button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-left">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modify your data!</h5>
                            <button type="button" class="close w-25 h-100" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" class="p-5 mb-5" id="modifiko_te_dhenat">
                                <div class="form-group">
                                    <label for="emri">First Name</label>
                                    <input type="text" class="form-control" name="first_name" style="width: 100%" aria-describedby="emailHelpId" placeholder="" value="<?php echo $user_data['first_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mbiemri">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"  style="width: 100%" aria-describedby="emailHelpId" placeholder="" value="<?php echo $user_data['last_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" style="width: 100%" aria-describedby="emailHelpId" placeholder="" value="<?php echo $user_data['email'] ?>">
                                </div>
                                <div class="form-group pb-4">
                                    <label for="email">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" style="width: 100%" aria-describedby="emailHelpId" placeholder="" value="<?php if(!empty($user_data['username'])): echo $user_data['username']; endif; ?>">
                                </div>
                                <button class="btn btn-outline-primary btn-block" type="submit" name="modify">Modify</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>