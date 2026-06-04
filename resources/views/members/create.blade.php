<!DOCTYPE html>
<html>
<head>
    <title>Yeni Üye</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Yeni Üye Ekle</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Ad Soyad:</label>
            <input type="text" name="full_name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Bölüm:</label>
            <input type="text" name="department" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telefon:</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label>Fotoğraf:</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="is_active" checked> Aktif Üye
        </div>
        <button type="submit" class="btn btn-success">Kaydet</button>
    </form>
</div>
</body>
</html>