@extends('main_nav')
@section('main_content')

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <title>Post creating</title>
    </head>
    <div id="form-outer">
        <header id="page-header" class="text-white col-sm-20" style="background-color: #b05858">
            <h1 id="main-heading" class="text-center">Fill the information</h1>
        </header>
        <form id="survey-form" method="POST" action="/questionnaire" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" id="user_id" class="input-field" value="{{ \Illuminate\Support\Facades\Auth::id() }}" required>
            <div class="rowTab">
                <div class="labels">
                    <label id="name-label" for="name"> Full name:</label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="name" id="name" class="input-field" placeholder="Enter your name">
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="pronouns-label" for="pronouns"> Pronouns:</label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="pronouns" id="pronouns" class="input-field" placeholder="Enter your pronouns">
                </div>
                @error('pronouns')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="avatar-label" for="avatar"> Upload avatar:</label>
                </div>
                <div class="rightTab">
                    <input type="file" placeholder="Upload avatar" name="avatar" id="avatar" class="form-control">
                </div>
                @error('avatar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label for="goal">Your goal</label>
                </div>
                <div class="rightTab">
                    <textarea id="goal" class="input-field" style="height:50px;resize:vertical;" name="goal" placeholder="Describe your goal"></textarea>
                </div>
                @error('goal')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="social1-label" for="social1">Social 1:</label>
                </div>
                <div class="rightTab">
                    <input type="url" name="social1" id="social1" class="input-field" placeholder="Enter your url">
                </div>
                @error('social1')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="social2-label" for="social2">Social 2:</label>
                </div>
                <div class="rightTab">
                    <input type="url" name="social2" id="social2" class="input-field" placeholder="Enter your url">
                </div>
                @error('social2')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="social3-label" for="social3">Social 3:</label>
                </div>
                <div class="rightTab">
                    <input type="url" name="social3" id="social3" class="input-field" placeholder="Enter your url">
                </div>
                @error('social3')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="age-label" for="age">Your age</label>
                </div>
                <div class="rightTab">
                    <input type="number" name="age" id="age" min="1" max="99" class="input-field" placeholder="Enter your age">
                </div>
                @error('age')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="job-label" for="job"> Job:</label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="job" id="job" class="input-field" placeholder="Enter your job">
                </div>
                @error('job')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="fav-food-label" for="fav-food"> Favorite food:</label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="fav-food" id="fav-food" class="input-field" placeholder="Enter your favorite food">
                </div>
                @error('fav-food')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="least-fav-food-label" for="least-fav-food"> Least favorite food:</label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="least-fav-food" id="least-fav-food" class="input-field" placeholder="Enter your least favorite food">
                </div>
                @error('least-fav-food')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button id="submit" class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

@endsection

<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

    #form-outer {
        background-color: rgb(250, 250, 250);
        margin: 0 auto;
        border-radius: 4px;
        width: 75%;
        max-width: 900px;
        padding: 10px;
        padding-top: 20px;
    }

    .labels {
        display: inline-block;
        text-align: right;
        width: 40%;
        padding: 5px;
        vertical-align: top;
        margin-top: 10px;
    }

    .rightTab {
        display: inline-block;
        text-align: left;
        width: 48%;
        vertical-align: middle;
    }

    .input-field {
        height: 30px;
        width: 392px;
        padding: 5px;
        margin: 10px;
        border: 1px solid #c0c0c0;
        border-radius: 2px;
    }

    #userAge {
        width: 40px;
    }

    .userRatings,
    input[type="checkbox"] {
        float: left;
        margin-right: 5px;
    }

    #submit {
        background-color: #59ace0;
        border-radius: 4px;
        color: white;
        font-size: 1em;
        height: 40px;
        width: 96px;
        border: 0px solid;
        margin-left: 450px;
        margin-top: 20px;
    }

    .dropdown {
        height: 35px;
        width: 140px;
        padding: 5px;
        margin: 10px;
        margin-top: 15px;
        border: 1px solid #c0c0c0;
        border-radius: 2px;
    }

    .radio,
    .checkbox {
        position: relative;
        left: -43px;
        margin-left: 10px;
        display: block;
        padding-bottom: 10px;
    }

    @media screen and (max-width: 833px) {
        .input-field {
            width: 80%;
        }
        select {
            width: 90%;
        }
    }

    @media screen and (max-width: 520px) {
        .labels {
            width: 100%;
            text-align: left;
        }
        .rightTab {
            width: 80%;
            float: left;
        }
        .input-field {
            width: 100%;
        }
        select {
            width: 100%;
        }
    }

</style>
