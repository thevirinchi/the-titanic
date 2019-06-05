<?php
	session_start();
	$name = $_SESSION['fName'];
	session_unset();
	session_destroy();
?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
		<TITLE>WIT WEBKIOSK</TITLE>
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
			<SPAN class="bar-item right">WIT WEBKIOSK</SPAN>
		</DIV>

		<!-- Sidebar/menu -->
		<NAV class="sidebar collapse gray animate-left" style="z-index:3;width:300px;" id="mySidebar">
			<BR>
			<DIV class="container row">
				<DIV class="col s4">
					<IMG src="/w3images/avatar2.png" class="circle margin-right" style="width:46px">
				</DIV>
				<DIV class="col s8 bar">
					<SPAN>Welcome, <STRONG><?php echo $name ?></STRONG></SPAN>
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
							<I class="material-icons" style="color:#2196F3; display:inline;">info</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding blue"><b>&nbsp; Personal Info.</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#4cAF50; display:inline;">money</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding green" ><b>&nbsp; Fees</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#FF9800; display:inline;">school</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding orange" ><b>&nbsp; Academics</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style=" color:#e91e63; display:inline;">library_books</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding pink"><b>&nbsp; Exams</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#9C27B0; display:inline;">info</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding purple"><b>&nbsp; T&P</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#F44336; display:inline;">change_history</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding red"><b>&nbsp; Password</b></A>
						</TD>
					</TR>
					<TR>
						<TD>
							<I class="material-icons" style="color:#FFEB3B; display:inline;">exit_to_app</I>
						</TD>
						<TD>
							<A href="" class="bar-item button padding yellow"><b>&nbsp; Signout</b></A>
						</TD>
					</TR>
				</TABLE>
			</DIV>
		</NAV>

		<!-- !PAGE CONTENT! -->
		<DIV class="main" style="margin-left:300px;margin-top:43px;">
			<!-- Header -->
			<HEADER class="container" style="padding-top:22px">
				<DIV class="container green">
					<H5><b>Logging Out</b></H5>
				</DIV>
			</HEADER>
			<HR>
			<BR>
			<DIV class="container">
				<TABLE border="0">
					<TR>
						<TD>
							<I class="material-icons" style="color:green; display:inline;">assignment_turned_in</I>
						</TD>
						<TD style='padding:5px'>
							<H5><b>You have been logged out!</b></H5>
						</TD>
					</TR>
					<TR>
						<TD>
						</TD>
						<TD>
							You will be automatically redirected back in 3 seconds...
						</TD>
					</TR>
				</TABLE>
				<?php
					header( "refresh:3;url=index.html" );
				?>
			</DIV>
			<HR>
			<BR>
		<!-- Footer -->
		<FOOTER class="container bottom padding-16 light-grey">
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
