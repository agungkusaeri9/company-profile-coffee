@extends('admin.templates.default')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="text-dark text-center font-weight-bold">Edit Artikel</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.artikel.update',$item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                value="{{ $item->judul ?? old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_singkat">Deskripsi Singkat</label>
                            <textarea name="deskripsi_singkat" id="deskripsi_singkat" cols="30" rows="3"
                                class="form-control @error('deskripsi_singkat') is-invalid @enderror">{{ $item->deskripsi_singkat }}</textarea>
                            @error('deskripsi_singkat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                                class="form-control deskripsi  @error('deskripsi') is-invalid @enderror">{{ $item->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="gambar">Gambar</label>
                                <img src="{{ $item->gambar() }}" alt="" class="img-fluid w-100">
                            </div>
                            <div class="col-md-10 align-self-center">
                                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                                value="{{ old('gambar') }}">
                            </div>
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-warning">Kembali</a>
                            <button class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('afterStyles')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <style>

    </style>
@endpush
@push('afterScripts')
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endpush
