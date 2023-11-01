@props(['chapters','chapter','prev','next',"indexes"])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        /* Your existing styles */

        .chapterNav {
            background-color: #fff; /* White navbar background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 0; /* Add padding to the top and bottom of the navbar */
            display: flex;
            justify-content: space-between; /* Align items at each end of the navbar */
            align-items: center; /* Vertically center items */
        }

        .navigation-button {
            display: flex; /* Make the buttons inline */
        }

        .button {
            background-color: #fff; /* Match the chapterNav background color */
            border: none;
            font-size: 24px;
            color: #333;
            cursor: pointer;
            margin: 0.5%;
            border-radius: 50%; /* Circular button */
            width: 40px;
            height: 40px;
            text-align: center;
            transition: 0.3s; /* Add a smooth transition effect */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button:hover {
            background-color: #ddd; /* Change the background color on hover */
        }

        .burger-container {
            display: flex;
            align-items: center;
        }

        .dropdown {
            left:1vw;

        }

        .chapter-name {
            margin-left: 10px;
        }

        .message-box {
            display: none;
            position: absolute;
            left: 50%;
            background-color: rgba(200, 200, 200, 0.8); /* Greyed out background */
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px; /* Rounded corners */
        }

        .chapter-dropdown {
            display: none;
            position: absolute;
            top: 20x; /* Adjust the positioning as needed */
            left: 20px;
            background-color: #ecece8; /* White background for the dropdown */
            box-shadow: 10 4px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .chapter-dropdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .chapter-dropdown ul li {
            display: flex;
        }

        .chapter-dropdown ul li a {
            text-decoration: none;
            color: #333;
        }

        .chapter-tab-button {
            background-color: #fff;
            border: none;
            color: #333;
            cursor: pointer;
            border-radius: 1px;
            padding: 5px 10px;
            padding-left: 4vw;
            margin-left: 10vw;
        }

        .chapter-tab {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 200px;
            box-shadow: 4 4px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
            top: -200px; /* Adjust this value to control the position of the tab */
        }
        .dropdown-menu-up {
        top: auto;
        bottom: 100%;
        /* width: 30vw; */
        max-height: 80vh; /* Adjust the maximum height as needed for scrolling */
        overflow-y: auto; /* Enable vertical scrolling if the content exceeds the maximum height */
    }
    .message-box {
    display: none;
    /* Your existing styles for message box */
    position: absolute;
    /* top: 100%; Position the message box below the chapter name */
    left: 80%;
    z-index: 1; /* Ensure it's behind the chapter name */
}
    </style>
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
