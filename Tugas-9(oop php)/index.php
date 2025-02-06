<?php
require_once("animal.php");
require_once("Ape.php");
require_once("Frog.php");
echo "<h2> Latihan OOP</h2>";


$sheep = new Animal("shaun");
echo "Name: " . $sheep->name . "<br>";
echo "Legs: " . $sheep->legs. "<br>";
echo "cold blooded: " . $sheep->cold_blooded ."<br><br>";

$kodok = new Frog("buduk");
echo "Name: " . $kodok->name . "<br>";
echo "Legs: " . $kodok->legs. "<br>";
echo "cold blooded: " . $kodok->cold_blooded ."<br>";
echo "Jump: " . $kodok->jump() . "<br><br>" ; // "hop hop"

$sungokong = new Ape("kera sakti");
echo "Name: " . $sungokong->name . "<br>";
echo "Legs: " . $sungokong->legs. "<br>";
echo "cold blooded: " . $sungokong->cold_blooded ."<br>";
echo "Yell: " . $sungokong->Yell() . "<br>" // "Auooo"


?>