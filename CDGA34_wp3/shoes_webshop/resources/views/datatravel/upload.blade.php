<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
    </head>
    <body>

        <form action="{{ url('uploadfile')}}" method="POST" enctype="multipart/form-data">

            @csrf

        <input type="text" name="name" placeholder="File">

        <input type="text" name="description" placeholder="file description">

        <input type="file" name="file">

        <input type="submit">

        </form>
    </body>
</html>