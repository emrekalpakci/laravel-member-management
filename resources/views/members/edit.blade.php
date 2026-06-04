<!DOCTYPE html>
<html>
<head>
    <title>Üye Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Üye Düzenle</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            Hata var: Lütfen bilgileri kontrol edin.
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Ad Soyad:</label>
            <input type="text" name="full_name" class="form-control" value="{{ $member->full_name }}">
        </div>
        <div class="mb-3">
            <label>Bölüm:</label>
            <input type="text" name="department" class="form-control" value="{{ $member->department }}">
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $member->email }}">
        </div>
        <div class="mb-3">
            <label>Telefon:</label>
            <input type="text" name="phone" class="form-control" value="{{ $member->phone }}">
        </div>
        <div class="mb-3">
            <label>Yeni Fotoğraf (İsteğe bağlı):</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="is_active" {{ $member->is_active ? 'checked' : '' }}> Aktif Üye
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
</body>
</html>