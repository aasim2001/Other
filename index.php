<?php
   ob_start();
   session_start();
   $r=session_id();
?>

<?
   error_reporting(E_ALL);
   ini_set("display_errors", 1);

?>



<html lang = "en">
   
   <head>
      <title>Tutorialspoint.com</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
        <link rel="stylesheet" href="style.css">
      
   </head>
	
   <body>

   <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form  class = "form-signin" role = "form" 
            action = "<?php 
               $imageId = '';
               $redirect = 'index.php';
               if(isset($_GET['imageId'])) {
                  $imageId = $_GET['imageId'];
                  $redirect = $redirect . '?imageId=' . $imageId;
               }
               echo $redirect;
            ?>" method = "post">
        <h3>Login Here </h3>

        <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4> -->
        <label for="username">Username</label>
        <input type="text" id="username" name = "username" value="aasim2001">

        <label for="password">Password</label>
        <input type="password" id="password" name = "password" value="1234">

        <button type="submit" name = "login">Log In</button>
    </form>
      

    <?php
        $msg = '';
        if (isset($_SESSION['username'])) {
            header("Location: imageWebView.php");
        }
        if (isset($_POST['login']) && !empty($_POST['username']) 
            && !empty($_POST['password'])) {
            
            if ($_POST['username'] == 'aasim2001' && 
                $_POST['password'] == '1234') {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = 'aasim2001';
                //if(isset($_GET['imageId'])) {
                  header("Location: imageWebView.php?imageId=".$imageId);
                //}
            }else {
                $msg = 'Wrong username or password';
            }
        }
    ?>
      
   </body>
</html>