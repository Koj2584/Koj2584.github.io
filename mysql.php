<?php
  $servername = "md371.wedos.net";
	$username = "w322594_matura";
	$password = "eePEVKns";
	$db = "d322594_matura";
	$conn = mysqli_connect($servername.":3306", $username, $password, $db);
	if (!$conn) {
			die("Chyba připojení k databázi: " . mysqli_connect_error());
	}
  mysqli_set_charset($conn, "utf8");
?>