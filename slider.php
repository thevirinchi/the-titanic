<?php
if(isset($_POST['b_slider']))
{ $fid=$_SESSION['id'];
  $reas=$_POST['leave'];
  $to=$_POST['to'];
  $from=$_POST['from'];
  $type=$_POST['type'];
  $comm=$_POST['comment'];

  $dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $dbname="wit";
  $con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)or die('cannot connect to the server');
  $sql="INSERT into(fid,reas,tdate,fdate,type,comm) leaveReq VALUES('$fid','$reas','$to','$from','$type','$comm')";
  $res=mysqli_query($con,$sql);
}
 ?>
