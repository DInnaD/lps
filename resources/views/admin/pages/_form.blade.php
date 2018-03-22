<div class="form-group">
	{!!Form::label('name', 'Name') !!}	
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::label('alias', 'Alias') !!}
    {!!Form::text('alias', null, ['class' => 'form-control']) !!}

    {!!Form::label('audios', 'Price') !!}
    {!!Form::text('audios', null, ['class' => 'form-control']) !!}

    {!! Form::label('link', 'Link') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}


    {!!Form::label('text', 'Content') !!}
    {!!Form::text('text', null, ['class' => 'form-control class' ]) !!}

    {!!Form::label('images', 'Image') !!}
    {!!Form::file('images', null, ['class' => 'form-control', 'style' => 'height:50px']) !!}
    {!!Form::label('videos', 'Img2') !!}
    {!!Form::file('videos', null, ['class' => 'form-control']) !!}

</div>

