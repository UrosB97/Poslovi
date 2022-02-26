<?php

session_start();

    
    include 'sesija.php';

    

    
    

    $imePosla = $_POST["rec"];
    $mesto = $_POST["mesto"];

    if(isset($_POST['submit'])){

        header("location:results.php?mesto=$mesto&imePosla=$imePosla");
            
    }

    $sql1 = "SELECT COUNT(1) FROM Poslovi";
    $res1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($res1);
    $total1 = $row1[0];
    

    $sql2 = "SELECT COUNT(1) FROM Poslodavci";
    $res2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($res2);
    $total2 = $row2[0];


    

?>

    



<!DOCTYPE html>
<html lang="en">
 <head>

  
  <link rel="stylesheet" href="mystyle.css">
 </head>
 <body>
    
 	<header>
        <div class="checkbtn">
            <img src="dropbtn.png">
        </div>
 		<a href="results.php" class="logo">POSLOVI</a>
 		<ul class ="navigation">
 			<li><a href="#">O nama</a></li>
 			<li><a href="#">Poslodavci</a></li>
 			<li><a href="#">Blog</a></li>
 			<li><a href="#">Home</a></li>
 		</ul>
 		<div class="dropdown" <?php if ($user_data){ echo 'style="display:none" ';} ?>>
            
 			<button class="dropbtn"><p>PRIJAVITE SE </button>
               <div class="dropdown-content">
                <a href="login.php">Kao kandidat</a>
                <a href="#">Kao poslodavac</a>
              </div>

        </div>

        <div class = "usermenu" <?php  if (!$user_data) {echo 'style="display:none"';} ?> >

            <div class="userpic">
                <img src="user.png">
            </div>

            <div class ="userpic-content">
                <form >
                    <a href="logout.php">Odjavi se</a>

                </form>
            </div>

        </div>
         
        
 	</header>
 </div>

    <div class="container">

        <div class="text">
            <h1>Pronadji posao u Srbiji</h1>
            <br>
            <h5>Trenutno u ponudi <?php echo $total1;?> radnih mesta u <?php echo $total2;?> kompanija</h5>

        </div>

        
        <form method="post" class="search_bar">
            <input  type="input" name="rec" placeholder="Pozicija, poslodavac, ili kljucna rec">
            <select name="mesto" placeholder="Mesto" >

                <option id="disabled" disabled selected value=""> Izaberi grad </option>
                <option value="Beograd">Beograd </option>
                <option value="Novi Sad">Novi Sad</option>
                <option value="Nis">Nis</option>
                <option value="Kragujevac">Kragujevac</option>
                <option value="Subotica">Subotica</option>
                <option value="Valjevo">Vasljevo</option>
                <option value="Sabac">Sabac </option>
                <option value="Topola">Topola</option>
                <option value="Kikinda">Kikinda</option>
                <option value="Leskovac">Leskovac</option>
                <option value="Vranje">Vranje</option>
                <option value="Mladenovac">Mladenovac</option>

            </select>
           
            <input  type="input" name="oblast" placeholder="Oblast rada">
            

            <button type="submit" class="input"  id="submit" name="submit"> <a class="a" > PRETRAZI </a></button>
            
        </form>

        
        
    </div>

    




 </body>

</html>