@extends('front')

@section('content')
    <div class=" row">
        <div class="col-6">
            <form action="" method="post">
            <div class="mt-2">
                <label class="form-label" for="">Pelanggan</label>
                <input class="form-control" type="text" name="pelanggan">
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Alamat</label>
                <input class="form-control" type="text" name="alamat">
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Nomor Telepon</label>
                <input class="form-control" type="text" name="telepon">
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin" id="">
                    <option value="l">L</option>
                    <option value="p" selected>P</option>
                </select>
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Email</label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Password</label>
                <input class="form-control" type="text" name="password">
            </div>
            <div class="mt-4 text-light">
                <button class="btn bg-primary text-light" type="submit">Register</button>
             </div>
            </form>
        </div>
    </div>
@endsection