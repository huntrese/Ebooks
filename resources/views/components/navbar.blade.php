<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
    <style>
        /* Styles for the general-site-navbar */
        .general-site-navbar {
            background-color: #fff;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
            padding: 0.5vh 0;
            font-family: 'Lora';
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Styles for the nav-list within general-site-navbar */
        .general-site-navbar .nav-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        /* Styles for the nav-item within nav-list */
        .general-site-navbar .nav-list .nav-item {
            margin-right: 2%;
            max-height: 5vh;
        }

        /* Styles for the nav-link within nav-item */
        .general-site-navbar .nav-list .nav-item .nav-link {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 2vh;
            padding: 0.5vh 2vh;
        }

        .general-site-navbar .nav-list .nav-item .nav-link:hover {
            color: #007BFF;
        }

        /* Styles for the logo within nav-item */
        .general-site-navbar .nav-list .nav-item .logo {
            height: 4vh;
            width: 6vh;
            vertical-align: middle;
            margin-right: 2vh;
            margin-left: 1vw;
        }

        /* Styles for the user-icon within nav-list */
        .general-site-navbar .nav-list .user-icon {
            list-style-type: none;
            position: absolute;
            right: 2%;
            display: flex;
            align-items: center;
        }

        /* Styles for the user-icon-item within user-icon */
        .general-site-navbar .nav-list .user-icon .user-icon-item {
            margin-right: 2%;
        }

        /* Styles for the user within user-icon-item */
        .general-site-navbar .nav-list .user-icon .user-icon-item .user {
            width: 3vh;
            max-width: 100px;
            vertical-align: middle;
        }

        /* Styles for the input-group within nav-item */
        .general-site-navbar .nav-list .nav-item .input-group {
            position: relative;
            display: inline-block;
        }

        /* Styles for the search-input within input-group */
        .general-site-navbar .nav-list .nav-item .input-group .search-input {
            text-decoration: none;
            font-weight: bold;
            font-size: 2vh;
            padding: 1vh 2vh;
        }

        /* Styles for the search-tooltip */
        .general-site-navbar #search-tooltip {
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

        .general-site-navbar #search:focus + .general-site-navbar #search-tooltip {
            display: block;
        }

        .general-site-navbar #search:valid + .general-site-navbar #search-tooltip {
            display: none;
        }
    </style>
</head>
<body>
    <nav class="general-site-navbar">
        <ul class="nav-list">
            <li class="nav-item"><a href="/"><img src="{{ asset('images/logo(2).png') }}" alt="/" class="logo" href="/"></a></li>
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/library" class="nav-link">Library</a></li>
            <li class="nav-item">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="search-input" name="q" id="search" placeholder="Search books">
                        <div class="tooltip" id="search-tooltip">Search must be longer than 2 characters</div>
                    </div>
                </form>
            </li>
            <ul class="user-icon">
                <li><a href="/user">Login</a></li>
                <li><a href="/user">Register</a></li>
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

    $('#search').on('input', function() {

        $('body').on('keydown', '#search', function(e) {
        if (e.key === 'Enter') {
            if ($(this).val().length <= 2) {
                e.preventDefault();
        } else {
            $('#search-tooltip').fadeOut(400); // Hide the tooltip
        }
        }
    });
        
    });
});
</script>

