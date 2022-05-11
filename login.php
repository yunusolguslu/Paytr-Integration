<?php
global  $username_err, $password_err;
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}
require_once 'conn.php';
require_once 'models/user.php';
$database=new Database();
$db=$database->getConnection();
$users=new User($db);

//check input values is correct
if (isset($_SESSION["login_error_usernotfound"]) && $_SESSION["login_error_usernotfound"] != null) {
    $username_err = $_SESSION["login_error_usernotfound"];
} else if (isset($_SESSION["login_error_password"]) && $_SESSION["login_error_password"] != null) {
    $password_err = $_SESSION["login_error_password"];
}

//unset releated sessions
unset($_SESSION["login_error_usernotfound"]);
unset($_SESSION["login_error_password"]);
unset($_SESSION["userid"]);
//set false to loggedin session
$_SESSION["loggedin"] = false;

//check isset server request method and value
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name is empty
    if (empty(trim($_POST["name"]))) {
        $username_err = "Please enter username.";
    } else {
        //input value set as $name because it will control both username and email
        $name = trim($_POST["name"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        $account = $users->readforConfirmed($name);

        if ($account > 0) {
    
           // if (password_verify($password, $account["password"])) {
            if ($password===$account["password"]) {
                // Password is correct, so start a new session
                session_start();
                // Store data in session variables
                $_SESSION["userid"] = $account["id"];
                $_SESSION["email"] = $account["email"];
                $_SESSION["username"] = $account["username"];
                $_SESSION["name"] = $account["name"];
                $_SESSION["surname"] = $account["surname"];
                //user types will be stored in session when implemented
                $_SESSION["loggedin"] = true;
               
                //check if user is logged in, if yes, redirect to dashboard page
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    header("location: shop.php");
                } else {
                    //if something went wrong despite the verification, redirect to login page
                    $_SESSION["login_error_password"] = "Username or password is incorrect. from passnot";
                    header("location: login.php");
                }
            } else {
               //if password is incorrect
                $_SESSION["login_error_usernotfound"] = "Username or password is incorrect.";
                header("location: login.php");
            }
        }
        //if account is not found
        else{
            $_SESSION["login_error_usernotfound"] = "Username or password is incorrect.";
            header("location: login.php");
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo mb-5">
                        <a href="index.php"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-4">Log in with your data that you entered during registration.</p>

                    <div class="alert alert-danger help-block <?php echo (!empty($username_err) || !empty($password_err)) ? '' : 'd-none'; ?>" role="alert">
                        <div><?php echo $username_err; ?></div>
                        <div><?php echo $password_err; ?></div>
                    </div>
                    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email or Username" name="name" id="iname">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <!-- <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username" name="username" id="iusername">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div> -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="ipassword">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div> -->
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="register.php" class="font-bold">Sign
                                up</a>.</p>
                        <!-- <p><a class="font-bold" href="#">Forgot password?</a>.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>