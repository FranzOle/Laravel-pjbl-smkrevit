<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="mt-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img style="width: 300px;" src="{{asset('gambar/smkrevit.png')}}" alt="gambar.jpg"></a>
                    <ul class="navbar-nav">
                        <li class="nav-item me-2"><a href="#">Cart</a></li>
                        <li class="nav-item me-2"><a href="#">Register</a></li>
                        <li class="nav-item me-2"><a href="#">Email</a></li>
                        <li class="nav-item me-2"><a href="#">Login</a></li>
                        <li class="nav-item me-2"><a href="#">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row mt-4">
           <div class="col-2">
            <ul class="list-group">
                @foreach ($kategoris as $kategori)
                <li class="list-group-item">{{$kategori->kategori}}</li>
                @endforeach
            </ul>
           </div>
           <div class="col-8">
                @yield('content')
           </div>
        </div>
        <div>
            Footer
        </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}">
    
    </script>
</body>
</html>