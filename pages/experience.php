<section class="page-intro"><p class="eyebrow">CAREER / EXPERIENCE</p><h1>Experience across<br><span>the delivery lifecycle.</span></h1><p class="lead">From building applications and translating requirements to coordinating testing and quality activities.</p></section>
<section class="editorial-list">
<?php foreach ($experience as $i => $role): ?>
<article class="editorial-row">
  <div class="row-meta"><span><?= sprintf('%02d', $i+1) ?></span><small><?= e((string)($role['period'] ?? '')) ?><br><?= e((string)($role['organization'] ?? '')) ?></small></div>
  <div class="row-content"><h2><?= e((string)($role['role'] ?? 'Professional experience')) ?></h2><p><?= e((string)($role['description'] ?? '')) ?></p>
  <?php if (!empty($role['responsibilities'])): ?><ul><?php foreach ($role['responsibilities'] as $item): ?><li><?= e((string)$item) ?></li><?php endforeach; ?></ul><?php endif; ?>
  <?php if (!empty($role['tags'])): ?><div class="tag-list"><?php foreach ($role['tags'] as $tag): ?><span><?= e((string)$tag) ?></span><?php endforeach; ?></div><?php endif; ?></div>
</article>
<?php endforeach; ?>
</section>
