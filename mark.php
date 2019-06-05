<?php
if(isset($_POST['submit']))
{
$sid=$_POST['sid'];
$asid=$_POST['asid'];
$subid=$_POST['subid'];
$marks=$_POST['marks'];

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="wit";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server');

$sql="INSERT into sassign values('$sid','$subid','$asid','$marks')";
mysqli_query($con,$sql);
}
?>
