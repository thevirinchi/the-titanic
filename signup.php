<?php
	session_start();
	function redirect($url) {
		ob_start();
		header('Location: '.$url);
		ob_end_flush();
		die();
	}
	$id = $pass = "";
	$useFlag = $pasFlag = 0;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$id = stripInput($_POST["IDToken1"]);
		if(empty($id)){
			echo "Username is required!";
			return;
		}
		else if(!preg_match("/^(\Q1\E)([5-8]{1})([0-9]{6})$/", $id)){
			echo "Invalid Username";
			return;
		}
		else
			$useFlag = 1;
		$pass = stripInput($_POST["IDToken4"]);
		if(empty($pass)){
			echo "Password is required!";
			return;
		}
		else if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/",$pass)){
			echo "Invalid Password";
			return;
		}
		else
			$pasFlag = 1;
		$fName = stripInput($_POST["IDToken2"]);
		if(empty($fName)){
			echo "First name is required!";
			return;
		}
		else
			$fNameFlag = 1;
			$lName = stripInput($_POST["IDToken3"]);
			if(empty($lName)){
				echo "Last name is required!";
				return;
			}
			else
				$lNameFlag = 1;
				$depId = stripInput($_POST["IDToken5"]);
				if(empty($depId)){
					echo "Department ID is required!";
					return;
				}
				else
					$depIdFlag = 1;
	}

	if($useFlag && $pasFlag && $fNameFlag && $lNameFlag && $depIdFlag){
		$con = mysqli_connect("127.0.0.1", "root", "", "wit");
		if($con)
			echo "Connected<BR>";
		else if(!$con)
			echo "Disconnected<BR>";
		$sql = "SELECT * FROM facul WHERE id = '$id';";
		$result = mysqli_query($con,$sql);
		if (mysqli_num_rows($result)==0) {
			$sql = "INSERT INTO facul VALUES('$id','$fName','$lName','$pass','$depId');";
			$_SESSION["fid"] = $id;
			$_SESSION["fName"] = $fName;
			$_SESSION["lName"] = $lName;
			$_SESSION["depId"] = $depId;
			$result = mysqli_query($con,$sql);
			redirect("faculty.php");
		}
		else
			redirect("error.php");
	}

	function stripInput($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
