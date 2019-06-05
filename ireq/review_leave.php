<html>
<head><title></title></head>
<body>
<form action="update.php" method="POST" name="s_update">
<table width="80%" border="1">
<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="wit";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)or die('cannot connect to the server');
$sql="SELECT * from leaveReq where status is NULL";
$res=mysqli_query($con,$sql);
$counter=0;
while($row=mysqli_fetch_array($res))
{
 ?>
 <tr>
 <td><?php echo $row['fid'] ?>
   <input type="hidden" value="<?php echo $row['fid']; ?>" name="fid[]">
 </td>
 <td><?php echo $row['reas'] ?></td>
 <td><?php echo $row['tdate'] ?></td>
 <td><?php echo $row['fdate'] ?></td>
 <td><?php echo $row['type'] ?></td>
 <td><?php echo $row['comm'] ?></td>
 <td><input type="radio" name="status[<?php echo $counter ; ?>]" value="accept"> Accept<br>
 <input type="radio" name="status[<?php echo $counter ; ?>]" value="reject"> Reject<br></td>
 </tr>
 <?php
 $counter = $counter + 1;
}
  ?>
  <br>
</table>
  <input type="submit" value="submit" name="b_upd" id="b_upd">
</form>
</body>
</html>
