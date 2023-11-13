<!DOCTYPE html>
<html>

<head>
    <style>
        .book-card {
            display: flex;
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .book-image img {
            width: 150px;
            height: auto;
            margin-right: 10px;
        }

        .book-details {
            flex: 1;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .author {
            font-size: 16px;
            font-style: italic;
            margin-top: 5px;
        }

        .description {
            font-size: 18px;
            margin-top: 10px;
        }

        .book-link {
            text-decoration: none;
            color: inherit;
        }

        /* Toggle styles */
        .header {
            display: flex;
            flex-wrap: wrap;
        }

        .toggle-link {
            margin-right: 20px;
            cursor: pointer;
        }

        .toggle-link.active {
            color: #007BFF;
        }

        .toggle-link.inactive {
            color: #888888;
        }

        .books-content {
            display: block;
        }

        .authors-content {
            display: none;
        }
    </style>
</head>

<body>
    <x-navbar />
    <div class="container">
        <div class="header">
            <h2 class="toggle-link active" data-content="books">Books</h2>
            <h2 class="toggle-link inactive" data-content="authors">Authors</h2>
        </div>
    </div>

    <div class="container">
        <div class="books-content">
            @if(isset($books))
            <h2>Search results for your query: <b>{{ $query }}</b></h2>
            @foreach($books as $book)
            <div class="book-card">
                <a href="/books/{{$book->book_ID}}" class="book-link">
                    <div class="book-image">
                        <img src="{{ asset($book->image_path) }}" alt="Book Cover">
                    </div>
                    <div class="book-details">
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

        <div class="authors-content">
            @if(isset($authors))
            <h2>Search results for your query: <b>{{ $query }}</b></h2>
            @foreach($authors as $author)
            <div class="book-card">
                <a href="/author/{{$author->author_ID}}" class="book-link">
                    <div class="book-image">
                        <img src="{{ asset($author->image_path) }}" alt="Author Image">
                    </div>
                    <div class="book-details">
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
        const toggleLinks = document.querySelectorAll(".toggle-link");
        const booksContent = document.querySelector(".books-content");
        const authorsContent = document.querySelector(".authors-content");

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
