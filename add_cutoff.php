<?php	session_start();
		include('database_info.php');
		$mysql = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
	
	$branch_name=$year=$category=$clg_name=$clg_opn_rank=$clg_cls_rank="";

	$clg_name=$_POST["clg_name"];
	$branch_name=$_POST["branch_name"];
	$year=$_POST["year"];
	$category=$_POST["category"];
	$clg_opn_rank=$_POST["clg_opn_rank"];
	$clg_cls_rank=$_POST["clg_cls_rank"];
	






$sql= "INSERT INTO college_cutoff( College_Name, Branch, Year, Category, Opening_Rank, Closing_Rank) 
            VALUES ('$clg_name', '$branch_name', '$year', '$category','$clg_opn_rank','$clg_cls_rank')";


			
			
	
//$sql1="INSERT INTO login( Mobile, Password) VALUES ('$mobile',AES_ENCRYPT('$password','secret'))";


//$sql2="INSERT INTO Services(Service_Name,Amount(in BitCoin)) VALUES ('Parking','0'),('Flight','0'),('Movie','0'),('Recharge','0')";



if($mysql->query($sql)  ===  TRUE  )//&&  $mysql->query($sql1)  ===  TRUE )//&& $mysql->query($sql2)  ===  TRUE)
{
	header('refresh:1;url=admin_add_cutoff.php');
	echo "<br><br><h3>College cutoff added successfully</h3><br/><br/>";
}
else
{
echo "Error:". $sql ."<br/>". $mysql->error;
}
	


$mysql->close();

?>
