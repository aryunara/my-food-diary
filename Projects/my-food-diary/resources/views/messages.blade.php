@extends('main_nav')
@section('main_content')

    <div id="container">
        <aside>
            <header>
                <input type="text" placeholder="search">
            </header>
            <ul>
                @foreach($friends as $friend)
                    <li>
                        <a href="/dialog/{{ $friend->id }}">
                            <div>
                                <h2>{{ $friend->username }}</h2>
                                <h3>
                                    <span class="status orange"></span>
                                    offline
                                </h3>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        @if(!isset($dialog))
            <main>
                <header>
                    <div>
                        <h2>Please select a chat from the list</h2>
                    </div>
                </header>

                <ul id="chat">
                </ul>

                <footer>
                </footer>

            </main>
        @else
            <main>
                <header>
                    <div>
                        <h2>Chat with {{ \App\Models\User::find($friendId)->username }}</h2>
                    </div>
                </header>

                <ul id="chat">
                    @foreach($dialog as $message)
                        @if($message->sender->id == \Illuminate\Support\Facades\Auth::id())
                            <li class="me">
                                <div class="entete">
                                    <h3>{{ $message->created_at->format('h:iA, M d') }}</h3>
                                    <h2>{{ $message->sender->username }}</h2>
                                    <span class="status blue"></span>
                                </div>
                                <div class="message">
                                    {{ $message->text }}
                                </div>
                            </li>
                        @else
                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>{{ $message->sender->username }}</h2>
                                    <h3>{{ $message->created_at->format('h:iA, M d') }}</h3>
                                </div>
                                <div class="message">
                                    {{ $message->text }}
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <footer>
                    <form action="/send-message" method="POST">
                        @csrf
                        @error('text')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea placeholder="Type your message" name="text"></textarea>
                        <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}" name="sender_id" required>
                        @error('sender_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="hidden" value="{{ $friendId }}" name="recipient_id" required>
                        @error('recipient_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button class="btn btn-default">Send</button>
                    </form>
                </footer>

            </main>
        @endif
    </div>

@endsection

<style>

    body {
        background-color: #ffffff;
        font-family: Arial;
    }
    #container {
        width: 1400px;
        height: 750px;
        background-color: #ffffff;
        margin-top: 25px;
        margin-left: 250px;
        font-size: 0;
        border-radius: 5px;
        overflow: hidden;
    }
    aside {
        width: 300px;
        height: 750px;
        background-color: #47584C;
        display: inline-block;
        font-size: 15px;
        vertical-align: top;
    }
    main {
        width: 1100px;
        height: 750px;
        display: inline-block;
        font-size: 15px;
        vertical-align: top;
        background-color: #ffffff;
    }

    aside header {
        padding: 30px 20px;
    }
    aside input {
        width: 100%;
        height: 40px;
        line-height: 50px;
        padding: 0 50px 0 20px;
        background-color: #28382c;
        border: none;
        border-radius: 3px;
        color: #fff;
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
        background-repeat: no-repeat;
        background-position: 170px;
        background-size: 40px;
    }
    aside input::placeholder {
        color: #fff;
    }
    aside ul {
        padding-left:0;
        margin:0;
        list-style-type:none;
        overflow-y:scroll;
        height:690px;
    }
    aside li a {
        padding:10px 10px;
        background-color: #47584C;
    }
    aside li:hover a {
        background-color: #28382c;
    }

    h2,
    h3 {
        margin: 0;
    }
    aside li img {
        border-radius: 50%;
        margin-left: 20px;
        margin-right: 8px;
    }
    aside li div {
        display: inline-block;
        vertical-align: top;
        margin-top: 12px;
    }
    aside li h2 {
        font-size: 14px;
        color: #fff;
        font-weight: normal;
        margin-bottom: 5px;
    }
    aside li h3 {
        font-size: 12px;
        color: #7e818a;
        font-weight: normal;
    }

    .status {
        background-color: #ffffff;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 7px;
    }
    .green {
        background-color: #58b666;
    }
    .orange {
        background-color: #ff725d;
    }
    .blue {
        background-color: #6fbced;
        margin-right: 0;
        margin-left: 7px;
    }

    main header {
        height: 40px;
        padding: 0 20px 30px 40px;
    }
    main header > * {
        display: inline-block;
        vertical-align: top;
    }
    main header img:first-child {
        border-radius: 50%;
    }
    main header img:last-child {
        width: 24px;
        margin-top: 8px;
    }
    main header div {
        margin-left: 10px;
        margin-right: 145px;
    }
    main header h2 {
        font-size: 16px;
        margin-bottom: 5px;
    }
    main header h3 {
        font-size: 14px;
        font-weight: normal;
        color: #7e818a;
    }

    #chat {
        padding-left: 0;
        background-color: #ffffff;
        margin: 0;
        list-style-type: none;
        overflow-y: scroll;
        height: 500px;
        max-width: 1400px;
        border-top: 2px solid #fff;
        border-bottom: 2px solid #fff;
    }
    #chat li {
        padding: 10px 30px;
    }
    #chat h2,
    #chat h3 {
        display: inline-block;
        font-size: 13px;
        font-weight: normal;
    }
    #chat h3 {
        color: #bbb;
    }
    #chat .entete {
        margin-bottom: 5px;
    }
    #chat .message {
        padding: 20px;
        color: #fff;
        line-height: 25px;
        max-width: 90%;
        display: inline-block;
        text-align: left;
        border-radius: 5px;
    }
    #chat .me {
        text-align: right;
    }

    #chat .you .message {
        background-color: #58b666;
        max-width: 100%;
    }
    #chat .me .message {
        background-color: #6fbced;
        max-width: 100%;
    }
    #chat .triangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 10px 10px 10px;
    }
    #chat .you .triangle {
        border-color: transparent transparent #58b666 transparent;
        margin-left: 15px;
    }
    #chat .me .triangle {
        border-color: transparent transparent #6fbced transparent;
        margin-left: 375px;
    }

    main footer {
        height: 155px;
        padding: 0px 10px 60px 20px;
        background-color: #ffffff;
    }
    main footer textarea {
        resize: none;
        border: none;
        display: block;
        width: 95%;
        height: 60px;
        border-radius: 3px;
        padding: 20px;
        font-size: 13px;
        margin-bottom: 13px;
    }
    main footer textarea::placeholder {
        color: #101010;
    }

    main footer .btn-default {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: bold;
        color: #222222;
        vertical-align: top;
        margin-left: 910px;
        margin-top: -50px;
        display: inline-block;
    }

    main footer .text-danger {
        color: #c21c24;
    }

</style>
