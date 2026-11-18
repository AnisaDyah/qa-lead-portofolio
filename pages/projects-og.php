<!-- <section class="page-intro"><p class="eyebrow">WORKSPACE / PROJECTS</p><h1>Selected work &<br><span>quality in practice.</span></h1><p class="lead">Anonymized case studies showing testing challenges, delivery practices, and technical capabilities.</p></section>
<div class="filter-row">
    <button class="filter-button selected" data-filter="all">All work</button>
    <button class="filter-button" data-filter="integration">e-Procurement</button>
    <button class="filter-button" data-filter="banking">Banking</button>
    <button class="filter-button" data-filter="api">Finance</button>
    <button class="filter-button" data-filter="api">Integration</button>
</div>
<section class="editorial-list"><?php foreach ($projects as $i => $project): ?>
<article class="editorial-row project-editorial" data-project-category="<?= e((string)($project['filter'] ?? 'other')) ?>">
<div class="row-meta"><span><?= e((string)($project['code'] ?? sprintf('CASE-%02d',$i+1))) ?></span><small><?= e((string)($project['category'] ?? 'Case study')) ?></small></div>
<div class="row-content"><h2><?= e((string)($project['name'] ?? 'Project')) ?></h2><p><?= e((string)($project['summary'] ?? '')) ?></p>
<?php foreach (['challenge'=>'Challenge','approach'=>'QA approach'] as $key=>$label): if (!empty($project[$key])): ?><div class="detail-block"><h3><?= $label ?></h3><p><?= e((string)$project[$key]) ?></p></div><?php endif; endforeach; ?>
<?php if (!empty($project['responsibilities'])): ?><div class="detail-block"><h3>Responsibilities</h3><ul><?php foreach ($project['responsibilities'] as $item): ?><li><?= e((string)$item) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<div class="tag-list"><?php foreach (($project['skills'] ?? []) as $skill): ?><span><?= e((string)$skill) ?></span><?php endforeach; ?></div></div>
</article><?php endforeach; ?></section>
<p class="confidential-note">Project descriptions are generalized for portfolio use. Client data, screenshots, system identifiers, and internal documents should only be published with approval.</p> -->


<?php
/**
 * Projects page
 * Data source: /data/projects.json (loaded by index.php into $projects).
 *
 * Each project may define:
 * - role: qa | sa | dev
 * - filter: category slug, e.g. integration, banking, finance
 * - category: visible category label
 * - code, name, summary, challenge, approach,
 *   responsibilities[], skills[]
 *
 * Existing JSON records without a role default to QA.
 */

$roleTabs = [
    'qa' => [
        'number' => '01',
        'label' => 'Quality Assurance',
        'description' => 'Quality engineering, test management, and delivery assurance across business domains.'
    ],
    'sa' => [
        'number' => '02',
        'label' => 'System Analysis',
        'description' => 'Translating business needs into requirements, workflows, and system specifications.'
    ],
    'dev' => [
        'number' => '03',
        'label' => 'Software Development',
        'description' => 'Building applications and implementing software solutions across different problem domains.'
    ],
];

/*
 * Group projects by role.
 */
$projectsByRole = [
    'qa' => [],
    'sa' => [],
    'dev' => []
];

foreach ($projects as $project) {
    $role = (string)($project['role'] ?? 'qa');

    if (array_key_exists($role, $projectsByRole)) {
        $projectsByRole[$role][] = $project;
    }
}

/*
 * Default active role.
 */
$activeRole = 'qa';

foreach (array_keys($roleTabs) as $roleKey) {
    if (!empty($projectsByRole[$roleKey])) {
        $activeRole = $roleKey;
        break;
    }
}
?>

<link rel="stylesheet" href="assets/css/projects.css">

