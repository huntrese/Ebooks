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
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        /* Clear Favorites Button Styles */
        .clear-favorites-button {
            background-color: #dddddd;
            color: #212121;
            border: 2px solid #FF0000;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<x-navbar />

<body>
    <div id="profile-container">
        <img src="{{ asset('images/2.jpg') }}" alt="Profile Picture" id="profile-picture">
        <div id="nickname">{{$account->avatar}}</div>
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
    <br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

    <script>
        function closeModal() {
            document.getElementById('settingsModal').style.display = 'none';
        }

        function openModal() {
            document.getElementById('settingsModal').style.display = 'block';
        }
    </script>
</body>

</html>
