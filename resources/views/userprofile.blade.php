<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 4px solid #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .nickname {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .description {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .settings-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Modal styles */
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

        .modal-content {
            background-color: #fff;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        /* Settings styles */
        .settings-label {
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }

        .settings-option {
            margin-bottom: 15px;
            text-align: left;
        }

        .settings-button {
            background-color: #dddddd;
            color: #212121;
            border: 2px solid #212121;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .clear-favorites-button {
            background-color: #dddddd;
            color: #212121;
            border: 2px solid #FF0000;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        /* Add more styles for other settings buttons if needed */
    </style>
</head>
<x-navbar />
<body>
    <div class="profile-container">
        <img src="{{ asset('images/2.jpg') }}" alt="Profile Picture" class="profile-picture">
        <div class="nickname">JohnDoe123</div>
        <div class="description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae justo ut arcu tempus vehicula.
        </div>
        <button class="settings-button" onclick="openModal()">Open Settings</button>
    </div>

   <!-- Settings Modal -->
<div class="modal" id="settingsModal">
    <div class="modal-content">
        <!-- Close button -->
        <span class="close-button" onclick="closeModal()">&#10006;</span>
        <h2>Settings</h2>

        <!-- Change Profile Picture -->
        <div class="settings-label">Change Profile Picture</div>
        <div class="settings-option">
            <button class="settings-button">Upload a new picture</button>
        </div>

        <!-- Change Description -->
        <div class="settings-label">Change Description</div>
        <div class="settings-option">
            <button class="settings-button">Edit your description</button>
        </div>

        <!-- Security (Change Password) -->
        <div class="settings-label">Security</div>
        <div class="settings-option">
            <button class="settings-button" style="background-color: #FF0000; border: 2px solid #212121;">Change Password</button>
        </div>

        <!-- Clear Favorites -->
        <div class="settings-label">Favorites</div>
        <div class="settings-option">
            <button class="clear-favorites-button">Clear Favorites</button>
        </div>
    </div>
</div>


    </div>

    <script>
        function openModal() {
            var modal = document.getElementById("settingsModal");
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById("settingsModal");
            modal.style.display = "none";
        }
    </script>
</body>
</html>
