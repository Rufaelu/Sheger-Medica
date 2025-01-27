

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
        overflow: wrap;
    }
    .practitioners{
        display: flex;
        flex-direction: row;

    }

    .card{
        max-width:390px;
        margin-bottom: 40px;
        margin-right: 8px;
        margin-left: 8px;
        padding-right: 10px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        overflow: wrap;
    }





.cardrem{
    max-width:70%;
    width:fit-content ;
    height: auto;
    margin-bottom: 100px;
    margin-right: 8px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    display: flex;
    flex-direction: row;
    overflow: wrap;
    transition: all ease 5s;
}

.remedy-picture{
    margin-top: 20px;
    margin-bottom: 20px;
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

.inforem{
    color:var(--black) ;
    margin-top: 20px;
    margin-left:10px;
    margin-right:10px;
    padding-right: 10px;
    font-size:17px ;
    margin-bottom: 0;
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;
    cursor: pointer;
    width: 20vw;
    height: 40vh;
    word-wrap: break-word;       /* Break long words */
    word-break: break-word;      /* Force word breaking for long words */
    overflow-wrap: break-word;   /* Prevent overflow by wrapping text */
    max-width: 100%;
    overflow: scroll;
    max-height: 100%;            /* Ensure it doesn't exceed the container width */
}

    .inforem::-webkit-scrollbar{
        display: none;
    }

.desc{
}

.inforem:hover .desc{
}

.inforem:hover h2{
}




button:hover{
    cursor: pointer;
    box-shadow: 0 4px 8px 0 rgba(105, 211, 75, 0.5), 0 6px 20px 0 rgba(105, 211, 75, 0.5);
}

img{
    border: 1px solid black;
    height:110px;
    max-width:60%;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 33%;
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

    .cardrem{
    max-width:40%;
  }
}


.remedies{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
.herbs{
    display: flex;
    flex-direction: row;
     flex-wrap: wrap;
    height: 60vh;
    /*word-wrap: break-word;       /* Break long words */
    /* word-break: break-word;      /* Force word breaking for long words */
   /* overflow-wrap: break-word;   /* Prevent overflow by wrapping text */
    max-width: auto;
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
    .post-button {
    background: linear-gradient(135deg, #4caf50, #81c784); /* Green gradient */
    color: white;
    font-size: 18px;
    font-weight: bold;
    padding: 12px 24px;
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }

  .post-button:hover {
    background: linear-gradient(135deg, #388e3c, #66bb6a); /* Darker green on hover */
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
  }

  .post-button:active {
    transform: translateY(0);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
        @auth
        @if (Auth::user()->hasRole('practitioner'))
        <a href="{{route('post')}}">
        <button class="post-button">
            Post
          </button>
        </a>
        @endif
        @endauth
        <h4>Herbs</h4>
        <div class="herbs">
            @foreach ($herbs as $herb)
            <div class="cardrem">


                <div class="inforem">
                    <h2 > {{ $herb->local_name }}</h2>
                    <p class="desc"><h4>AKA:</h4> {{ $herb->scientific_name }}</p>
                    <p class="desc"><span>Benefits:</span> {{ $herb->benefits }}</p>
                    <p class="desc"><span>Risks:</span> {{ $herb->risks }}</p>
                    <p class="desc"><span>Posted By:</span> {{ $herb->user->first_name . ' ' . $herb->user->last_name }}</p>
                </div>



            </div>

            @endforeach
        </div>

        <h4>Remedies</h4>
        <div class="remedies">

            @foreach ($remedies as $remedy)
            <div class="cardrem">


                <div class="inforem">
                    <h2>{{ $remedy->title }}</h2>
                    <p class="desc"><span>Herbs:</span> @foreach ($remedy->herbs as $herb)
                        <a href="{{ route('herbs.show', $herb->herb_id) }}" class="text-blue-500 hover:underline">
                            {{ $herb->local_name }}
                        </a>{{ !$loop->last ? ',' : '' }}
                    @endforeach</p>
                    <p class="desc"><span>Preparation Steps:</span> {{ $remedy->preparation_steps }}</p>
                    <p class="desc"><span>Dosage:</span> {{ $remedy->dosage }}</p>
                    <p class="desc"><span>Ailment:</span> {{ $remedy->ailment }}</p>
                    <p class="desc"><span>Posted By:</span> {{ $remedy->user->first_name . ' ' . $remedy->user->last_name }}</p>
                </div>



            </div>

            @endforeach
        </div>
        <h4>Articles</h4>
        <div class="articles">

        </div>
        <h4>Practitioners</h4>
        <div class="practitioners">

        @foreach ($practitioners as $practitioner)
         <div class="card">

            <div class="profile-picture">
                <img src="{{ $practitioner->profile_picture?? asset('images/Profile/Profile.jpg') }}">
            </div>

            <div class="name-holder">
               <span>{{$practitioner->first_name}} {{$practitioner->last_name}}</span>
            </div>

            <div class="info">
                <p><span>Speciality:</span> {{$practitioner->specialties}}</p>
                <p><span>Contact Info:</span> {{$practitioner->email}}</p>
              <p><span>Herb Posted:</span> {{$practitioner->herbs_posted}}</p>
              <p><span>Remedy Posted:</span> {{$practitioner->remedies_posted}}</p>
              <p><span>Article Posted:</span> {{$practitioner->articles_posted}}</p>
            </div>
            @auth
            <div class="book-now">
                <a href="{{route('practitioner.show', $practitioner->user_id)}}"><button>See Profile</button></a>
                {{-- <a href="{{route('practitioner.show', $practitioner->id)}}"*/><button>See Profile</button></a> --}}
            </div>
            @endauth
           <a href="{{route('register')}}" style="margin-left: 4vw;"><button>Login to see more</button></a>
        </div>
        @endforeach

    </main>

</div>


</html>
