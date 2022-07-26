@extends('admin.templates.default')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-dark text-center font-weight-bold">Edit Produk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.produk.update',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ $item->nama_produk ?? old('nama_produk') }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                            <option value="" selected disabled>-Pilih Kategori-</option>
                            @foreach ($kategori_produk as $kategori)
                                <option value="{{ $kategori->id }}" @if($kategori->id == $item->kategori_id) selected @endif>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_singkat">Deskripsi Singkat</label>
                        <textarea name="deskripsi_singkat" id="deskripsi_singkat" cols="30" rows="3"
                            class="form-control @error('deskripsi_singkat') is-invalid @enderror">{{ $item->deskripsi_singkat ?? old('deskripsi_singkat') }}</textarea>
                        @error('deskripsi_singkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="6"
                            class="form-control @error('deskripsi') is-invalid @enderror">{{ $item->deskripsi ?? old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="gambar">Gambar</label>
                            <img src="{{ $item->gambar() }}" alt="" class="img-fluid w-100" style="max-height: 80px">
                        </div>
                        <div class="col-md-10 align-self-center">
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}">

                        </div>
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-warning">Kembali</a>
                        <button class="btn btn-primary">Simapn</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
