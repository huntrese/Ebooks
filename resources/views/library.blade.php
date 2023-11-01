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
        <x-booksPreview :books="$books"/>

    </div>

    <!-- Recent Tab Content (hidden by default) -->
    <x-booksPreview :books="$books" id="recent-content" style="display: none;"/>
        <!-- Content for Recent tab here -->
    </div>

    <!-- Footer or additional content can be added here -->
</body>
</html>
