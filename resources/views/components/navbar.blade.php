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

        /* Style for the logo */
        ul li img.logo {
            height: 4vh; /* Increase the height to make the logo bigger using viewport units */
            width: 6vh; /* Use viewport units for the width */
            vertical-align: middle; /* Vertically align the logo */
            margin-right: 2vh; /* Use viewport units for spacing to the right of the logo */
            margin-left: 1vw;
        }

        /* New style for the user icon */
        ul.user-icon {
            position: absolute;
            right: 2%; /* Use percentage for right spacing */
            display: flex;
            align-items: center;
        }

        /* Style for the user icon image */
        ul.user-icon img {
            width: 3vh; /* Use viewport units for the width of the user icon */
            max-width: 100px;
            vertical-align: middle;
        }
        .input-group {
    position: relative;
    display: inline-block;
}

#search-tooltip {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #f0f0f0;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
}

#search:focus + #search-tooltip {
    display: block;
}

#search:valid + #search-tooltip {
    display: none;
}

    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/"><img src="{{ asset('images/logo(2).png') }}" alt="/" class="logo" href="/"></a></li>
            <li><a href="/">Home</a></li>
            <li><a href="/library">Library</a></li>

            <!-- Add the search form here -->
            <li>
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" id="search" placeholder="Search users">
                        <div class="tooltip" id="search-tooltip">Search must be longer than 2 characters</div>
                    </div>
                    
                    
                    
                </form>
            </li>
            <!-- Use a separate ul.user-icon for the user icon -->
            <ul class="user-icon">
                <li><a href="/user"><img src="{{ asset('images/user.png') }}" alt="" class="user"></a></li>
            </ul>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-tooltip').hide(); // Initially hide the tooltip

    $('#search').on('keydown', function(e) {
        if (e.key === 'Enter') {
            if ($('#search').val().length <= 2) {
                $('#search-tooltip').fadeIn(400); // Show the tooltip with a fade-in animation
                e.preventDefault(); // Prevent form submission (Enter key) if the search is too short
                setTimeout(function() {
                    $('#search-tooltip').fadeOut(400); // Fade out the tooltip after a delay
                }, 2000); // Adjust the delay (in milliseconds) as needed
            }
        }
    });
});
</script>