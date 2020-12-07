<?php
//Exercice 1 
setcookie("Cookie1","OK",time()+3600);//ecrire un cookie

echo $_COOKIE["Cookie1"]; // lire le cookie en php

setcookie("Cookie1","OK",time()-1); //suppression cookie

$tab=array("hey","hoy","hyu");//declaration tableau

setcookie("tab",serialize($tab), time()+3600);// cookie contenant un tableau 

echo $_COOKIE["tab"]; //Affichage du cookie tab

//Exercice 2
session_start(); //demarrer une session

//différente variable session
$_SESSION['TXT']="hey";
$_SESSION['NUM']=1;
$_SESSION['time']=time();

//Lire une variable de session
echo $_SESSION['TXT'];

//Supprimer une variable de session
unset($_SESSION['TXT']);

//Supprimer complètement une session
session_unset();

?>