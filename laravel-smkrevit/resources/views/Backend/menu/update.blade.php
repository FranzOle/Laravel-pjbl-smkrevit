@extends('Backend.back')

@section('admincontent')
    <div class="row">
        <div>
            <h2>Update Menu</h2>
        </div>
        <div class="col-6">
            <form action="{{ url('admin/postmenu/' . $menu -> idmenu) }}" method="post" enctype="multipart/form-data">
                <label class="form-label" for="">Kategori Menu</label>
                @csrf
                <select class="form-select" name="idkategori">
                    @foreach ($kategoris as $kategori )
                        <option @selected($kategori-> idkategori == $menu -> idkategori) value="{{$kategori -> idkategori}}">{{ $kategori -> kategori}}</option>
                    @endforeach
                </select>
                <div class="mt-2">
                    <label class="form-label" for="">Nama Menu</label>
                    <input class="form-control" type="text" value="{{ $menu -> menu }}" name="menu">
                    <span class="text-danger">
                        @error('menu')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                
                <div class="mt-2">
                    <label class="form-label" for="">Deskripsi Menu</label>
                    <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control" value="{{ $menu -> deskripsi }}"></textarea>
                    <span class="text-danger">
                        @error('deskripsi')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mt-2">
                    <label class="form-label" for="">Harga</label>
                    <input class="form-control" type="number" value="{{ $menu -> harga }}" name="harga">
                    <span class="text-danger">
                        @error('harga')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mt-2">
                    <label for="" class="form-label">Gambar Menu</label>
                    <input class="form-control" type="file" value="{{ $menu -> gambar }}" name="gambar">
                    <span class="text-danger">
                        @error('gambar')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                
                <div class="mt-4">
                   <button class="btn btn-primary " type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection