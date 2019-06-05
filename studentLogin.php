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
		$pass = stripInput($_POST["IDToken2"]);
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
	}

	if($useFlag && $pasFlag){
		$con = mysqli_connect("127.0.0.1", "root", "", "wit");
		if($con)
			echo "Connected<BR>";
		else if(!$con)
			echo "Disconnected<BR>";
		$sql = "SELECT * FROM stud";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			$dbPass = $row['pass'];
			$dbFName = $row['fName'];
			$dbLName = $row['lName'];
			$dbRollNum = $row['rollNum'];
			if(($pass == $dbPass) && ($id == $dbRollNum)){
				$_SESSION["id"] = $id;
				$_SESSION["pass"] = $dbPass;
				$_SESSION["fName"] = $dbFName;
				$_SESSION["lName"] = $dbLName;
				$_SESSION["rollNum"] = $dbRollNum;
				if($dbRollNum == 18100000)
					redirect("stats.php");
				redirect("student.php");
			}
		}
		redirect("error.php");
	}

	function stripInput($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
