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

  
</style>
<style>
          /* .modal_content_appointment
          {
            width:200%;
            margin-left:-50%;
          } */
          /* @media (max-width: 1021px) {
            .modal_content_appointment
            {
              width:100%;
              margin-left:0;
            }
          } */


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

    /* .modal-dialog {
      max-width: 500px;
    } */

    /* Additional margin for the modal body */
    /* .modal-body {
      margin: 20px;
    } */

    /* Center the department name input */
    /* .department-input {
      width: 100%;
    } */

    /* Style the footer buttons */
    /* .modal-footer .btn-secondary {
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
    } */
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

    #review_panel
    {
      width:49%;
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

      #review_panel
      {
        width:100%;
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
<style>
      textarea {
        resize: vertical; /* Allow vertical resizing */
        overflow: auto; /* Add scroll bar if needed */
      }

      .stars 
      {
        display: inline-block;
        font-size: 40px;
        
        /* background: linear-gradient(to right, gold 50%, transparent 50%);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent; */

        color: white;
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;

        cursor:pointer;
        margin-left:-2px;
        margin-right:-2px; 
      }
    </style>
    <style>
        .radio-input input {
          display: none;
        }

        .radio-input {
          --container_width: 328px; /* Adjust as needed */
          position: relative;
          display: flex;
          align-items: center;
          border-radius: 9999px;
          background-color: #fff;
          color: #000000;
          width: var(--container_width);
          overflow: hidden;
          border: 1px solid rgba(53, 52, 52, 0.226);
        }

        .radio-input label {
          width: calc(100% / 5); /* Divide equally for 5 buttons */
          padding: 10px;
          cursor: pointer;
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 1;
          font-weight: 600;
          letter-spacing: -1px;
          font-size: 14px;
        }

        .selection {
          display: none;
          position: absolute;
          height: 100%;
          width: calc(var(--container_width) / 5);
          z-index: 0;
          left: 0;
          top: 0;
          transition: .15s ease;
        }

        .radio-input label:has(input:checked) {
          color: #fff;
        }

        .radio-input label:has(input:checked) ~ .selection {
          background-color: rgb(11, 117, 223);
          display: inline-block;
        }

        /* Adjust the transforms for 5 buttons */
        .radio-input label:nth-child(1):has(input:checked) ~ .selection {
          transform: translateX(calc(var(--container_width) * 0 / 6));
        }

        .radio-input label:nth-child(2):has(input:checked) ~ .selection {
          transform: translateX(calc(var(--container_width) * 1 / 6));
        }

        .radio-input label:nth-child(3):has(input:checked) ~ .selection {
          transform: translateX(calc(var(--container_width) * 2 / 6));
        }

        .radio-input label:nth-child(4):has(input:checked) ~ .selection {
          transform: translateX(calc(var(--container_width) * 3 / 6));
        }

        .radio-input label:nth-child(5):has(input:checked) ~ .selection {
          transform: translateX(calc(var(--container_width) * 4 / 6));
        }

        .radio-input label:nth-child(6):has(input:checked) ~ .selection {
          transform: translateX(calc(var(--container_width) * 5 / 6));
        }

      </style>
      <style>
        .comments-container {
          border: 1px solid #ccc;
          padding: 20px;
          border-radius: 10px;
          background-color: #f9f9f9;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
          max-height: 500px;
          overflow-y: scroll;
        }

        .comment {
          margin-bottom: 15px;
          padding: 15px;
          border: 1px solid #ddd;
          border-radius: 8px;
          background-color: #fff;
          box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
        }

        .comment-author {
          font-weight: bold;
          margin-bottom: 5px;
        }

        .comment-date {
          font-size: 12px;
          color: #888;
        }

        .comment-time {
          font-size: 12px;
          color: #888;
        }

        .comment-content {
          font-size: 14px;
          margin: 10px 0;
        }

        .star-rating {
          color: #FFD700;
        }
        
        .total-reviews {
          font-size: 14px;
          margin-top: 10px;
        }
      </style>