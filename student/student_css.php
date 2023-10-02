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
      background-color:#17A2B8;
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
<style>
  .styled-hr hr {
  border: none; /* Remove default border */
  height: 2px; /* Set the height of the line */
  background-color: lightgreen; /* Change the background color */
  margin: 20px 0; /* Add some margin above and below */
  position: relative;
}

.styled-hr hr::before {
  content: ""; /* Create a pseudo-element for the decorative line */
  position: absolute;
  top: 50%; /* Position at the center of the line */
  left: 0;
  width: 20px; /* Width of the decorative line */
  height: 2px;
  background-color: #1F5642; /* Color of the decorative line */
  transform: translateY(-50%); /* Adjust for vertical alignment */
}
</style>
<style>
  /* Add this CSS to adjust the height of the toggle button */
  .input-group .toggle-password {
  height: 34px; /* You can adjust the height to match the input field */
  padding: 0 10px;
  border: 1px solid #ced4da;
  border-left: none;
  }

  .input-group .toggle-password i {
  font-size: 14px;
  }

  .input-group .toggle-password:hover {
  background-color: #f7f7f7;
  }

</style>
<style>
  .white-div {
    position:fixed;
    z-index:1000;
    background-color: white;
    width: 200%; /* Lapad ng div */
    height:10000px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
  }
</style>
<style>
    /* Style for the ul */
    #my_appointments_table ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    /* Style for each li item */
    #my_appointments_table li {
        background-color: #f0f0f0;
        padding: 5px;
        margin: 5px 0;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    /* Change background color on hover */
    #my_appointments_table li:hover {
        background-color: #e0e0e0;
    }
</style>