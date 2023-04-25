@extends('layout.template')
<!-- START FORM -->
@section('content')
<form action='{{ url('books/'.$data->id) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('books') }}' class="btn btn-secondary">&lt Back</a>
        <div class="mb-3 row">
            <label for="Title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='title' id="title" value="{{ $data->title }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='author' id="author" value="{{ $data->author }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="release" class="col-sm-2 col-form-label">Release Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='release' id="release" value="{{ $data->release }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->
