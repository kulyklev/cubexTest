@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-borderless table-hover">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>{{ $bid->id }}</th>
                    </tr>

                    <tr>
                        <th>Имя пользователя</th>
                        <th>{{ $bid->user->name }}</th>
                    </tr>

                    <tr>
                        <th>Тема</th>
                        <th>{{ $bid->theme }}</th>
                    </tr>

                    <tr>
                        <th>Сообщение</th>
                        <th>{{ $bid->message }}</th>
                    </tr>

                    <tr>
                        <th>Прикрепленный файл</th>
                        {{--<th>{{ $bid->file }}</th>--}}
                    </tr>

                    <tr>
                        <th>Дата создания</th>
                        <th>{{ $bid->created_at }}</th>
                    </tr>

                    <tr>
                        {!! Form::open(['action' => ['BidController@', 'bidID' => $bid->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Пометить прочитанным', ['class' => 'btn btn-primary btn-lg']) }}
                        {!! Form::close() !!}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
