@extends('main_nav')
@section('main_content')

    <div class="instagram-post">
        @foreach($posts as $post)
                <?php $photo = $post->photo; ?>
            <div class="instagram-post">
                <div class="instagram-post-top">
                    <div class="instagram-post-avatar">
                        <img src="https://placehold.it/100x100">
                    </div>
                    <div class="instagram-post-name">
                        {{ $post->user->username }}
                    </div>
                    <div class="instagram-post-date">
                        {{ $post->created_at }}
                    </div>
                    <div class="instagram-post-bookmark">
                        <span class="th th-bookmark-1-o"></span>
                    </div>
                </div>
                <div class="instagram-post-image">
                    <img src="{{ $photo->path }}">
                </div>
                <div class="instagram-post-bottom">
                    <div class="instagram-post-desc">
                        {{ $post->description }}
                    </div>
                </div>
                <div class="instagram-post-icons">
                    <span class="th th-heart-1-o"></span>
                    <span class="th th-chat-bubble-o"></span>
                    <span class="th th-share-o"></span>
                </div>
                <div class="instagram-post-likes">
                    2300 <span>likes</span>
                </div>
                <div class="instagram-post-comment">
                    <div>Add a comment <span>∙∙∙</span></div>
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
        width: 440px;
        margin: 0 auto;
        background-color: #ffffff;
        overflow: hidden;
        cursor: default;
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
        height: 40px;
        width: 40px;
        overflow: hidden;
        border-radius: 100%;
    }
    .instagram-post-name {
        position: absolute;
        top: 16px;
        left: 60px;
        font-family: montserrat alternates;
        text-transform: lowercase;
        font-weight: bold;
        color: #909090;
        font-size: 12px;
    }
    .instagram-post-date {
        position: absolute;
        right: 56px;
        top: 25px;
        font-family: montserrat alternates;
        font-size: 8px;
        font-weight: bold;
        color: #bebebe;
    }
    .instagram-post-bookmark {
        position: absolute;
        right: 20px;
        top: 18px;
        font-size: 24px;
        color: #cecece;
    }
    .instagram-post-image {
        position: relative;
    }
    .instagram-post-image img {
        max-width: 440px;
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
        width: 350px;
        height: 50px;
        margin: 20px auto 0 auto;
        border-bottom: 1px solid #dedede;
        overflow: hidden;
    }
    .instagram-post-desc div {
        position: relative;
        font-family: montserrat;
        font-size: 10px;
        color: #707070;
    }
    .instagram-post-desc div name {
        display: inline-block;
        margin-right: 3px;
        font-family: montserrat alternates;
        font-size: 12px;
        font-weight: bold;
        color: #e1cbcf;
    }
    .instagram-post-desc div i {
        color: #e1cbcf;
    }
    .instagram-post-icons {
        position: absolute;
        width: 200px;
        height: 30px;
        left: 44px;
        margin-top: 10px;
        overflow: hidden;
    }
    .instagram-post-icons span {
        display: inline-block;
        margin-right: 8px;
        font-size: 20px;
        color: #cecece;
    }
    .instagram-post-likes {
        position: absolute;
        right: 50px;
        margin-top: 13px;
        text-align: right;
        font-family: montserrat alternates;
        font-size: 12px;
        font-weight: bold;
        color: #aeaeae;
    }
    .instagram-post-likes span {
        color: #e1cbcf;
    }
    .instagram-post-comment {
        position: relative;
        width: 350px;
        height: 20px;
        padding-top: 18px;
        margin: 40px auto 0 auto;
        border-top: 1px solid #dedede;
    }
    .instagram-post-comment div {
        font-family: montserrat;
        font-size: 12px;
        color: #909090;
    }
    .instagram-post-comment div span {
        display: inline-block;
        position: absolute;
        right: 0px;
        margin-top: -10px;
        font-size: 30px;
    }
</style>
