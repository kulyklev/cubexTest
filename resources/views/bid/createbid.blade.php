@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {!! Form::open(['action' => ['BidController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {{ Form::label('messageTheme', 'Тема сообщения') }}
                    {{ Form::text('messageTheme', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('message', 'Сообщение') }}
                    {{ Form::text('message', '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::file('file', ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Отправить', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
