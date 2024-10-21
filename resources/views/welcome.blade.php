<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

@extends('layouts.app')

@section('content')
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <!-- Data Section -->
            <div class="col-md-8">
                <h3>Data Users</h3>
                <button id="load-data" class="btn btn-primary mb-3">Load Data</button>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="data-table">
                        <!-- Data will be loaded here -->
                    </tbody>
                </table>
            </div>

            <!-- Info Section -->
            <div class="col-md-4">
                <h3>Information</h3>
                <p>This is a simple dashboard page that loads data using AJAX.</p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Event when clicking load-data button
            $("#load-data").click(function(){
                $.ajax({
                    url: 'get-data.php', // URL to fetch data
                    type: 'GET',
                    success: function(data) {
                        // Parse the JSON data and append it to the table
                        let users = JSON.parse(data);
                        let rows = '';
                        users.forEach(user => {
                            rows += `
                                <tr>
                                    <td>${user.id}</td>
                                    <td>${user.name}</td>
                                    <td>${user.email}</td>
                                </tr>
                            `;
                        });
                        $("#data-table").html(rows);
                    },
                    error: function(xhr, status, error) {
                        alert('Failed to load data');
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection