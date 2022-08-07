

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<?php
  
  include "navbar.php";
  include "connection.php";
  
?>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.3s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color:#00544c;
}

	</style>

</head>
<body>
	<!-------------------------------------sidenav------------------------------------->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 70px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
	<!--------------------------------------------search bar---------------------------------------->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #ffda00e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #ffda00e6;" type="submit" name="submit1" class="btn btn-default">Delete
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Search Author" required="">
				<button style="background-color: #ffda00e6;" type="submit" name="submit2" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>

	<h1>Books</h1>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #cd7333;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}

		 else if(isset($_POST['submit2']))
		{
			$q=mysqli_query($db,"SELECT * from books where authors like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #cd7333;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`bid` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #cd7333;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"DELETE from books where bid = '$_POST[bid]'; ");
				?>
					<script type="text/javascript">
						alert("Delete Successful.");
					</script>
				<?php
			}
			else
			{
							?>
					<script type="text/javascript">
						alert("Please Login First.");
					</script>
				<?php
			}
		}
		

	?>
</div>
</body>
</html>