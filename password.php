<?php
	session_start();
	if(!isset($_SESSION['rollNum']))
		header("refresh:0;url=logout.php");
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
					<SPAN>Welcome, <STRONG><?php echo $_SESSION['fName']; ?></STRONG></SPAN>
				</DIV>
			</DIV>
			<HR>
			<DIV class="container">
				<A href="dash.html" style="text-decoration:none"><H5>Dashboard</H5></A>
			</DIV>
			<DIV class="bar-block">
				<TABLE style="margin-left:10px" border="0" width="100%">
					<TR>
						<TD>
							<I class="material-icons" style="color:#F44336; display:inline;">change_history</I>
						</TD>
						<TD>
							<A href="password.php" class="bar-item button padding red"><b>&nbsp; Password</b></A>
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
				<H5><b>Password</b></H5>
			</HEADER>
			<HR>
			<div class="container">
				<FORM method="POST" action="passVer.php">
					<FIELDSET>
						<LEGEND>
							<DIV class="container red">
								<H5>Reset Password</H5>
							</DIV>
						</LEGEND>
						<TABLE border="0">
							<TR>
								<TD>
									<LABEL for="oldPass">Old Password : &nbsp;&nbsp;</LABEL>
								</TD>
								<TD>
									<INPUT type="password" placeholder="Old password" id="oldPass" name="oldPass" pattern="^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$" title="Enter your current password" autofocus required/>
								</TD>
							</TR>
							<TR>
								<TD>
									<LABEL for="newPassOne">New Password : &nbsp;</LABEL>
								</TD>
								<TD>
									<INPUT type="password" placeholder="New password" id="newPass" name="newPass" pattern="^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$" title="Enter your new password" required/>
								</TD>
							</TR>
							<TR>
								<TD>
									<LABEL for="newPassTwo">Confirm Password : &nbsp;</LABEL>
								</TD>
								<TD>
									<INPUT type="password" placeholder="Retype New Password" id="conPass" name="conPass" pattern="^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$" title="Confirm your new password" required/>
								</TD>
								<TD>
							</TR>
						</TABLE>
					</FIELDSET>
					<BR>
					<INPUT type="submit" value="Submit" id="Submit"/>
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
	</BODY>
</HTML>
