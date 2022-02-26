<?php

session_start();

  include "connect.php";

  if($_SERVER['REQUEST_METHOD'] == "POST"){


      $email = $_POST['email'];
      $password = $_POST["password"];

      if(!empty($email) && !empty($password)){

          $idKandidata = rand(1,1000);
          $sql = "INSERT INTO Kandidati (idKandidata,email,password) VALUES ('$idKandidata','$email','$password')";

          
          mysqli_query($conn,$sql);

          header("location: login.php");


      }

      else
      {
        echo "Unesi ispravne informacije";
      }

  }

?>



<html>
<head>

  
  <link rel="stylesheet" href="style.css">
 </head>
 <body>

 	<div class="login">

 		<h2> REGISTRUJTE SE </h2>

 		

 		<form method="post" class="form">
 		  
 		  <input type="email" name="email" placeholder="Unesite email">
 		  <input type="password" name="password" placeholder="Unesi sifru">
 		  <br>
 		  <input type="submit" id="prijaviteSe" name="submit" value="REGISTRUJTE SE">

 	    </form>

 	</div>
 </body>
</html>