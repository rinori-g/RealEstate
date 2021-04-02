<?php 

    use App\Lib\User;
    require 'autoloader.php';

    $user = new User();

    if(isset($_POST['register'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $user->addUser($first_name,$last_name,$email,$username,$password);

    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/2112736a95.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>RealEstate</title>
</head>

<body>
    <section id="contact" class="py-5 h-100 bg-light">
        <div class="container text-center">
            <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">Register</h1>
            <div class="row mx-auto">
                <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                    <form class="p-5  my-5 bg-white" method="post">
                        <div class="form-group text-left">
                            <label for="name">First name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Last name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-secondary mt-5" name="register">Register</button>
                        <p class="text-left pt-3">Have an account? <a href="login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".nav-item").on('click', function() {
                $(".nav-item").removeClass("activeItem");
                $(this).addClass("activeItem");
            })
        })
    </script>

</body>

</html>