<?php 
$host = "localhost";
$dbname = "cursophp";
$user = "root";
$pass = "";

try{
    
    $oCon = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $oCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}catch(PDOException $e){
    $error = $e->getMessage();
    echo "Erro: ". $error;
}
?>