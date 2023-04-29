<?php 
echo "Connect php to DataBAse<br>";
// 1.MySQli 
// 2.PDO

//connecting to database
$servername="localhost";
$username="root";
$password=" ";


//create a connection
$conn=mysqli_connect($servername,$username,$password );


//Die if connection failed

if(!$conn){
    die("Sorry we failed to connect".mysqli_connect_error());
}
else
{
echo "Connection Was Successful";
}





?>