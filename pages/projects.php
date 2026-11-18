<?php
/**
 * Projects listing page.
 * Data source: data/projects.json (exported from Project_List_Revised_v2.xlsx).
 * If the main application already loads $projects, that array is reused.
 */
if (!isset($projects) || !is_array($projects)) {
    $jsonPath = __DIR__ . '/../data/projects.json';
    $decoded = is_file($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];
    $projects = is_array($decoded) ? $decoded : [];
}
$projectItems = $projects;
$totalProjects = count($projectItems);

$categories = [];
foreach ($projectItems as $item) {
    $category = trim((string)($item['roleCategory'] ?? 'Other'));
    $key = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $category));
    if (!isset($categories[$key])) $categories[$key] = ['label' => $category, 'count' => 0];
    $categories[$key]['count']++;
}
$roles = array_values(array_unique(array_filter(array_map(
    fn($item) => trim((string)($item['roleCategory'] ?? '')),
    $projectItems
))));
if (!function_exists('project_page_escape')) {
    function project_page_escape($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
}
?>
<link rel="stylesheet" href="assets/css/projects-page.css">

<section class="projects-page">
    <header class="projects-hero">
        <div class="projects-hero-copy">
            <div class="projects-eyebrow"><span></span> PROJECTS</div>
            <h1>Project Experience</h1>
            <p>A collection of projects across software development, system analysis, and quality assurance.</p>
        </div>
        <div class="projects-highlights">
            <div class="projects-highlight"><strong><?= number_format($totalProjects) ?>+</strong><span>Total Projects</span></div>
            <div class="projects-highlight"><strong><?= count($roles) ?></strong><span>Professional Roles</span></div>
        </div>
    </header>

    <div class="projects-toolbar">
        <div class="projects-filters" role="group" aria-label="Filter projects">
            <button class="projects-filter is-active" type="button" data-project-filter="all">All Projects <span><?= $totalProjects ?></span></button>
            <?php foreach ($categories as $key => $category): ?>
                <button class="projects-filter" type="button" data-project-filter="<?= project_page_escape($key) ?>">
                    <?= project_page_escape($category['label']) ?> <span><?= $category['count'] ?></span>
                </button>
            <?php endforeach; ?>
        </div>
        <label class="projects-search"><span aria-hidden="true">⌕</span><input type="search" id="projectSearch" placeholder="Search project..." aria-label="Search projects"></label>
    </div>

    <div class="projects-grid" id="projectsGrid">
        <?php foreach ($projectItems as $index => $project):
            $title = (string)($project['title'] ?? 'Untitled Project');
            $roleCategory = (string)($project['roleCategory'] ?? 'Other');
            $filterKey = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $roleCategory));
            $summary = (string)($project['summary'] ?? '');
            $company = (string)($project['company'] ?? '');
            $period = (string)($project['period'] ?? '');
            $skills = is_array($project['skills'] ?? null) ? $project['skills'] : [];
            $detailUrl = 'index.php?page=project-detail&id=' . rawurlencode((string)($project['id'] ?? $index));
            $searchText = strtolower($title . ' ' . $roleCategory . ' ' . ($project['category'] ?? '') . ' ' . $summary . ' ' . $company . ' ' . implode(' ', $skills));
        ?>
        <article class="projects-card" data-project-card data-category="<?= project_page_escape($filterKey) ?>" data-search="<?= project_page_escape($searchText) ?>">
            <a class="projects-card-image is-placeholder" href="<?= project_page_escape($detailUrl) ?>" aria-label="View <?= project_page_escape($title) ?>">
                <span class="projects-image-placeholder"><?= project_page_escape(strtoupper(substr($roleCategory, 0, 2))) ?></span>
                <span class="projects-card-category"><?= project_page_escape($roleCategory) ?></span>
            </a>
            <div class="projects-card-body">
                <div class="projects-card-company"><?= project_page_escape($company) ?></div>
                <h2><?= project_page_escape($title) ?></h2>
                <p><?= project_page_escape($summary) ?></p>
                <div class="projects-card-meta">
                    <span><b aria-hidden="true">↗</b><?= project_page_escape($roleCategory) ?></span>
                    <?php if ($period !== ''): ?><span><b aria-hidden="true">◷</b><?= project_page_escape($period) ?></span><?php endif; ?>
                </div>
                <div class="projects-card-bottom">
                    <div class="projects-tags"><?php foreach (array_slice($skills, 0, 3) as $skill): ?><span><?= project_page_escape($skill) ?></span><?php endforeach; ?></div>
                    <a class="projects-details-link" href="<?= project_page_escape($detailUrl) ?>">View Details <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
    <div class="projects-empty" id="projectsNoResults" hidden>No projects match your search.</div>
</section>
<script src="assets/js/projects.js"></script>
