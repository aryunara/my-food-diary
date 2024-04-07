@extends('main_nav')
@section('main_content')

    @foreach($posts as $post)
        @php($photo = $post->photo)
            <div class="instagram-post">
                <div class="instagram-post-top">
                    <div class="instagram-post-avatar">
                        <img src="https://placehold.it/100x100">
                    </div>
                    <a href="/main/{{ $post->user->id }}"><div class="instagram-post-name">
                        {{ $post->user->username }}
                    </div></a>
                    <div class="instagram-post-date">
                        {{ $post->created_at }}
                    </div>
                </div>
                <a href="/post/{{$post->id}}"><div class="instagram-post-image">
                    <img src="{{ $photo->path }}">
                    </div></a>
                <div class="instagram-post-bottom">
                    <div class="likes">
                        <a href="/like-feed/{{ $post->id }}" style="position: relative; top: -5px; left: 5px; width: 27px; margin-left: 10px;">
                            <img class="love-icon" src="https://spng.pngfind.com/pngs/s/6-62693_facebook-heart-transparent-facebook-heart-icon-hd-png.png"></a>
                        <span>{{ $post->likes->count() }}</span>
                        <a href="/post/{{ $post->id }}" style="position: relative; top: -4.5px; left: 5px; width: 27px;">
                            <img class="comment-icon" src="https://www.nicepng.com/png/full/49-499826_png-library-library-comment-transparent-icon-facebook-comment.png"></a>
                        <span>{{ $post->comments->count() }}</span>
                    </div>
                    <div class="instagram-post-desc">
                        {{ $post->description }}
                    </div>
                </div>
            </div>
    @endforeach

@endsection

<style>
    @import url("https://fonts.googleapis.com/css?family=Just+Another+Hand|Lato:400,400i,700,700i|Montserrat+Alternates:400,400i,700,700i|Montserrat:400,400i,700,700i|Permanent+Marker|Shadows+Into+Light|Rock+Salt");

    body {
        background-color: #101010;
    }
    .instagram-avatar img {
        max-height: 100px;
        min-height: 100px;
        max-width: 100px;
        min-width: 100px;
        overflow: hidden;
    }
    .instagram-numbers div {
        position: relative;
        display: inline-block;
        min-width: 120px;
        text-align: center;
        font-family: montserrat alternates;
        font-size: 12px;
        color: #505050;
    }
    .instagram-numbers div span {
        color: #aeaeae;
    }
    .instagram-desc div {
        padding: 5px;
        text-align: justify;
        font-family: montserrat;
        font-size: 9px;
        color: #909090;
    }
    .instagram-desc div b {
        color: #e1cbcf;
        font-size: 10px;
    }
    .instagram-images img {
        max-width: 120px;
        min-width: 120px;
        max-height: 120px;
        min-height: 120px;
        overflow: hidden;
    }

    .instagram-post {
        position: relative;
        height: 600px;
        width: 540px;
        margin: 10px auto;
        background-color: #ffffff;
        overflow: hidden;
        cursor: default;
        font-family: "Roboto";
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1), 0 6px 50px 0 rgba(0, 0, 0, 0.1);
    }
    .instagram-post-top {
        position: relative;
        height: 60px;
        overflow: hidden;
    }
    .instagram-post-avatar {
        position: absolute;
        top: 10px;
        left: 10px;
        height: 50px;
        width: 50px;
        overflow: hidden;
        border-radius: 100%;
    }
    .instagram-post-name {
        position: absolute;
        top: 25px;
        left: 70px;
        font-family: montserrat alternates;
        text-transform: lowercase;
        font-weight: bold;
        color: #909090;
        font-size: 16px;
    }
    .instagram-post-date {
        position: absolute;
        right: 5px;
        top: 30px;
        font-family: montserrat alternates;
        font-size: 12px;
        font-weight: bold;
        color: #bebebe;
    }
    .instagram-post-image {
        position: relative;
    }
    .instagram-post-image img {
        max-width: 540px;
        min-width: 440px;
        max-height: 370px;
        min-height: 370px;
        overflow: hidden;
    }
    .instagram-post-bottom {
        position: relative;
    }
    .instagram-post-desc {
        position: relative;
        margin-top: -5px;
        margin-left: 20px;
    }
    .instagram-post-desc div {
        position: relative;
        font-family: montserrat;
        font-size: 14px;
        color: #707070;
    }
    .instagram-post-desc div i {
        color: #e1cbcf;
    }
    /*likes and comms*/
    .likes {
        cursor: pointer;
        margin-top: -15px;
    }

    .likes > .love-icon {
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
    .buttons {
        display: flex;
        margin-top: 4px;
        border-width: 1px;
        border-color: #ddd;
        border-style: solid none;
    }

    .buttons img {
        width: 20px;
        opacity: 0.5;
        margin-right: 4px;
    }

    .like,
    .comment {
        flex: 1;
        display: flex;
        justify-content: center;
        padding: 8px;
    }

    .like:hover,
    .comment:hover {
        background-color: #ddd;
        cursor: pointer;
    }

</style>
