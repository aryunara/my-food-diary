@extends('main_nav')
@section('main_content')

<div class="main">

    <a href="/post-creation"><button class="createPost">Create post</button>

        <div class="latest">
            <div class="container">

                @foreach($posts as $post)
                        <?php $photo = $photos->where('id', '=', $post->photo_id)->first(); ?>

                <div class="col-3">

                    <a href="#">
                        <div class="post">

                            <a href="/post"></a><img class="image" src="{{($photo->path)}}" alt="error">

                            <div class="description">
                                <div class="post-title">
                                    <a href="#"><h2>{{$post->description}}</h2></a>
                                </div>
                                <div class="info">
                                    <div class="author">
                                        <span class="date"><h6>{{$post->created_at}}</h6></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
        @endsection

<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:400,900");

    *,
    *:before,
    *:after {
        -webkit-box-sizing: inherit;
        -moz-box-sizing: inherit;
        box-sizing: inherit;
    }

    html {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: "Lato", sans-serif;
        font-size: 1rem;
        margin: 0;
        background: #fff;
        color: #222;
    }

    a {
        color: #ff9697;
        font-weight: 400;
        letter-spacing: 1px;
        text-decoration: none;
        background: #fff;
        padding: 20px 5px;
        display: inline-block;
        width: 100%;
        text-align: center;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        transition: all 0.5s;
    }

    a:hover,
    a:focus {
        text-decoration: underline;
    }

    .toggleNav {
        display: none;
    }

    img {
        width: 100%;
        cursor: pointer;
        -webkit-transition: opacity 0.3s ease-out;
        -moz-transition: opacity 0.3s ease-out;
        transition: opacity 0.3s ease-out;
    }

    img:hover {
        opacity: 0.5;
    }

    .wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }

    .top h1 a {
        font-size: 2rem;
        font-weight: 900;
    }

    h2 {
        font-size: 1.75rem;
    }

    input {
        padding: 10px;
        border: 0;
    }

    section,
    footer {
        text-align: center;
        background: #fff;
        padding: 20px;
        margin: 20px 0;
        font-weight: 100;
    }

    form {
        padding: 20px;
        margin: 20px 0;
    }

    footer {
        border-top: 1px solid #e2e2e2;
    }

    .flex-nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: -webkit-box;
        display: flex;
    }

    .flex-nav li {
        -webkit-box-flex: 3;
        flex: 3;
    }

    .flex-nav li a {
        color: #8b8b8b;
    }

    .flex-nav li a:hover,
    .flex-nav li a:focus {
        color: #222;
    }

    .flex-nav .social {
        -webkit-box-flex: 1;
        flex: 1;
    }

    .gallery ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: -webkit-box;
        display: flex;
        flex-wrap: wrap;
    }

    .gallery li {
        -webkit-box-flex: 1;
        flex: 1 1 50%;
        padding: 12px;
    }

    input {
        padding: 0.75em 2em;
        font-size: 1rem;
    }

    input[type="text"],
    input[type="email"] {
        border: 1px solid #e2e2e2;
    }

    input[type="submit"] {
        background: #222;
        border: 1px solid #222;
        color: #fff;
        cursor: pointer;
        outline: none;
    }

    @media all and (max-width: 768px) {
        .flex-nav li,
        .gallery li {
            flex-basis: 100%;
        }

        .wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .wrapper > * {
            -webkit-box-ordinal-group: 100;
            order: 99;
        }

        .flex-nav {
            -webkit-box-ordinal-group: 2;
            order: 1;
        }

        .toggleNav {
            display: block;
            color: #8b8b8b;
        }

        .toggleNav:hover,
        .toggleNav:focus {
            color: #222;
            text-decoration: none;
        }

        .flex-nav {
            border-bottom: 1px solid #e2e2e2;
        }

        .flex-nav ul {
            display: none;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .flex-nav ul.open {
            display: -webkit-box;
            display: flex;
        }

        .top {
            -webkit-box-ordinal-group: 3;
            order: 2;
        }

        .details {
            -webkit-box-ordinal-group: 4;
            order: 3;
        }
    }

    /*НОВЫЙ*/
    @import url("https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Roboto:300,400,500,700,900");

    * {
        margin: 0;
        padding: 0;
    }

    .description::after {
        content: "";
        clear: both;
        display: table;
    }

    .latest {
        background-color: fafafa;
    }

    .container {
        max-width: 1200px;
        margin: 70px auto;
    }

    .section-title {
        font-family: "Playfair Display";
        font-weight: 300;
        font-size: 24px;
        padding-bottom: 40px;
        padding-left: 15px;
    }

    .col-3 {
        float: left;
        width: calc(100% / 3);
        box-sizing: border-box;
        padding: 0 15px;
    }

    .post {
        background-color: white;
        font-family: "Roboto";
        box-shadow: 0 4px 50px 0 rgba(0, 0, 0, 0.1), 0 6px 50px 0 rgba(0, 0, 0, 0.1);
    }

    .image {
        height: 320px;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        transition: 0.4s ease-in-out;
        position: relative;
    }

    .image.one {
        background-image: url("https://preview.ibb.co/ch7EOd/berries_blueberries_food_160805.jpg");
    }

    .image.two {
        background-image: url("https://preview.ibb.co/nMPAWy/buffet_delicious_dinner_5928.jpg");
    }

    .image.three {
        background-image: url("https://preview.ibb.co/dxaHBy/asparagus_bread_burger_416594.jpg");
    }

    .image > .overlay {
        opacity: 0;
        width: 0%;
        height: 90%;
        position: absolute;
        margin: 15px auto;
    }

    .overlay span {
        color: black;
        font-size: 14px;
        position: absolute;
        text-transform: uppercase;
        font-weight: 400;
        letter-spacing: 2px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid black;
        padding: 15px 40px;
        border-radius: 4px;
        text-align: center;
    }

    .image span:hover {
        color: #e6267c;
        border: 1px solid #e6267c;
    }

    .image:hover {
        overflow: hidden;
    }

    .image:hover > .overlay {
        background: white;
        opacity: 0.7;
        width: 90%;
        height: 90%;
        opacity: 100%;
        position: relative;
        margin: 15px auto;
        transition: 0.4s ease-in-out;
    }

    .categories {
        margin: 30px 20px 20px 20px;
    }

    .categories a {
        display: inline-block;
        text-decoration: none;
        color: #e6267c;
    }

    .categories h3 {
        font-weight: 500;
        font-size: 14px;
        padding-right: 20px;
    }

    .categories h3::after {
        content: "";
        display: block;
        height: 2px;
        width: 0;
        background: #e6267c;
        position: relative;
        margin: 0 0;
        margin-top: 5px;
        opacity: 0;
        transition: 0.4s;
    }

    .categories a:hover h3::after {
        opacity: 1;
        width: 100%;
    }

    .post a {
        text-decoration: none;
    }

    .post h2 {
        font-weight: 500;
        color: darkgrey;
        font-size: 23px;
        padding: 0 20px 20px 20px;
        transition: 0.4s;
    }

    .post h2:hover {
        color: #6c777f;
    }

    .info {
        float: left;
    }

    .icon {
        border-radius: 50%;
        margin-left: 20px;
        margin-bottom: 20px;
        float: left;
    }

    .author {
        float: left;
        padding: 20px;
    }

    .author a {
        text-decoration: none;
        color: darkgrey;
        font-size: 18px;
        transition: 0.4s;
    }

    .author a:hover {
        color: #e6267c;
    }

    .date {
        color: #6c777f;
        margin-top: 20px;
    }


</style>

<script>
    $(function() {
        $('.toggleNav').on('click',function() {
            $('.flex-nav ul').toggleClass('open');
        });
    });
</script>
