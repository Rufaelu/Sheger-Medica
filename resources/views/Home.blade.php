

<html>

    <title>Home</title>

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
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        margin-right: 15px;
    }

    .card{
        max-width:24%;
        height: auto;
        margin-bottom: 40px;
        margin-right: 8px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .profile-picture{
        height:auto;
    }

    .name-holder{
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
        font-size: 20px;
        margin-bottom: 30px;
    }

    span{
        font-weight: bold;
        font-size: 22px;
        margin-right: 5px;

    }

    .info{
        margin-left:20px;
        font-size:17px ;
        margin-bottom: 20px;
    }

    p{
        margin-bottom: 8px;
    }

    .book-now{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    button{
        width: 150px;
        height: 40px;
        font-size: 17px;
        border: none;
        border-radius: 20px;
        color:var(--white);
        background-color: var(--green) ;
        margin-bottom: 15px;
        transition: all ease 0.5s;

    }

    button:hover{
        cursor: pointer;
        box-shadow: 0 4px 8px 0 rgba(105, 211, 75, 0.5), 0 6px 20px 0 rgba(105, 211, 75, 0.5);
    }

    img{
        border: 1px solid black;
        height: 110px;
        max-width:40%;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 33%;
        border-radius: 80px;
    }

    @media(max-width:980px){
        main{
        grid-template-columns: 1fr 1fr;
        }

        .card{
            max-width:92%;
      }
    }

    @media(max-width:660px){
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
        <div class="herbs">
            <h1>Herbs</h1>
        </div>


        <div class="remedies">
            <h1>Remedies</h1>
        </div>

        <div class="articles">
            <h1>Articles</h1>
        </div>

        <div class="practitioners">
            <h1>Practitioners</h1>
        @foreach ($practitioners as $practitioner)
   <div class="card">

            <div class="profile-picture">
                <img src="{{ $practitioner->profile_picture?? asset('images/Profile/Profile.jpg') }}">
            </div>

            <div class="name-holder">
               <span>{{$practitioner->first_name}} {{$practitioner->last_name}}</span>
            </div>

            <div class="info">
                <p>Speciality: {{$practitioner->specialties}}</p>
                <p>Contact Info: {{$practitioner->email}}</p>
              <p>Herb Posted: {{$practitioner->herbs_posted}}</p>
              <p>Remedy Posted: {{$practitioner->remedies_posted}}</p>
              <p>Article Posted: {{$practitioner->articles_posted}}</p>
            </div>

            <div class="book-now">
                <a href=""><button>See Profile</button></a>
                {{-- <a href="{{route('practitioner.show', $practitioner->id)}}"*/><button>See Profile</button></a> --}}
            </div>
        </div>
        @endforeach

    </main>

</div>


</html>
