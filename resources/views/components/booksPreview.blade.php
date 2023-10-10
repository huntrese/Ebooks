@props(['books'])

<style>
    .carousel {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(calc(16.6667% - 20px), 1fr)); /* 6 columns for 6x2, 4 columns for 4x3 */
        grid-gap: 10px;
        width: 98%;
        margin: 0 auto;
    }

    .book {
        flex: 0 0 calc(16.6667% - 20px); /* 16.6667% width for 6 books in a row, minus 20px for margins */
        background-color: #f5f5f5;
        border-radius: 10px;
        text-align: center;
        box-sizing: border-box;
        transition: transform 0.3s ease; /* Add a smooth transition on hover */
        overflow: hidden; /* Hide overflowing text */
    }

    .book img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    /* Adjust font size and text overflow based on viewport width for book title and other text elements */
    .book h2,
    .book p {
        font-size: 14px; /* Default font size */
        white-space: normal; /* Allow text to wrap to the next line */
        overflow: hidden; /* Hide overflowing text */
        text-overflow: ellipsis; /* Add ellipsis (...) for overflow */
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Display up to 2 lines */
        -webkit-box-orient: vertical;
    }

    .book h2 a {
        text-decoration: none; /* Remove default underlining */
        color: inherit; /* Inherit the parent color (black) */
    }

    @media screen and (max-width: 767px) {
        .carousel {
            grid-template-columns: repeat(auto-fit, minmax(calc(25% - 20px), 1fr)); /* 4 columns for 4x3 on smaller screens */
        }

        /* Adjust font size and text overflow for smaller screens */
        .book h2,
        .book p {
            font-size: 14px; /* Smaller font size for smaller screens */
        }
    }
</style>

<div class="carousel">
    <?php
        $directory = getcwd()."/images/";
        // Initialize file count variable
        $filecount = 0;
     
        $files2 = glob($directory . "*");
     
        if ($files2) {
            $filecount = count($files2)-1 ;
        }
    ?>
    
    @foreach ($books as $book)
    <div class="book">
        <a href="/books/{{$book['id']}}">
            <img src="{{ asset('images/' . ($book['id'] < $filecount ? $book['id'] : '4') . '.jpg') }}" alt="Book Cover">
            <h2><a href="{{$book['id']}}">{{ $book['name'] }}</a></h2>
        </a>
    </div>
    @endforeach
</div>
