@props(['book'])

<style>
    .container {
        display: flex;
        flex-direction: column; /* Stack sections vertically */
        align-items: flex-start;
        padding: 20px;
        margin: 10; /* Reset margin to 0 */
        padding-top: 4%;
        background-color: #f5f5f5;
        border-radius: 10px;
    }

    .header {
        display: flex;
        flex-wrap: wrap; /* Allow text and image to wrap */
    }

    .left {
        flex: 1;
        margin-right: 20px; /* Add margin to create space between image and text */
    }

    .right {
        /* flex: 1; */
        text-align: left;
    }

    .image {
        max-width: 200%;
        max-height: 100%;
    }

    .fancy-hr {
        width: 100%;
        height: 8px;
        background: linear-gradient(to right, #cccccc, #007BFF, #cccccc);
        border: none;
        margin-top: 20px;
    }

    .placeholder {
        margin-top: 0px;
        padding: 40px;
        background: #f5f5f5; /* Slightly darken the hue */
        border-radius: 0 0 10px 10px; /* Rounded corners only at the bottom */
    }

    .chapter-title {
        /* background: linear-gradient(to bottom, #f5f5f5, #bbbbbb); Gradient background for chapter title */
        padding: 10px 0;
        width:100%;
        text-align: center;
        font-size: 20px;
        padding-bottom: 0px;
    }
</style>

<div class="container">
    <div class="header">
        <div class="left">
            <img src="{{ asset('images/' . $book['id'] . '.jpg') }}" alt="Book Cover" class="image">
        </div>
        <div class="right">
            <h1 style="font-size: 24px; font-weight: bold;">{{ $book['name'] }}</h1>
            <p style="font-size: 16px; font-style: italic;">Author Name</p>
            <p style="font-size: 18px;">Description:</p>
            <p style="font-size: 16px;">{{ $book['description'] }}</p>
            <button style="background-color: #007BFF; color: #fff; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer;">Read Now</button>
        </div>
    </div>
    <div class="chapter-title">
    <hr class="fancy-hr">

        <h1>Chapter 1:</h1>
    </div>
    <div class="placeholder">
        <!-- Your placeholder content here -->
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius enim, id tincidunt quam tincidunt ut. Fusce consectetur sem eget metus dictum, in dictum justo tristique.
    
    </div>
</div>
