<?php
    session_start();
  ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Kuba Zpravodaj</title>
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="stylesheet" type="text/css" href="style.css?time=<?php echo time(); ?>">
</head>

<body>
  <h1>Kuba Zpravodaj</h1>
  <?php
  
    if(isset($_SESSION["username"]))
    {
        echo '<a href="profil">'.htmlspecialchars($_SESSION["username"]).'</a>
        <a href="profil?odhlasit=true">Odhlásit</a>';
    } else {
        echo '<a href="login">Přihlásit</a>
  <a href="register">Registrovat</a>';
    }
  ?>

  <input type="search" placeholder="Hledat..." name="search">
  <a href="autor">Pro autory</a>
  <div id="kategorie">
    <a href="kategorie/?kat=sport">Sport</a>
    <a href="kategorie/?kat=politika">Politika</a>
    <a href="kategorie/?kat=finance">Finance</a>
    <a href="kategorie/?kat=technologie">Technologie</a>
  </div>
  <div id="nabidka">
    <?php
      require("mysql.php");
      $sql = "SELECT * FROM clanky ORDER BY datum DESC LIMIT 0 , 10";
        
      $result = mysqli_query($conn, $sql);
      
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $nazev = htmlspecialchars($row["nazev"], ENT_QUOTES, 'UTF-8');
          $text = /*htmlspecialchars(*/$row["text"]/*, ENT_QUOTES, 'UTF-8')*/;
          $plain_text = strip_tags($text);
          $text_ukazka = substr($plain_text, 0, 1000)."...";
          
          echo "<div onclick=\"window.location.href='clanky/?id=".$row["id"]."'\">
                <h2>$nazev</h2>
                <p>$text_ukazka</p>
                </div>";
        }
      } else {
          echo "Žádné příspěvky k zobrazení.";
      }
  
      mysqli_close($conn);  
    ?>
  </div>
</body>

</html>