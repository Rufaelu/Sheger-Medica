
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

    }

    main {
        margin-top: 60px;
        margin-left: 6%;
        margin-right: 5%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        margin-right: 15px;
        overflow: wrap;
    }

    .practitioners {
        display: flex;
        flex-direction: row;

    }
.name-holder {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
        font-size: 20px;
        margin-bottom: 30px;
    }

    span {
        font-weight: bold;
        font-size: 22px;
        margin-right: 5px;

    }

    .info {
        color: var(--black);
        margin-top: 20px;
        margin-left: 10px;
        margin-right: 10px;
        padding-right: 10px;
        font-size: 17px;
        margin-bottom: 0;
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
        cursor: pointer;
        width: 20vw;
        height: fit-content;
        word-wrap: break-word;
        /* Break long words */
        word-break: break-word;
        /* Force word breaking for long words */
        overflow-wrap: break-word;
        /* Prevent overflow by wrapping text */
        max-width: 100%;
        overflow: scroll;
        max-height: 100%;
        /* Ensure it doesn't exceed the container width */
    }

    .info::-webkit-scrollbar {
        display: none;
    }




    button:hover {
        cursor: pointer;
        box-shadow: 0 4px 8px 0 rgba(105, 211, 75, 0.5), 0 6px 20px 0 rgba(105, 211, 75, 0.5);
    }

    img {
        border: 1px solid black;
        height: 110px;
        max-width: 60%;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 33%;
    }

    @media(max-width:980px) {
        main {
            grid-template-columns: 1fr 1fr;
        }

        .card {
            max-width: 92%;
        }
    }

    @media(max-width:660px) {
        main {
            margin-left: 7%;
            grid-template-columns: 1fr;
        }

        .card {
            max-width: 40%;
        }
    }





.profile-picture {
    height: auto;
}

.name-holder {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    font-size: 20px;
    margin-bottom: 30px;
}

span {
    font-weight: bold;
    font-size: 22px;
    margin-right: 5px;

}

.info {
    margin-left: 20px;
    font-size: 17px;
    margin-bottom: 20px;
}

p {
    margin-bottom: 8px;
}

.book-now {
    display: flex;
    align-items: center;
    justify-content: center;
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
    transition: all ease 0.5s;

}

button:hover {
    cursor: pointer;
    box-shadow: 0 4px 8px 0 rgba(105, 211, 75, 0.5), 0 6px 20px 0 rgba(105, 211, 75, 0.5);
}

img {
    border: 1px solid black;
    height: 110px;
    max-width: 40%;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 33%;
    border-radius: 80px;
}
.card {
        max-width: 50vw;
        width: fit-content;
        height: fit-content;
        margin-bottom: 40px;
        margin-right: 8px;
        margin-left: 8px;
        padding-right: 10px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        overflow: wrap;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }



@media(max-width:980px) {
    main {
        grid-template-columns: 1fr 1fr;
    }

    .card {
        max-width: 92%;
    }
}

@media(max-width:660px) {
    main {
        margin-left: 7%;
        grid-template-columns: 1fr;
    }

    .card {
        max-width: 85%;
    }
}
    .practitioners {
        display: flex;
    flex-direction: row;
    flex-wrap: wrap; /* Allows the cards to wrap to the next row */
    width: 89vw; /* Ensures the container spans its parent */
    gap: 16px; /* Adds spacing between cards */
    justify-content: start; /* Aligns cards within the container */
    box-sizing: border-box; /* Ensures padding and borders are included in width/height */
    justify-content: center;

}
</style>

<div>
    <x-navbar />

    <main>
        <h2>Practitioners</h2>

        <div class="practitioners">

            @foreach ($practitioners as $practitioner)
        <div class="card">

            <div class="profile-picture">
                <img src="{{ $practitioner->profile_picture ?? asset('images/Profile/Profile.jpg') }}">
            </div>

            <div class="name-holder">
                <span>{{ $practitioner->first_name }} {{ $practitioner->last_name }}</span>
            </div>

            <div class="info">
                <p><span>Speciality:</span> {{ $practitioner->specialties }}</p>
                <p><span>Contact Info:</span> {{ $practitioner->email }}</p>
                <p><span>Herb Posted:</span> {{ $practitioner->herbs_posted }}</p>
                <p><span>Remedy Posted:</span> {{ $practitioner->remedies_posted }}</p>
                <p><span>Article Posted:</span> {{ $practitioner->articles_posted }}</p>
            </div>
            @auth
                <div class="book-now">
                    <a href="{{ route('practitioner.show', $practitioner->user_id) }}"><button>See
                            Profile</button></a>
                </div>
            @else
                <a href="{{ route('register') }}" style="margin-left: 4vw;"><button>Login to see more</button></a>
            @endauth
        </div>
            @endforeach
        </div>
    </main>
</div>
