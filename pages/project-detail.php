<?php
$path=__DIR__.'/../data/projects.json'; $projects=json_decode(file_get_contents($path),true) ?: [];
function pde($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
$id=(string)($_GET['id']??'');$project=null;foreach($projects as $item){if($item['id']===$id){$project=$item;break;}}
if(!$project){http_response_code(404);?><section class="project-detail"><a href="index.php?page=projects">← Back to Projects</a><h1>Project not found</h1></section><?php return;}
?>
<link rel="stylesheet" href="assets/css/project-detail.css">
<section class="project-detail"><a class="back" href="index.php?page=projects">← Back to Projects</a>
<header class="detail-hero"><div><p class="eyebrow">PROJECT CASE STUDY · <?=pde($project['roleCategory'])?></p><h1><?=pde($project['title'])?></h1><p class="summary"><?=pde($project['summary'])?></p></div><dl><?php foreach(['Role'=>'roleCategory','Company'=>'company','Period'=>'period','Category'=>'category'] as $label=>$key):if($project[$key]):?><div><dt><?=pde($label)?></dt><dd><?=pde($project[$key])?></dd></div><?php endif;endforeach;?></dl></header>
<?php if($project['summary']||$project['scope']):?><section class="detail-section two"><div><small>OVERVIEW</small><h2>Project Overview</h2><p><?=pde($project['summary'])?></p></div><?php if($project['scope']):?><div><small>SCOPE</small><h2>Project Scope</h2><ul><?php foreach($project['scope'] as $v):?><li><?=pde($v)?></li><?php endforeach;?></ul></div><?php endif;?></section><?php endif;?>
<!-- <?php if($project['metricsQa']):?><section class="detail-section"><small>QUALITY & EXECUTION</small><h2>QA Metrics</h2><div class="metric-grid"><?php foreach($project['metricsQa'] as $v):?><div><?=pde($v)?></div><?php endforeach;?></div></section><?php endif;?> -->

<?php if ($project['metricsQa']): 
    $metricCards = [];

    foreach ($project['metricsQa'] as $metric) {
        if (preg_match('/^([^:]+):\s*(.*)$/', $metric, $match)) {
            $metricCards[] = [
                'label' => trim($match[1]),
                'description' => trim($match[2])
            ];
        }
    }

    // Split the Temenos execution result into its four documented figures.
    if (count($metricCards) >= 2 &&
        stripos($metricCards[1]['label'], 'pass rate') !== false) {

        preg_match('/approximately\s*([\d,]+)/i',
            $metricCards[0]['description'], $total);

        preg_match('/(\d+)%.*?(\d+)%.*?(\d+)%/i',
            $metricCards[1]['description'], $rates);

        if ($total && $rates) {
            $metricCards = [
                ['value' => '~' . $total[1], 'label' => 'Total Test Cases',
                 'description' => 'Test scenarios managed'],
                ['value' => $rates[1] . '%', 'label' => 'Pass Rate',
                 'description' => 'Test cases passed'],
                ['value' => $rates[2] . '%', 'label' => 'Fail Rate',
                 'description' => 'Test cases failed'],
                ['value' => $rates[3] . '%', 'label' => 'Others',
                 'description' => 'Not classified / N/A']
            ];
        }
    }
?>

<section class="detail-section qa-metrics-section">
    <small>QUALITY & EXECUTION</small>
    <h2>QA Metrics</h2>

    <div class="qa-metrics-grid">
        <?php foreach ($metricCards as $index => $metric): ?>
        <article class="qa-metric-card">
            <div class="qa-metric-icon">
                <?= ['▱', '✓', '×', '⚙'][$index % 4] ?>
            </div>

            <div class="qa-metric-content">
                <?php if (isset($metric['value'])): ?>
                    <h2><?= pde($metric['value']) ?></h2>
                <?php endif; ?>

                <h3><?= pde($metric['label']) ?></h3>
                <p><?= pde($metric['description']) ?></p>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php
$workflowSteps = [];

if (!empty($project['workflow'])) {
    $workflowSteps = preg_split('/\s*→\s*/u', trim($project['workflow']));
    $workflowSteps = array_values(array_filter(
        array_map('trim', $workflowSteps),
        fn($step) => $step !== ''
    ));
}
?>

<?php if (!empty($workflowSteps)): ?>
<section class="detail-section workflow-section">
    <small>PROCESS</small>
    <h2>Workflow</h2>

    <div class="workflow-grid">
        <?php foreach ($workflowSteps as $index => $step): ?>
            <article class="workflow-card">
                <div class="workflow-card-top">
                    <span class="workflow-number">
                        <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>
                    </span>
                    <span class="workflow-line"></span>
                </div>

                <p><?= pde($step) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>



<?php
$documentationImages = is_array($project['documentationImages'] ?? null)
    ? $project['documentationImages']
    : [];
?>

<?php if ($project['visualization'] || $documentationImages): ?>
<section class="detail-section documentation-section">
    <small>PROJECT EVIDENCE</small>
    <h2>Project Documentation</h2>

    <?php if ($project['visualization']): ?>
        <p class="documentation-description">
            <?= pde($project['visualization']) ?>
        </p>
    <?php endif; ?>

    <?php if ($documentationImages): ?>
    <div class="documentation-gallery">
        <?php foreach ($documentationImages as $index => $image): ?>
            <?php if (!empty($image['src'])): ?>
            <button
                type="button"
                class="documentation-image"
                data-gallery-index="<?= $index ?>"
                aria-label="View <?= pde($image['caption'] ?? 'project screenshot') ?>"
            >
                <img
                    src="<?= pde($image['src']) ?>"
                    alt="<?= pde($image['caption'] ?? 'Project documentation') ?>"
                    loading="lazy"
                >
                <span class="image-view-icon">↗</span>
                <?php if (!empty($image['caption'])): ?>
                    <span class="image-caption">
                        <?= pde($image['caption']) ?>
                    </span>
                <?php endif; ?>
            </button>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>

<div class="gallery-lightbox" id="galleryLightbox" aria-hidden="true">
    <button class="gallery-close" type="button" aria-label="Close">×</button>
    <button class="gallery-prev" type="button" aria-label="Previous image">‹</button>

    <div class="gallery-viewer">
        <img id="lightboxImage" src="" alt="">
        <p id="lightboxCaption"></p>
    </div>

    <button class="gallery-next" type="button" aria-label="Next image">›</button>
</div>

<script src="assets/js/project-gallery.js"></script>

<?php if($project['tools']||$project['skills']):?><section class="detail-section two"><?php foreach(['Tools'=>'tools','Skills'=>'skills'] as $label=>$key):if($project[$key]):?><div><small><?=strtoupper($label)?></small><h2><?=pde($label)?></h2><div class="chips"><?php foreach($project[$key] as $v):?><span><?=pde($v)?></span><?php endforeach;?></div></div><?php endif;endforeach;?></section><?php endif;?>
<?php if($project['deliverables']):?><section class="detail-section"><small>OUTPUT</small><h2>Deliverables</h2><ul class="deliverables"><?php foreach($project['deliverables'] as $v):?><li><?=pde($v)?></li><?php endforeach;?></ul></section><?php endif;?>
<footer><a href="index.php?page=projects">← Back to all projects</a></footer></section>
