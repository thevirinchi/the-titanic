<?php
session_start();
function redirect($url) {
  ob_start();
  header('Location: '.$url);
  ob_end_flush();
  die();
}
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "wit";
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server');
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
  <BODY>
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
  				<H5><b>My Assignments</b></H5>
          <HR>
  			</HEADER>
        <CENTER>
           <table width="80%" border="1">
              <tr>
                <th colspan="4">your uploads...<label><a href="index.php">upload new files...</a></label></th>
              </tr>
              <tr>
                <tH>File Name</th>
                <th>File Type</th>
                <th>File Size(KB)</th>
                <th>View</th>
              </tr>
              <?php
                $sql="SELECT * FROM uploads";
                $result_set=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result_set)){
              ?>
                      <tr>
                        <td><?php echo $row['file'] ?></td>
                        <td><?php echo $row['type'] ?></td>
                        <td><?php echo $row['size'] ?></td>
                        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                      </tr>
              <?php
                }
              ?>
          </table>
        </CENTER>
    </div>
  </body>
</html>
