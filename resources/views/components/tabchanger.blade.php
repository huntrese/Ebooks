<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Your head content goes here -->
        <style>
            /* Your existing styles */
    
            nav {
                background-color: #fff; /* White navbar background */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 1vh 0; /* Add padding to the top and bottom of the navbar using viewport units */
                display: flex;
                justify-content: space-between; /* Align items at each end of the navbar */
                align-items: center; /* Vertically center items */
            }
    
            ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
                display: flex; /* Make the list items flex containers */
                align-items: center; /* Vertically center the list items within the navbar */
            }
    
            ul li {
                margin-right: 2%; /* Add spacing between the navigation links using a percentage value */
            }
    
            ul li:last-child {
                margin-right: 0; /* Remove margin from the last navigation link */
            }
    
            ul li a {
                text-decoration: none;
                color: #333; /* Dark text color for links */
                font-weight: bold;
                font-size: 2vh; /* Use viewport units for font size */
                padding: 1vh 2vh; /* Use viewport units for padding */
            }
    
            ul li a:hover {
                color: #007BFF; /* Change text color on hover */
            }
    

        </style>
    </head>
<body>
    <nav>
        <ul>
            <li><a href="/library">Library</a></li>
            <li><a href="/recent">Recent</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>
</body>
</html>
