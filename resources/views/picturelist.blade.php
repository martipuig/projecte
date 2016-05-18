<!DOCTYPE html>
<html>
    <head>
        <title>Image list</title>
    </head>
    <body>
        <h1>My Pictures</h1>
        <p>
            <a href="add">Add picture</a>
        </p>
        <table border="1">
            <tr><td>Id</td><td>Name</td><td>Picture</td><td>Resize</td></tr>
            @foreach($pictures as $key => $picture)
                <tr><td>{{ $picture->id }}</td><td>{{ $picture->name }}</td><td><img src="pic/{{ $picture->id }}"></td><td><img src="resize/{{ $picture->id }}"></td></tr>
            @endforeach
        </table>


    </body>
</html>