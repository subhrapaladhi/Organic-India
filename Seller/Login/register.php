<?php
ob_start();
session_start();

if (isset($_SESSION['seller']) != "") {
    header("Location: ../index.php");
}
$conn = new mysqli("localhost","root","RishabhB@7130R","Organic_India");
if($conn->connect_error){
    die("Connection to Mysql failed");
}

if (isset($_POST['signup'])) {
    // get posted data and remove whitespace
    $name = trim($_POST['name']); 
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $address = trim($_POST['address']);
    $mobile = trim($_POST['mobile']);

    // hash password with SHA256;
    $password = hash('sha256', $pass);

    // check email exist or not
    $stmt = $conn->prepare("SELECT email FROM sellers WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) { // if email is not found add user
        $query = "INSERT INTO sellers(email,password,name,address,mobile) VALUES('$email','$password','$name','$address','$mobile')";

        if (mysqli_query($conn, $query)) {
            $user_id = mysqli_insert_id($conn);
            echo 'user id is = '.$user_id;
            $_SESSION['seller'] = $user_id; // set session and redirect to index page
            if (isset($_SESSION['seller'])) {
                print_r($_SESSION);
                header("Location: ../index.php");
                exit;
            }
        } else {
            $errTyp = "danger";
            $err = mysqli_error($conn);
            $errMSG = "Something went wrong, try again";
        }

    } else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }

}
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
<body>

<div class="container">

    <div id="login-form">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Register for our Website</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password"
                               required/>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="address" class="form-control" placeholder="Enter your address" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="mobile" class="form-control" placeholder="Enter your mobile number" required/>
                    </div>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" id="TOS" value="This"><a href="#">I agree with terms of service</a></label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="signup" id="reg">Register</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="login.php" type="button" class="btn btn-block btn-success" name="btn-login">Login</a>
                </div>

            </div>

        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

</body>
</html>