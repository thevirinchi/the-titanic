<?php
include_once 'dbconfig.php';
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
	$sql = "SELECT * FROM stud WHERE id=".$_SESSION['id'].";";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$dbName = $row['name'];
	$_SESSION['name'] = $dbName;
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
							<I class="material-icons" style=" color:#e91e63; display:inline;">library_books</I>
						</TD>
						<TD>
							<A href="studentMarks.php" class="bar-item button padding"><b>&nbsp; Grades</b></A>
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
			<HR>
			<DIV class="container">
        <FORM action="uploadSol.php" method="post" enctype="multipart/form-data">
          <INPUT type="file" name="img" id="img" class="zk-button zk-btn-inv"/>
          <BR><BR>
          <BUTTON type="submit" name="btn-upload" class="zk-button zk-btn-inv">upload</BUTTON>
          <BR/><BR/>
          <?php
            if(isset($_GET['success'])){
          ?>
          <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
          <?php
            }
            else if(isset($_GET['fail'])){
          ?>
          <label>Problem While File Uploading !</label>
          <?php
            }
            else{
          ?>
          <label>Upload any files(PDF, DOC)</label>
          <?php
            }
          ?>
        </FORM>
			</DIV>
			<HR>
			<BR>
			<DIV class="container dark-grey padding-32">
				<DIV class="row">
					<DIV class="container third">
						<H5 class="bottombar border-blue">PERSONAL</H5>
						<A href="person.php" style="text-decoration:none"><P>Details</P></A>
						<A href="edit.php" style="text-decoration:none"><P>Edit Info.</P></A>
						<A href="medical.php" style="text-decoration:none"><P>Medical History</P></A>
					</DIV>
				<DIV class="container third">
						<H5 class="bottombar border-orange">ACADEMIC</H5>
						<A href="subject.php" style="text-decoration:none"><P>Subjects</P></A>
						<A href="attendance.php" style="text-decoration:none"><P>Attendance</P></A>
				</DIV>
					<DIV class="container third">
						<H5 class="bottombar border-pink">EXAM</H5>
						<A href="date.php" style="text-decoration:none"><P>Date Sheet</P></A>
						<A href="marks.php" style="text-decoration:none"><P>Marks</P></A>
						<A href="grades.php" style="text-decoration:none"><P>Grades</P></A>
						<A href="gpa.php" style="text-decoration:none"><P>GPA(s)</P></A>
					</DIV>
				</DIV>
			</DIV>
			<!-- Footer -->
			<FOOTER class="container padding-16 light-grey">
				<H4>Developed By,</H4>
				<P>Z00K, Inc.</P>
			</FOOTER>
		<!-- End page content -->
		</DIV>
		<SCRIPT>
			// Get the Sidebar
			var mySidebar = document.getElementById("mySidebar");

			// Get the DIV with overlay effect
			var overlayBg = document.getElementById("myOverlay");

			// Toggle between showing and hiding the sidebar, and add overlay effect
			function w3_open() {
				if (mySidebar.style.display === 'block') {
			        	mySidebar.style.display = 'none';
				        overlayBg.style.display = "none";
				}
				else {
			        	mySidebar.style.display = 'block';
				        overlayBg.style.display = "block";
				}
			}

			// Close the sidebar with the close button
			function w3_close() {
				mySidebar.style.display = "none";
				overlayBg.style.display = "none";
			}
		</SCRIPT>

	</BODY>
</HTML>
