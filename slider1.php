<?php
	session_start();
	if(!isset($_SESSION['id']))
		header( "refresh:1;url=logout.php" );
	$con = mysqli_connect("127.0.0.1", "root", "", "wit");
	//$_SESSION['con'] = "mysqli_connect('127.0.0.1', 'z3t4', 'Qfs-VAD-lOV#naX', 'CI372')";
	if(!$con){
		ob_start();
		header('location: connectionError.html');
		ob_end_flush();
		die();
	}
	$sql = "SELECT * FROM facul WHERE id=".$_SESSION['id'].";";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$dbName = $row['name'];
	$_SESSION['name'] = $dbName;
	//$_SESSION['FSem'] = $dbSem;
	//$_SESSION['FCurr'] = $dbCurr;
	//$_SESSION['FAmt'] = $dbAmt;
	mysqli_close($con);
?>

<!DOCTYPE html>
<HTML>
	<HEAD>
		<TITLE>WEBKIOSK DASHBOARD</TITLE>
		<META charset="UTF-8">
		<META name="viewport" content="width=device-width, initial-scale=1">
		<LINK rel="stylesheet" href="css/dash.css">
		<LINK rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<LINK rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<LINK rel="stylesheet" href="css/animate.css">
		<LINK rel="stylesheet" href="css/animate.min.css">
		<STYLE>
			html,body,h1,h2,h3,h4,h5 {
				font-family: "Raleway", sans-serif
			}
		</STYLE>
	</HEAD>
	<BODY class="black">
		<!-- Top container -->
		<DIV class="bar top light-gray large" style="z-index:4">
			<BUTTON class="bar-item button hide-large hover-none hover-text-light-grey" onclick="w3_open();">&nbsp;Menu</BUTTON>
			<SPAN class="bar-item right">JIIT WEBKIOSK</SPAN>
		</DIV>

		<!-- Sidebar/menu -->
		<NAV class="sidebar collapse gray animate-left" style="z-index:3;width:300px;" id="mySidebar">
			<BR>
			<DIV class="container row">
				<DIV class="col s4">
					<IMG src="/w3images/avatar2.png" class="circle margin-right" style="width:46px">
				</DIV>
				<DIV class="col s8 bar">
					<?php
						echo "<SPAN>Welcome, <STRONG>" . $_SESSION['fName'] . "</STRONG></SPAN>";
					?>
				</DIV>
			</DIV>
			<HR>
			<DIV class="container">
				<A href="dash.php" style="text-decoration:none"><H5>Dashboard</H5></A>
			</DIV>
			<DIV class="bar-block">
				<TABLE style="margin-left:10px" border="0" width="100%">
					<TR>
						<TD>
							<I class="material-icons animated infinite bounce delay-2s" style="color:#2196F3; display:inline;">info</I>
						</TD>
						<TD>
							<A href="slider1.php" class="bar-item button padding"><b>&nbsp; Leave Application</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#4cAF50; display:inline;">money</I>
						</TD>
						<TD>
							<A href="pushSol.php" class="bar-item button padding" ><b>&nbsp; Upload Assignments</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#FF9800; display:inline;">school</I>
						</TD>
						<TD>
							<A href="view.php" class="bar-item button padding" ><b>&nbsp; View Assignments</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#FF9800; display:inline;">school</I>
						</TD>
						<TD>
							<A href="facultyMarks.php" class="bar-item button padding" ><b>&nbsp; Marks</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#F44336; display:inline;">change_history</I>
						</TD>
						<TD>
							<A href="password.php" class="bar-item button padding"><b>&nbsp; Password</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#FFEB3B; display:inline;">exit_to_app</I>
						</TD>
						<TD>
							<A href="logout.php" class="bar-item button padding"><b>&nbsp; Signout</b></A>
						</TD>
					</TR>
				</TABLE>
			</DIV>
		</NAV>
    <!-- !PAGE CONTENT! -->
    <DIV class="main" style="margin-left:300px;margin-top:43px;">
      <!-- Header -->
      <HEADER class="container" style="padding-top:22px">
        <H5><b>My Dashboard</b></H5>
      </HEADER>
      <div class="container">
        <form action="slider.php" name="slider" id="slider" method="POST">
        <h2 style="margin-left:10%;font-size:10px">Leave Type</h2>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="earned">Earned Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="casual">Casual Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="sick">Sick Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="maternity">Maternity Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="paid">Half Paid Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="quarantine">Quarantine Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="study">Study Leave<br>
        <input style="margin-left:15%;" type="radio" name="leave" id="leave" value="other"> Other<br><br>

        <h2 style="margin-left:10%;">Duration</h2>
        FROM:<input style="margin-left:1%;" type="date" name="from" id="from" value="date"> &nbsp;&nbsp;&nbsp
        TO:<input style="margin-left:1%;" type="date" name="to" id="to" value="date"><br>
        <h2 style="margin-left:10%;">APPLY FOR</h2><br>
        <input type="radio" name="type" id="type" value="monthly">MONTHLY<br>
        <input type="radio" name="type" id="type" value="annual">ANNUAL
        <br>
        <br>
        COMMENTS:-
        <br>
        <textarea name="comment"id="comment" placeholder="Enter special comments here" style="width:300px;height:50px;"></textarea><br>
        <input type="submit" name="b_slide" id="b_slider" value="submit">
        </form>
      </DIV>

<html>
<head>
<title>Wit</title>
</head>
<body>
</body>
</html>