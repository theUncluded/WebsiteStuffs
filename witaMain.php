<!DOCTYPE html>
<html>

<link rel="stylesheet" href="witaStyle.css">

<?php error_reporting(E_ERROR | E_PARSE); 
session_start(); 
?>

<head>
    
</head>
<body>
<a href="https://discord.gg/U97exHRKr9" style="font-variant: small-caps; font-size: xx-large;">Click Here To Join WITA!</a>
<br><br><br>
<a href="/tNews.php" style="font-variant: small-caps; font-size: xx-large;">Tarkov News!</a>
<br><br><br>

<form method="POST" action="witaBJ.php">
<input style="width: 100%;
    padding: 20px 20px;
    background-color: #ffffff;" type="submit" id="BJ" value="Play BlackJack">
</form>

<br><br><br>

<form method="POST" action="witaHoL.php">
    <input style="width: 100%;
    padding: 20px 20px;
    background-color: #ffffff;" type="submit" id="HoL" value="Play Higher or Lower!">
</form>

<br><br><br>

</body> 
</html>