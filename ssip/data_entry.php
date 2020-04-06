<?php 
	//include 'connection.php';

$dbhost="localhost";
$dbuser ="root";
$dbpass="alwayshhg";
$db="mall2";
$conn=new Mysqli($dbhost,$dbuser,$dbpass,$db);
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
	<title>Data entery page</title>
	<style type="text/css">
		.title
		{
	    	margin: 20px;
		}
		#data_sucess
		{
			margin: 70px;	
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
function type_select(s1,s2)
{
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "  ";
	if (s1.value=='top' && gender=='m') 
	{
		var optionArray = ["|","shirt|Shirt","tshirt|T-Shirt","jacket|Jacket"];
	}
	else if(s1.value=='top' && gender=='f')
	{
		var optionArray = ["|","kurti|Kurti","dress|Dress","top|Top"];
	}
	else if(s1.value=='bottom' && gender=='f')
	{
		var optionArray = ["|","jeans|Jeans","skirt|Skirt"];
	}
	else if(s1.value=='bottom' && gender=='m')
	{
		var optionArray = ["|","denim|Denim","jeans|Jeans"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

var gender='';
function gender_select(value)
{
	var x=document.getElementById(value);
	if(x.value=='male'){
		gender= 'm';
	}
	else if(x.value=='female')
		gender='f';
}

function updateValues(){

	gender_select('gender');
	type_select('type', 'app_type');
}


</script>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="title">
		<h4> Please enter the product details</h4>
	</div>
	<div class="container">
		<form id="f101" method="post" action="#">
			<table>
			<tr>
				<td><label>Please Select the category: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></td>
			<td><select id="select1" onchange="setForm(this.value)">
				<option value="clothes">Clothes</option>
				<option value="food">Food</option>
			</select></td>
			</tr>
			</table>			
		</form>
	

		<div id="clothes">
		<form  method="post"  name="firstform" action="#">
			<br>
		<table>
			<tr>
				<td>
					Gender:
				</td>
			<td>
				<select id="gender" name="gender" onclick="updateValues()">
					<option value="select">--select--</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>
					Type:
				</td>
			<td><select id="type" name="type" onclick="updateValues()">
					<option value=" "></option>
					<option value="top">Top Wear</option>
					<option value="bottom">Bottom Wear</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>
					Select type:
				</td>
				<td>
					<select id="app_type" name="app_type">			
					</select>
				</td>
			</tr>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
				<select name="brand_name">
					<option value="select">--select--</option>
				<?php
				$sql=mysqli_query($conn,"select brand_name from brand where type='cloth'");
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
			<td><label>Enter the quantity</label></td>
			<td><input type="number" name="quantity" required="" /></td>
			</tr>
			<tr>
			<td><label>Enter the price</label></td>
			<td><input type="number" name="price" required="" /></td>
			</tr>
			<tr>
			<td><label>Enter the size</label></td>
			<td>
				<select name="size">
					<option value="select">--select--</option>
					<option value="28">28</option>
					<option value="30">30</option>
					<option value="32">32</option>
					<option value="34">34</option>
					<option value="36">36</option>
					<option value="38">38</option>
				</select>
			</td>
			</tr>
		</table>
		<br>
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
				<select name="brand_name">
					<option value="select">--select--</option>
				<?php
				$sql=mysqli_query($conn,"select brand_name from brand where type='food'");
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
				<select name="food_name">
					<option value="chips">Chips</option>
					<option value="drinks">Soft_drink</option>
					<option value="chocolate">Chocolate</option>
					<option value="tea">Tea</option>
					<option value="coffee">Coffee</option>
					<option value="biscuits">Biscuits</option>
				</select>
			</td>
			</tr>
			<tr>
			<td><label>Enter the price</label></td>
			<td><input type="number" name="price" / required=""></td>
			</tr>
			<tr>
			<td><label >Enter the Expiry date</label></td>
			<td><input type="date" name="exprdate"/ required=""></td>
			</tr>
			<tr>
				<td>
					Enter the quantity:
				</td>
				<td>
					<input type="number" name="quantity" required="" />
				</td>
			</tr>
			</table>	
			<br>
			<br>
			<hr>
			<button type="submit" name=submitf class="btn btn-primary">Submit</button><br>	
		</form>
		</div>
</div>
		<?php
			
			if(filter_has_var(INPUT_POST, 'submitf')) 
			{
				$name=$_POST['food_name'];
				$brand=$_POST['brand_name'];
				$price=$_POST['price'];
				$exprdate=$_POST['exprdate'];
				$curr_date=date('Y-m-d');
				$qty=$_POST['quantity'];		
				if(isset($_POST['exprdate']))
				{
					$sql1=mysqli_query($conn,"select BRAND_ID from brand where TYPE='food' and BRAND_NAME='$brand'");
					$row=mysqli_fetch_array($sql1);
					$brand_id=$row['BRAND_ID'];
					if(mysqli_num_rows($sql1)!=1)
					{
						echo "<script>
								alert('Brand not registered');
								</script>";
						exit("Please contact administrator");
					}
					while($qty>0)
					{		
					$sql=mysqli_query($conn,"insert into food(brand_id,FOOD_NAME,EXP_DATE,PRICE,ENTRY_DATE)
					 	values('$brand_id', '$name','$exprdate','$price','$curr_date')");
					 $qty--;
					}
					if($sql)
					{
						echo "<h3 id=data_sucess>"."Data inserted successfully"."<h3>";
					}

				}
			}			
			if(filter_has_var(INPUT_POST,'submitc'))
			{
				$name=$_POST['app_type'];
				$type=$_POST['type'];
				$brand=$_POST['brand_name'];
				$price=$_POST['price'];
				$size=$_POST['size'];
				$qty=$_POST['quantity'];
				$curr_date=date('Y-m-d');
				$gender=$_POST['gender'];
				$query='';
				if(isset($_POST['size']))
				{
					$sql1=mysqli_query($conn,"select BRAND_ID from brand where TYPE='cloth' and BRAND_NAME='$brand'");
					$row=mysqli_fetch_array($sql1);
					$brand_id=$row['BRAND_ID'];
					if(mysqli_num_rows($sql1)!=1)
					{
						echo "<script>
								alert('Brand not registered');
								</script>";
						exit("Please contact administrator");
					}
					if($gender=='male')
					{
						$query="insert into male(type,size,price,brand_id,ENTRY_DATE)
							values('$name','$size','$price','$brand_id','$curr_date')";
						
					}	
					else if($gender=='female')
					{
						$query="insert into female(type,size,price,brand_id,ENTRY_DATE)
							values('$name','$size','$price','$brand_id','$curr_date')";
					}
					while ($qty>0) 
					{
						$sql=mysqli_query($conn,$query);
						$qty--;
					}
					if($sql)
					{
						echo "<h3 id=data_sucess>"."Data inserted successfully"."<h3>";
					}
				}

			}
			?>

</body>
</html>		