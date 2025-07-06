<form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Judul Kegiatan:</label>
    <input type="text" name="title" id="title" required><br>

    <label for="description">Deskripsi:</label>
    <textarea name="description" id="description"></textarea><br>

    <label for="photo">Upload Foto:</label>
    <input type="file" name="photo" id="photo"><br>

    <button type="submit">Simpan Kegiatan</button>
</form>