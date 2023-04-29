<?php 
echo "Connect php to DataBAse<br>";
// 1.MySQli 
// 2.PDO

//connecting to database
$servername="localhost";
$username="root";
$password="";
$databse="phpclass";


//create a connection
$conn=mysqli_connect($servername,$username,$password,$databse );



//Die if connection failed

if(!$conn){
    die("Sorry we failed to connect".mysqli_connect_error());
}
else
{
echo "Connection Was Successful<br>";
}

//Create a table in Database
$sql="CREATE TABLE `phpclass`.`workers` ( `sno` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(11) NOT NULL , `desig` VARCHAR(11) NOT NULL , `doj` DATETIME NOT NULL , PRIMARY KEY (`sno`))";


$result=mysqli_query($conn,$sql);

echo "<br><br>";
var_dump($result);
echo "<br><br>";
//Check for db creation
if($result){
    echo "Table Ceated Successfully<br>";
}
else{
    echo "The db is not created--->".mysqli_error($conn);
}







?>