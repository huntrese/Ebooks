<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>

        /* Profile Container Styles */
        #profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f7f7f7;
            padding: 20px;
            margin-top: 10vh;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Profile Picture Styles */
        #profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 4px solid #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        /* Nickname Styles */
        #nickname {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Description Styles */
        #description {
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Settings Button Styles */
        #settings-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
        }

        /* Modal Content Styles */
        #modal-content {
            background-color: #fff;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        /* Close Button Styles */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        /* Settings Label Styles */
        .settings-label {
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        /* Settings Option Styles */
        .settings-option {
            margin-bottom: 15px;
            text-align: left;
        }

/* Unified Button Styles */
.settings-button, .clear-favorites-button, .logout-button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    margin-bottom: 15px;
}

/* Red Hue for Log Out Button */
.logout-button {
    background-color: #FF0000;
}

    </style>
</head>

<x-navbar />

<body>
    <div id="profile-container">
        <img src="{{$account->avatar}}" alt="Profile Picture" id="profile-picture">
        <div id="nickname">{{$account->nickname}}</div>
        <div id="description">
          {{ $account->description}}
        </div>
        <button id="settings-button" onclick="openModal()">Open Settings</button>
    </div>

    <!-- Settings Modal -->
    <div class="modal" id="settingsModal">
        <div id="modal-content">
            <span class="close-button" onclick="closeModal()">&#10006;</span>
            <h2>Settings</h2>


            <div class="settings-option">
                <button class="settings-button">Upload a new picture</button>
            </div>


            <div class="settings-option">
                <button class="settings-button">Edit your description</button>
            </div>


            <div class="settings-option">
                <button class="clear-favorites-button">Clear Recents</button>
            </div>

            <!-- Log Out Button -->
            <div class="settings-option">
                <button class="logout-button">Log Out</button>
            </div>

        </div>
    </div>
    <br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

    <script>
        function closeModal() {
            document.getElementById('settingsModal').style.display = 'none';
        }

        function openModal() {
            document.getElementById('settingsModal').style.display = 'block';
        }

        const uploadButton = document.querySelector(".settings-button");

uploadButton.addEventListener("click", () => {
    // Create an input element to select a file
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.addEventListener('change', (event) => {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            // Send the file to the server for processing using AJAX or fetch
            // You'll need a server-side endpoint to handle the file upload
            alert(`Uploading file: ${selectedFile.name}`);
        }
    });
    fileInput.click(); // Trigger the file input dialog
});
const editDescriptionButton = document.querySelector(".settings-button");

editDescriptionButton.addEventListener("click", () => {
    // Display a modal or input field for the user to edit their description
    const newDescription = prompt("Edit your description:");
    if (newDescription !== null) {
        // Send the new description to the server for updating the user's profile
        alert(`Description updated: ${newDescription}`);
    }
});
const clearRecentsButton = document.querySelector(".clear-favorites-button");

clearRecentsButton.addEventListener("click", () => {
    const confirmed = confirm("Are you sure you want to clear your recents?");
    if (confirmed) {
        // Implement the logic to clear the recents (e.g., making an AJAX request)
        alert("Recents cleared.");
    }
});
    const logoutButton = document.querySelector(".logout-button");

    logoutButton.addEventListener("click", () => {
        // Send a request to log the user out
        fetch('{{ route('logout') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(response => {
            if (response.status === 200) {
                // Redirect the user to the login page or perform other actions as needed
                window.location.href = '{{ route('login') }}'; // Redirect to the login page
            } else {
                // Handle errors or show a message to the user
                console.error('Logout failed');
            }
        });
    });




    </script>
</body>

</html>
