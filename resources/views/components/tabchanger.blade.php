<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Pale white background color */
        }

        nav {
            background-color: #fff; /* White navbar background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 0; /* Add padding to the top and bottom of the navbar */
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            display: inline;
            margin-right: 20px; /* Add spacing between the navigation links */
        }

        ul li:last-child {
            margin-right: 0; /* Remove margin from the last navigation link */
        }

        ul li a {
            text-decoration: none;
            color: #333; /* Dark text color for links */
            font-weight: bold;
            font-size: 18px;
            padding: 5px 10px; /* Add padding to the links for better spacing */
        }

        ul li a:hover {
            color: #007BFF; /* Change text color on hover */
        }

        /* Style for the logo */
        ul li img {
            margin-left: 1%;
            width: 40px;
            max-width: 100px; /* Adjust the maximum width of the logo */
            vertical-align: middle; /* Vertically align the logo */
            margin-right: 10px; /* Add spacing to the right of the logo */
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
