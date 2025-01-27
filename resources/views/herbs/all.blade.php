<title>Herbs</title>

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
        flex-direction: row;
        flex-wrap: wrap;
        margin-right: 15px;
    }
    .card {
    max-width: 50%;
    width: 20vw;
    height: auto; /* Allow the card's height to adjust to fit all content */
    margin-bottom: 40px;
    margin-right: 8px;
    padding: 10px; /* Add padding to create spacing inside the card */
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    display: flex;
    flex-direction: column; /* Stack items vertically */
    flex-wrap: wrap; /* Prevent child elements from wrapping */
    overflow: hidden; /* Hide overflow if the card has fixed dimensions */
    background-color: #fff; /* Ensure content is visible */
}


    .profile-picture {
        height: auto;
    }

    .name-holder {
        color: #69d34b;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
        font-size: 20px;
        margin-bottom: 30px;
    }



    .info {
    margin-left: 0; /* Remove extra margins since `.card` now has padding */
    margin-right: 0;
    padding: 10px; /* Add internal spacing for text */
    height: 40vh; /* Allow content to determine the height */
    font-size: 17px;
    display: flex;
    flex-direction: column; /* Stack text vertically */
    justify-content: flex-start; /* Start content from the top */
    align-items: flex-start; /* Align text to the left */
    overflow-wrap: break-word; /* Ensure long words break */
    word-wrap: break-word; /* Legacy property for word wrapping */
    word-break: break-word; /* Break long words if necessary */
    white-space: normal; /* Allow multi-line text */
    text-align: left; /* Align text to the left */
    overflow:scroll;
}
.info::-webkit-scrollbar {
    display: none;
}

    p {
        margin-bottom: 8px;
        overflow-wrap: break-word;
        word-wrap: break-word;
        white-space: normal;
        text-align: left;
    }





    img {
        border: 1px solid black;
        height: 110px;
        max-width: 40%;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 33%;

    }

    @media(max-width:980px) {
        main {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .card {
            max-width: 92%;
        }
    }

    @media(max-width:660px) {
        main {
            margin-left: 7%;
            grid-template-columns: 1fr 1fr;
        }

        .card {
            max-width: 85%;
        }
    }

    @media(max-width:460px) {
        main {
            margin-left: 7%;
            grid-template-columns: 1fr;
        }

        .card {
            max-width: 85%;
        }
    }
    span{
        font-weight: bold;
        font-size: 18px;
        margin-right: 5px;
    }
</style>

<div>
    <x-navbar />

    <main>

        @foreach ($herbs as $herb)
            <div class="card">

                <div class="profile-picture">
                    <img src="{{ asset($herb->image_path) }}">
                </div>

                <div class="name-holder">
                    <h3>{{ $herb->local_name }}</h3>
                    <p>
                    <h4>aka</h4>{{ $herb->scientific_name }}</p>
                </div>

                <div class="info">
                    <p><span>Region:</span> {{ $herb->region }}</p>
                    <p><span>Benefit:</span> {{ $herb->benefits }}</p>
                    <p><span>Risk:</span> {{ $herb->risks }}</p>
                </div>

            </div>
        @endforeach

    </main>

</div>
