<?php
  require '../connections/my_cnx.php';

  if($_POST["action"] == "add_department_ajax")
  {
    global $con;
    $add_department_department_name_textfield = strtolower(trim($_POST["add_department_department_name_textfield"]));
    $add_department_room_textfield = strtolower(trim($_POST["add_department_room_textfield"]));
    $add_department_department_name_textfield = str_replace(' ', '_', $add_department_department_name_textfield);
    $echoes = array();

    $merong_existing_na_department = false;
    $sql = "  SELECT * FROM ptc_departments WHERE department_name='$add_department_department_name_textfield';  ";
    $result = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($result)) //if meron
    {
        $merong_existing_na_department = true;
    }

    if($merong_existing_na_department == false)
    {
        $query = "INSERT INTO ptc_departments VALUES('', '$add_department_department_name_textfield', '$add_department_room_textfield')";
        mysqli_query($con, $query);

        $sql = "CREATE TABLE ptc_department_".$add_department_department_name_textfield." (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(123),
            username VARCHAR(123),
            password VARCHAR(123),
            type VARCHAR(123)
        )";
        mysqli_query($con, $sql);
        $echoes[0] = "add_successfully";
        $echoes[1] = "";

        $count = 1;
        $sql = "  SELECT * FROM ptc_departments;  ";
        $result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $department_name = $row['department_name'];
            $words = explode("_", $department_name);
            foreach ($words as &$word) 
            {
                $word = ucfirst($word);
            }
            $transformed_department_name = implode(" ", $words);

            $echoes[1] .= '
                <li style="padding-top:10px; padding-bottom:10px; cursor:pointer;" id="li_id_'.$row['id'].'" onclick="document.getElementById(\'department_id_'.$row['id'].'\').click();"><a style="cursor:pointer;" id="department_id_'.$row['id'].'">'.$count.'. '.$transformed_department_name.'</a></li>
                <hr style="width:100%;">
            ';
            $count++;
        }

        $sql = "  SELECT * FROM ptc_departments WHERE department_name = '$add_department_department_name_textfield';  ";
        $result = mysqli_query($con, $sql);
        if($row = mysqli_fetch_assoc($result))
        {
            $echoes[2] = $row['id'];
        }
        
        $response = json_encode($echoes);
        echo $response;
    }
    else
    {
        $echoes[0] = "add_failed";
        $response = json_encode($echoes);
        echo $response;
    }
  }

  if($_POST["action"] == "ipasok_sa_department_panel_mga_details")
  {
    global $con;
    $department_id = $_POST["department_id"];
    $prefix = "department_id_";
    if (strpos($department_id, $prefix) === 0) 
    {
        $department_id = substr($department_id, strlen($prefix));
    }
    $department_array = array();

    $sql = "  SELECT * FROM ptc_departments WHERE id='$department_id';  ";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result))
    {
        $department_name = $row['department_name'];
        $words = explode("_", $department_name);
        foreach ($words as &$word) 
        {
            $word = ucfirst($word);
        }
        $transformed_department_name = implode(" ", $words);

        $department_array[0] = $transformed_department_name;
    }

    $department_array[1] = "";
    $sql = "  SELECT * FROM ptc_department_".$department_name.";  ";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $department_array[1] .= '
            <tbody>
                <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['full_name'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['type'].'</td>
                <td>
                    <input type="button" value="Update" class="btn btn-success">
                    <input type="button" value="Delete" class="btn btn-danger">
                </td>
                </tr>
            </tbody>
        ';
    }
    $department_array[2] = $department_id;

    // $query = "INSERT INTO users VALUES('', '$nameqwe', '$emailqwe', '$genderqwe')";
    // mysqli_query($con, $query);
    
    $response = json_encode($department_array);
    echo $response;
  }
?>

