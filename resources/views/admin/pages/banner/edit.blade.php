@extends('admin.templates.default')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-dark text-center font-weight-bold">Edit Banner</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.banner.update',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="background">Background</label>
                            <img src="{{ $item->background() }}" alt="" class="img-fluid w-100" style="max-height: 80px">
                        </div>
                        <div class="col-md-10 align-self-center">
                            <input type="file" name="background" class="form-control @error('background') is-invalid @enderror" value="{{ old('background') }}">
                        </div>
                        @error('background')
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
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $item->judul ?? old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_judul">Sub Judul</label>
                        <input type="text" name="sub_judul" class="form-control @error('sub_judul') is-invalid @enderror" value="{{ $item->sub_judul ?? old('sub_judul') }}">
                        @error('sub_judul')
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
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="" selected disabled>-Pilih Status-</option>
                            <option value="1" @if($item->status == 1) selected @endif>Aktif</option>
                            <option value="0" @if($item->status == 0) selected @endif>Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-warning">Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
