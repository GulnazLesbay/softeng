<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create page</title>
</head>
<body>
<a href="{{ route('posts.index') }}">index page</a>
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div>
        <label>
            <h3>Enter title</h3>
        </label>
        <input type="text" name="title">
        <br>
        <label>
            <h3>Enter content</h3>
        </label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">Ok</button>
    </div>

</form>
</body>
</html>