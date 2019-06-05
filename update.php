<?php
  if(isset($_POST['b_upd'])){
    $con = mysqli_connect("127.0.0.1", "root", "", "wit");
    foreach($_POST['status'] as $id=>$status){
      $fid=$_POST['fid'][$id];
      if($status=='accept')
      mysqli_query($con,"UPDATE leaveReq set status=1 where fid='$fid' ;");
      else if($status=='reject')
      mysqli_query($con,"UPDATE leaveReq set status=0 where fid='$fid' ;");

    }
  }
?>
