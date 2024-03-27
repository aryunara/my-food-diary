<div class="wrapper">
    <sidebar>
        <div class="avatar">
            <div class="avatar__img">
                <img src="https://picsum.photos/70" alt="avatar">
            </div>
            <div class="avatar__name">{{ \Illuminate\Support\Facades\Auth::user()->username }}</div>
        </div>
        <nav class="menu">
            <a class="menu__item" href="/home">
                <i class="menu__icon fa fa-home"></i>
                <span class="menu__text">HOME</span>
            </a>
            <a class="menu__item menu__item--active" href="/friends/{{\Illuminate\Support\Facades\Auth::id()}}">
                <i class="menu__icon fa fa-calendar"></i>
                <span class="menu__text">FRIENDS</span>
            </a>
            <a class="menu__item" href="#">
                <i class="menu__icon fa fa-bar-chart"></i>
                <span class="menu__text">MESSAGES</span>
            </a>
            <a class="menu__item" href="/main/{{\Illuminate\Support\Facades\Auth::id()}}">
                <i class="menu__icon fa fa-list"></i>
                <span class="menu__text">POSTS</span>
            </a>
            <a class="menu__item" href="/post-creation">
                <i class="menu__icon fa fa-list"></i>
                <span class="menu__text">CREATE NEW POST</span>
            </a>
            <a class="menu__item" href="/about">
                <i class="menu__icon fa fa-envelope"></i>
                <span class="menu__text">ABOUT ME</span>
            </a>
            <a class="menu__item" href="#">
                <i class="menu__icon fa fa-trophy"></i>
                <span class="menu__text">SETTINGS</span>
            </a>
            <a class="menu__item" href="/signout">
                <i class="menu__icon fa fa-sliders"></i>
                <span class="menu__text">LOGOUT</span>
            </a>
        </nav>
        <div class="copyright">copyright &copy; 2018</div>
    </sidebar>
</div>

<style>
    /**
     * ALL the UI design credit goes to:
     * https://www.sketchappsources.com/free-source/2676-calendar-template-sketch-freebie-resource.html
     */

    /* WRAPPER */

    .wrapper {
        display: grid;
        grid-template-rows: 70px 1fr 70px;
        grid-template-columns: 1fr;
        grid-template-areas:
    "sidebar"
    "content";
        width: 100vw; /* unnecessary, but let's keep things consistent */
        height: 100vh;
    }

    @media screen and (min-width: 850px) {
        .wrapper {
            grid-template-columns: 200px 5fr;
            grid-template-rows: 1fr;
            grid-template-areas: "sidebar content";
        }
    }

    /* SIDEBAR */

    main {
        grid-area: content;
        padding: 48px;
    }

    sidebar {
        grid-area: sidebar;
        display: grid;
        grid-template-columns: 1fr 3fr 1fr;
        grid-template-rows: 3fr 1fr;
        grid-template-areas:
    "logo menu avatar"
    "copyright menu avatar";
    }
    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .copyright {
        text-align: center;
    }
    .avatar {
        grid-area: avatar;
        display: flex;
        align-items: center;
        flex-direction: row-reverse;
    }
    .avatar__name {
        flex: 1;
        text-align: right;
        margin-right: 1em;
    }
    .avatar__img > img {
        display: block;
    }

    .copyright {
        grid-area: copyright;
    }
    .menu {
        grid-area: menu;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }
    .logo {
        grid-area: logo;
    }
    .menu__text {
        display: none;
    }

    @media screen and (min-width: 850px) {
        sidebar {
            grid-template-areas:
      "logo"
      "avatar"
      "menu"
      "copyright";
            grid-template-columns: 1fr;
            grid-template-rows: 50px auto 1fr 50px;
        }

        .menu {
            flex-direction: column;
            align-items: normal;
            justify-content: flex-start;
        }
        .menu__text {
            display: inline-block;
        }
        .avatar {
            flex-direction: column;
        }
        .avatar__name {
            margin: 1em 0;
        }
        .avatar__img > img {
            border-radius: 50%;
        }
    }

    /* COSMETIC STYLING */

    :root {
        --red: #ed5454;
    }

    body {
        font-family: Montserrat;
        font-weight: 100;
        color: #a8b2b9;
    }

    sidebar {
        background-color: white;
        box-shadow: 5px 0px 20px rgba(0, 0, 0, 0.2);
    }

    main {
        background-color: #fcfbfc;
    }

    .avatar__name {
        font-size: 0.8rem;
    }

    .menu__item {
        text-transform: uppercase;
        font-size: 0.7rem;
        font-weight: 500;
        padding: 16px 16px 16px 14px;
        border-left: 4px solid transparent;
        color: inherit;
        text-decoration: none;
        transition: color ease 0.3s;
    }

    .menu__item--active .menu__icon {
        color: var(--red);
    }
    .menu__item--active .menu__text {
        color: black;
    }

    .menu__item:hover {
        color: black;
    }

    .menu__icon {
        font-size: 1.3rem;
    }

    @media screen and (min-width: 850px) {
        .menu__icon {
            font-size: 0.9rem;
            padding-right: 16px;
        }
        .menu__item--active {
            border-left: 4px solid var(--red);
            box-shadow: inset 10px 0px 17px -13px var(--red);
        }
    }

    .copyright {
        font-size: 0.7rem;
        font-weight: 400;
    }


    .calendar__header > div {
        text-transform: uppercase;
        font-size: 0.8em;
        font-weight: bold;
    }


</style>
