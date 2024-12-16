@extends('loyouts.main')
@section('countent')
    @foreach ($posts as $post)
        {{-- реализвация перехода по ссылке --}}
        <div><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></div>
    @endforeach
    <br>
    <div>
        <a href="{{route('post.create')}}">Добавить пост</a>
    </div>
    <div>
        {{$posts->links()}}
    </div>
@endsection