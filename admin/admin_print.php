<?php
@session_start();
//$dept=$_SESSION['dept'];
$conn = mysqli_connect('localhost','root','','ocsms');
$select = "SELECT *from login where printed=0 ";
$queryl = mysqli_query($conn,$select);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <script type="text/javascript">
function printThePage(){
   // $select =mysqli_query($connect, "select *from login where print='0'");
  
self.focus()
self.print()

}

</script>
  
</head>
<body>
			
<?php
		 
		  

         $num=mysqli_num_rows($queryl);
         if($num>0){ 
         	while($results=mysqli_fetch_assoc($queryl)){
				
		echo "
           	<ol>
                <ul>
                <li>".'Name:'." ".'    '." ".$results['first_name']."  ".$results['last_name']."</li>
			      <li>".'ID:'."".'    '."".$results['user_name']."</li>
				  <li>".'Password:'."".'    '."".$results['pass_word']."</li><br><br><hr>
				  "; ?>
				  
				  
		
	      <?php	echo "</ol>
         	
			 
		";
				 
		   }
		}
		?>

	</table>

	
</body> 
</html>