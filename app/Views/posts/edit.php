<form action="/posts/update/<?= $posts['id'] ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>

<input type="hidden" name="old_image" value="<?= $posts['image'] ?>">

Judul <br>
<input type="text" name="title" value="<?= $posts['title'] ?>"><br><br>

Isi <br>
<textarea name="content"><?= $posts['content'] ?></textarea><br><br>

Kategori <br>
<select name="category_id">
<?php foreach($categories as $c): ?>
<option value="<?= $c['id'] ?>"
<?= $c['id']==$posts['category_id']?'selected':'' ?>>
<?= $c['name'] ?>
</option>
<?php endforeach ?>
</select><br><br>

Gambar Lama <br>
<img src="/<?= $posts['image'] ?>" width="120"><br><br>

Ganti Gambar <br>
<input type="file" name="image"><br><br>

<button type="submit">Update</button>
</form>
