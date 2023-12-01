<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">


<body>
    <div class="container">
        <div class="bookProfile-header">
            <div class="left">
                <img src="{{ asset( $book->image_path) }}" alt="Book Cover" class="image">
            </div>
            <div class="right">
                <h1 class="book-title">{{ $book->name }}</h1>
                <p class="author-name">{{ $author->name }}</p>
                <p class="book-description"><html>{{ $book->description }}</html></p>
<div class="button-container">
<!-- Update the "Read" button to use a form -->
<form action="{{ route('read.book', ['book_id' => $book->book_ID]) }}" method="POST">
    @csrf
    <input type="hidden" name="chapter" value="{{ $chapterNumbers[$book->book_ID] ?? 1 }}">
    <button type="submit" class="read-button">Read</button>
</form>
    @if ($isInLibrary)
        <button class="add-to-library-button">Already In Library</button>

    @else
    <form action="{{ route('add.to.library',$book->book_ID) }}" method="POST">
        @csrf
        <input type="hidden" name="book_ID" value="{{ $book->book_ID }}">
        <button type="submit" class="add-to-library-button">Add to Library</button>
    </form>
    @endif
    
</div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="bookProfile-header">
            <h2 class="toggle-link active" data-content="about">About</h2>
            <p style="margin: 0 10px;">‏‏‎ ‎</p>
            <h2 class="toggle-link inactive" data-content="contents">Table of Contents</h2>
        </div>

        <div class="about-content">
            <h3 class="about-description"><html>{!! $book->Description !!}</html></h3>
            </div>

        <div class="contents-content" style="display: none;">
            @php
            $sortedChapters = $chapters->sort(function($a, $b) {
                $numA = 0;
                preg_match('/\d+/', $a->chapter_name, $matchesA);
                if (!empty($matchesA)) {
                    $numA = (int) $matchesA[0];
                }

                $numB = 0;
                preg_match('/\d+/', $b->chapter_name, $matchesB);
                if (!empty($matchesB)) {
                    $numB = (int) $matchesB[0];
                }

                return $numA <=> $numB;
            });
            @endphp

            @foreach ($sortedChapters as $chapter)
                <a class="chapter-link" href="{{$book->book_ID}}/{{$sortedChapters->search($chapter) + 1}}">
                    {{$chapter->chapter_name}}
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>
<script>
    // JavaScript to handle the toggle functionality
    const toggleLinks = document.querySelectorAll(".toggle-link");
    const aboutContent = document.querySelector(".about-content");
    const contentsContent = document.querySelector(".contents-content");

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

                if (contentToDisplay === "about") {
                    aboutContent.style.display = "block";
                    contentsContent.style.display = "none";
                } else if (contentToDisplay === "contents") {
                    aboutContent.style.display = "none";
                    contentsContent.style.display = "block";
                }
            }
        });
    });
</script>
