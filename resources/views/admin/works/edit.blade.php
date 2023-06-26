@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h1 class="text-secondary mb-4">Modifica il lavoro</h1>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{route('admin.works.update', $work)}}"
            method="POST"
            class="p-5 rounded bg-secondary-subtle"
            enctype="multipart/form-data"
        >
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo (*)</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    placeholder="Titolo"
                    name="title"
                    value="{{old('title', $work->title)}}"
                >
                @error('title')
                    <p class="text-danger py-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    onchange="showImage(event)"
                >

                <img id="default-image" width="150px" src="{{ asset('storage/' . $work->image) }}" alt="" onerror="this.src='/img/noimage.jpg'" class="pt-2">
            </div>

            <div class="mb-3 w-25">
                <label for="type_id" class="form-label">Tipo</label>
                <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                    <option value="" selected>Seleziona il tipo di lavoro</option>

                    @foreach ($types as $type )
                        <option value="{{$type->id}}" @if($type->id == old('type_id', $work->type?->id)) selected @endif>{{$type->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Testo (*)</label>
                <textarea
                    class="form-control"
                    id="text"
                    rows="10"
                    placeholder="Testo"
                    name="text"
                >
                    {{old('text', $work->text)}}
                </textarea>
                @error('text')
                    <p class="text-danger py-1">{{$message}}</p>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>

        </form>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#text' ) )
            .catch( error => {
                console.error( error );
            } );

        function showImage(event){
            const tagImage = document.getElementById('default-image');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
            console.log(tagImage);
        }

    </script>
@endsection
