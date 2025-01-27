<title>Herbs</title>

<style>

    *{
        font-family: Arial, Helvetica, sans-serif;
        margin:0px;
        padding:0px;
        box-sizing: border-box;
    }

    :root {
        --blue: #3b4fff;
        --white: #ffffff;
        --green:#69d34b;
        --yellow:#ffd700;
        --gray:#bcbcbc;

    }

    main{
        margin-top:60px;
        margin-left: 6%;
        margin-right: 5%;
        display: grid;
        margin-right: 15px;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }

    .card{
        max-width:90%;
        height: auto;
        margin-bottom: 40px;
        margin-right: 8px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .profile-picture{
        height:auto;
    }

    .name-holder{
        color: #69d34b;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
        font-size: 20px;
        margin-bottom: 30px;
    }



    .info{
        margin-left:20px;
        font-size:17px ;
        margin-bottom: 20px;
    }

    p{
        margin-bottom: 8px;
    }





    img{
        border: 1px solid black;
        height: 110px;
        max-width:40%;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 33%;

    }

    @media(max-width:980px){
        main{
        grid-template-columns: 1fr 1fr 1fr;
        }

        .card{
            max-width:92%;
      }
    }

    @media(max-width:660px){
        main{
         margin-left: 7%;
        grid-template-columns: 1fr 1fr;
        }

        .card{
        max-width:85%;
      }
    }

    @media(max-width:460px){
        main{
         margin-left: 7%;
        grid-template-columns: 1fr;
        }

        .card{
        max-width:85%;
      }
    }
</style>

<div>
    <x-navbar />

    <main>

        @foreach ($herbs as $herb)
        <div class="card">

            <div class="profile-picture">
                <img src="{{ url('profile.jpg') }}">
            </div>

            <div class="name-holder">
                <b>{{ $herb->local_name }}</b>
                <p><h4>aka</h4>{{ $herb->scientific_name }}</p>
            </div>

            <div class="info">
                <p>Region: {{ $herb->region }}</p>
                <p>Benefit: {{ $herb->benefits }}</p>
                <p>Risk: {{ $herb->risks }}</p>
            </div>

        </div>
        @endforeach

    </main>

</div>
