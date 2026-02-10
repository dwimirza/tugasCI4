<?= $this->extend('templates/template') ?>

<?= $this->section('title') ?>
Latest News
<?= $this->endSection() ?>

<?= $this->section('header_title') ?>
Latest News
<?= $this->endSection() ?>

<?= $this->section('header_subtitle') ?>
Stay informed with the latest stories
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main class="news-grid-wrapper">
    <?php if (!empty($news)): ?>
        <div class="news-grid">
            <?php foreach ($news as $item): ?>
                <article class="news-card">
                    <!-- Image -->
                    <div class="news-card__image-wrapper">
                        <span class="news-card__category">
                            <?= esc($item['category']) ?>
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="news-card__body">
                        <h3 class="news-card__title">
                            <?= esc($item['title']) ?>
                        </h3>

                        <p class="news-card__excerpt">
                            <?= esc($item['excerpt']) ?>
                        </p>

                        <!-- Meta -->
                        <div class="news-card__meta">
                            <div class="news-card__meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                <span><?= esc($item['author']) ?></span>
                            </div>
                            <div class="news-card__meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 2v4"/><path d="M16 2v4"/>
                                    <rect width="18" height="18" x="3" y="4" rx="2"/>
                                    <path d="M3 10h18"/>
                                </svg>
                                <span><?= esc($item['date']) ?></span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="news-empty">
            <p>No news available at the moment.</p>
        </div>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>
