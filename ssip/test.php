<?php 
	include 'connection.php';
	session_start();
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
		<h4> Please enter the product details</h4>
	</div>
	<div class="container">
		<form id="f101" method="post" action="#">
			<table>
			<tr>
				<td><label>Please Select the category: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></td>
			<td><select id="select1" onchange="setForm(this.value)">
				<option value="select">--select--</option>
				<option value="clothes">Clothes</option>
				<option value="food">Food</option>
			</select></td>
			</tr>
			</table>			
		</form>
	

		<div id="clothes">
		<form  method="post"  name="firstform" action="#">
		<table>
			<tr>
				<td><label>Enter the id</label></td>
				<td>
					<input type="text" name="id" />
				</td>
			</tr>
			
			<tr>
			<td><label>Enter the Brand</label></td>
			<td><input type="text" name="brand" /></td>
			</tr>
			<tr>
			<td><label>Enter the Brand ID</label></td>
			<td><input type="text" name="brand_id" ></td>
			</tr>
			<tr>
			<td><label>Enter the name</label></td>
			<td><input type="text" name="name" /></td>
			</tr>
			<tr>
			<td><label>Enter the price</label></td>
			<td><input type="number" name="price" /></td>
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
			<td><input type="text" name="size" /></td>
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
				<td><label>Enter the id</label></td>
				<td><input type="text" name="id" /></td>
			</tr>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td><input type="text" name="brand" /></td>
			</tr>
			<tr>
			<td><label>Enter the Brand ID</label></td>
			<td><input type="text" name="brand_id" ></td>
			</tr>
			<tr>
			<td><label>Enter the name</label></td>
			<td><input type="text" name="name" /></td>
			</tr>
			<tr>
			<td><label>Enter the price</label></td>
			<td><input type="number" name="price" /></td>
			</tr>
			<tr>
			<td><label >Enter the Expiry date</label></td>
			<td><input type="date" name="exprdate"/></td>
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
				$id=$_POST['id'];
				$name=$_POST['name'];
				$brand=$_POST['brand'];
				$brand_id=$_POST['brand_id'];
				$price=$_POST['price'];
				$exprdate=$_POST['exprdate'];
				$curr_date=date('Y-m-d');
				if(isset($_POST['exprdate']))
				{
					$sql1=mysqli_query($conn,"insert into main(CATOGARY_ID,CATOGARY_NAME)
						values('food','food')");
					$sql2=mysqli_query($conn,"insert into brand(BRAND_ID,BRAND_NAME)
						values('$brand_id','$brand')");
					$sql=mysqli_query($conn,"insert into food(FOOD_ID,FOOD_NAME,EXP_DATE,PRICE,ENTRY_DATE,BRAND_ID,CATOGARY_ID)
						values('$id','$name','$exprdate','$price','$curr_date','$brand_id','food')");
					
				}
			}			
			if(filter_has_var(INPUT_POST,'submitc'))
			{
				$id=$_POST['id'];
				$name=$_POST['name'];
				$brand=$_POST['brand'];
				$brand_id=$_POST['brand_id'];
				$price=$_POST['price'];
				$size=$_POST['size'];
				$radioVal = $_POST["category"];
				$curr_date=date('Y-m-d');
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
				
					$sql1=mysqli_query($conn,"insert into main(CATOGARY_ID,CATOGARY_NAME)
						values('cloth','clothes')");
					// if($sql1)
					// echo "sucess sql1";
					$sql2=mysqli_query($conn,"insert into brand(BRAND_ID,BRAND_NAME)
						values('$brand_id','$brand')");
					$sql=mysqli_query($conn,"insert into cloth(CLOTH_ID,CLOTH_NAME,GENDER,SIZE,PRICE,ENTRY_DATE,BRAND_ID,CATOGARY_ID)
						values('$id','$name','$gender','$size','$price','$curr_date','$brand_id','cloth')");
					
				// if($sql2)
				// 	echo "sucess sql2";
				// if($sql)
				// 	echo "sucess sql";
				
				
			}
			?>

</body>
</html>		