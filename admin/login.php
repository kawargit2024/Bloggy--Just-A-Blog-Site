<?php
require_once('../config/dbcon.php');

// if(isset($_SESSION['email'])){
//   header("location:index.php");
// }

// define variable //
$email  = $pwd = '';
 $loginError = '';

if( isset( $_POST['login'] ) ){

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$error = [];

if(empty($email)){
   $error['email'] = "Field is reqauired";
}

if(empty($pwd)){
   $error['pwd'] = "Field is reqauired";
}


// if(empty($error)){
//   echo "no error";
// } else {
//   echo "has error";
// }


// echo "<pre>";
// var_dump($error);
// echo "</pre>";


if( empty( $error ) ){
$email_check = mysqli_query( $db_conn,"SELECT `id`,`name`,`password`,`status` FROM `user_table` WHERE `email`= '$email'");
 if(mysqli_num_rows($email_check) == 1){
      $userInfo = mysqli_fetch_assoc($email_check);
        if($userInfo["password"] == md5($pwd)){
            if($userInfo["status"] == 1){
                $_SESSION['email'] = $email;
                $_SESSION['u_id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];

                if(isset($_SESSION['email'])){
                  header("location:index.php");
                }

            } else {
              $loginError = "Status Inactive";
            }
        } else {
            $loginError = "Credential Not Matched";
        }
     } else {
        $loginError = "Credential Not Matched";
     }
 }

}


$gInfo = mysqli_query($db_conn, "SELECT * FROM `ginfo_table`");
$row = mysqli_fetch_assoc($gInfo);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <title>
            <?php echo isset( $row["title"] ) ? $row["title"] : '' ;?> - <?php echo isset( $row["subtitle"] ) ? $row["subtitle"] : '';?>   
        </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder"> Login </h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
         	<div class="row">
         	  <div class="col-md-8 offset-md-2">
			    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-wrapper">
				  <div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label"> Email address </label>
				    <input type="email" name="email" class="form-control" 
                    value="<?php echo isset($email) ? $email : '';?>">
				    <span class="error"><?php echo isset($error['email']) ? $error['email'] : "";?></span>
				  <span class="error"><?php echo $loginError;?></span> 
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label"> Password </label>
				    <input type="password" name="pwd" class="form-control" value="<?php echo isset($pwd) ? $pwd : '';?>">
                    <span class="error"><?php echo isset($error['pwd']) ? $error['pwd'] : "";?></span>
				  </div>
				  <button type="submit" class="btn btn-primary" name="login"> Login </button>
				</form>
		      </div>
		    </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white"> Copyright &copy; Your Website  <?php echo date("Y");?></p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
