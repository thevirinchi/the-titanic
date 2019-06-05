<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "wit";
	$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server');
	if(isset($_POST['btn-upload'])){
		$img_name = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		$res=move_uploaded_file($tmp_name, "uploads/".$img_name);
	if($res==1){
		$type=$_FILES['img']['type'];
		if($type== "application/pdf"){
			$size=($_FILES['img']['size'])/1024;
			$sql="INSERT INTO uploads(file,type,size) VALUES ('$img_name','$type','$size')";
		  mysqli_query($con,$sql);
?>
	<script>
		alert("Successfully uploaded");
		window.location.href='pushSol.php?success';
	</script>
<?php
}}
	else{
?>
	<script>
		alert("error while uploading file");
		window.location.href='pushSol.php?fail';
	</script>
<?php
	}
	}
?>
