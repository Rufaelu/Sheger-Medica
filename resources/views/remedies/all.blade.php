<title>Remedy Catalog</title>

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
        --dark-gray: #333333;
    }

    body {
        background-color: #f4f7fa;
    }

    main {
        margin-top: 60px;
        margin-left: 6%;
        margin-right: 5%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        background-color: #ffffff;
        max-width: 350px;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 3px 8px;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 40px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 12px;
    }

    .card img {
        border-radius: 8px;
        height: 120px;
        width: 120px;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .name-holder {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        color: var(--dark-gray);
        margin-bottom: 10px;
    }

    .info {
        color: var(--dark-gray);
        font-size: 16px;
        margin-bottom: 20px;
        width: 100%;
        text-align: left;
    }

    .info p {
        margin-bottom: 12px;
    }

    .info span {
        font-weight: bold;
        color: var(--blue);
    }

    .desc {
        display: none;
    }

    .info:hover .desc {
        display: block;
        font-size: 14px;
        color: var(--gray);
        margin-top: 5px;
    }

    button {
        background-color: var(--green);
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }

    button:hover {
        background-color: var(--yellow);
        box-shadow: 0 4px 8px 0 rgba(105, 211, 75, 0.5), 0 6px 20px 0 rgba(105, 211, 75, 0.5);
    }

    @media(max-width: 980px) {
        main {
            margin-left: 5%;
            margin-right: 5%;
        }

        .card {
            max-width: 45%;
        }
    }

    @media(max-width: 660px) {
        main {
            margin-left: 10%;
            margin-right: 10%;
            flex-direction: column;
        }

        .card {
            max-width: 100%;
        }
    }
</style>

<div>
    <x-navbar />

    <main>
        @foreach ($remedies as $remedy)
            <div class="card">
                {{-- <img src="{{ asset('images/remedy-placeholder.jpg') }}" alt="{{ $remedy->title }} image"> --}}
                <div class="name-holder">
                    <h3>{{ $remedy->title }}</h3>
                </div>
                <div class="info">
                    <p><span>Preparation Steps:</span> {{ $remedy->preparation_steps }}</p>
                    <p><span>Dosage:</span> {{ $remedy->dosage }}</p>
                    <p><span>Ailment:</span> {{ $remedy->ailment }}</p>
                    <p><span>Posted By:</span> {{ $remedy->user->first_name . ' ' . $remedy->user->last_name }}</p>
                    {{-- <div class="desc">
                        <p><span>Additional Info:</span> Some more details about the remedy.</p>
                    </div> --}}
                </div>
                {{-- <button>Learn More</button> --}}
            </div>
        @endforeach
    </main>
</div>
