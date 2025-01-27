<html>
<title>Home</title>

<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    :root {
        --blue: #3b4fff;
        --white: #ffffff;
        --green: #69d34b;
        --yellow: #ffd700;
        --gray: #bcbcbc;
        --dark-gray: #333;
    }

    body {
        overflow-wrap: break-word;
        width: 100vw;
        overflow: wrap;
        background-color: #f4f4f4;
    }

    main {
        margin-top: 60px;
        margin-left: 6%;
        margin-right: 6%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: space-between;
        width: calc(100% - 12%);
    }

    h4 {
        margin-bottom: 20px;
        font-size: 24px;
        color: var(--blue);
        font-weight: bold;
        text-align: center;
    }

    .practitioners, .remedies, .herbs {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .card {
        max-width: 390px;
        flex: 1 1 calc(33.33% - 20px);
        margin-bottom: 40px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        background-color: var(--white);
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .cardrem {
        width: fit-content;
        padding-inline: 15px;
        padding-top: 15px;
        margin-right: 8px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        display: flex;
        flex-direction: row;
        overflow-wrap: break-word;
        transition: all ease 0.3s;
        border-radius: 10px;
        background-color: var(--white);
    }

    .profile-picture {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .profile-picture img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    .name-holder {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-top: 10px;
        color: var(--blue);
    }

    .info {
        padding: 20px;
        font-size: 17px;
        color: var(--dark-gray);
        line-height: 1.6;
    }

    .info span {
        font-weight: bold;
        color: var(--blue);
    }

    .desc {
        margin-bottom: 12px;
    }

    .book-now {
        display: flex;
        justify-content: center;
        padding-bottom: 15px;
    }

    button {
        width: 150px;
        height: 40px;
        font-size: 17px;
        border: none;
        border-radius: 20px;
        color: var(--white);
        background-color: var(--green);
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }
    a{
        text-decoration: none;
        color: var(--blue);
    }
    a:hover{
        text-decoration: underline;
    }

    button:hover {
        cursor: pointer;
        box-shadow: 0 4px 8px 0 rgba(105, 211, 75, 0.5), 0 6px 20px 0 rgba(105, 211, 75, 0.5);
        background-color: var(--yellow);
    }
h2{
    margin-bottom: 15px;
}
    .post-button {
        background: linear-gradient(135deg, #4caf50, #81c784);
        color: white;
        font-size: 18px;
        font-weight: bold;
        padding: 12px 24px;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .post-button:hover {
        background: linear-gradient(135deg, #388e3c, #66bb6a);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .post-button:active {
        transform: translateY(0);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    @media(max-width:980px) {
        main {
            margin-left: 5%;
            margin-right: 5%;
        }

        .card {
            flex: 1 1 calc(50% - 20px);
        }

        .practitioners, .remedies, .herbs {
            flex-direction: column;
            gap: 16px;
        }
    }

    @media(max-width:660px) {
        .card {
            flex: 1 1 100%;
        }
    }
</style>

<body>
    <x-navbar />

    <main>
        @auth
            @if (Auth::user()->hasRole('practitioner'))
                <a href="{{ route('post') }}">
                    <button class="post-button">
                        Post
                    </button>
                </a>
            @endif
        @endauth

        <h4>Herbs</h4>
        <div class="herbs">
            @foreach ($herbs as $herb)
                <div class="card">
                    <div class="profile-picture">
                        <img src="{{ asset($herb->image_path) }}" alt="{{ $herb->local_name }}">
                    </div>
                    <div class="info">
                        <h2>{{ $herb->local_name }}</h2>
                        <p class="desc"><span>AKA:</span> {{ $herb->scientific_name }}</p>
                        <p class="desc"><span>Benefits:</span> {{ $herb->benefits }}</p>
                        <p class="desc"><span>Risks:</span> {{ $herb->risks }}</p>
                        <p class="desc"><span>Posted By:</span> {{ $herb->user->first_name . ' ' . $herb->user->last_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($remedies->count() > 0)
            <h4>Remedies</h4>
            <div class="remedies">
                @foreach ($remedies as $remedy)
                    <div class="cardrem">
                        <div class="inforem">
                            <h2>{{ $remedy->title }}</h2>
                            <p class="desc"><span>Herbs:</span>
                                @foreach ($remedy->herbs as $herb)
                                    <a href="{{ route('herbs.show', $herb->herb_id) }}" class="text-blue-500 hover:underline">
                                        {{ $herb->local_name }}
                                    </a>{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </p>
                            <p class="desc"><span>Preparation Steps:</span> {{ $remedy->preparation_steps }}</p>
                            <p class="desc"><span>Dosage:</span> {{ $remedy->dosage }}</p>
                            <p class="desc"><span>Ailment:</span> {{ $remedy->ailment }}</p>
                            <p class="desc"><span>Posted By:</span> {{ $remedy->user->first_name . ' ' . $remedy->user->last_name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <h4>Practitioners</h4>
        <div class="practitioners">
            @foreach ($practitioners as $practitioner)
                <div class="card">
                    <div class="profile-picture">
                        <img src="{{ $practitioner->profile_picture ?? asset('images/Profile/Profile.jpg') }}" alt="{{ $practitioner->first_name }}">
                    </div>
                    <div class="name-holder">
                        <span>{{ $practitioner->first_name }} {{ $practitioner->last_name }}</span>
                    </div>
                    <div class="info">
                        <p><span>Speciality:</span> {{ $practitioner->specialties }}</p>
                        <p><span>Contact Info:</span> {{ $practitioner->email }}</p>
                        <p><span>Herbs Posted:</span> {{ $practitioner->herbs_posted }}</p>
                        <p><span>Remedies Posted:</span> {{ $practitioner->remedies_posted }}</p>
                        <p><span>Article Posted:</span> {{ $practitioner->articles_posted }}</p>
                    </div>
                    @auth
                        <div class="book-now">
                            <a href="{{ route('practitioner.show', $practitioner->user_id) }}">
                                <button>See Profile</button>
                            </a>
                        </div>
                    @else
                        <a href="{{ route('register') }}" style="margin-left: 4vw;">
                            <button>Login to see more</button>
                        </a>
                    @endauth
                </div>
            @endforeach
        </div>
    </main>

</body>

</html>
