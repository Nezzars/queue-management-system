<?php
    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);

    include '../connections/my_cnx.php';

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
      include '../cdn/cdns.php';
  ?>
  
  <title>Administrator</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color:#F7F7F7;
    }
    hr
    {
      padding:0;
      margin:0;
    }
  </style>
</head>

<body>
  <?php
      if($_SESSION['kakalogin_lang'] == true)
      {
          echo "<script>
              Swal.fire(
              'Success!',
              'Login Successfully!',
              'success'
            )
          </script>";
          $_SESSION['kakalogin_lang'] = false;
      }
  ?>

  <?php
    include '../navbars/admin_navbar.php';
  ?>
<style>
    .dropdown1 {
      position: relative;
      display: inline-block;
    }

    .dropdown1-toggle {
      background-color: #f1f1f1;
      color: #333;
      padding: 15px 20px; /* Increased padding */
      border: none;
      cursor: pointer;
      font-size: 20px; /* Increased font size */
    }

    .dropdown1-toggle::after {
      content: "\25BE"; /* Down arrow */
      margin-left: 5px;
    }

    .dropdown1-menu {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 250px; /* Increased width */
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown1-menu a {
      color: #333;
      padding: 15px 20px; /* Increased padding */
      text-decoration: none;
      display: block;
      font-size: 20px; /* Increased font size */
    }

    .dropdown1-menu a:hover {
      background-color: #ddd;
    }

    .dropdown1:hover .dropdown1-menu {
      display: block;
    }
</style>


<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        }

        .navbar1 {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: white;
        color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
        z-index: 1000; /* Make sure the navbar is on top of other elements */
        }

        .navbar1-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        margin-bottom: 20px;
        }

        .logo {
        font-size: 24px;
        margin-left:10px;
        }

        .toggle-button {
        cursor: pointer;
        display: none;
        }

        .bar {
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        }

        .navbar1-items {
        list-style-type: none;
        padding: 0;
        margin: 0;
        width: 100%;
        }

        .navbar1-items li {
        padding: 15px;
        }

        .navbar1-items li a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        }

        .department_lists-items li {
          padding: 0px;
          padding-left:15px;
        }

        .department_lists-items li a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        }

        /* Add hover effect for links */
        .navbar1-items li a:hover {
        /* background-color: #444; */
        }

        /* Media query for responsive design */
        /* @media (max-width: 768px) {
          .toggle-button {
              display: block;
          }
          .navbar-items {
              display: none;
          }
          .navbar.active .navbar-items {
              display: block;
          }
        } */
  </style>
  <style>
    /* Custom styling for the modal */
    .modal-dialog {
      max-width: 500px;
    }

    /* Additional margin for the modal body */
    .modal-body {
      margin: 20px;
    }

    /* Center the department name input */
    .department-input {
      width: 100%;
    }

    /* Style the footer buttons */
    .modal-footer .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
    }

    .modal-footer .btn-secondary:hover {
      background-color: #5a6268;
      border-color: #545b62;
    }

    .modal-footer .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .modal-footer .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
  <style>
    .department-container {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      border: 1px solid lightgray;
      background-color: white;
      font-size: 24px;
    }

    .department-actions {
      display: flex;
      align-items: center;
    }

    .btn {
      margin-left: 10px;
    }

    @media screen and (max-width: 768px) {
      .department-container {
        flex-direction: column;
        text-align: center;
      }

      .department-actions {
        flex-direction: column;
        margin-top: 10px;
      }
      
      .btn {
        margin-left: 0;
        margin-top: 5px;
      }
    }
