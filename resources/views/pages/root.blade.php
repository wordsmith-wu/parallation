@extends('layouts.app')
@section('title', 'Parallation')

@section('content')
  <div class="jumbotron">
    <h1>Hello Parallation</h1>
    <p class="lead">
      你现在所看到的是 <a href="{{route('root')}}">Parallation 翻译平台</a> 的主页。
    </p>
    <p>
      一切，将从这里开始。
    </p>
    @guest
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('register')}}" role="button">现在注册</a>
    </p>
    @endguest
  </div>
 @stop

