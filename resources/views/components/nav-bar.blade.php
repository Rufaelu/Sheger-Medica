
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgba(70, 70, 70, 0);
        padding: 10px 50px;
        border-bottom: 1px solid blue;
        border-radius: 12px;
    }
    header{
        top:0;
        position: fixed;
        width: 100vw;
        margin-left: 0;
        z-index: 1000000;
        background-color: transparent;
    }
    .left-nav, .right-nav {

        margin-top: 3vh;
    }
    .navbar a {
        text-decoration: none;
        /* color: transparent; */
        font-weight: bold;
        margin: 0 15px;
        background-clip: text; /* Clips the text to the background */
    -webkit-text-fill-color: transparent; /* Ensures the text is transparent */
    background-image: inherit;
    }
    .navbar a:hover {
        color: #555;
           transform: scale3d(1.1,1.2,1.2);
    }
    .navbar .logo {
        color: White;
        font-weight: bold;
        font-size: 1.5em;
                transition: ease-in-out .6s;

    }
</style>
<header>
    <div class="navbar">
        <div class="left-nav">
            <a href="#">Herbs</a>
            <a href="#">Remedy</a>
            <a href="#">Practitioners</a>
        </div>
        <a href="#" class="logo">Sheger Medica</a>
        <div class="right-nav">
            <a href="#">Profile</a>
            <a href="{{route('contact us')}}">Contact Us</a>
            <a href="{{route('about us')}}">About Us</a>
        </div>
    </div>
</header>
