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

</style>
<x-navbar />
<div class="container">
    @if(isset($details))
        <h2>Search results for your query: <b>{{ $query }}</b></h2>

        @foreach($details as $book)
        <div class="book-card">
            <div class="book-image">
                <img src="{{ asset($book->image_path) }}" alt="Book Cover">
            </div>
            <div class="book-details">
                <h1>{{ $book->name }}</h1>
                <p class="author">{{ $book->author->name }}</p>
            </div>
        </div>
        @endforeach
    @else
    <h2><b>{{$message}}</b></h2>
    @endif
    
</div>
