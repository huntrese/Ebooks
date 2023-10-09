<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites</title>
    <style>
        /* Your existing CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Additional styles for Favorites tab */
        .favorites-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .favorite-book {
            width: 30%;
            margin: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .favorite-book img {
            max-width: 100%;
            height: auto;
        }
        .favorite-book .book-details {
            padding: 20px;
        }
        .favorite-book h2 {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }
        .favorite-book p {
            font-size: 16px;
            margin: 10px 0;
        }
        /* Add more styles as needed */
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <x-navbar />
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
