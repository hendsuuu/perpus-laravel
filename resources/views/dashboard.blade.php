{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  </head>
  <body id="page-top">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- Sidebar -->
        @include('layouts.sidebar')
    
        <!-- Main Content Wrapper -->
          <div class="main-panel">
            <!-- Main Content -->
            <div class="content-wrapper">
              @include('layouts.content')
            </div>
            <!-- Footer -->
            @include('layouts.footer')
          </div>
        </div>
      </div>
        <!-- ... -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
  </body>
</html> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  hello world
</body>
</html> --}}
<!-- resources/views/dashboard.blade.php -->
<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }
        .widget-container {
            background-color: #6f42c1;
            color: #fff;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .weather-container .weather-location, .gempa-container h4 {
            font-size: 20px;
            font-weight: bold;
        }
        .weather-container .weather-temp {
            font-size: 36px;
            font-weight: bold;
            margin: 10px 0;
        }
        .weather-icon {
            width: 50px;
            height: 50px;
        }
        .weather-details, .gempa-details {
            font-size: 14px;
        }
        .post {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .post img {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 5px;
        }
        .post-actions {
            margin-top: 10px;
        }
    </style>
</head>

@extends('layouts.app')

@section('content')
<body>
    <div class="container mt-5">
        {{-- <h4 class="mb-4">Welcome, {{ Auth::user()->nama_user }}!</h4> <!-- Welcome message --> --}}
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <!-- Left Column for Weather and Gempa -->
            <div class="col-md-4">
                <!-- Weather Section -->
                <div class="widget-container weather-container">
                    <div class="weather-location">{{ $weatherData['location']['name'] }}</div>
                    <div class="weather-temp">{{ $weatherData['current']['temperature'] }}°C</div>
                    <img class="weather-icon" src="{{ $weatherData['current']['weather_icons'][0] }}" alt="Weather Icon">
                    <div class="weather-details">{{ $weatherData['current']['weather_descriptions'][0] }}</div>
                    <div class="weather-details">
                        Angin: {{ $weatherData['current']['wind_speed'] }} km/h | 
                        Kelembaban: {{ $weatherData['current']['humidity'] }}%
                    </div>
                </div>

                <!-- Gempa Section -->
                <div class="widget-container gempa-container">
                    <h4>Perkiraan Gempa Terkini</h4>
                    @if ($gempa)
                        <p><strong>Waktu:</strong> {{ $gempa['Tanggal'] }} {{ $gempa['Jam'] }}</p>
                        <p><strong>Magnitudo:</strong> {{ $gempa['Magnitude'] }}</p>
                        <p><strong>Kedalaman:</strong> {{ $gempa['Kedalaman'] }}</p>
                        <p><strong>Lokasi:</strong> {{ $gempa['Lintang'] }}, {{ $gempa['Bujur'] }}</p>
                        <p><strong>Wilayah:</strong> {{ $gempa['Wilayah'] }}</p>
                    @else
                        <p>Data gempa tidak tersedia saat ini.</p>
                    @endif
                </div>
            </div>

            <!-- Right Column for Social Feed -->
            <div class="col-md-8">
                <h3 class="mb-4">Social Feed</h3>
                
                <!-- Form untuk Posting Status -->
                <form action="{{ route('posting.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <textarea class="form-control" name="message_text" rows="3" placeholder="What's on your mind?" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="message_gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>

                <!-- Menampilkan Posting -->
                @foreach($postings as $posting)
                    <div class="post mt-4">
                        <p>{{ $posting->MESSAGE_TEXT }}</p>
                        @if($posting->MESSAGE_GAMBAR)
                            <img src="{{ asset('uploads/' . $posting->MESSAGE_GAMBAR) }}" alt="Post Image">
                        @endif
                        <div class="post-actions">
                            <button class="btn btn-outline-primary btn-sm" onclick="likePost('{{ $posting->POSTING_ID }}')">Like</button>
                            <span>{{ $posting->likes->count() }} Likes</span>
                        </div>
                        <form action="{{ route('posting.comment', $posting->POSTING_ID) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="komentar_text" placeholder="Add a comment..." required>
                                <button type="submit" class="btn btn-outline-secondary">Comment</button>
                            </div>
                        </form>
                        <div class="mt-2">
                            @foreach($posting->comments as $comment)
                                <div class="comment">
                                    <strong>{{ $comment->USER_ID }}</strong>: {{ $comment->KOMENTAR_TEXT }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function likePost(postingId) {
            // AJAX untuk like post
        }
    </script>
</body>
</html>
@endsection




