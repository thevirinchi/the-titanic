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
  							<A href="person.php" class="bar-item button padding"><b>&nbsp; Personal Info.</b></A>
  						</TD>
  					</TR>
  					<TR>
  						<TD>
  							<I class="material-icons" style="color:#4cAF50; display:inline;">money</I>
  						</TD>
  						<TD>
  							<A href="review_leave.php" class="bar-item button padding" ><b>&nbsp; Review Leave</b></A>
  						</TD>
  					</TR>
  					<TR>
  						<TD>
  							<I class="material-icons" style="color:#FF9800; display:inline;">school</I>
  						</TD>
  						<TD>
  							<A href="current_staff.php" class="bar-item button padding" ><b>&nbsp; Current Staff</b></A>
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
