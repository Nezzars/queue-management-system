<style>
  /* Base styles for the entire table */
  #appointment_table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
  }
  
  .input-group-text {
    cursor: pointer;
}

.input-group-text i {
    font-size: 18px;
}

  /* Table header styles */
  #appointment_table th {
    background-color: #333;
    color: white;
    padding: 15px 10px;
    text-align: left;
    font-weight: bold;
    border: 1px solid #ccc;
  }

  /* Table body row styles */
  #appointment_table td {
    padding: 15px 10px;
    border: 1px solid #ccc;
  }

  /* Alternating row colors */
  #appointment_table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Hover effect for rows */
  #appointment_table tbody tr:hover {
    background-color: #ddd;
  }

  /* Responsive design for small screens */
  @media (max-width: 768px) {
    #appointment_table {
      font-size: 14px;
    }
    #appointment_table th,
    #appointment_table td {
      padding: 10px 5px;
    }
  }
</style>
<style>
        @media (max-width: 767px) {
            .nav-list {
                margin-right: 0;
                flex-direction: column;
                text-align: center;
            }

            .fc-event-slot-available 
            {
              font-size:10px;
            }

            .fc-event-no-slot-available 
            {
              font-size:10px;
            }

            .fc-event-holidayy
            {
              font-size:10px;
            }

            #title_label
            {
              display:none;
            }
        }
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Style the navigation bar */
        .navbar {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.2);
        }
        
        /* Container to center the content */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
        }
        
        /* Style the logo */
        .logo img {
            height: 40px;
            width: auto;
            display: block;
        }
        
        /* Style the navigation list */
        .nav-list {
            list-style: none;
            display: flex;
        }
        
        /* Style navigation list items */
        .nav-list li {
            margin: 0 15px;
        }
        
        /* Style navigation links */
        .nav-list li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        /* Style navigation link on hover */
        .nav-list li a:hover {
            background-color: #555;
        }
        
        /* Style logout link */
        .logout {
            margin-left: auto;
        }
        
        /* Style logout link on hover */
        .logout a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #d9534f;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .logout a:hover {
            background-color: #c9302c;
        }

        /* Base styling for desktop */
        .nav-list {
            display: flex;
            align-items: center;
            margin-right: 30px;
        }

        /* Responsive styling for mobile */
        @media (max-width: 767px) {
            .nav-list {
                margin-right: 0;
                flex-direction: column;
                text-align: center;
            }
        }

        .fc-event-center-title {
            text-align: center;
        }
        

        #main_panel
        {
            width: calc(100% - 250px); 
            margin-left:250px;
        }


    </style>
    

  
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
      /* display: flex; */
      /* justify-content: space-between; */
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

    /* Media query for mobile devices */
    @media (max-width: 767px) {
        table {
            width: 100%;
        }
        th, td {
            padding: 8px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    }

</style>