</style>

  <div class="navbar1" style="overflow-x:scroll;">
    <center>
      <div class="navbar1-header">
          <div class="logo">
              <img src="../images/ptc_logo_whitebg.jpg" style="width:150px; height:150px;" alt="Your Logo" width="300" height="300">
          </div>
      </div>
    </center>
    <h2>Administrator</h2>
    <hr style="width:100%;">
    <ul class="navbar1-items" id="dashboard_button">
      <li style="cursor:pointer;" onclick="document.getElementById('dashboard_with_icon_button').click();"><a onclick="show_dashboard_panel();" style="cursor:pointer;" id="dashboard_with_icon_button"><i class="fas fa-tachometer-alt" style="color:green;"></i> &nbsp&nbsp Dashboard</a></li>
    </ul>
    <ul class="navbar1-items" id="navbar1-items">
      <li><a onclick="department_toggle();" style="cursor:pointer;" id="department_with_icon_button"><i class="fa fa-solid fa-building" style="color:green;"></i> &nbsp&nbsp Departments &nbsp&nbsp&nbsp<i class="fa fa-solid fa-caret-down"></i></a></li>
    </ul>
    <script>
      document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    </script>
    <div id="department_lists" style="width:100%; display:none;">
      <ul class="department_lists-items" id="department_lists-items">
        <hr style="width:100%;">

        <div id="department_lists_from_db">
          <?php
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

                echo '
                  <li style="padding-top:10px; padding-bottom:10px; cursor:pointer;" id="li_id_'.$row['id'].'" onclick="document.getElementById(\'department_id_'.$row['id'].'\').click();"><a style="cursor:pointer;" id="department_id_'.$row['id'].'">'.$count.'. '.$transformed_department_name.'</a></li>
                  <hr style="width:100%;">
                ';
                $count++;
            }
          ?>
        </div>
        
        <li style="padding-top:10px; padding-bottom:10px; cursor:pointer;" onclick="document.getElementById('plus_add_department_button').click();"><a onclick="document.getElementById('add_department_button').click();" style="cursor:pointer;" id="plus_add_department_button"><b>+ ADD DEPARTMENT</b></a></li>
        <hr style="width:100%;">
      </ul>
    </div>
      <ul class="navbar1-items" id="dashboard_button">
        <li style="cursor:pointer;"><a onclick="" style="cursor:pointer;" id="dashboard_with_icon_button"><i class="fa fa-solid fa-book-open" style="color:green;"></i> &nbsp&nbsp Guide</a></li>
      </ul>
      <hr style="width:100%;">
      <ul class="navbar1-items" id="navbar1-items">
        <li><a onclick="logout_button()" style="cursor:pointer;"><i class="fa fa-solid fa-right-from-bracket" style="color:green;"></i> &nbsp&nbsp Log-out</a></li>
      </ul>
  </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_department_modal" style="display:none;" id="add_department_button">
  open add department
</button>

<!-- The Modal -->
<div class="modal fade" id="add_department_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="departmentName">Department Name:</label>
          <input type="text" class="form-control department-input" id="add_department_department_name_textfield" placeholder="ex. Deans Office" required>
          <br>
          <label for="departmentName">Room:</label>
          <input type="text" class="form-control department-input" id="add_department_room_textfield" placeholder="ex. 201" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="add_department_ajax();">Add Department</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="add_department_close_button">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- DASHBOARD PANEL -->
  <div id="dashboard_panel" style="width: calc(100% - 250px); margin-left:250px;">
    <h1 style="padding:20px; border:1px solid lightgray; text-align:center; background-color:white;">Dashboard</h1>
    <div style="display: table;table-layout: fixed; border-spacing: 30px; width:100%; text-align:center;">
      <div style="display: table-cell; float:left; width:30%; background-color:white;">
        <br>
        <h1><i class="fa-solid fa-calendar-days" style="color:green;"></i></h1>
        <h4><b>August 4, 2023</b></h4> 
        <h5>Date Today</h5> 
        <br>
      </div>
      <div style="display: table-cell; float:left; width:5%;">
        <br>
      </div>
      <div style="display: table-cell; float:left; width:30%; background-color:white;">
        <br>
        <h1><i class="fa fa-solid fa-building" style="color:green;"></i></h1>
        <h4><b>0</b></h4> 
        <h5>Total Department</h5> 
        <br>
      </div>
      <div style="display: table-cell; float:left; width:5%;">
        <br>
      </div>
      <div style="display: table-cell; float:left; width:30%; background-color:white;">
        <br>
        <h1><i class="fa fa-solid fa-chalkboard-user" style="color:green;"></i></h1>
        <h4><b>0</b></h4> 
        <h5>Total Students</h5> 
        <br>
      </div>
    </div>
  </div>
<!-- DASHBOARD PANEL -->
<!-- DEPARTMENT PANEL -->
<div id="department_panel" style="width: calc(100% - 250px); margin-left: 250px; display:none;">
    <div id="department_name_and_action" style="padding:0; background-color: white;">
    </div>
    <br>
    <div style="width:80%; margin:auto; padding:20px; background-color:white;">
      <div class="form-shadow" style="overflow: auto;">
        <center><h2>USERS TABLE</h2></center>
        <input type="button" value="Add User" class="btn btn-primary">
        <br>
        <br>
        <table id="department_table" class="table table-striped" style="overflow-x:auto; border-collapse: collapse; text-align:center;">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Admin Type</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Billy Bernabe</td>
              <td>billybebsxz</td>
              <td>Deans Office</td>
              <td>
                <input type="button" value="Update" class="btn btn-success">
                <input type="button" value="Delete" class="btn btn-danger">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
<!-- DEPARTMENT PANEL -->

<script>
$(document).ready(function() {
  $('#department_table').DataTable({
    responsive: true
  });
});
</script>

</body>
<script src="script.js"></script>
<script>
  function logout_button()
  {
    Swal.fire({
      title: 'Warning!',
      text: "Are you sure you want to log out?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../logout.php";
      } else {
        // User clicked "No" or closed the dialog
        Swal.fire(
          'Cancelled',
          'Your action has been cancelled.',
          'error'
        );
      }
    });
  }

  function department_toggle()
  {
    $("#department_lists").slideToggle();
  }
