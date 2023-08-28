<style>
    .fc-event-slot-available 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:green;
      font-size:14px;
    }

    .fc-event-no-slot-available 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:red;
      font-size:14px;
      color:white;
    }

    .fc-event-holidayy 
    {
      text-align: center;
      width:97%;
      cursor:pointer;
      background-color:#F72D93;
      font-size:14px;
      color:white;
    }
    /* .fc-event-slot-available::before 
    {
      content: " ";
      display: block;
      height: 1em; /* Adjust this value to control the spacing
    }  */
    .fc-event-total {
        background-color: lightgray;
        border: 1px solid gray;
        font-weight: bold;
    }
  </style>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color:lightgreen;
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
  </style>
  <style>
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
        
        #review_panel
        {
          width:49%;
        }

        .gitna1
        {
          display: table-cell; float:left; text-align:left; width:2%; 
        }

        /* Responsive styling for mobile */
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

            #review_panel
            {
              width:100%;
            }

            .gitna1
            {
              display:none;
            }
        }
        

        #main_panel
        {
            width: calc(100% - 250px); 
            margin-left:250px;
        }


    </style>
    <style>
      /* .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f4;
      } */
      
      .checkbox-container {
        display: flex;
        flex-direction: column;
        align-items: left;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }
      
      .checkbox {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      
      .checkbox label {
        margin-left: 10px;
        font-size: 16px;
      }
      
      .checkbox input[type="checkbox"] {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #007BFF;
        border-radius: 4px;
        cursor: pointer;
        transition: border-color 0.3s;
        margin-top:-10px;
      }
      
      .checkbox input[type="checkbox"]:checked {
        border-color: #28A745;
        background-color: #28A745;
      }
    </style>
    <style>
      /* MOBILE VIEW LEFT NAV BAR TOGGLE DESIGN */
        #checkbox_leftnavbar {
        display: none;
        }

        .toggle_leftnavbar {
        position: relative;
        width: 40px;
        height: 40px;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition-duration: .5s;
        }

        .bars_leftnavbar {
        width: 100%;
        height: 4px;
        background-color: #1F5642;
        border-radius: 4px;
        }

        #bar2_leftnavbar {
        transition-duration: .8s;
        }

        #bar1_leftnavbar,#bar3_leftnavbar {
        width: 70%;
        }

        #checkbox_leftnavbar:checked + .toggle_leftnavbar .bars_leftnavbar {
        position: absolute;
        transition-duration: .5s;
        }

        #checkbox_leftnavbar:checked + .toggle_leftnavbar #bar2_leftnavbar {
        transform: scaleX(0);
        transition-duration: .5s;
        }

        #checkbox_leftnavbar:checked + .toggle_leftnavbar #bar1_leftnavbar {
        width: 100%;
        transform: rotate(45deg);
        transition-duration: .5s;
        }

        #checkbox_leftnavbar:checked + .toggle_leftnavbar #bar3_leftnavbar {
        width: 100%;
        transform: rotate(-45deg);
        transition-duration: .5s;
        }

        #checkbox_leftnavbar:checked + .toggle_leftnavbar {
        transition-duration: .5s;
        transform: rotate(180deg);
        }
    /* MOBILE VIEW LEFT NAV BAR TOGGLE DESIGN */
    </style>
    <style>
      <style>
        #qr_modal_body {
          font-family: Arial, sans-serif;
          padding: 20px;
          text-align: center;
          background-color: #f9f9f9;
        }

        #qrcode {
          margin-top: 20px;
          width: 250px;
          height: 250px;
        }
      </style>
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