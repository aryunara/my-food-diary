<header class="top">
    <h1><a href="/home" title="home">MY FOOD DIARY</a></h1>

        <nav class="flex-nav" id="nav">
            <a href="#" class="toggleNav"><i class="fa fa-bars"></i> Menu</a>
            <ul>
                <li><a href="/about/{{ $userId }}" title="About">About me</a></li>
                <li><a href="/main/{{ $userId }}" title="Posts">Posts</a></li>
                <li><a href="/friendlist/{{ $userId }}" title="Friends">Friends</a></li>
                @if($userId != \Illuminate\Support\Facades\Auth::id())
                    <li><a href="/dialog/{{ $userId }}" title="Message me">Message me</a></li>
                @else
                    <li><a href="/send-message" title="Message me">Message me</a></li>
                @endif
            </ul>
        </nav>

</header>

<body>
    <div class="sidebar">
        @include('sidebar')
    </div>

    <div class="main-content">
        @yield('main_content')
    </div>
</body>

<footer>
    <p>&copy;aryunara</p>
</footer>

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
        background: #fafafa;
        color: #222;
    }

    a {
        color: #ff9697;
        font-weight: 400;
        letter-spacing: 1px;
        text-decoration: none;
        background: #fafafa;
        padding: 5px 10px 20px 5px;
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
        margin-left: 25px;
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
        background-color: #fafafa;
    }

    header {
        border-bottom: 1px solid #e2e2e2;
    }

    .sidebar {
        text-align: center;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        overflow-y: auto; /* Добавлено для прокрутки, если содержимое боковой панели превышает высоту */
    }

    .flex-nav ul {
        list-style: none;
        margin-left: 20px;
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
</style>
