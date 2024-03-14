<?php
require_once('database.php');

if (isset($_POST['masuk'])) {
    $username=$_POST['username'];
    if (cek_login($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        if ($_SESSION['role'] == 'admin') {
            header("location:index.php");
        } else {
            header('location:index_user.php');
        }
    } else {
        header("location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <br>
                                    <h2 card="card-title"><center>Welcome!</center></h2>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><center>Login</center></h6>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsernameAddress">Username</label>
                                                <input class="form-control py-4" name="username" id="inputUsername" type="username" placeholder="Enter Username" />
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter Password" />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="masuk" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="js/scripts.js"></script>
    </body>
</html>