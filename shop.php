<?php
	if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    //if loggedin session is not set, redirect to login.php
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


</head>

<body>
<div class="page-heading">
    <!-- Basic card section start -->
    <section id="content-types">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-12"  style="margin: auto;">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Card With Header And Footer</h4>
                            <p class="card-text">
                                Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee
                                sugar plum sugar plum jelly-o jujubes bonbon dessert carrot cake.
                            </p>
                        </div>
                        <img class="img-fluid w-100" src="assets/images/samples/banana.jpg" alt="Card image cap">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <form action="iframe_sample.php" method="POST"  style="margin: auto;">
                            <input type="hidden" name="productid" value="1">
                            <button type="submit" class="btn btn-primary" >Buy</button>
                        </form>
                        <!-- <a href="iframe_sample.php" class="btn btn-primary" style="margin: auto;">Buy</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
