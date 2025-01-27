<title>Remedy Catalog</title>

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
        flex-direction: row;
        flex-wrap: wrap;
        margin-right: 15px;
        grid-template-columns: 1fr 1fr;

    }


    .card{
    max-width:90%;
    width:fit-content ;
    height: auto;
    margin-bottom: 40px;
    margin-right: 8px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
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

.info{
    color:var(--black) ;
    margin-top: 20px;
    margin-left:10px;
    margin-right:10px;
    padding-right: 10px;
    font-size:17px ;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    width: fit-content;
    overflow: wrap;
}

.desc{
    visibility: hidden;
}

.info:hover .desc{
    visibility: visible;
}

.info:hover h2{
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
    flex-wrap: wrap;
  }
}


.remedies{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
span{
    font-weight: bold;
    font-size: 22px;
    margin-right: 5px;
}
</style>

<div>
    <x-navbar />

    <main>


            @foreach ($remedies as $remedy)
            <div class="card">
            <div class="info">
                <h2>{{ $remedy->title }}</h2>
                <p class="desc"><span>Preparation Steps:</span> {{ $remedy->preparation_steps }}</p>
                <p class="desc"><span>Dosage:</span> {{ $remedy->dosage }}</p>
                <p class="desc"><span>Ailment:</span> {{ $remedy->ailment }}</p>
                <p class="desc"><span>Posted By:</span> {{ $remedy->user->first_name . ' ' . $remedy->user->last_name }}</p>
            </div>
        </div>
            @endforeach











    </main>

</div>
