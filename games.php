<?php

function generateString($length)
{   
    $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    for($i=0; $i<$length; $i++) 
        $key .= $charset[(mt_rand(0,(strlen($charset)-1)))]; 

    return $key;
}

function price() {
          
     $f = rand(0,99);

     if ($f == 0) return "0.99";

     return ($f.".".rand(0,99));
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'games') or die (mysql_error());;

if (mysqli_connect_errno($link)) {
   
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

for ($i=0;$i<100;++$i) {
    $r = mysqli_query ($link ,"INSERT INTO country values ('".$i."','".generateString(20)."');");
}


for ($i=0;$i<10;++$i) {
     $r = mysqli_query ($link ,"INSERT INTO price values ('".$i."','".price()."');");
}

for ($i=0;$i<1000;++$i) {
     $r = mysqli_query ($link ,"INSERT INTO gamekey values ('".$i."','Key".$i."','".rand(0,1)."');");
}

$z=0;
$y=0;
for ($o=1;$o<=10;++$o) {
    for ($i=1;$i<=100;++$i) {
        ++$z;
        //echo "INSERT INTO gamekey_rs values ('".$z."','".$o."','".($y+$i)."');";
	$r = mysqli_query ($link ,"INSERT INTO gamekey_rs values ('".$z."','".$o."','".($y+$i)."');");
    }
    $y+=100;
}


$z=0;
$y=0;
for ($o=1;$o<=10;++$o) {
    for ($i=1;$i<=100;++$i) {
        ++$z;
        //echo "INSERT INTO price_rs values ('".$z."','".$o."','".($y+$i)."');";
        $r = mysqli_query ($link ,"INSERT INTO price_rs values ('".$z."','".$o."','".($y+$i)."');");
    }
    $y+=100;
}




