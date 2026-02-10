<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?? 'Latest News' ?></title>
    <style>
        /* paste ALL your CSS from the question here (unchanged) */
          /* ============================================
         *  CSS Variables (Design Tokens)
         * ============================================ */
        :root {
            --background: #f5f7fa;
            --foreground: #1a2332;
            --card: #ffffff;
            --card-foreground: #1a2332;
            --primary: #2563eb;
            --primary-foreground: #ffffff;
            --muted-foreground: #6b7a8d;
            --border: #dfe4ea;
            --radius: 0.625rem;
            --font-sans: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* ============================================
         *  Base / Reset
         * ============================================ */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--background);
            color: var(--foreground);
            line-height: 1.5;
            min-height: 100vh;
        }

        img {
            display: block;
            max-width: 100%;
        }

        /* ============================================
         *  Header
         * ============================================ */
        .site-header {
            background-color: var(--card);
            border-bottom: 1px solid var(--border);
        }

        .header-inner {
            max-width: 72rem;
            margin: 0 auto;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background-color: var(--primary);
            color: var(--primary-foreground);
            border-radius: var(--radius);
            flex-shrink: 0;
        }

        .header-icon svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: var(--foreground);
        }

        .header-subtitle {
            font-size: 0.875rem;
            color: var(--muted-foreground);
        }

        /* ============================================
         *  News Grid
         * ============================================ */
        .news-grid-wrapper {
            max-width: 72rem;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .news-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .news-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* ============================================
         *  News Card
         * ============================================ */
        .news-card {
            background-color: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.2s ease;
        }

        .news-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Card Image */
        .news-card__image-wrapper {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background-color: var(--border);
        }

        .news-card__image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Category Badge */
        .news-card__category {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: var(--primary);
            color: var(--primary-foreground);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.025em;
            border-radius: 9999px;
            line-height: 1.5;
        }

        /* Card Body */
        .news-card__body {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            padding: 1.25rem;
        }

        .news-card__title {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.35;
            color: var(--card-foreground);
            text-wrap: balance;
        }

        .news-card__excerpt {
            font-size: 0.875rem;
            line-height: 1.6;
            color: var(--muted-foreground);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Card Meta */
        .news-card__meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 0.25rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            font-size: 0.75rem;
            color: var(--muted-foreground);
        }

        .news-card__meta-item {
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .news-card__meta-item svg {
            width: 0.875rem;
            height: 0.875rem;
            flex-shrink: 0;
        }

        /* ============================================
         *  Empty State
         * ============================================ */
        .news-empty {
            text-align: center;
            padding: 4rem 1rem;
            color: var(--muted-foreground);
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <!-- Header (kept in layout so all pages share it) -->
    <header class="site-header">
        <div class="header-inner">
            <div class="header-icon">
                <!-- you can keep the SVG icon here -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
                    <path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/>
                </svg>
            </div>
            <div>
                <h1 class="header-title"><?= $this->renderSection('header_title') ?: 'Latest News' ?></h1>
                <p class="header-subtitle"><?= $this->renderSection('header_subtitle') ?: 'Stay informed with the latest stories' ?></p>
            </div>
        </div>
    </header>

    <!-- Main content from child views -->
    <?= $this->renderSection('content') ?>

</body>
</html>
