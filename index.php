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
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
        <h3>Login Here</h3>
        <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4> -->
        <label for="username">Username</label>
        <input type="text" id="username" name = "username">

        <label for="password">Password</label>
        <input type="password" id="password" name = "password">

        <button type="submit" name = "login">Log In</button>
    </form>
      

    <?php
        $msg = '';
        if (isset($_SESSION['username'])) {
            header("Location: dashboard.php");
        }
        if (isset($_POST['login']) && !empty($_POST['username']) 
            && !empty($_POST['password'])) {
            
            if ($_POST['username'] == 'aasim2001' && 
                $_POST['password'] == '1234') {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = 'aasim2001';
                header("Location: dashboard.php");
                //echo 'You have entered valid use name and password';
            }else {
                $msg = 'Wrong username or password';
            }
        }
    ?>

      <!-- <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">


            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username = tutorialspoint" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password = 1234" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>


         </form>
			
         
         
      </div>  -->
      
   </body>
</html>