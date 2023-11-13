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
        <h2>Library:</h2>
        <x-booksPreview :books="$books"/>

    </div>

    <!-- Footer or additional content can be added here -->
</body>
</html>
