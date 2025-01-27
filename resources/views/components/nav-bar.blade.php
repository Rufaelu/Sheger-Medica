 <style>
        /* Header styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #33333300;
            padding: 0.8rem 2rem;
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
            color: rgb(98, 98, 98);
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
            color: rgb(149, 147, 147);
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
                z-index: 1000;
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
        <a href="{{route('Home')}}"><div class="logo">Sheger Medica</div></a>
        <nav class="nav">
            <ul class="nav-links">
                @auth<li><a href="{{route('herbs.all')}}">Herbs</a></li>
                <li><a href="{{route('remedies.all')}}">Remedy</a></li>
                <li><a href="#">Practitioners</a></li>

                    <li><a href="{{route('profile.edit')}}">Profile</a></li>
                    @if(Auth::user()->hasRole('admin'))
                        <li><a href="{{route('admin')}}">Dashboard</a></li>
                    @endif
                @else
                    <li><a href="{{route('register')}}">Login/Signup</a></li>
                @endauth
                <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                <li><a href="{{route('about_us')}}">About Us</a></li>
                @auth
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @endauth
            </ul>
            <button class="nav-toggle" aria-label="toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <script>
        // JavaScript to handle the toggle functionality
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('nav-visible');
        });
    </script>

