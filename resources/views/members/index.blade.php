<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Kulübü</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Üye Listesi</h3>
    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Yeni Üye Ekle</a>

    <table class="table table-bordered">
        <tr>
            <th>Resim</th>
            <th>Ad Soyad</th>
            <th>Bölüm</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Durum</th>
            <th>İşlem</th>
        </tr>
        @foreach($members as $member)
        <tr>
            <td>
                @if($member->photo)
                    <img src="{{ asset($member->photo) }}" width="50">
                @else
                    -
                @endif
            </td>
            <td>{{ $member->full_name }}</td>
            <td>{{ $member->department }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->is_active ? 'Aktif' : 'Pasif' }}</td>
            <td>
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>