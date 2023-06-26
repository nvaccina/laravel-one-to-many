@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h1 class="text-secondary mb-4">Portfolio</h1>

        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{session('deleted')}}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td>{{$work->id}}</td>
                        <td class="w-50">{{$work->title}}</td>
                        @php
                            $date = date_create($work->creation_date)
                        @endphp
                        <td>{{$work->type?->name}}</td>
                        <td>{{date_format($date, 'd-m-Y')}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.works.show', $work)}}">
                                <i class="fa-solid fa-info p-1"></i>
                            </a>
                            <a class="btn btn-warning" href="{{route('admin.works.edit', $work)}}">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            @include('admin.partials.form-delete')


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div>
            {{$works->links()}}
        </div>
    </div>
@endsection
