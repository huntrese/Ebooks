@props(['recentBooks'])

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">

</head>


<div class="carousel">


    <?php foreach ($recentBooks as $book) : ?>
        <div class="book">
            <a href="/books/{{$book->book_id}}/{{$book->chapter}}" class="book-link">
                <img src="{{ asset(''.$book->image_path) }}" alt="Book Cover" class="book-image">
                <h2 class="book-title">{{ $book->name }}</h2>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<script>
    // Get the carousel element
    const carousel = document.querySelector('.carousel');

    // Calculate the width of each book element
    const bookWidth = totalWidth / 16;
    // Calculate the margin-left for each book element
    const marginLeft = bookWidth / 2;

    // Set the margin-left property for each book element
    const bookElements = document.querySelectorAll('.book');
    bookElements.forEach(book => {
        book.style.marginLeft = `${marginLeft}px`;
    });
</script>
