<a href="/categories/create">+ Tambah</a>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($categories as $c): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $c['name'] ?></td>
    <td>
        <a href="/categories/edit/<?= $c['id'] ?>">Edit</a>

        <form action="/categories/delete/<?= $c['id'] ?>" method="post" style="display:inline;">
            <?= csrf_field() ?>
            <button onclick="return confirm('Hapus data?')">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</table>
