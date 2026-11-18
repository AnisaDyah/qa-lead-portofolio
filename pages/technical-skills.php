<?php
/*
 * Page 6 — Technical Skills
 * Uses the existing V4 page shell and shared navigation.
 * Include this file through index.php?page=technical-skills.
 */

$technicalGroups = [
    [
        'title' => 'Manual Testing',
        'description' => 'Execute and validate functional business scenarios across the SDLC, including SIT, UAT, and production readiness.',
        'icon' => 'clipboard',
        'tags' => [
            ['label' => 'Functional Testing'],
            ['label' => 'Regression Testing'],
            ['label' => 'Smoke Testing'],
            ['label' => 'SIT'],
            ['label' => 'UAT'],
            ['label' => 'Exploratory Testing'],
        ],
    ],
    [
        'title' => 'Automation Testing',
        'description' => 'Build and maintain automated tests to improve testing efficiency, repeatability, and coverage.',
        'icon' => 'code',
        'tags' => [
            ['label' => 'Katalon Studio', 'logo' => 'katalon'],
            ['label' => 'Test Automation'],
            ['label' => 'Test Scripting'],
            ['label' => 'Newman'],
        ],
    ],
    [
        'title' => 'API & Integration Testing',
        'description' => 'Validate API functionality, data exchange, and end-to-end integration between systems.',
        'icon' => 'api',
        'tags' => [
            ['label' => 'Postman', 'logo' => 'postman'],
            ['label' => 'REST API'],
            ['label' => 'JSON'],
            ['label' => 'ESB Integration'],
            ['label' => 'API Validation'],
        ],
    ],
    [
        'title' => 'Performance Testing',
        'description' => 'Assess system performance, stability, and scalability under different load conditions.',
        'icon' => 'gauge',
        'tags' => [
            ['label' => 'Apache JMeter', 'logo' => 'apachejmeter'],
            ['label' => 'Load Testing'],
            ['label' => 'Stress Testing'],
            ['label' => 'Response Time Analysis'],
        ],
    ],
    [
        'title' => 'Database & Data Validation',
        'description' => 'Validate data accuracy, consistency, and integrity across applications, services, and databases.',
        'icon' => 'database',
        'tags' => [
            ['label' => 'PostgreSQL', 'logo' => 'postgresql'],
            ['label' => 'SQL Server', 'logo' => 'microsoftsqlserver'],
            ['label' => 'Oracle', 'logo' => 'oracle'],
            ['label' => 'SQL'],
            ['label' => 'Test Data Preparation'],
            ['label' => 'Data Validation'],
        ],
    ],
    [
        'title' => 'Programming & Development',
        'description' => 'Development foundations supporting test automation, data handling, troubleshooting, and system analysis.',
        'icon' => 'brackets',
        'tags' => [
            ['label' => 'PHP', 'logo' => 'php'],
            ['label' => '.NET', 'logo' => 'dotnet'],
            ['label' => 'JavaScript', 'logo' => 'javascript'],
            ['label' => 'HTML', 'logo' => 'html5'],
            ['label' => 'CSS', 'logo' => 'css3'],
            ['label' => 'Git', 'logo' => 'git'],
            ['label' => 'CI/CD'],
        ],
    ],
];

$platforms = [
    ['name' => 'Temenos T24', 'detail' => 'R10 & R24', 'logo' => null, 'mark' => 'T24'],
    ['name' => 'Core Banking', 'detail' => 'Systems', 'logo' => null, 'mark' => 'CB'],
    ['name' => 'SAP', 'detail' => 'Integration', 'logo' => 'sap', 'mark' => 'SAP'],
    ['name' => 'Enterprise Service Bus', 'detail' => '(ESB)', 'logo' => null, 'mark' => 'ESB'],
];

function technical_logo_url(string $slug): string
{
    $colors = [
        'katalon' => '22B573',
        'postman' => 'FF6C37',
        'apachejmeter' => 'D22128',
        'postgresql' => '4169E1',
        'microsoftsqlserver' => 'CC2927',
        'oracle' => 'F80000',
        'php' => '777BB4',
        'dotnet' => '512BD4',
        'javascript' => 'F7DF1E',
        'html5' => 'E34F26',
        'css3' => '1572B6',
        'git' => 'F05032',
        'sap' => '0FA6E8',
    ];

    $color = $colors[$slug] ?? '24231F';
    return 'https://cdn.simpleicons.org/' . rawurlencode($slug) . '/' . $color;
}
?>

