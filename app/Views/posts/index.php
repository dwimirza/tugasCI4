<?= $this->extend('layout/template.php') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <h2><?= esc($title) ?></h2>
    <a href="/posts/create" class="btn btn-success mb-3">New Post</a>
    <?php if (session()->getFlashdata('success')): ?><div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div><?php endif; ?>
    <div class="row">
         <table class="table table-bordered" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:1px solid #ddd; padding:8px;">Image</th>
            <th style="border:1px solid #ddd; padding:8px;">Title</th>
            <th style="border:1px solid #ddd; padding:8px;">Content Preview</th>
            <th style="border:1px solid #ddd; padding:8px;">Category</th>
            <th style="border:1px solid #ddd; padding:8px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($posts)): ?>
            <tr><td colspan="5" style="text-align:center; padding:20px;">No posts yet.</td></tr>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                        <?php if ($post['image']): ?>
                            <img src="<?= base_url($post['image']) ?>" alt="<?= esc($post['title']) ?>" style="max-width:100px; max-height:100px; object-fit:cover;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td style="border:1px solid #ddd; padding:8px;"><?= esc($post['title']) ?></td>
                    <td style="border:1px solid #ddd; padding:8px;"><?= esc(substr($post['content'], 0, 100)) ?>...</td>
                    <td style="border:1px solid #ddd; padding:8px;"><?= esc($post['category_name']) ?></td>
                    <td style="border:1px solid #ddd; padding:8px;">
                        <a href="<?= site_url('/post/' . $post['id']) ?>">View</a> |
                        <a href="<?= site_url('/posts/edit/' . $post['id']) ?>">Edit</a> |
                        <form action="/posts/delete/<?= $post['id'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Delete?')">
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

       
    </div>
</div>
<?= $this->endSection() ?>
