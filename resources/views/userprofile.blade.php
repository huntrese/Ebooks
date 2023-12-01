<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css">

</head>

<x-navbar />

<body>
    <div id="profile-container">
        <div id="nickname">{{$account->name }}</div>
        <img src="{{$account->avatar}}" alt="Profile Picture" id="profile-picture">
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


const uploadButton = document.querySelector(".settings-button"); // Select the button for uploading a new picture

uploadButton.addEventListener("click", () => {
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.addEventListener('change', async (event) => {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            try {
                const formData = new FormData();
                formData.append('avatar', selectedFile);

                // Include CSRF token in the headers
                const headers = new Headers();
                headers.append('X-CSRF-TOKEN', '{{ csrf_token() }}');

                // Send the file to the server for processing using Fetch API
                const response = await fetch('/update-profile', {
                    method: 'POST',
                    body: formData,
                    headers: headers // Include headers containing CSRF token
                });

                if (response.ok) {
                    // File uploaded successfully
                    const responseData = await response.json();
                    alert(`File uploaded successfully: ${responseData.message}`);
                    // Update the profile picture or perform other actions as needed
                    document.getElementById('profile-picture').src = responseData.avatarUrl;
                } else {
                    // Handle error if file upload fails
                    throw new Error('File upload failed');
                }
            } catch (error) {
                console.error('Error uploading file:', error);
                alert('File upload failed. Please try again.');
            }
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
