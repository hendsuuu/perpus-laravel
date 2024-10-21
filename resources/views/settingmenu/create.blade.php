<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setting Role Menu</title>
</head>
<body>
    <form action="{{ route('settingmenu.route') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_jenis_user">Select Jenis User</label>
            <select name="id_jenis_user" id="id_jenis_user" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id_jenis_user }}">{{ $role->jenis_user }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="option[]" value="1" id="option1">
            <label class="form-check-label" for="option1">
                Master User
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="option[]" value="2" id="option2">
            <label class="form-check-label" for="option2">
                Master Jenis Role
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="option[]" value="3" id="option3">
            <label class="form-check-label" for="option3">
                Master Menu
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="option[]" value="1" id="option1">
            <label class="form-check-label" for="option1">
                Daftar Buku
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="option[]" value="2" id="option2">
            <label class="form-check-label" for="option2">
                Tambah Buku
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="option[]" value="3" id="option3">
            <label class="form-check-label" for="option3">
                Kategori Buku
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    
</body>
</html>