</script>
<script>
  
  function show_dashboard_panel()
  {
    document.getElementById('dashboard_panel').style.display = "Inherit";
    document.getElementById('department_panel').style.display = "none";

    document.getElementById("dashboard_button").style.backgroundColor = "lightgreen";
    var elements = document.querySelectorAll('[id^="li_id_"]');
    elements.forEach(function(element) {
      element.style.backgroundColor = "white";
    });
  }
  function show_department_panel()
  {
    document.getElementById('dashboard_panel').style.display = "none";
    document.getElementById('department_panel').style.display = "Inherit";

    document.getElementById("dashboard_button").style.backgroundColor = "white";
    var elements = document.querySelectorAll('[id^="li_id_"]');
    elements.forEach(function(element) {
      element.style.backgroundColor = "white";
    });
  }

  function add_department_ajax()
  {
    if(document.getElementById('add_department_department_name_textfield').value == "")
    {
      document.getElementById('add_department_department_name_textfield').setCustomValidity("Please fill up this field.");
      document.getElementById('add_department_department_name_textfield').reportValidity();
    }
    else if(document.getElementById('add_department_room_textfield').value == "")
    {
      document.getElementById('add_department_room_textfield').setCustomValidity("Please fill up this field.");
      document.getElementById('add_department_room_textfield').reportValidity();
    }
    else
    {
      var data = 
      {
        action: 'add_department_ajax',
        add_department_department_name_textfield: $("#add_department_department_name_textfield").val(),
        add_department_room_textfield: $("#add_department_room_textfield").val(),
      };

      $.ajax({
        url: 'admin_dashboard_ajax.php',
        type: 'post',
        data: data,

        success:function(response)
        {
          var parsedResponse = JSON.parse(response);
          // document.getElementById("tbodies_pending").innerHTML = parsedResponse[0];

          if(parsedResponse[0].trim() == "add_successfully")
          {
            document.getElementById("add_department_close_button").click();
            document.getElementById("add_department_department_name_textfield").value = "";
            document.getElementById("add_department_room_textfield").value = "";

            //displaying all data from db
            // alert(parsedResponse[1]);
            document.getElementById("department_lists_from_db").innerHTML = parsedResponse[1];
            document.getElementById("department_id_"+parsedResponse[2]).click();

            Swal.fire(
              'Success!',
              'Adding Department Successfully!',
              'success'
            );

          }
          else
          {
            Swal.fire(
              'Failed!',
              'The Department already exists!',
              'error'
            );
          }
        }

      });
    }
  }
</script>
<script>
    const department_lists_from_db = e => 
    {
      var department_id = `${e.target.id}`;
      // alert(department_id);  

      if (department_id.startsWith("department_id_")) 
      {
        var data = 
        {
          action: 'ipasok_sa_department_panel_mga_details',
          department_id: department_id,
        };

        $.ajax({
          url: 'admin_dashboard_ajax.php',
          type: 'post',
          data: data,

          success:function(response){
            var parsedResponse = JSON.parse(response);
          // document.getElementById("tbodies_pending").innerHTML = parsedResponse[0];

            //ilagay department name sa header
            // document.getElementById("department_name_and_action").innerHTML = '<span style="font-size:26px;">Department Name: <b>'+parsedResponse[0]+'</b></span><input type="button" value="Delete" class="btn btn-danger" style="float:right;"><input type="button" value="Rename" class="btn btn-info" style="float:right; margin-right:10px;">';
            document.getElementById("department_name_and_action").innerHTML = '<div class="department-container">'+
            '<span>Department Name: <b>'+parsedResponse[0]+'</b></span>'+
            '<div class="department-actions">'+
            '  <input type="button" value="Rename" class="btn btn-info">'+
            '  <input type="button" value="Delete" class="btn btn-danger">'+
            '</div>'+
            '</div>';

            document.getElementById("department_table").innerHTML = "";
            document.getElementById("department_table").innerHTML += '<thead class="thead-dark">'
            + '<tr>'
            + '<th>ID</th>'
            + '<th>Full Name</th>'
            + '<th>Username</th>'
            + '<th>Admin Type</th>'
            + '<th>Actions</th>'
            + '</tr>'
            + '</thead>';

            document.getElementById("department_table").innerHTML += parsedResponse[1];

            document.getElementById("li_id_"+parsedResponse[2]).style.backgroundColor = "lightgreen";
            
            // Destroy the existing DataTable instance
            var dataTable = $("#department_table").DataTable();
            dataTable.destroy();

            // Now you can reinitialize the DataTable with new settings or data
            $("#department_table").DataTable({});
            
            show_department_panel();
            document.getElementById("li_id_"+parsedResponse[2]).style.backgroundColor = "lightgreen";
          }
        });
      }
    }
    document.getElementById("department_lists_from_db").addEventListener("click", department_lists_from_db);
</script>
</html>


