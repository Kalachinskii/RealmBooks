@extends('loyouts.main')
@section('countent')
    <div>
        <form action="{{route('post.update', $post->id)}}" method="POST">
            @csrf
            @method('patch')
            
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{$post->title}}">
            </div>
            <div>
                <label for="img">Image</label>
                <input type="text" id="img" name="image" value="{{$post->image}}">
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="countent" id="content">{{$post->countent}}</textarea>
            </div>
            <div>
                <label for="category">Категории: </label>
                <select multiple name="category[]" id="category">
                    @foreach ($categories as $category)
                        <option
                        @foreach ($post->categorys as $postCategory)
                            {{ $category->id === $postCategory->id ? "selected" : ""}} 
                        @endforeach
                        value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('tags')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <button type="submit">Обновить данные</button>
        </form>
    </div>
@endsection