<?php 
   session_start();
?>
<style>

  .body {
    font-family: sans-serif;;
  }
</style>
Click here to clean <a href = "logout.php" tite = "Logout">LogOut</a>.
<?php

    if(!isset($_GET['imageId']) || $_GET['imageId'] == '') {
      echo '<br/><br/><br/><h3>Image ID missing</h3>';
      return;
    }

    $imageId = $_GET['imageId'];
    echo $imageId;
    if (isset($_SESSION['username'])) {
        $servername = "localhost:3309";
        $username = "root";
        $password = "";
        $dbname = "JF";
        
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM cameraupload WHERE id=".$imageId;
          $result = $conn->query($sql);
          $myObj = new stdClass();
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
             // echo "id: " . $row["id"]. " - Name: " . $row["base64"]. "<br>";
             $myObj->id = $row["id"];
             $myObj->base64 = $row["base64"];
             
            }
          } else {
            echo "0 results";
          }
          
          echo '<img src="data:image/png;base64, '.$myObj->base64.'"/>';
          $conn->close();
    



    } else {
        session_destroy();
        header("Location: index.php?imageId=".$imageId);
    }
?>