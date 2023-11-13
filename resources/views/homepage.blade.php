<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

</head>
<x-navbar />    

<body>
    <div>
        <h2>Featured:</h2>
        <x-booksPreview :books="$books"/>
    </div>
    <div>
        <h2>Upcoming:</h2>
        <x-booksPreview :books="$books"/>
    </div>
</body>
</html>
