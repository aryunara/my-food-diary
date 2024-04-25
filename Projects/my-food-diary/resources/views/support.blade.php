@extends('main_nav')
@section('main_content')

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <title>Support</title>
    </head>

    <body>
    <div class="container">
        <header id="page-header" class="bg-dark text-white col-sm-12">
            <h1 id="main-heading" class="text-center">Support</h1>
        </header>

        <div class="row">
            <main class="col-sm-10 offset-sm-1">

                <form action="/support-msg" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::id() }}" name="user_id" required>
                    <br>
                    <input type="text" placeholder="Describe your problem" name="msg" required>
                    <button id="submit-button" type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </main>
        </div>
        <div class="row">
            <section class="col-sm-10 offset-sm-1">
                <p id="response-message"></p>
                <h2 id="response-title"></h2>
                <small id="response-id"></small>
                <p id="response-content"></p>
            </section>
        </div>
    </div>
    <script src="scripts.js"></script>
    </body>

@endsection
