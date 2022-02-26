<?php


function check_login($conn){

	if (isset($_SESSION['idKandidata'])) {

		$id = $_SESSION['idKandidata'];
		$sql = "SELECT * FROM Kandidati WHERE idKandidata = '$id'";

		$result = mysqli_query($conn,$sql);


		if($result){

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;

		}

	}


}








?>