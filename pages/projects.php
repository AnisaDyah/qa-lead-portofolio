<section class="page-intro"><p class="eyebrow">WORKSPACE / PROJECTS</p><h1>Selected work &<br><span>quality in practice.</span></h1><p class="lead">Anonymized case studies showing testing challenges, delivery practices, and technical capabilities.</p></section>
<div class="filter-row"><button class="filter-button selected" data-filter="all">All work</button><button class="filter-button" data-filter="integration">Integration</button><button class="filter-button" data-filter="banking">Banking</button><button class="filter-button" data-filter="api">API & Data</button></div>
<section class="editorial-list"><?php foreach ($projects as $i => $project): ?>
<article class="editorial-row project-editorial" data-project-category="<?= e((string)($project['filter'] ?? 'other')) ?>">
<div class="row-meta"><span><?= e((string)($project['code'] ?? sprintf('CASE-%02d',$i+1))) ?></span><small><?= e((string)($project['category'] ?? 'Case study')) ?></small></div>
<div class="row-content"><h2><?= e((string)($project['name'] ?? 'Project')) ?></h2><p><?= e((string)($project['summary'] ?? '')) ?></p>
<?php foreach (['challenge'=>'Challenge','approach'=>'QA approach'] as $key=>$label): if (!empty($project[$key])): ?><div class="detail-block"><h3><?= $label ?></h3><p><?= e((string)$project[$key]) ?></p></div><?php endif; endforeach; ?>
<?php if (!empty($project['responsibilities'])): ?><div class="detail-block"><h3>Responsibilities</h3><ul><?php foreach ($project['responsibilities'] as $item): ?><li><?= e((string)$item) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<div class="tag-list"><?php foreach (($project['skills'] ?? []) as $skill): ?><span><?= e((string)$skill) ?></span><?php endforeach; ?></div></div>
</article><?php endforeach; ?></section>
<p class="confidential-note">Project descriptions are generalized for portfolio use. Client data, screenshots, system identifiers, and internal documents should only be published with approval.</p>
