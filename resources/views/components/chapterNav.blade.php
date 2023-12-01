@props(['chapters','chapter','prev','next',"indexes"])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
</head>
<body>
    <div class="chapterNav">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="burger-menu" data-bs-toggle="dropdown" aria-expanded="false">
                &#9776;
            </button>
            <ul class="dropdown-menu dropdown-menu-up" aria-labelledby="burger-menu">
                @foreach ($indexes as $index)
                
                    <li>
                        <a class="dropdown-item" href="/books/{{$chapter->book_ID}}/{{$index+1}}">
                            {{$chapters[$index]["chapter_name"] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="chapter-name" id="chapter-name">{{$chapter->chapter_name}}</div>
        <div class="message-box" id="message-box">This is the first/last chapter.</div>

        <div class="navigation-button">
            <button class="button" id="previous-chapter">&#60;</button>
            <button class="button" id="next-chapter">&#62;</button>
        </div>
    </div>
    
<script>
    const prevButton = document.getElementById("previous-chapter");
        const nextButton = document.getElementById("next-chapter");
        const messageBox = document.getElementById("message-box");



        prevButton.addEventListener("click", function() {
            if ({{$prev}} === -1) {
                messageBox.style.display = "block";
                messageBox.textContent = "This is the first chapter.";
                messageBox.classList.add("active"); // Show the message box and add the "active" class
            } else {
                messageBox.classList.remove("active");
                navigateToChapter({{$prev}});
            }
        });

        nextButton.addEventListener("click", function() {
            if ({{$next}} === -1) {
                messageBox.style.display = "block";
                messageBox.textContent = "This is the last chapter.";
                messageBox.classList.add("active"); // Show the message box and add the "active" class
            } else {
                messageBox.classList.remove("active");
                navigateToChapter({{$next}});
            }
        });

        function navigateToChapter(chapter) {
            const currentUrl = window.location.href;
            const parts = currentUrl.split('/');
            parts[parts.length - 1] = chapter.toString();
            const newUrl = parts.join('/');
            window.location.href = newUrl;
        }
    
        // Added event listener to handle chapter navigation via dropdown
        document.querySelectorAll('.dropdown-item').forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const href = e.target.getAttribute('href');
                window.location.href = href;
            });
        });
    
    </script>
    
</body>
</html>
