<style>/* Header styles */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        padding: 1rem 2rem;
        color: white;
        position: relative;
    }

    .header .logo {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .nav {
        display: flex;
        align-items: center;
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 1.5rem;
    }

    .nav-links a {
        text-decoration: none;
        color: white;
        font-size: 1rem;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #f7327a;
    }

    .nav-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .nav-links {
            display: none;
            flex-direction: column;
            background-color: #333;
            position: absolute;
            top: 100%;
            right: 0;
            width: 100%;
            text-align: center;
            padding: 1rem 0;
        }

        .nav-links.nav-visible {
            display: flex;
        }

        .nav-toggle {
            display: block;
        }
    }
</style>
<header class="header">
    <div class="logo">Sheger Medica</div>
    <nav class="nav">
        <ul class="nav-links">
            <li><a href="#">Herbs</a></li>
            <li><a href="#">Remedy</a></li>
            <li><a href="#">Practitioners</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <button class="nav-toggle" aria-label="toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>
