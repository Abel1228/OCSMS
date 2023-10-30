<?php
@session_start();
//$photoname=$row[$_FILES['photo']['name']];
$user_name= $_SESSION['blogin'];
$connect = mysqli_connect('localhost','root','','ocsms');
$select =mysqli_query($connect, "select *from student where user_name='$user_name'");



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print students form</title>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/style_form_print.css">
<style type="text/css">
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {

  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
  <script type="text/javascript">
function printThePage(){
self.focus()
self.print()
}
</script>
  
</head>
<body>
  <?php
$row = mysqli_fetch_assoc($select);
$year= $row['year'];
$cost_select= mysqli_query($connect,"select *from cost_table where user_name='$user_name' and year='$year'");
   $cost = mysqli_fetch_assoc($cost_select);?>
  
 
      <div class="container" >




        <table>
          <tr style=" width: 100%; height: 75px; ">
<td>
<img src="../image/logo.png" align="left" width="150px" height="150px" alt="ambo university logo" id="pp">
</td>
<td><div class="fed">
  <br><br>
    <center><h6 ><strong>FEDERAL DEMOCRATIC REPUBLIC OF ETHIOPIA <br>
        HIGHER EDUCATION COST SHARING REGULATION <br>
        BENEFICIARIES AGREEMENT FORM <br></strong> <br></h6></center>
  </div></td>
<td> <?php 

//$rowphoto=mysqli_fetch_assoc($select);
{?>
   <img src="<?php echo  '../uploads/'.$row['location'].''; ?>" align="right" width="150px" height="150px" alt="image" id="pp">
<?php }?></td>

          </tr>
  <tr>
    <th colspan="3"> <span>personal information</span></th>
  
  </tr>
  <tr>
    <td colspan="3"><b>Full name: </b><?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name']?></td>

  </tr>
  <tr>
    <td> <b> Sex:</b><?php echo $row['gender'];?></td>
    <td colspan="2"><span><b> Nationality :</b><?php echo $row['student_nationality']?></span></td>
    
  </tr>
  <tr>
    <td >  <span><b>University :</b> <?php echo $row['university']?></span></td>
    <td colspan="2"> <span><b>Institute/College :</b><?php echo $row['institute']?> </span></td>
   
  </tr>
  <tr>
    <td> <b>Academic Year :</b> <?php echo $cost['acadamic_year']?></span></td>
    <td>   <span><b>Stream :</b><?php echo $row['stream']?> </span></td>
    <td>  <span><b>Year :</b><?php echo $row['year']?> </span></td>
  </tr>
  <tr>
    <td colspan="2"><center><b>Cost sharing detail</b></center> </td>
   
  </tr>
  <tr colspan="3">
    <td > <span> <b>In kind :</b> <?php echo $cost['in_kind']?> </span></td>
    <td >  <span><b> In Cash :</b> <?php echo $cost['in_cash']?></span></td>
    
  </tr>

   <tr>
   <td colspan="3" nowrap><center><span><b> Estimated cost to be born by the beneficiaryy in the current acadamic year</b></span></center></td>
   
  </tr>

   <tr>
    <td> <label><b>15% Education fee :</b> <?php echo $cost['education_expence']?></label></td>
    <td colspan="3"><label><b>Food expence(birr) :</b> <?php echo $cost['food_expence']?></label></td>
    
  </tr>

   <tr>
        <td >  <label><b>Boarding expence(birr) :</b> <?php echo $cost['boarding_expence']?></label></td>
    <td colspan="3"> <label><b>Total(birr) :</b> <?php echo $cost['total_expence']?></label></td>
  </tr>

   <tr>
    <td colspan="3"><b>Choosen from of payment :</b> <?php echo $row['paiment_method']?></td>
  </tr>

     <tr>
    <td colspan="3"><b>I <?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name']?> </b>in accordance with this contractual agreement and the higher education proclamation No.351/1995 and the
        higher education cost sharing
        registeration 154/2008 of the council of minister agreed and signed this contract
      </p></td>
    
  </tr>

     <tr>
    <td colspan="2"><label><b>I am certain and AGREED that the above provided information is true.</b></label></td>
   
  </tr>

 
</table>



   
  
</body>
</html>
		