<section class="projects-page" id="projectsTop">

    <!-- ROLE BOOKMARK NAVIGATION -->
    <div class="role-bookmarks"
         role="tablist"
         aria-label="Projects by professional role">

        <?php foreach ($roleTabs as $roleKey => $tab): ?>

            <button
                class="role-bookmark<?= $roleKey === $activeRole ? ' is-active' : '' ?>"
                id="role-tab-<?= e($roleKey) ?>"
                type="button"
                role="tab"
                aria-selected="<?= $roleKey === $activeRole ? 'true' : 'false' ?>"
                aria-controls="role-panel-<?= e($roleKey) ?>"
                tabindex="<?= $roleKey === $activeRole ? '0' : '-1' ?>"
                data-role-tab="<?= e($roleKey) ?>"
            >

                <svg class="bookmark-icon"
                     viewBox="0 0 18 24"
                     aria-hidden="true">
                    <path d="M2 1.5h14v21L9 17.5l-7 5z"></path>
                </svg>

                <span class="bookmark-number">
                    <?= e($tab['number']) ?>
                </span>

                <span class="bookmark-label">
                    <?= e($tab['label']) ?>
                </span>

            </button>

        <?php endforeach; ?>

    </div>


    <!-- ROLE CONTENT PANELS -->
    <?php foreach ($roleTabs as $roleKey => $tab): ?>

        <?php
        $roleProjects = $projectsByRole[$roleKey];
        $isActive = $roleKey === $activeRole;

        /*
         * Generate category filters dynamically
         * from projects.json for each role.
         */
        $categories = [];

        foreach ($roleProjects as $project) {

            $slug = (string)($project['filter'] ?? 'all');
            $label = (string)($project['category'] ?? 'Case study');

            if ($slug !== 'all' && !isset($categories[$slug])) {
                $categories[$slug] = $label;
            }
        }
        ?>

        <section
            class="role-panel<?= $isActive ? ' is-active' : '' ?>"
            id="role-panel-<?= e($roleKey) ?>"
            role="tabpanel"
            aria-labelledby="role-tab-<?= e($roleKey) ?>"
            <?= $isActive ? '' : 'hidden' ?>
            data-role-panel="<?= e($roleKey) ?>"
        >

            <!-- PAGE INTRODUCTION -->
            <section class="page-intro">

                <p class="eyebrow">
                    WORKSPACE / PROJECTS
                </p>

                <h1>
                    Selected work &amp;<br>
                    <span>quality in practice.</span>
                </h1>

                <p class="lead">
                    Anonymized case studies showing testing challenges,
                    delivery practices, and technical capabilities.
                </p>

                <p class="role-description">
                    <?= e($tab['description']) ?>
                </p>

            </section>


            <!-- CATEGORY FILTERS -->
            <?php if (!empty($roleProjects)): ?>

                <div class="filter-row"
                     role="group"
                     aria-label="Filter <?= e($tab['label']) ?> projects">

                    <button
                        class="filter-button selected"
                        type="button"
                        data-category-filter="all"
                        aria-pressed="true">
                        All work
                    </button>

                    <?php foreach ($categories as $slug => $label): ?>

                        <button
                            class="filter-button"
                            type="button"
                            data-category-filter="<?= e($slug) ?>"
                            aria-pressed="false">
                            <?= e($label) ?>
                        </button>

                    <?php endforeach; ?>

                </div>


                <!-- EDITORIAL PROJECT LIST -->
                <section class="editorial-list">

                    <?php foreach ($roleProjects as $i => $project): ?>

                        <article
                            class="editorial-row project-editorial"
                            data-project-category="<?= e((string)($project['filter'] ?? 'other')) ?>"
                        >

                            <!-- PROJECT META -->
                            <div class="row-meta">

                                <span>
                                    <?= e((string)(
                                        $project['code']
                                        ?? sprintf('CASE-%02d', $i + 1)
                                    )) ?>
                                </span>

                                <small>
                                    <?= e((string)(
                                        $project['category']
                                        ?? 'Case study'
                                    )) ?>
                                </small>

                            </div>


                            <!-- PROJECT DETAILS -->
                            <div class="row-content">

                                <h2>
                                    <?= e((string)(
                                        $project['name'] ?? 'Project'
                                    )) ?>
                                </h2>

                                <?php if (!empty($project['summary'])): ?>

                                    <p>
                                        <?= e((string)$project['summary']) ?>
                                    </p>

                                <?php endif; ?>


                                <!-- CHALLENGE & APPROACH -->
                                <?php
                                $approachLabel = [
                                    'qa' => 'QA approach',
                                    'sa' => 'Analysis approach',
                                    'dev' => 'Development approach'
                                ][$roleKey];
                                ?>

                                <?php foreach ([
                                    'challenge' => 'Challenge',
                                    'approach' => $approachLabel
                                ] as $key => $label): ?>

                                    <?php if (!empty($project[$key])): ?>

                                        <div class="detail-block">

                                            <h3>
                                                <?= e($label) ?>
                                            </h3>

                                            <p>
                                                <?= e((string)$project[$key]) ?>
                                            </p>

                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>


                                <!-- RESPONSIBILITIES -->
                                <?php if (
                                    !empty($project['responsibilities'])
                                    && is_array($project['responsibilities'])
                                ): ?>

                                    <div class="detail-block">

                                        <h3>Responsibilities</h3>

                                        <ul>

                                            <?php foreach (
                                                $project['responsibilities']
                                                as $item
                                            ): ?>

                                                <li>
                                                    <?= e((string)$item) ?>
                                                </li>

                                            <?php endforeach; ?>

                                        </ul>

                                    </div>

                                <?php endif; ?>


                                <!-- TECHNOLOGY TAGS -->
                                <?php if (
                                    !empty($project['skills'])
                                    && is_array($project['skills'])
                                ): ?>

                                    <div class="tag-list">

                                        <?php foreach (
                                            $project['skills'] as $skill
                                        ): ?>

                                            <span>
                                                <?= e((string)$skill) ?>
                                            </span>

                                        <?php endforeach; ?>

                                    </div>

                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </section>

            <?php else: ?>

                <div class="role-empty-state">
                    <p>Projects for this role will be added soon.</p>
                </div>

            <?php endif; ?>

        </section>

    <?php endforeach; ?>


    <!-- CONFIDENTIALITY NOTICE -->
    <p class="confidential-note">
        Project descriptions are generalized for portfolio use.
        Client data, screenshots, system identifiers, and internal
        documents should only be published with approval.
    </p>

</section>
