<?php	session_start();
		include('database_info.php');
		$mysql = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
	
	$clg_addr=$clg_city=$clg_contact=$clg_name=$clg_pin="";

	$clg_name=$_POST["clg_name"];
	$clg_addr=$_POST["clg_addr"];
	$clg_city=$_POST["clg_city"];
	$clg_pin=$_POST["clg_pin"];
	$clg_contact=$_POST["clg_contact"];
	$checked = $_POST['clg_stream'];//changed get to post
   




	$branch="";

	$cnfrm_brnch="";

   for($i=0; $i < count($checked); $i++)
    {
			if($i!=0)
			{
				$branch = $branch.(",\n").$checked[$i];
				echo "Selected " . $checked[$i] . "<br/>";
			}
			else {
				$branch = $branch.$checked[$i];
			}
			$sql_inner = "INSERT INTO college_branch( College_Name, Branch) 
						VALUES ('$clg_name', '$checked[$i]')";
			if($mysql->query($sql_inner)  ===  TRUE  )
			{
				$cnfrm_brnch=$cnfrm_brnch."<p>Branch ".$checked[$i]." added successfully</p><br/><br/>";
//				echo "<p>Branch ".$checked[$i]." added successfully</p><br/><br/>";
			}	
			else
			{
				echo "Error:". $sql_inner ."<br/>". $mysql->error;
			}
			
	}




$sql= "INSERT INTO college_list( College_Name, Address, City, Pincode, Contact_Number, Branch) 
            VALUES ('$clg_name', '$clg_addr', '$clg_city', '$clg_pin','$clg_contact','$branch')";


			
			
	
//$sql1="INSERT INTO login( Mobile, Password) VALUES ('$mobile',AES_ENCRYPT('$password','secret'))";


//$sql2="INSERT INTO Services(Service_Name,Amount(in BitCoin)) VALUES ('Parking','0'),('Flight','0'),('Movie','0'),('Recharge','0')";



if($mysql->query($sql)  ===  TRUE  )//&&  $mysql->query($sql1)  ===  TRUE )//&& $mysql->query($sql2)  ===  TRUE)
{
	header('refresh:5;url=admin_add_college.php');
	echo "$cnfrm_brnch";
	echo "<br><br><h3>College added successfully</h3><br/><br/>";
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}

	


$mysql->close();

?>
