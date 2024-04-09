@extends('main_nav')
@section('main_content')

    <div class="container">
        <?php if (empty($posts)) { ?>
            <h2>It's empty here! Let's create your first post.</h2>
        <?php } else { ?>
            @foreach($posts as $post)
                <?php $photo = $post->photo; ?>

                    <div class="col-3">
                        <div class="post">
                            <a href="/post/{{ $post->id }}"><img class="image" src="{{ $photo->path }}" alt="send"></a>
                        </div>
                    </div>
            @endforeach
        <?php }; ?>
    </div>

@endsection

<style>
    @import url("https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Roboto:300,400,500,700,900");

    .description::after {
        content: "";
        clear: both;
        display: table;
    }

    .container {
        max-width: 1300px;
        margin: 25px auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Это создаст 3 равные колонки */
        gap: 10px; /* Пространство между колонками */
    }

    .section-title {
        font-family: "Playfair Display";
        font-weight: 300;
        font-size: 24px;
        padding-bottom: 40px;
        padding-left: 15px;
    }

    .col-3 {
        box-sizing: border-box;
        padding: 0 10px;
    }

    .post {
        background-color: white;
        font-family: "Roboto";
        box-shadow: 0 6px 50px 0 rgba(0, 0, 0, 0.1), 0 6px 50px 0 rgba(0, 0, 0, 0.1);
        height: 320px; /* Фиксированная высота элемента .post */
        margin-bottom: 25px;
    }

    .image {
        height: 100%;
        width: 100%;
        object-fit: cover; /* Заполнение контейнера, сохраняя пропорции и обрезая изображение при необходимости */
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        transition: 0.4s ease-in-out;
        position: relative;
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

