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
        <button id="settings-button" onclick="openModal('settingsModal')">Open Settings</button>
    </div>

    <!-- Settings Modal -->
    <div class="modal" id="settingsModal">
        <div id="modal-content">
            <span class="close-button" onclick="closeModal('settingsModal')">&#10006;</span>
            <h2 class="text-center mb-3">Settings:</h2>


            <div class="settings-option">
                <h3>
                    Upload a new Avatar
                </h3>
                <div class="settings-button">
                    <form action="/update-profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            
                            <label for="avatar" class="file-label"></label>
                            <input type="file" name="avatar">
                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            


            <div class="settings-option">
                <button class="settings-button" onclick="openModal('descriptionModal')">Edit your description</button>
                <div class="modal" id="descriptionModal">
                    <div id="modal-content">
                        <span class="close-button" onclick="closeModal('descriptionModal')">&#10006;</span>
                        <h2 class="text-center mb-3">New Description:</h2>
                        <form action="/update-profile" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="settings-option">
                <form action="/update-profile" method="POST">
                    @csrf
                    <input type="hidden" name="clearFavorites" value="true">
                    <button type="submit" class="clear-favorites-button">Clear Recents</button>
                </form>
            </div>

            <!-- Log Out Button -->
            <div class="settings-option">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button" >Log Out</button>
                </form>
            </div>

        </div>
    </div>
    <br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

    <script>
        function closeModal(modalName) {
            document.getElementById(modalName).style.display = 'none';
        }

        function openModal(modalName) {
            document.getElementById(modalName).style.display = 'block';
        }
    </script>
</body>

</html>
