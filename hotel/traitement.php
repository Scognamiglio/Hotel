<?php
$tab= array('nom',"prenom","Email","tel","Da","Dd","Nbrn","type","radio");
$tab2= array("nom","prenom","Email","t&eacute;l&eacute;phone","Date arriv&eacute;","Date d&eacute;part","Nombre de nuit","type de chambre","nombre de personne");
echo "<form method='post' action='traitement2.php'>";
echo "r&eacute;capitulatif</br></br><table border=1>";
for($i=0;$i<count($tab);$i++){
	echo "<tr><td>".$tab2[$i]."</td><td>".$_POST[$tab[$i]]."</td></tr>";
	
}
echo "<tr><td>Options</td><td>";
for($i=0;$i<count($_POST['check']);$i++){
echo $_POST['check'][$i]." ";
	
}
echo"</td></tr><tr><td>Prix</td><td>";
$type=$_POST['type'];
if($type=="simple")
	$val=0.1;
if($type=="double")
	$val=0.2;
if($type=="appart")
	$val=0.3;
if($type=="suite")
	$val=0.4;

$val=$_POST['Nbrn']*(60+(60*$val))+$_POST['miam']*10;
echo $val;
echo "</td></tr></table>";
echo "</br></br>";
echo "</form>";

$link = mysql_connect (
$_SERVER['dbHost'], // le nom du serveur MySQL
$_SERVER['dbLogin'], // nom d'utilisateur MySQL
$_SERVER['dbPass']) // mot de passe associé
or die ("Impossible de se connecter : " . mysql_error() );
mysql_select_db($_SERVER['dbBd'], $link) or die( "Unable to select db");

$query="INSERT INTO Chambres(prix,lits,pers,conf)
values(".$val.",".$_POST['radio'].",".$_POST['radio'].",'".$_POST['type']."')";

mysql_query($query);
$query="INSERT INTO Clients(nom,prenom,tel)
values('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['tel']."')";
mysql_query($query);

$query="SELECT MAX(num_ch) FROM Chambres";
$r=mysql_query($query);
$myrow = mysql_fetch_array($r);
$ch=$myrow[0];

$query="SELECT MAX(num_cl) FROM Clients";
$r=mysql_query($query);
$myrow = mysql_fetch_array($r);
$cl=$myrow[0];

$query="INSERT INTO Reservations(ch,cl,date_Arr,date_Dep)
values(".$ch.",".$cl.",'".$_POST['Da']."','".$_POST['Dd']."')";
mysql_query($query);

/*
$query="CREATE TABLE Chambres 
(
num_ch int NOT NULL AUTO_INCREMENT,
prix int, 
lits int,
pers int,
conf varchar(35),
PRIMARY KEY (num_ch))";


$query="CREATE TABLE Clients 
(
num_cl int NOT NULL AUTO_INCREMENT,
nom varchar(35),
prenom varchar(35),
tel varchar(35),
PRIMARY KEY (num_cl))";

$query="CREATE TABLE Reservations 
(
ch int,
cl int,
date_Arr varchar(35),
date_Dep varchar(35)) ";

*/
?>