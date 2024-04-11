@extends('main_nav')
@section('main_content')
    <body>
    <div id="homework-container">
        <div class="head">FRIENDS</div>

        <div class="row filter">
            <form action="/find-friend" method="POST" class="col">
                @csrf
                <input type="text" class="search" id="search-list" placeholder="Enter friend's name" name="find-friend"/>
                <button id="submit-button" type="submit" class="btn btn-primary">
                    Search
                </button>
            </form>

            <form action="/find-user" method="POST" class="col">
                @csrf
                <input type="text" class="search" id="search-list" placeholder="Enter user's name" name="find-user"/>
                <button id="submit-button" type="submit" class="btn btn-primary">
                    Search
                </button>
            </form>
        </div>

        <div class="row">

            <div class="col">
                <h3>Your friends</h3>
                <ul id="friends-filter" class="friends-list">
                        @if(isset($friend))
                            <li>
                                {{ $friend->username }}
                            </li>
                        @elseif(!empty($friends))
                            @foreach($friends as $friend)
                                <li>
                                    {{ $friend->user->username }}
                                </li>
                                <a href="/delete/{{ $friend->friend_id }}"><button>Delete</button></a>
                            @endforeach
                        @else
                            No one was found for your request.
                        @endif
                </ul>
            </div>

            <div class="col">
                <h3>Find user</h3>
                <ul id="friends-filter" class="friends-list">
                        @if(isset($user))
                            <div class="friend-item">
                                <li>
                                    {{$user->username}}
                                </li>
                                <a href="/add/{{$user->id}}"><button>Add</button></a>
                            </div>
                        @else
                            No one was found for your request.
                        @endif
                </ul>
                <a href="/friend-requests"><button>Friend requests</button></a>
            </div>

        </div>
    </div>
    </body>

@endsection

<style>
    body {
        background-color: #a0a0a0;

    }
    #homework-container{
        width: 1400px;
        border-radius:15px;
        background-color:#fff;
        margin-top: 25px;
        margin-left: 250px;
    }
    .head{
        color:#fff;
        font-size: 18px;
        padding-left:18px;
        line-height:52px;
        text-shadow:1px 1px 0 rgba(0, 0, 0, 0.1);
        border-radius:14px 14px 0 0;
        background-color: #da5e3d;
        text-align: center;
    }

    .filter{
        background-color:#f1f1f1;
        height:53px;
    }
    .row{
        width:100%;
    }
    .col{
        width:50%;
        float:left;
        padding:15px;

    }
    .row:before,
    .row:after{
        display:block;
        content:"";
        line-height:0;
        height:0;
        width:100%;
        clear:both;
    }
    h2{
        font-size:16px;
        margin:0;
        border-bottom:1px solid #f4f4f4;
        padding-bottom:5px;
    }
    .friends-list{
        /*height:450px;*/
        margin:0;
        padding:0;
        overflow:hidden;
        overflow-y:auto;
    }
    .friends-list li{
        list-style-type:none;
        margin:0;
        border-bottom:1px solid #f4f4f4;
        height:50px;
        width:100%;
        padding:10px 32px 10px 8px;
        position:relative;
    }

    .friends-list li:hover{
        background-color:#f1f1f1;
    }
    .friends-list li span{
        display:inline-block;
        vertical-align:middle;
    }
    .photo img{
        width:55px;
        height:55px;
        border-radius:50%;
    }
    .row.filter {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .row.filter form {
        display: flex;
        align-items: center;
    }

    .row.filter .col {
        flex: 1;
    }

    .row.filter .search {
        flex: 1;
        margin-right: 10px;
    }
    .search{
        width:345px;
        border:none;
        background-color:#fff;
        line-height:31px;
        padding: 0 10px;
        border-radius:15px;
        display:inline-block;

    }
    .filter .col{
        padding:10px 15px;
    }

    .friend-item {
        display: flex;
        align-items: center;
    }

    .friend-item button {
        margin-left: 10px;
    }

</style>

