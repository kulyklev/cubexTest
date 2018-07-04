@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @extends('layouts.app')

                @section('content')
                    @include('includes.messages')
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                Имя пользователя
                            </div>
                            <div class="col-8">
                                {{ $bid->user->name }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                Время создания заяки
                            </div>
                            <div class="col-8">
                                {{ $bid->createdAt }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                Тема сообщения
                            </div>
                            <div class="col-8">
                                {{ $bid->messageTheme }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                Прикрепленный файл
                            </div>
                            <div class="col-8">
                                {{ $bid->file}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                Сообщение
                            </div>
                            <div class="col-8">
                                {{ $bid->message }}
                            </div>
                        </div>
                    </div>
                @endsection

            </div>
        </div>
    </div>
@endsection
