<!-- <link rel="stylesheet" href="assets/css/experience-timeline.css">
<section class="page-intro"><p class="eyebrow">CAREER / EXPERIENCE</p><h1>Experience across<br><span>the delivery lifecycle.</span></h1><p class="lead">From building applications and translating requirements to coordinating testing and quality activities.</p></section>
<section class="editorial-list">
<?php foreach ($experience as $i => $role): ?>
<article class="editorial-row">
  <div class="row-meta"><span><?= sprintf('%02d', $i+1) ?></span><small><?= e((string)($role['period'] ?? '')) ?><br><?= e((string)($role['organization'] ?? '')) ?></small></div>
  <div class="row-content"><h2><?= e((string)($role['role'] ?? 'Professional experience')) ?></h2><p><?= e((string)($role['description'] ?? '')) ?></p>
  <?php if (!empty($role['responsibilities'])): ?><ul><?php foreach ($role['responsibilities'] as $item): ?><li><?= render_markdown($item) ?></li><?php endforeach; ?></ul><?php endif; ?>
  <?php if (!empty($role['tags'])): ?><div class="tag-list"><?php foreach ($role['tags'] as $tag): ?><span><?= e((string)$tag) ?></span><?php endforeach; ?></div><?php endif; ?></div>
</article>
<?php endforeach; ?>
</section> -->

<link rel="stylesheet" href="assets/css/experience-timeline.css">

<section class="page-intro">
    <p class="eyebrow">CAREER / EXPERIENCE</p>
    <h1>Experience across<br><span>the delivery lifecycle.</span></h1>
    <p class="lead">From building applications and translating requirements to coordinating testing and quality activities.</p>
</section>

<section class="panel timeline" aria-label="Professional experience timeline">
    <?php foreach ($experience as $i => $role): ?>
        <article class="timeline-item">
            <span class="timeline-marker" aria-hidden="true"></span>

            <details class="experience-details">
                <summary class="experience-summary">
                    <div class="experience-heading">
                        <div class="eyebrow">
                            <?= sprintf('%02d', $i + 1) ?>
                            <span class="meta-separator">/</span>
                            <?= e((string)($role['period'] ?? '')) ?>
                            <?php if (!empty($role['organization'])): ?>
                                <span class="meta-separator">·</span>
                                <?= e((string)$role['organization']) ?>
                            <?php endif; ?>
                        </div>

                        <h2><?= e((string)($role['role'] ?? 'Professional experience')) ?></h2>

                        <?php if (!empty($role['description'])): ?>
                            <p><?= render_markdown((string)$role['description']) ?></p>
                        <?php endif; ?>
                    </div>

                    <span class="experience-toggle" aria-hidden="true"></span>
                </summary>

                <div class="experience-details-content">
                    <?php if (!empty($role['responsibilities'])): ?>
                        <ul class="experience-responsibilities">
                            <?php foreach ($role['responsibilities'] as $item): ?>
                                <li><?= render_markdown((string)$item) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($role['tags'])): ?>
                        <div class="focus-tags">
                            <?php foreach ($role['tags'] as $tag): ?>
                                <span><?= e((string)$tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </details>
        </article>
    <?php endforeach; ?>
</section>
