@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Order Detail</h1>
    </div>

    <div>
        <form action="{{ url('/admin/orderdetail/create') }}" method="get">
            <div class="row">
                <div class="mt-2 col-4">
                    <label class="form-label" for="">From : </label>
                    <input class="form-control" type="date" name="tglmulai" id="">
                </div>
                <div class="mt-2 col-4">
                    <label class="form-label" for="">To : </label>
                    <input class="form-control" type="date" name="tglakhir" id="">
                </div>
                <div class="my-4 col-4">
                    <button class="btn btn-primary" type="submit" name="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $detail -> tglorder }}</td>
                        <td>{{ $detail -> pelanggan }}</td>
                        <td>{{ $detail -> menu }}</td>
                        <td>{{ number_format($detail -> harga) }}</td>
                        <td>{{ $detail -> jumlah }}</td>
                        <td>{{ $detail -> total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $details -> withQueryString() -> links() }}
    </div>
@endsection