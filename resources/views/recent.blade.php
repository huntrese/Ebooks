<!DOCTYPE html>
<html>
<head>

    <title>My Favorites</title>

</head>
<x-navbar />

<body>
    <!-- Navigation Bar -->
    <x-tabchanger />
    <!-- Favorites Tab Content -->
    <div class="favorites-container" id="favorites-content">
        <x-userReadBooks :books="$books" :chapterNumbers="$chapterNumbers"/>

    </div>

</body>
</html>
