<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to your CSS file -->
</head>
<style>/* styles.css */
    /* Navbar */
    .navbar {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1vh 0;
        margin-bottom: 1vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    /* Navigation List */
    .nav-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
    }
    
    /* Navigation Items */
    .nav-item {
        margin-right: 2%;
    }
    
    /* Navigation Links */
    .nav-link {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-size: 2vh;
        padding: 1vh 2vh;
    }
    
    .nav-link:hover {
        color: #007BFF;
    }
    </style>
<body>
    <nav class="navbar">
        <ul class="nav-list">
            <li class="nav-item"><a href="/library" class="nav-link">Library</a></li>
            <li class="nav-item"><a href="/recent" class="nav-link">Recent</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>
</body>
</html>
