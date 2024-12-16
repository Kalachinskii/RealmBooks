@extends('loyouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="POST">
            {{-- токен = защита --}}
            @csrf
            {{-- name задаём именам колонок из БД --}}
            <div>
                <label for="title">Название: </label>
                <input type="text" id="title" name="title" placeholder="Title" value="{{old('title')}}">
                @error('title')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="img">Автор: </label>
                <input type="text" id="img" name="author" placeholder="Image" value="{{old('author')}}">
                @error('image')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="img">Картинка: </label>
                <input type="text" id="img" name="image" placeholder="Image" value="{{old('image')}}">
                @error('image')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="content">Описание: </label>
                {{-- name в БД неправельно задал потому так --}}
                <textarea name="content" id="content" placeholder="Content">{{old('content')}}</textarea>
                @error('content')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="category">Категории: </label>
                <select multiple name="category[]" id="category">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('tags')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            {{-- обезателен --}}
            <button type="submit">Создать</button>
        </form>
    </div>
@endsection