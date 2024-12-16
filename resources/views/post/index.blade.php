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
        {{-- withQueryString() - сохраняет get параметр в links при смене отрисовки 0-10, 11 до 20, 21-30 ... --}}
        {{-- без него кол-во элементов становиться полным --}}
        {{$posts->withQueryString()->links()}}
    </div>
@endsection