@extends('layouts.main')
@section('content')
    <h1>ПОСТ</h1>
    <div><b>id: </b>{{$post->id}}</div>
    <div><b>title: </b>{{$post->title}}</div>
    <div><b>content: </b>{{$post->content}}</div>
    <div><b>author: </b>{{$post->author}}</div>

    <div>
        <b>category:</b>
        <ul style="margin: 0; padding: 0; padding-left: 30px; list-style-type: none;">
            @foreach ($post->categorys as $category)
                <li><b>Имя категории:</b> {{$category->title}} / <b>id: </b>{{$category->id}} </li>
            @endforeach
        </ul>
    </div>

    <br>
    <div><a href="{{route('post.edit', $post->id)}}">Изменить</a></div>
    <br>
    <div><a href="{{route('post.index')}}">Вернуться</a></div>
    <br>
    <form action="{{route('post.destroy', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Удалить пост</button>
    </form>
@endsection