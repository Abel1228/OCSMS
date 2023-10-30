<?php
@session_start();
$user_name= $_SESSION['blogin'];
$connect = mysqli_connect('localhost','root','','ocsms');
$select =mysqli_query($connect, "select *from student where user_name='$user_name'");
$cost_select =mysqli_query($connect, "select *from cost_table where user_name='$user_name'");

//$sum="SELECT SUM(education_expence)
//FROM cost_table AS adding
//WHERE user_name=$user_name";
//$add=mysqli_query($connect, $sum);

$result=mysqli_fetch_assoc($select);
if ($_SESSION['alogin']) {

}
else{
    header("location:../login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.cs">
	<link rel="stylesheet" type="text/css" href="css/cost_sharing_detail.css">

	<style>
		.btn-primary{
      background-color: #008CBA;
      border: none;
width: 75px;
height: 37px;
border-radius: 5px;
color:white;
cursor: pointer;
  }
	</style>

    <title>Document</title>
</head>
<body>
	<div>
		
    <table id="table" >
		<tr>
			<th>Academic year</th>
			<th>Education(in birr)</th>
			<th>Cafe(in birr)</th>
			<th>Boarding(in birr)</th>
			<th>Total expence(in birr)</th>
		</tr>

		<?php
 $number=0;
 $totaledu=0;
 $totalfood=0;
 $totalbo=0;
 $totalexp=0;
 $num=mysqli_num_rows($cost_select);
 
 if($num>0){ 
	 while($cost=mysqli_fetch_assoc($cost_select)){
		 $number++;
		 $totaledu += $cost['education_expence'];
		 $totalfood += $cost['food_expence'];
		 $totalbo += $cost['boarding_expence'];
		 $totalexp += $cost['total_expence'];
         		echo "
		
           <tr>
		   			<td>".$cost['acadamic_year']."</td>
			      <td>".$cost['education_expence']."</td>
			      <td>".$cost['food_expence']."</td>
			      <td>".$cost['boarding_expence']."</td>
				  <td>".$cost['total_expence']."</td>
	      	</tr>
			  ";}
			  echo "
			  <tr>
			  <th>".'Total'."</th>
			  <td>".$totaledu."</td>
			  <td>".$totalfood."</td>
			  <td>".$totalbo."</td>
			  <td>".$totalexp."</td>
         		";
				 
         	
			 }

			 ?>
	</table>
</div>
<br>
<div>
	<p id="title" align="center">Registration status</p>
	<?php

	$status=$result['status'];
	
	
	switch($status){
	case 0:{
		echo '<div style="width:50%;background-color:white; ;height:35px; margin:auto; border: 1px solid gray; border-radius: 10px; " ></div>';
		echo '<br><p align='.'center'.'><b>please fill the cost form</b></p>';
		break;
	}
	case 1:{
	
		echo '<div style="width:50%;background-color:white; ;height:35px; margin:auto; border: 1px solid gray; border-radius: 10px;">
		
		<div style="width:33.3%; background-color:#04AA6D; ;height:35px; border-radius: 10px;"></div>
		</div>';
	echo '<br><p align='.'center'.'><b>Department pending</b></p>';
	echo '<br><br>';
		break;
	}
	case 2:{
		echo '<div style="width:50%;background-color:white; ;height:35px; margin:auto; border: 1px solid gray; border-radius: 10px;">
		<div style="width:66.6%; background-color:#04AA6D; ;height:35px; border-radius: 10px;"></div>
		
		</div>';
		echo '<br><p align='.'center'.'><b>Accepted by department</b></p>';
		
		echo '<p align='.'center'.'><b>Student service pending</b></p>';
		break;
	}
	case 3:{
	
		
		echo '<div style="width:50%;background-color:white; ;height:35px; margin:auto; border: 1px solid gray; border-radius: 10px;">
			<div style="width:100%; background-color:#04AA6D; ;height:35px; border-radius: 10px;"></div>
			
			</div>';
	
	
	
		echo '<br><div align='.'center'.'><b> Accepted by department and student service <br><br> please print the form and submit it to the registerar</b> </div>';
		echo '<div>
	
		<iframe name="toPrint" src="print.php" width="0" height="0" tabindex="-1"></iframe>
		
		<form>
		<input type="button" class="btn-primary" onclick="document.toPrint.printThePage();" value="Print">
		</form>
		</div>';
		break;
	}
	case 4:{
		echo '<div style="width:50%;background-color:white; ;height:35px; margin:auto; border: 1px solid gray; border-radius: 10px;">
			<div style="width:100%; background-color:red; ;height:35px; border-radius: 10px;"></div>
			
			</div>';
		echo '<br><p align='.'center'.'><b>form is rejected contact the student service</b></p>';
		break;
	}
	default:echo '<br><p align='.'center'.'><b>Cost form unavailable for the current year</b></p>'; break;
	
	}
	
	?>



	</div>
	
</body>
</html>