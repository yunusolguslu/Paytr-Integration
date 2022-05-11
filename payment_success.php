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
    <title>Payment Success Order List</title>
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
                <div class="col-xl-8 col-md-12 col-sm-12" style="margin: auto;">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h2 style="text-align: center;">My Orders</h2>
                                <h4>Order Id :xxxxxxxxxxx</h4>
                                <h6>Date :dd-mm-yyyy</h6>
                                <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500">Demo</td>
                                        <td>3</td>
                                        <td class="text-bold-500">$38.45</td>
                                    </tr>
                                </tbody>
                            </table>
                                <h4 style="margin-top: 5%;">Order Id :xxxxxxxxxxx</h4>
                                <h6>Date :dd-mm-yyyy</h6>
                                <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold-500">Demo123</td>
                                        <td>2</td>
                                        <td class="text-bold-500">$8.45</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Demo234</td>
                                        <td>1</td>
                                        <td class="text-bold-500">$51.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                            </div>
                        </div>
                    </div>
        </section>
    </div>
</body>

</html>