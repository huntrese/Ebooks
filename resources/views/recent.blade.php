<!DOCTYPE html>
<html>
<head>

    <title>My Recents</title>

</head>
<x-navbar />

<body>
    <!-- Navigation Bar -->
    <x-tabchanger />
    <!-- Favorites Tab Content -->
    <div class="favorites-container" id="favorites-content">
    <h2>Recent:</h2>

        <x-userReadBooks :books="$books" :chapterNumbers="$chapterNumbers"/>

    </div>

</body>
</html>
