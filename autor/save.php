<?php
  require("../mysql.php");
  require("../script/functions.php");
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && isLogIn()) {
    session_start();

    $nazev = mysqli_real_escape_string($conn, $_POST['nazev']);
    $kategorie = mysqli_real_escape_string($conn, $_POST['kat']);
    $klicSlova = mysqli_real_escape_string($conn, $_POST['klic']);
    $text = mysqli_real_escape_string($conn, $_POST['text']);
    
    
    $date = date('Y-m-d');
    $sql = "INSERT INTO clanky (nazev, autor, datum, text, klicovaSlova, kategorie) 
    VALUES ('$nazev', '".$_SESSION["userId"]."', '$date', '$text', '$klicSlova', '$kategorie');";
    $query = mysqli_query($conn, $sql);
  }
  
  mysqli_close($conn);
?>