<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kegiatan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        img { max-width: 150px; height: auto; }
    </style>
</head>
<body>
    <h1>Laporan Kegiatan</h1>
    @if($activities->isEmpty())
        <p>Tidak ada kegiatan yang dipilih untuk laporan ini.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->title }}</td>
                    <td>{{ $activity->description }}</td>
                    <td>
                        @if($activity->image_path)
                            <img src="{{ public_path('storage/' . $activity->image_path) }}" alt="{{ $activity->title }}">
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>