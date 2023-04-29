<?php 
echo "Connect php to DataBAse<br>";
// 1.MySQli 
// 2.PDO

//connecting to database
$servername="localhost";
$username="root";
$password="";


//create a connection
$conn=mysqli_connect($servername,$username,$password );



//Die if connection failed

if(!$conn){
    die("Sorry we failed to connect".mysqli_connect_error());
}
else
{
echo "Connection Was Successful<br>";
}
//Create a DB

$sql="CREATE DATABASE dbRakesh6";
$result=mysqli_query($conn,$sql);

//Check for db creation
if($result){
    echo "DataBase Ceate Successfully<br>";
}
else{
    echo "The db is not created--->".mysqli_error($conn);
}







?>