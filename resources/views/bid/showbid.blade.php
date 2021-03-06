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
                        <th>
                            <a href="/storage/files/{{ $bid->file  }}" target="_blank">{{ $bid->file }}</a>
                        </th>
                    </tr>

                    <tr>
                        <th>Дата создания</th>
                        <th>{{ $bid->created_at }}</th>
                    </tr>
                    </tbody>
                </table>
                {!! Form::open(['action' => ['BidController@markAsViewed', 'bidId' => $bid->id], 'method' => 'POST']) !!}
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::submit('Пометить прочитанным', ['class' => 'btn btn-primary btn-lg']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
