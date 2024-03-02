<?php 
   session_start();
?>
Click here to clean <a href = "logout.php" tite = "Logout">LogOut</a>.
<?php
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

          $sql = "SELECT * FROM cameraupload WHERE id=1";
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
          
          $myJSON = json_encode($myObj);
          echo $myJSON;
          $conn->close();
    



    } else {
        session_destroy();
        header("Location: index.php");
    }
?>