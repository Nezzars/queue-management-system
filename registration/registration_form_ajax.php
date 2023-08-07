<?php
  require '../connections/my_cnx.php';

  if($_POST["action1"] == "select_province_ajax")
  {
    global $con;
    $province_dropdownlist = $_POST["province_dropdownlist"]; //metro manila

    $cities = "";
    $cities .= '<option value="" disabled selected>Choose...</option>';
    $sql = "  SELECT DISTINCT City FROM ptc_setupaddress WHERE province='$province_dropdownlist';  ";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $cities .= "<option value='".$row['City']."'>".$row['City']."</option>";
    }
    
    echo $cities; //metro manila
  }

  if($_POST["action1"] == "select_town_city_ajax")
  {
    global $con;
    $town_city_dropdownlist = $_POST["town_city_dropdownlist"]; //metro manila

    $brgy = "";
    $brgy .= '<option value="" disabled selected>Choose...</option>';
    $sql = "  SELECT DISTINCT Barangay FROM ptc_setupaddress WHERE City='$town_city_dropdownlist';  ";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $brgy .= "<option value='".$row['Barangay']."'>".$row['Barangay']."</option>";
    }
    
    echo $brgy; //metro manila
  }
?>