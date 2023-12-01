@props(['books'])

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">

</head>
<div class="carousel">
    <?php $bookCount = 0; // Initialize a counter for the number of books displayed ?>
    <?php foreach ($books as $book) : ?>
        <?php if ($bookCount >= 12) break; // Check if we've reached the maximum number of books ?>
        <div class="preview-book">
            <a href="/books/{{$book->book_ID}}" class="preview-book-link">
                <img src="{{ asset(''.$book->image_path) }}" alt="Book Cover" class="preview-book-image">
                <h2 class="preview-book-title">{{ $book->name }}</h2>
            </a>
        </div>
        <?php $bookCount++; // Increment the book count ?>
    <?php endforeach; ?>
</div>



<script>
    // Get the carousel element
    const carousel = document.querySelector('.carousel');

    // Calculate the width of each book element
    const bookWidth = totalWidth / 12;
    // Calculate the margin-left for each book element
    const marginLeft = bookWidth / 2;

    // Set the margin-left property for each book element
    const bookElements = document.querySelectorAll('.book');
    bookElements.forEach(book => {
        book.style.marginLeft = `${marginLeft}px`;
    });
</script>
