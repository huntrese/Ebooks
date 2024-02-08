<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">

</head>

<body>
    <x-navbar />
    <div class="container">
        <div class="search-tab">
            <h2 class="search-toggle-link active" data-content="books">Books</h2>
            <h2 class="search-toggle-link inactive" data-content="authors">Authors</h2>
        </div>
    </div>

    <div class="container">
        <div class="search-books-content">
            @if(isset($books))
            <h2>Search results for your query: <b>{{ $query }}</b></h2>
            @foreach($books as $book)
            <div class="search-book-card">
                <a href="/books/{{$book->book_id}}" class="search-book-link">
                    <div class="search-book-image">
                        <img src="{{ asset($book->image_path) }}" alt="Book Cover">
                    </div>
                    <div class="search-book-details">
                        <h1>{{ $book->name }}</h1>
                        <p class="author">{{ $book->author->name }}</p>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <h2><b>No books found.</b></h2>
            @endif
        </div>

        <div class="search-authors-content">
            @if(isset($authors))
            <h2>Search results for your query: <b>{{ $query }}</b></h2>
            @foreach($authors as $author)
            <div class="search-book-card">
                <a href="/author/{{$author->author_id}}" class="search-book-link">
                    <div class="search-book-image">
                        <img src="{{ asset($author->image_path) }}" alt="Author Image">
                    </div>
                    <div class="search-book-details">
                        <h1>{{ $author->name }}</h1>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <h2><b>No authors found.</b></h2>
            @endif
        </div>
    </div>

    <script>
        // JavaScript to handle the toggle functionality
        const toggleLinks = document.querySelectorAll(".search-toggle-link");
        const booksContent = document.querySelector(".search-books-content");
        const authorsContent = document.querySelector(".search-authors-content");

        toggleLinks.forEach(link => {
            link.addEventListener("click", () => {
                if (!link.classList.contains("active")) {
                    toggleLinks.forEach(toggleLink => {
                        toggleLink.classList.remove("active");
                        toggleLink.classList.add("inactive");
                    });
                    link.classList.add("active");
                    link.classList.remove("inactive");

                    const contentToDisplay = link.getAttribute("data-content");

                    if (contentToDisplay === "books") {
                        booksContent.style.display = "block";
                        authorsContent.style.display = "none";
                    } else if (contentToDisplay === "authors") {
                        booksContent.style.display = "none";
                        authorsContent.style.display = "block";
                    }
                }
            });
        });
    </script>
</body>

</html>
