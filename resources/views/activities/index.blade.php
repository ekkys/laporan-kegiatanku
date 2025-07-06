<form action="{{ route('activities.generate_pdf') }}" method="POST">
    @csrf
    <table>
        <thead>
            <tr>
                <th>Pilih</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            <tr>
                <td><input type="checkbox" name="selected_activities[]" value="{{ $activity->id }}"></td>
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->description }}</td>
                <td>
                    @if($activity->image_path)
                        <img src="{{ asset('storage/' . $activity->image_path) }}" alt="{{ $activity->title }}" width="100">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit">Buat Laporan PDF</button>
</form>
<a href="{{ route('activities.create') }}">Tambah Kegiatan Baru</a>