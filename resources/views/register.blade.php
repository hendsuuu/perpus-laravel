<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .container {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 800px;
        }

        h1 {
            margin-right: 50px;
            font-size: 36px;
            color: #333;
            letter-spacing: 2px;
            font-weight: bold;
        }

        form {
            width: 100%;
        }

        input[type="text"],input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        
        input[type="text"]:focus,input[type="email"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.6);
            outline: none;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"]:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"]:active {
            transform: translateY(1px);
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: stretch;
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            form {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Form Registrasi</h1>
        <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulir registrasi -->
    <form action="{{ route('register.process') }}" method="POST">
        @csrf

        <!-- Nama User -->
        <div class="form-group">
            <label for="nama_user">Nama User</label>
            <input type="text" name="nama_user" id="nama_user" class="form-control" value="{{ old('nama_user') }}" required>
            @error('nama_user')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- No HP -->
        <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
            @error('no_hp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Role -->
        <div class="form-group">
            <label for="id_jenis_user">Jenis User</label>
            <select name="id_jenis_user" id="id_jenis_user" class="form-control" required>
                <option value="" disabled selected>Pilih Jenis User</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id_jenis_user }}" {{ old('id_jenis_user') == $role->id ? 'selected' : '' }}>
                        {{ $role->jenis_user }}
                    </option>
                @endforeach
            </select>
            @error('id_jenis_user')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status User -->
        <div class="form-group">
            <label for="status_user">Status User</label>
            <input type="text" name="status_user" id="status_user" class="form-control" value="{{ old('status_user') }}" required>
            @error('status_user')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <input type="submit" value="Daftar">
    </form>
        {{-- <form action="/ProsesSimpan" method="POST">
            @csrf
            <input type="text" name="nama_user" id="nama" placeholder="Masukkan Nama"><br>
            <input type="text" name="email" id="email" placeholder="Masukkan Email"><br>
            <input type="password" name="password" id="password" placeholder="Masukkan Password"><br>
            <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan No HP"><br>
             <select name="id_jenis_user" id="id_jenis_user" class="form-control" required>
                <option value="" disabled selected>Pilih Level</option> <!-- Opsi default -->
                @foreach($roles as $role)
                    <option value="{{ $role->id_jenis_user }}" {{ old('id_jenis_user') == $role->id_jenis_user ? 'selected' : '' }}>{{ $role->jenis_user }}</option>
                @endforeach
            </select>
            <input type="submit" value="Daftar">
        </form> --}}
    </div> 


</body>
</html>
