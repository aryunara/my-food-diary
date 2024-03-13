@extends('main_nav')
@section('main_content')

<div class="border-all">
    <div class="about-me">About me </div>
    <div class="container">

        <img class="icon" src="https://drive.google.com/uc?export=view&id=187Hsi_hyu6CxCXAHCk7CLE41PAHn6w7Q">
        <div class="wrapper">
            <div class="abt-me2">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Name: <br>
                    Your Name
                </p>
            </div>
            <div class="abt-me2">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Age: <br>
                    Your age
                </p>
            </div>
        </div>
    </div>
    <div class="container2">
        <div class="wrapper2">
            <div class="abt-me">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Zodiac: <br>
                    Your Zodiac
                </p>
            </div>
            <div class="abt-me">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Join Date <br>
                    Your join date
                </p>
            </div>
            <div class="abt-me">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Status <br>
                    Your status
                </p>
            </div>
        </div>
    </div>
    <div class="container2">
        <div class="wrapper2">
            <div class="abt-me">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    DNI: <br>
                    DNI
                </p>
            </div>
            <div class="abt-me">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Random: <br>
                    Random
                </p>
            </div>
            <div class="abt-me">
                <img class="strawberry" src="https://drive.google.com/uc?export=view&id=1p6RbLOTxiOKpTxmoL3fCaLLJ8ez-9pLq">
                <p class="abt-me-txt">
                    Random: <br>
                    Random
                </p>
            </div>
        </div>
    </div>
</div>
<div class="credit-wrapper">
    <a href="https://everskies.com/user/cwu-737054">
        <p class="credit">
            made by cwu
        </p>
    </a>
</div>

@endsection

<style>
    body {
        background-image: url(https://drive.google.com/uc?export=view&id=10e02rPglRxTEme12CcG6vWc-WR5U45A6);
    }
    .border-all {
        border: 2px solid rgb(255, 167, 201);
        width: fit-content;
        margin-right: auto;
        margin-left: auto;
        cursor: url(https://cur.cursors-4u.net/anime/ani-1/ani191.ani),
        url(https://cur.cursors-4u.net/anime/ani-1/ani191.png), auto !important;
    }
    .container {
        display: flex;
        margin-right: auto;
        margin-left: auto;
        width: 600px;
        align-items: flex-start;
    }
    .container2 {
        margin-right: auto;
        margin-left: auto;
        width: 650px;
    }
    .about-me {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 40px;
        text-align: center;
        color: rgb(255, 167, 201);
        border: 1px solid rgb(255, 167, 201);
        background-color: rgb(255, 214, 230);
        border-bottom: 3px solid rgb(255, 167, 201);
        padding: 10px;
    }
    .icon {
        width: 170px;
        border: 2px solid rgb(255, 167, 201);
        margin: 10px;
    }
    .strawberry {
        width: 45px;
    }
    .abt-me {
        display: flex;
        align-items: flex-start;
        width: 200px;
        color: rgb(255, 167, 201);
        background-color: rgb(255, 214, 230);
        padding: 10px;
        margin: 7px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        border: 2px solid rgb(255, 167, 201);
        border-radius: 20px;
        font-size: 10px;
    }
    .abt-me2 {
        display: flex;
        align-items: flex-start;
        width: 350px;
        color: rgb(255, 167, 201);
        background-color: rgb(255, 214, 230);
        padding: 10px;
        margin: 7px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        border: 2px solid rgb(255, 167, 201);
        border-radius: 20px;
        font-size: 10px;
    }
    .wrapper {
        display: flex;
        flex-direction: column;
    }
    .wrapper2 {
        display: flex;
        flex-direction: row;
    }
    a {
        text-decoration: none;
        color: inherit;
    }
    .credit-wrapper {
        width: 140px;
        margin-left: auto;
        margin-right: auto;
    }
    .credit {
        border: 2px solid rgb(255, 167, 201);
        width: fit-content;
        color: rgb(255, 167, 201);
        padding: 8px;
        margin: 10px;
    }
    .credit:hover {
        background-color: rgb(255, 235, 243);
    }

</style>

