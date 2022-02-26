<?php

session_start();

  include 'connect.php';


  if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email'];
        $password = $_POST["password"];


        if(!empty($email) && !empty($password)){

            $sql = "SELECT * FROM Kandidati WHERE email = '$email'";

            $result = mysqli_query($conn,$sql);

            if($result){

                $user_data = mysqli_fetch_assoc($result);
            
                if($user_data['password'] === $password){
                  $_SESSION['idKandidata'] = $user_data['idKandidata'];
                  header("location: index.php");
                  die;
                }
                else{
                  
                  $poruka = "Uneli ste nevalidne podatke. Pokusajte ponovo.";

                }
              }

                
        }


  }


?>


<html>
<head>

  
  <link rel="stylesheet" href="style.css">
 </head>
 <body>


 	<div class="login">

 		<h2> PRIJAVITE SE </h2>
 		<h4> Nemate nalog? <a href="signup.php"> Registrujte se </a> </h4>
    <h5> <?php echo $poruka ?> </h5>

 		<form method="POST" class="form">
 		  
 		  <input type="email" name="email" placeholder="Unesite email" required>
 		  <input type="password" name="password" placeholder="Unesi sifru" required>
 		  <br>
 		  <input type="submit" id="prijaviteSe" name="submit" value="PRIJAVITE SE">

 	    </form>

 	</div>
 </body>
</html>