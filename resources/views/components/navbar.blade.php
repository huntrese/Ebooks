<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content goes here -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">
       

</head>
<body>
    <nav class="general-site-navbar">
        <ul class="nav-list">
            <li class="nav-item"><a href="/"><img src="{{ asset('images/logo(2).png') }}" alt="/" class="logo" href="/"></a></li>
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/library" class="nav-link">Library</a></li>
            <li class="nav-item">
                <form action="{{route('search')}}" method="POST" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="search-input" name="q" id="search" placeholder="Search books">
                        <div class="tooltip" id="search-tooltip">Search must be longer than 2 characters</div>
                    </div>
                </form>
            </li>
            <ul class="user-icon">
                @guest
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @else

                    <li class="user-icon-item"><a href="/user"><img src="{{ asset('images/user.png') }}" alt="" class="user"></a></li>
                @endguest
            </ul>
            
        </ul>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function() {
    $('#search-tooltip').hide(); // Initially hide the tooltip

    $('#search').on('input', function() {
        if ($(this).val().length <= 2) {
            $('#search-tooltip').fadeIn(400); // Show the tooltip
        } else {
            $('#search-tooltip').fadeOut(400); // Hide the tooltip
        }
    });

    $('#search').on('keydown', function(e) {
        if ($(this).val().length <= 2 && e.key === 'Enter') {
            e.preventDefault(); // Disable Enter key if the input length is less than 2
        }
    });
});
</script>



