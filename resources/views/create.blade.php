<h2>Add Service</h2>

<form action="{{ url('admin/services') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Service Name" required><br><br>

    <textarea name="description" placeholder="Description" required></textarea><br><br>

    <input type="file" name="image" required><br><br>

    <button type="submit">Save</button>
</form>
