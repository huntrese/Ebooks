<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
    <style>
        .navbar {
            
            background-color: #fff;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
            padding: 0.5vh 0;
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
            max-height: 5vh;
        }

        /* Navigation Links */
        .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 2vh;
            padding: 0.5vh 2vh;
        }

        .nav-link:hover {
            color: #007BFF;
        }

        /* Logo */
        .logo {
            height: 4vh;
            width: 6vh;
            vertical-align: middle;
            margin-right: 2vh;
            margin-left: 1vw;
        }

        /* User Icon */
        .user-icon {
            list-style-type: none;
            position: absolute;
            right: 2%;
            display: flex;
            align-items: center;
        }

        .user-icon-item {
            margin-right: 2%;
        }

        /* User Icon Image */
        .user {
            width: 3vh;
            max-width: 100px;
            vertical-align: middle;
        }

        /* Input Group */
        .input-group {
            position: relative;
            display: inline-block;
        }

        .search-input {
            text-decoration: none;
            font-weight: bold;
            font-size: 2vh;
            padding: 1vh 2vh;
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
    <nav class="navbar">
        <ul class="nav-list">
            <li class="nav-item"><a href="/"><img src="{{ asset('images/logo(2).png') }}" alt="/" class="logo" href="/"></a></li>
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/library" class="nav-link">Library</a></li>
            <li class="nav-item">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="search-input" name="q" id="search" placeholder="Search users">
                        <div class="tooltip" id="search-tooltip">Search must be longer than 2 characters</div>
                    </div>
                </form>
            </li>
            <ul class="user-icon">
                <li class="user-icon-item"><a href="/user"><img src="{{ asset('images/user.png') }}" alt="" class="user"></a></li>
            </ul>
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