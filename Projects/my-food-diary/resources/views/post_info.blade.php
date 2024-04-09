@extends('main_nav')
@section('main_content')

    <div class="photo-details">
        <div class="photo">
            <a href="#recipe" style="display: block; width: 100%; height: 100%;">
                <img src="{{ $post->photo->path }}" style="width: 100%; height: 100%; object-fit: cover; overflow: hidden;">
            </a>
        </div>

        <div class="avatar"><img src="https://picsum.photos/50/50?image=12" /></div>

        <div class="author">{{ $post->user->username }}</div>

        <div class="description">
            <div class="commentBox">
                <p class="taskDescription">{{ $post->description }}</p>
            </div>
            <div class="likes">
                <a href="/like-post/{{ $post->id }}" style="position: relative; top: -1px; right: 5px; width: 28px; margin-left: 10px;">
                    <img class="love-icon" src="https://spng.pngfind.com/pngs/s/6-62693_facebook-heart-transparent-facebook-heart-icon-hd-png.png"></a>
                <span>{{ $post->likes->count() }}</span>
                <img class="comment-icon" src="https://www.nicepng.com/png/full/49-499826_png-library-library-comment-transparent-icon-facebook-comment.png">
                <span>{{ $post->comments->count() }}</span>
            </div>
            <div class="actionBox">
                    <ul class="commentList">
                        @php($comments = $post->comments)
                        @foreach($comments as $comment)
                        <li>
                            <div class="commenterImage">
                                <img src="http://placekitten.com/50/50" />
                            </div>
                            <div class="commentText">
                                <span class="date sub-text">{{ $comment->user->username }} {{ $comment->created_at }}</span>
                                <p class="">{{ $comment->text }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                <form class="form-inline" role="form" action="/add-comment" method="POST">
                    @csrf
                    <div class="form-group">
                        @error('text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input class="form-control" type="text" placeholder="Your comment" name="text"/>
                    </div>
                    <input type="hidden" value="{{ $post->id }}" name="post_id" required>
                        @error('post_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}" name="commentator_id" required>
                        @error('commentator_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <div class="form-group">
                        <button class="btn btn-default">Add</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="date">{{ $post->created_at }}</div>

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
    </div>

@endsection

<style>
    body {
        font-family: Arial, sans-serif;
        background: #ddd;
        display: grid;
        margin: 0;
    }

    /*comments*/
    .titleBox label{
        color:#444;
        margin:0;
        display:inline-block;
    }

    .text-danger {
        color: #c21c24;
    }

    .commentBox {
        padding:10px;
        border-top:1px dotted #bbb;
    }
    .commentBox .form-group input[type="text"] {
        width:80%;
    }
    .commentBox .form-group button {
        margin-left: 10px;
    }
    .actionBox .form-group * {
        width:100%;
    }
    .taskDescription {
        margin-top:10px 0;
    }
    .commentList {
        max-height: 300px; /* Установите максимальную высоту, которая вам подходит */
        overflow: auto; /* Разрешить прокрутку при необходимости */
        padding: 0; /* Уберите отступы, чтобы контейнер не выходил за границы */
        list-style: none; /* Уберите маркеры списка */
    }
    .commentList li {
        margin: 10px 0 0;
        padding: 10px; /* Добавьте отступы вокруг каждого комментария */
        background-color: #f9f9f9; /* Добавьте фоновый цвет для отделения комментариев */
    }
    .commentList li > div {
        display:table-cell;
    }
    .commenterImage {
        width:30px;
        margin-right:5px;
        height:100%;
        float:left;
    }
    .commenterImage img {
        width:100%;
        border-radius:50%;
    }
    .commentText p {
        margin:0;
    }
    .sub-text {
        color:#aaa;
        font-family:verdana;
        font-size:11px;
    }
    .actionBox {
        border-top:1px dotted #bbb;
        padding:10px;
    }

    .photo-details {

        /* grid */

        width: 1400px; /* Устанавливаем ширину в 500 пикселей */
        height: 700px; /* Устанавливаем высоту в 400 пикселей */
        display: grid;
        margin-top: 25px;
        margin-left: 250px;
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
            margin-bottom: 10px;
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

        .likes {
            cursor: pointer;
        }

        .likes > a .love-icon {
            position: relative;
            top: -4px;
            width: 16px;
            margin-left: 10px;
        }
        .likes > .comment-icon {
            position: relative;
            top: -4px;
            width: 16px;
            margin-left: 10px;
        }

        .likes > span {
            position: relative;
            top: -7px;
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
