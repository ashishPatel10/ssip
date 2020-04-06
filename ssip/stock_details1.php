<?php 
	include 'connection.php';
	session_start();
		if (!(isset($_SESSION['email']) and isset($_SESSION['password']))) 
		{
		header("location: login.php");
		}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="Stylesheet" href=ssip_theme.css>
	<title>Stock_details</title>
	<style type="text/css">
		.title
		{
	    	margin: 20px;
		}
	</style>
	<script type="text/javascript">
	function setForm(value) {

    if(value == 'clothes'){
                document.getElementById('clothes').style='display:block;';
                document.getElementById('food').style='display:none;';
            }
            else {

                document.getElementById('food').style = 'display:block;';
                document.getElementById('clothes').style = 'display:none;';
            }
}
</script>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="title">
		<h3>Stock Details:</h3>
	</div>
	<div class="container">
		<form id='f101' method="post" action="#">
			<table>
				<tr>
					<td><label>Select the category</label></td>
					<td><select id="select1" onchange="setForm(this.value)">
						<option value="select">--select--</option>
						<option value="clothes">Clothes</option>
						<option value="food">Food</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
		<div id="clothes">
		<form  method="post"  name="firstform" action="#">
		<table>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
			<select name="select_cbname">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select brand_name from brand");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['brand_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			<tr>
			<td><label>Enter the name</label></td>
			<td>
			<select name="select_cname">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select cloth_name from cloth");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['cloth_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			<div class="rdbtn">
			<tr>
				<td>
				</td>
			<td><input type="radio" name="category" value="male" >Male &nbsp&nbsp
			<input type="radio" name="category" value="female"> Female &nbsp&nbsp
			<input type="radio" name="category" value="children"> Children</td>
			</tr>
			</div>
			<tr>
			<td><label>Enter the size</label></td>
			<td>
			<select name="select_csize">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select size from cloth");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['size'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
		</table>
		<br>
			<hr>
		<button type="submit" name=submitc class="btn btn-primary">Submit</button><br>
		</form>
		</div>
		<div  id="food" style="display: none">
		<form method="post"  name="firstform" action="#">
		<table>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
			<select name="select_fbname">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select brand_name from brand");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['brand_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			<tr>
			<td><label>Enter the name</label></td>
			<td>
			<select name="select_fname">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select food_name from food");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['food_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			</table>	
			<br>
			<hr>
			<button type="submit" name=submitf class="btn btn-primary">Submit</button><br>	
		</form>
		</div>
	</div>
	<?php
		$user_name=session_name();
		echo $user_name;
		if(filter_has_var(INPUT_POST, 'submitc')) 
			{
				$name=$_POST['select_cname'];
				$brand=$_POST['select_cbname'];
				$size=$_POST['select_csize'];
				$radioVal=$_POST["category"];
				$gender="";
				if($radioVal == "male")
				{
				    $gender="M";
				  
				}
				else if ($radioVal == "female")
				{
				    $gender="F";
				}
				else if ($radioVal == "children")
				{
				 	$gender="C";   
				}
				if(!empty($name) && !empty($brand) && !empty($size) && !empty($gender))
				{
					$sql=mysqli_query($conn,"select c.cloth_name,c.size,c.price,c.entry_date,c.gender,b.brand_name from cloth c,brand b where c.brand_id=b.brand_id and c.gender='$gender'");
					if(mysqli_num_rows($sql)==0)
					{
						echo "No data found !!";
					}
					else
					{
						echo "<div class=container>";
						echo "<table style=width:80% border=2 align=left bgcolor=#D7DBDD class=table-hover>";
						echo "<tr bgcolor=#909497>";
						echo "<th>Brand Name</th>";
						echo "<th>Item Name</th>";
						echo "<th>Price</th>";
						echo "<th>Entry_Date</th>";
						echo "</tr>";
						while($row=mysqli_fetch_array($sql))
						{
							$gender=$row['gender'];
							$entry_date=$row['entry_date'];
							$price=$row['price'];
							echo "<tr>";
							echo "<td>".$brand."</td>"."<td>".$name."</td>"."<td>".$price."</td>"."<td>".$entry_date."</td>";
							echo "</tr>";
						}
						echo "</table>";
						echo "</div>";
					}
					
				}
			}
		if(filter_has_var(INPUT_POST, 'submitf')) 
			{
				$name=$_POST['select_fname'];
				$brand=$_POST['select_fbname'];
				if(!empty($name) && !empty($brand))
				{
					$sql=mysqli_query($conn,"select f.food_name,f.EXP_DATE,f.price,f.entry_date,b.brand_name from food f ,brand b where f.brand_id=b.brand_id");
					if(mysqli_num_rows($sql)==0)
					{
						echo "No data found !!";
					}
					else
					{
						echo "<div class=container>";
						echo "<table style=width:80% border=2 align=left bgcolor=#D7DBDD class=table-hover>";
						echo "<tr bgcolor=#909497>";
						echo "<th>Brand Name</th>";
						echo "<th>Item Name</th>";
						echo "<th>Expr_Date</th>";
						echo "<th>Price</th>";
						echo "<th>Entry_Date</th>";
						echo "</tr>";
						while($row=mysqli_fetch_array($sql))
						{
							$Expr_Date=$row['EXP_DATE'];
							$entry_date=$row['entry_date'];
							$price=$row['price'];
							echo "<tr>";
							echo "<td>".$brand."</td>"."<td>".$name."</td>"."<td>".$Expr_Date."</td>"."<td>".$price."</td>"."<td>".$entry_date."</td>";
							echo "</tr>";
						}
						echo "</table>";
						echo "</div>";
					}
					
				}
			}
			
	?>
</body>
</html>