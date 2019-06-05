<html>
<head><title></title></head>
<body>

<table width="80%" border="1">
<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="wit";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)or die('cannot connect to the server');
$sql="SELECT * from leaveReq where status is NULL OR status=0;";
$res=mysqli_query($con,$sql);
if (!$res) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row=mysqli_fetch_array($res))
{
 ?>
 <tr>
 <td><?php echo $row['fid'] ?></td>
 <td><?php echo $row['reas'] ?></td>
 <td><?php echo $row['tdate'] ?></td>
 <td><?php echo $row['fdate'] ?></td>
 <td><?php echo $row['type'] ?></td>
 <td><?php echo $row['comm'] ?></td>
 </tr>
 <?php

}
  ?>
  <br>
</table>
</body>
</html>
