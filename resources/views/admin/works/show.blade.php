@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h2 class="text-secondary mb-4"><strong>Work: </strong>{{$work->title}}</h2>

        <div class="card-img-top d-block">
            <img class="nv_image" src="{{ asset('storage/' . $work->image) }}" alt="{{$work->title}}" onerror="this.src='/img/noimage.jpg'">

        </div>
        <p>{{$work->image_original_name}}</p>

        <p class="pt-2">Tipo: {{$work->type?->name}}</p>

        <p class="pt-2">{!!$work->text!!}</p>
        <p>{{$date_formatted}}</p>

        <a class="btn btn-warning" href="{{route('admin.works.edit', $work)}}">
            <i class="fa-solid fa-pen"></i>
        </a>


    </div>
@endsection
