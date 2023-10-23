<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: left; /* Center the content horizontally */
            padding: 20px;
            margin: 10;
            margin-bottom: 0;

            padding-top: 4%;
            padding-bottom:0;
            background-color: #f5f5f5;
            border-radius: 10px;
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: left; Center the content horizontally */
        }

        .left {
            flex: 1;
            margin-right: 20px;
        }

        .right {
            flex: 1;
            text-align: left; /* Center text in the right column */
        }

        .image {
            max-width: 50%; /* Ensure the image doesn't overflow the container */
            height: auto; /* Maintain image aspect ratio */
            left:0;
        }

        .placeholder {
            margin-top: 0px;
            padding: 20px; /* Reduced padding for responsiveness */
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
            overflow: auto;
            margin-bottom: 20px;
            margin-top: 0;
            margin-bottom: 20px;
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

            /* Initially hide the chapters */
            .placeholder {
                display: none;
            }

            /* Style the button */
            .show-chapters-button {
                background-color: #007BFF;
                color: #fff;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
            }

            /* When the button is clicked, show the chapters */
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

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="left">
                <img src="{{ asset( $book->image_path) }}" alt="Book Cover" class="image">
            </div>
            <div class="right">
                <h1 style="font-size: 24px; font-weight: bold;">{{ $book->name }}</h1>
                <p style="font-size: 16px; font-style: italic;">{{ $author->name }}</p>
                <p style="font-size: 18px;"><html>{{ $book->description }}</html></p>
            </div>
        </div>
    </div>
    
    <div class="container" style="background-color: #ffffff; padding-top:0;">
        <div class="header">
            <!-- Add clickable links for "About" and "Table of Contents" -->
            <h2 class="toggle-link active" data-content="about">About</h2>
            <p style="margin: 0 10px;">‏‏‎ ‎</p>
            <h2 class="toggle-link inactive" data-content="contents">Table of Contents</h2>
        </div>
        
        <!-- About Content -->
        <div class="about-content">
        <h3><html>{!! $book->Description !!}</html></h3>

        </div>

<!-- Table of Contents Content -->
<div class="contents-content" style="display: none;">
    @php
    // Sort the chapters by numeric position
    $sortedChapters = $chapters->sort(function($a, $b) {
        // Extract numbers from the chapter names
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

        // Compare the numeric values
        return $numA <=> $numB;
    });
    @endphp

    @foreach ($sortedChapters as $chapter)
        <a class="chapter-link" href="{{$book->book_ID}}/{{$sortedChapters->search($chapter) + 1}}">{{$chapter->chapter_name}}</a>
    @endforeach
</div>




    </div>
</body>
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
</html>