<link rel="stylesheet" href="assets/css/technical-skills.css">

<section class="tech-hero" aria-labelledby="technical-skills-title">
    <div class="tech-hero-index">
        <span class="tech-eyebrow">PORTFOLIO / WORKSPACE</span>
        <strong>06</strong>
    </div>
    <div class="tech-hero-title">
        <p class="eyebrow">WORKSPACE / TECHNICAL</p>
        <h1 id="technical-skills-title">Technical<br><span>Skills.</span></h1>
    </div>
    <p class="tech-hero-description">
        Practical technical capabilities, tools, and technologies I use to support
        software quality, reliability, and integration across business systems.
    </p>
</section>

<section class="tech-skill-list" aria-label="Technical skill categories">
    <?php foreach ($technicalGroups as $index => $group): ?>
        <article class="tech-skill-row">
            <div class="tech-row-number"><?= sprintf('%02d', $index + 1) ?></div>

            <div class="tech-row-icon tech-icon-<?= e($group['icon']) ?>" aria-hidden="true">
                <?php if ($group['icon'] === 'clipboard'): ?>
                    <svg viewBox="0 0 48 48"><rect x="10" y="8" width="28" height="34" rx="3"/><path d="M18 8V5h12v3M17 20l3 3 6-7M17 31l3 3 6-7M29 21h4M29 32h4"/></svg>
                <?php elseif ($group['icon'] === 'code' || $group['icon'] === 'brackets'): ?>
                    <svg viewBox="0 0 48 48"><path d="M17 12 5 24l12 12M31 12l12 12-12 12M27 7l-6 34"/></svg>
                <?php elseif ($group['icon'] === 'api'): ?>
                    <svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="17"/><path d="m17 29 14-14M18 17l4-4M27 34l4-4M14 34l-3 3M34 14l3-3"/></svg>
                <?php elseif ($group['icon'] === 'gauge'): ?>
                    <svg viewBox="0 0 48 48"><path d="M8 32a17 17 0 1 1 32 0M14 32h20M24 24l9-9"/><circle cx="24" cy="24" r="2"/></svg>
                <?php else: ?>
                    <svg viewBox="0 0 48 48"><ellipse cx="24" cy="10" rx="15" ry="6"/><path d="M9 10v27c0 3 7 6 15 6s15-3 15-6V10M9 23c0 3 7 6 15 6s15-3 15-6"/></svg>
                <?php endif; ?>
            </div>

            <div class="tech-row-copy">
                <h2><?= e($group['title']) ?></h2>
                <p><?= e($group['description']) ?></p>
            </div>

            <div class="tech-row-tags">
                <?php foreach ($group['tags'] as $tag): ?>
                    <span class="tech-tag">
                        <?php if (!empty($tag['logo'])): ?>
                            <img
                                src="<?= e(technical_logo_url($tag['logo'])) ?>"
                                alt=""
                                loading="lazy"
                                onerror="this.hidden=true"
                            >
                        <?php endif; ?>
                        <span><?= e($tag['label']) ?></span>
                    </span>
                <?php endforeach; ?>
            </div>
        </article>
    <?php endforeach; ?>
</section>

<section class="tech-platforms" aria-labelledby="tech-platforms-title">
    <div class="tech-platform-heading">
        <p class="eyebrow">SYSTEMS &amp; ENVIRONMENTS</p>
        <h2 id="tech-platforms-title">Platform<br>Experience</h2>
    </div>
    <div class="tech-platform-grid">
        <?php foreach ($platforms as $platform): ?>
            <article class="tech-platform-item">
                <?php if (!empty($platform['logo'])): ?>
                    <img
                        class="tech-platform-logo"
                        src="<?= e(technical_logo_url($platform['logo'])) ?>"
                        alt="<?= e($platform['name']) ?> logo"
                        loading="lazy"
                        onerror="this.hidden=true"
                    >
                <?php else: ?>
                    <span class="tech-platform-mark" aria-hidden="true"><?= e($platform['mark']) ?></span>
                <?php endif; ?>
                <div>
                    <h3><?= e($platform['name']) ?></h3>
                    <p><?= e($platform['detail']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<p class="tech-disclaimer">
    Tools and platforms are listed to reflect practical exposure and working experience.
    Specific depth of use may vary by project and responsibility.
</p>
