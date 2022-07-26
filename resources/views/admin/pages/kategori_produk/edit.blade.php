@extends('admin.templates.default')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-dark text-center font-weight-bold">Edit Kategori Produk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori-produk.update',$item->id) }}" method="post" >
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ $item->nama_kategori ?? old('nama_kategori') }}">
                        @error('nama_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_singkat">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat" id="deskripsi_singkat" cols="30" rows="5"
                            class="form-control @error('deskripsi_singkat') is-invalid @enderror">{{ $item->nama_kategori ?? old('deskripsi_singkat') }}</textarea>
                        @error('deskripsi_singkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.kategori-produk.index') }}" class="btn btn-warning">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
