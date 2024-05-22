@extends('main_nav')
@section('main_content')

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
        </div>

        <div class="row">
            <div class="col">
                <ul id="friends-filter" class="friends-list">
                    @if(isset($friend))
                        <li>{{ $friend->friendUser->username }}</li>
                    @elseif(!empty($friends))
                        @foreach($friends as $friend)
                            <li>
                                <a href="/main/{{ $friend->friendUser->id }}">{{ $friend->friendUser->username }}</a>
                            </li>
                        @endforeach
                    @else
                        <div class="empty_state">
                            <h3>No friends</h3>
                            <p>There have been no friends in this section yet</p>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </div>

@endsection

<style>

    #homework-container{
        width: 1400px;
        margin-top: 25px;
        margin-left: 250px;
        border-radius:15px;
        max-height: 650px;
        font-family: "Lato", sans-serif;
        background-color: #ffffff;
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
        height:550px;
        margin:0;
        padding:0;
        overflow:hidden;
        overflow-y:auto;
        font-size: 16px;
        font-family: "Lato", sans-serif;
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
    .friends-list li a {
        text-decoration: none; /* Убираем подчеркивание ссылки */
        color: inherit; /* Наследуем цвет текста */
        background-color: transparent; /* Убираем задний фон ссылки */
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

    .friend-item .empty_state {
        position: relative;
        top: -25px;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        margin-left: 310px;
        margin-bottom: -300px;

        h3 {
            margin-right: 580px;
            margin-top: 45px;
            text-align: center;
            font-weight: normal;
            font-size: 25px;
        }
        p {
            font-size: 15px;
            color: #999;
            text-align: center;
            margin-right: 580px;
            margin-top: -10px;
        }
        button {
            outline: none;
            border: none;
            border-radius: 3px;
            padding: 8px 8px;
            margin-right: 560px;
            margin-top: 10px;
            width: 50%;
            max-width: 200px;
            background: #348ac7;
            color: white;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            font-size: 12px;
        }
    }

    .friend-item button {
        margin-left: 10px;
    }

</style>
