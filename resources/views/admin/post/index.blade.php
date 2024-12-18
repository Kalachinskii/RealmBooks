@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid gap-3">
                <!-- Info boxes -->
                <div class="row d-flex d-flex flex-wrap justify-content-between">
                    @isset($posts)
                        @foreach ($posts as $post)
                            <div class="card justify-content-between" style="max-width: 520px;" data-id="{{ $post->id }}"
                                hit="{{ $post->hit }}">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <img src="{{ $post->image }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h2 class="card-title mb-3">{{ $post->title }}</h2>
                                            <p class="card-text">{{ $post->content }}</p>
                                            <p class="card-text">
                                                <small class="text-muted">{{ $post->author }}</small>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">{{ $post->likes }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="categorys d-flex flex-wrap justify-content-around overflow-auto border p-2"
                                    style="max-height: 100px;">
                                    @foreach ($post->categorys as $cat)
                                        <div class="btn btn-outline-light rounded-pill btn-sm mb-1" role="group"
                                            aria-label="...">
                                            {{ $cat->title }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                {{ $posts->withQueryString()->links() }}
                <!-- /.row -->
            </div>
        </section>
    </div>


    {{-- @foreach ($posts as $post)
        <div><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></div>
    @endforeach
    <br>
    <div>
        <a href="{{route('post.create')}}">Добавить пост</a>
    </div>
    <div>
        {{$posts->withQueryString()->links()}}
    </div> --}}
@endsection
