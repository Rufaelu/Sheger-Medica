<style>
    /* Header styles */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #33333339;
        padding: 0.1rem 2rem;
        color: rgb(22, 22, 22);
        position: relative;
        border-radius: 10px;
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
        color: rgb(23, 23, 23);
        font-size: 1rem;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #81f732;
    }

    .nav-toggle {
        display: none;
        background: none;
        border: none;
        color:  rgb(22, 22, 22);
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
            @auth
                <li><a href="#">Profile</a></li>
                   @if(Auth::user()->hasRole('admin'))
            <li><a href="{{route('admin')}}">Dashboard</a></li>
            @endif
            @else
                <li><a href="{{route('register')}}">Login/Signup</a></li>
            @endauth


            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
            @auth
            <li><a href="{{route('logout')}}">Logout</a></li>
            @endauth

        </ul>
        <button class="nav-toggle" aria-label="toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>
