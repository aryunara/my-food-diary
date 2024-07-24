@extends('main_nav')
@section('main_content')

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Post creating</title>
</head>

<body>
<br>
<div class="container">
    <header id="page-header" class="text-white col-sm-12" style="background-color: #75250c">
        <h1 id="main-heading" class="text-center">Post creating</h1>
    </header>

    <div class="row">
        <main class="col-sm-10 offset-sm-1">

            <form action="/post-creation" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ Auth::id() }}" name="user_id" required>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                <label for="image">Upload image</label>
                <input type="file" placeholder="Upload image" name="image" id="image" class="form-control" required>
                    @error('path')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><br>
                <label for="description">Write a description</label>
                <textarea type="text" rows="5" cols="90" placeholder="Description to the post" name="description" required></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><br>
                <label for="recipe_name">Write a recipe name</label>
                <textarea type="text" rows="5" cols="90" placeholder="Recipe name" name="recipe_name"></textarea>
                    @error('recipe_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><br>
                <label for="cooking_time">Write the cooking time</label>
                <textarea type="text" rows="2" cols="90" placeholder="Cooking time" name="cooking_time"></textarea>
                    @error('cooking_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><br>
                <label for="recipe_description">Write a description of the recipe</label>
                <textarea type="text" rows="5" cols="90" placeholder="Description of the recipe" name="recipe_description"></textarea>
                    @error('recipe_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br><br>

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
