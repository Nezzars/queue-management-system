
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
    </style>
    <!-- <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#">
                    <img src="../images/ptc_logo.jpg" alt="Your Logo" width="150">
                </a >
            </div>
            <ul class="nav-list">
                <li style="pointer-events: none;"><b>Type: </b>Admin</li>
                <li style="pointer-events: none;"><b>Name: </b>Admin</li>
                <li class="logout"><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav> -->

    <div style="display: flex; justify-content: flex-end; height:80px; padding:30px; background-color:white; border:1px solid lightgray;">
        <div style="margin-right: 30px; color:black;">
            <ul class="nav-list">
                <li style="pointer-events: none;">Type: <b>Admin</b></li>
                <li style="pointer-events: none;">Name: <b>Admin</b></li>
                <!-- <li class="logout"><a href="../logout.php">Logout</a></li> -->
            </ul>
        </div>
    </div>

    
