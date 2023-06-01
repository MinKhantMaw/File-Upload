<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">Image Upload</label>
    <input type="file" name="image" id="">

    <button type="submit">Upload</button>
</form>
