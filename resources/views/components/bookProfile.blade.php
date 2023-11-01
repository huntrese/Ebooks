<!DOCTYPE html>
<html>
<STYle>  
    .header {
        margin-top: 1vh;
        display: flex;
        flex-wrap: wrap;
    }
    
    .left {
        flex: 1;
        margin-right: 20px;
    }
    
    .right {
        flex: 1;
        text-align: left;
    }
    
    .image {
        max-width: 50%;
        height: auto;
        left: 0;
    }
    
    .placeholder {
        margin-top: 0px;
        padding: 20px;
        background: #f5f5f5;
        border-radius: 0 0 10px 10px;
    }
    
    .chapter-title {
        padding: 10px 0;
        width: 100%;
        text-align: center;
        font-size: 20px;
        padding-bottom: 0px;
    }
    
    pre {
        background-color: #f5f5f5;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: 'Lora';
        font-size: 18px;
        line-height: 1.4;
        white-space: pre-wrap;
        overflow: auto; /* Add this line to enable scrollbar */
        max-height: 300px; /* Add a max-height to limit the scrollbar's height */
        margin-bottom: 20px;
        margin-top: 0;
    }
    
    .toggle-link {
        text-decoration: none;
        cursor: pointer;
    }
    
    .toggle-link.active {
        color: #007BFF;
    }
    
    .toggle-link.inactive {
        color: #888888;
    }
    
    .chapter-link {
        display: inherit;
        padding: 10px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        background-color: #f0f0f0;
        color: #333;
    }
    
    /* Media queries for responsiveness */
    @media screen and (max-width: 768px) {
        .left {
            flex: 1;
            margin-right: 0;
        }
        .right {
            flex: 1;
        }
        .image {
            max-width: 100%;
        }
        .chapter-title {
            font-size: 18px;
        }
        pre {
            font-size: 16px;
        }
        .placeholder {
            display: none;
        }
        .show-chapters-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        #chapters:target + .placeholder {
            display: block;
        }
        .about-content {
            display: block;
            padding-bottom: 8vh;
        }
        .contents-content {
            display: none;
            padding-bottom: 8vh;
        }
    }
    </STYle>

<body>
    <div class="container">
        <div class="header">
            <div class="left">
                <img src="{{ asset( $book->image_path) }}" alt="Book Cover" class="image">
            </div>
            <div class="right">
                <h1 class="book-title">{{ $book->name }}</h1>
                <p class="author-name">{{ $author->name }}</p>
                <p class="book-description"><html>{{ $book->description }}</html></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="header">
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
