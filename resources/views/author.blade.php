<style>
</style>
<head>
    <title>Author Books</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">
</head>
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
                <a href="{{url('books/' . $book->book_ID)}}" class="book-link">
                    
                    <div class="book-image">
                        <img src="{{ asset($book->image_path) }}" alt="Book Cover">
                    </div>
                    <div class="book-details">
                        <h1 class="book-title">{{ $book->name }}</h1>
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