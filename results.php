
<?php 
	session_start();
	include 'sesija.php';


?>

<html>

<head>
	
	<link rel="stylesheet" href="resultstyle.css">
</head>

<body>
	
	<header>
        <div class="checkbtn">
            <img src="dropbtn.png">
        </div>
 		<a href="#" class="logo">POSLOVI</a>
 		<ul class ="navigation">
 			<li><a href="#">O nama</a></li>
 			<li><a href="#">Poslodavci</a></li>
 			<li><a href="#">Blog</a></li>
 			<li><a href="#">Home</a></li>
 		</ul>
 		<div class="dropdown" <?php if ($user_data){ echo 'style="display:none" ';} ?>>
            
 			<button class="dropbtn" ><p>PRIJAVITE SE </button>
               <div class="dropdown-content">
                <a href="login.html">Kao kandidat</a>
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


 	<div class = "container">

 	<?php



		include 'connect.php';

		$mesto = $_GET['mesto'];
		$imePosla = $_GET["imePosla"];

		if(!empty($mesto) && !empty($imePosla)){

			$sql = "SELECT imePosla, imePoslodavca, opisPosla,mesto,datumIsteka FROM Poslovi INNER JOIN Poslodavci ON Poslovi.idPoslodavca=Poslodavci.idPoslodavca WHERE (mesto = '$mesto' AND imePosla='$imePosla')";
		}

		elseif (!empty($mesto)) {
			$sql = "SELECT imePosla, imePoslodavca, opisPosla,mesto,datumIsteka FROM Poslovi INNER JOIN Poslodavci ON Poslovi.idPoslodavca=Poslodavci.idPoslodavca WHERE mesto = '$mesto' ";
		}
		elseif (!empty($imePosla)) {
			$sql = "SELECT imePosla, imePoslodavca, opisPosla,mesto,datumIsteka FROM Poslovi INNER JOIN Poslodavci ON Poslovi.idPoslodavca=Poslodavci.idPoslodavca WHERE imePosla = '$imePosla' ";
		}
		elseif (empty($mesto) && empty($imePosla)){
			$sql = "SELECT imePosla, imePoslodavca, opisPosla,mesto,datumIsteka FROM Poslovi INNER JOIN Poslodavci ON Poslovi.idPoslodavca=Poslodavci.idPoslodavca ";

		}


		

		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)){



			echo '<div class="result">
	 			<p class="posao" name="posao">
	 				'.$row['imePosla'].'
	 			</p>

	 			<p class="poslodavac" name="poslodavac">
	 				'.$row['imePoslodavca'].'
	 			</p>

	 			<p class="opis" name="opis">
	 				'.$row['opisPosla'].'
	 			</p>
	 			<p class="mesto" name="mesto">
	 				'.$row['mesto'].'
	 			</p>
	 			<p class="vreme" name="vreme">
	 				'.$row['datumIsteka'].'
	 			</p>
	 		</div>';


		}

	?>

 	</div>

</body>



</hmtl>