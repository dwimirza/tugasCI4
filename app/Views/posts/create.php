<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div style="max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
    <h2 style="color: #333; margin-bottom: 20px;"><?= esc($title) ?></h2>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="background: #f8d7da; color: #721c24; padding: 12px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?= form_open_multipart('/posts/store') ?>
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Title</label>
            <?= form_input(['name' => 'title', 'style' => 'width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;', 'value' => old('title')]) ?>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Content</label>
            <?= form_textarea(['name' => 'content', 'style' => 'width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; min-height: 120px; resize: vertical;', 'value' => old('content')]) ?>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Category</label>
            <?= form_dropdown('category_id', $categories, old('category_id'), ['style' => 'width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background: white;']) ?>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Image (JPG/PNG/GIF, max 2MB)</label>
            <?= form_upload(['name' => 'image', 'style' => 'width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; background: white;']) ?>
        </div>
        
        <button type="submit" style="background: #007bff; color: white; padding: 12px 24px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
            Create Post
        </button>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>
