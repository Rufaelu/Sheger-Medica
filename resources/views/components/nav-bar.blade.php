
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgba(192, 192, 192, 0.17);
        padding: 10px 50px;
        border-bottom: 1px solid blue;
        border-radius: 12px;
    }
    header{
        top:1vh;
        position: fixed;
        width: 70vw;
        margin-left: 11vw;
    }
    .left-nav, .right-nav {

        margin-top: 3vh;
    }
    .navbar a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        margin: 0 15px;
    }
    .navbar a:hover {
        color: #555;
    }
    .navbar .logo {
        color: blue;
        font-weight: bold;
        font-size: 1.5em;
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
            <a href="#">Contact Us</a>
            <a href="#">About Us</a>
        </div>
    </div>
</header>
