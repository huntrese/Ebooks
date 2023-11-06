@props(['books'])


<style>
    .carousel {
        display: grid;
        grid-template-columns: repeat(16, minmax(calc(16.6667% - 20px), 1fr));
        grid-gap: 10px;
        width: 98%;
        margin: 0 auto;
    }

    .book {
        flex: 0 0 calc(16.6667% - 20px);
        background-color: #f5f5f5;
        border-radius: 10px;
        text-align: center;
        box-sizing: border-box;
        transition: transform 0.3s ease;
        overflow: hidden;
        margin-bottom: 2vh; /* Add space below each book */
        opacity: 1;
        transition: opacity 0.3s ease;
    }

    .book-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .book-title {
        font-size: 14px;
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .book-link {
        text-decoration: none;
        color: inherit;
    }

    .book:empty {
        opacity: 0;
    }

    @media screen and (max-width: 767px) {
        .carousel {
            grid-template-columns: repeat(4, 1fr);
        }

        .book {
            flex: 0 0 calc(25% - 20px);
        }

        .book-title {
            font-size: 12px; /* Adjust the font size for smaller screens */
        }
    }

    @media screen and (min-width: 768px) {
        .carousel {
            grid-template-columns: repeat(6, 1fr);
        }

        .book {
            flex: 0 0 calc(12.5% - 20px);
        }
    }
</style>

<div class="carousel">
    <?php foreach ($books as $book) : ?>
        <div class="book">
            <a href="/books/{{$book->book_ID}}" class="book-link">
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
    const bookWidth = totalWidth / 12;
    // Calculate the margin-left for each book element
    const marginLeft = bookWidth / 2;

    // Set the margin-left property for each book element
    const bookElements = document.querySelectorAll('.book');
    bookElements.forEach(book => {
        book.style.marginLeft = `${marginLeft}px`;
    });
</script>
