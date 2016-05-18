<!DOCTYPE html>
<html>
    <head>
        <title>Add Image</title>
    </head>
    <body>
        <h1>Add Image</h1>
        {!! Form::open(array('url' => 'add', 'files'=>true)) !!}
        <div>
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name') !!}
        </div>
        <div>
            <p>
                {!! Form::label('Chose the picture:') !!}
                {!! Form::file('pic') !!}
            </p>

        </div>
        <div>
            {!! Form::label('article_id', 'Article:') !!}
            {!! Form::text('article_id') !!}
        </div>
        <div>
            {!! Form::submit('Add record') !!}
        </div>
    </body>
</html>