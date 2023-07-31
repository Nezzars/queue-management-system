<?php 

include('../database/dbconfig.php');
if (isset($_POST['country_id'])) {

	$province = $_POST['country_id'];
	$query = "SELECT Distinct(City) FROM ffpi_setupaddress where Province='$province'";
	$result = $con->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Choose Municipality</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option>'.$row['City'].'</option>';
		 }
	}else{
		
		echo '<option>No City Found!</option>';
		
	}

}elseif (isset($_POST['state_id'])) {
	 
	$barangay = $_POST['state_id'];
	$query = "SELECT Distinct(Barangay) FROM ffpi_setupaddress where City='$barangay'";
	$result = $con->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Choose Barangay</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option>'.$row['Barangay'].'</option>';
		 }
	}else{

		echo '<option>No Barangay Found!</option>';
	}

}

?>