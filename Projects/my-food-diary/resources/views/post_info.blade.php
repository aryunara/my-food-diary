@extends('main_nav')
@section('main_content')

<div class="photo-details">
    <div class="photo"><img src="{{ $post->photo->path }}" /></div>
    <div class="avatar"><img src="https://picsum.photos/50/50?image=12" /></div>
    <div class="author">{{ $post->user->username }}</div>
    <div class="date">{{ $post->created_at }}</div>
    <div class="description">{{ $post->description }}</div>
    <div class="like">&hearts;</div>

    <div id="recipe" class="overlay">
        <div class="popup">
            @if(isset($post->recipe))
                <h2>{{ $post->recipe->name }}</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <p>Время приготовления: {{ $post->recipe->cooking_time }} мин.</p>
                    <p>{{ $post->recipe->description }}</p>
                </div>
            @else
                <h2>It's empty here!</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <p>You can ask the author to add a recipe in the comments.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="button-container">
        <p><a class="button" href="#recipe">Recipe</a></p>
    </div>
</div>

@endsection

<style>
    body {
        font-family: Arial, sans-serif;
        background: #ddd;
        display: grid;
        justify-content: center; /* Центрирование по горизонтали */
        align-items: center; /* Центрирование по вертикали */
        height: 100vh; /* Для центрирования по вертикали */
        margin: 0;
    }

    .photo-details {

        /* grid */

        width: 1500px;
        display: grid;
        grid-template-columns: 50% min-content 1fr max-content;
        grid-template-rows: 0 min-content 1fr min-content;
        grid-gap: 10px;
        align-items: center;
        grid-template-areas:
        "photo . . ." /* add padding */
		"photo avatar author date"
		"photo . description description"
		"photo button . like";

        @media (max-width: 700px) {
            grid-template-columns: min-content 1fr 1fr;
            grid-template-areas:
      ". . ." /* add padding */
			"avatar author author"
			"photo photo photo"
			"description description description"
			"date date like";
            padding: 0;
        }

        .photo {
            grid-area: photo;
            align-self: start;
        }

        .description {
            grid-area: description;
        }

        .avatar {
            grid-area: avatar;
        }

        .author {
            grid-area: author;
        }

        .date {
            grid-area: date;
        }

        .button-container {
            grid-area: button; /* Задаем область сетки */
            justify-self: start; /* Выравнивание по горизонтали (слева) */
            align-self: end; /* Выравнивание по вертикали (снизу) */
            padding-left: 10px; /* Добавляем отступ слева */
        }

        .like {
            grid-area: like;
            justify-self: right;
        }

        /* styling */

    / / > * {
        outline: 1px solid black;
        } border: 1px solid #e8e8e8;
        box-shadow: 0 0 8px 0px #dcdcdc;
        padding-right: 10px;

        .photo, .photo img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .avatar img {
            border-radius: 50%;
        }

        .author {
            font-size: 20px;
            color: #706ac1;
        }

        .date {
            font-size: 13px;
            color: #999;
        }

        .description {
            font-size: 16px;
        }

        .like {
            font-size: 30px;
        }

        .button {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 13px;
            padding: 5px 10px;
            border: 1px solid #aaa;
            background-color: #eee;
            background-image: linear-gradient(top, #fff, #f0f0f0);
            border-radius: 2px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
            color: #666;
            text-decoration: none;
            text-shadow: 0 1px 0 #fff;
            cursor: pointer;
            transition: all 0.2s ease-out;

            &:hover {
                border-color: #999;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
            }

            &:active {
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset;
            }
        }

        @media (max-width: 700px) {
            .avatar, .description, .date {
                padding-left: 10px;
            }

            .description, .like {
                padding-right: 10px;
            }
        }

        /* popup */

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            transition: opacity 200ms;
            visibility: hidden;
            opacity: 0;

            &:target {
                visibility: visible;
                opacity: 1;
            }
        }

        .popup {
            margin: 75px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #666;
            width: 600px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
            position: relative;

            .light & {
                border-color: #aaa;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.25);
            }

            h2 {
                margin-top: 0;
                color: #666;
                font-family: "Trebuchet MS", Tahoma, Arial, sans-serif;
            }

            .close {
                position: absolute;
                width: 20px;
                height: 20px;
                top: 20px;
                right: 20px;
                opacity: 0.8;
                transition: all 200ms;
                font-size: 24px;
                font-weight: bold;
                text-decoration: none;
                color: #666;

                &:hover {
                    opacity: 1;
                }
            }

            .content {
                max-height: 400px;
                overflow: auto;
            }

            p {
                margin: 0 0 1em;

                &:last-child {
                    margin: 0;
                }
            }
        }
    }

</style>
