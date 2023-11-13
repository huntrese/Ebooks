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
</style>
<x-navBar/>
<div class="container">
    <h1>{{ $author->name }}</h1>
    
    <p>{{ $books->count() }} {{ $books->count() === 1 ? 'book' : 'books' }} by this author</p>

    <h2>Books by {{ $author->name }}:</h2>
    <ul>
        <div class="books-content">
            @if(isset($books))
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
    </ul>
</div>