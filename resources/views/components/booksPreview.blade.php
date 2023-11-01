@props(['books'])

<style>
    .carousel {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(calc(16.6667% - 20px), 1fr));
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

    @media screen and (max-width: 767px) {
        .carousel {
            grid-template-columns: repeat(auto-fit, minmax(calc(25% - 20px), 1fr));
        }

        .book-title {
            font-size: 14px;
        }
    }
</style>


<div class="carousel">
    <?php
        $directory = getcwd() . "/images/";
        $files2 = glob($directory . "*");
        $filecount = count($files2) - 1;
    ?>

    @php $carouselCount = -1; @endphp

    @foreach ($books as $book)
        @php
        $carouselCount++;
        if ($carouselCount >= 12) {
            break;
        }
         @endphp
        <div class="book">
            <a href="/books/{{$book->book_ID}}" class="book-link">
                <img src="{{ asset(''.$book->image_path) }}" alt="Book Cover" class="book-image">
                <h2 class="book-title">{{ $book->name }}</h2>
            </a>
        </div>
    @endforeach
</div>
