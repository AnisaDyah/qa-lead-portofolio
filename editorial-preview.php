<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$profile = load_json('profile.json');
$projects = load_json('projects.json');
$skills = load_json('skills.json');
$experience = load_json('experience.json');
$dashboard = load_json('dashboard.json');

$displayName = trim((string)($profile['display_name'] ?? ''));
if ($displayName === '' || $displayName === 'Your Name') $displayName = 'QA Lead Portfolio';
$headline = trim((string)($profile['headline'] ?? '')) ?: 'QA Lead | Software Quality & Development';
$summary = trim((string)($profile['summary'] ?? ''));
if ($summary === '' || str_contains($summary, 'Replace with')) {
    $summary = 'A quality assurance professional with a foundation in software development and system analysis. I connect business requirements, technical implementation, and structured testing to help teams deliver reliable software.';
}
$metrics = $dashboard['metrics'] ?? [];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Professional portfolio showcasing QA leadership, software quality, testing, system analysis, and development experience.">
  <meta name="theme-color" content="#f6f3ed">
  <title><?= e($displayName) ?> — <?= e($headline) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/editorial.css">
</head>
<body>
<header class="topbar">
  <a class="wordmark" href="#top" aria-label="Back to top">QA<span>.</span></a>
  <nav aria-label="Main navigation">
    <a href="about-editorial.php">About</a><a href="#experience">Experience</a><a href="#work">Selected work</a><a href="#leadership">QA leadership</a><a href="#contact">Contact</a>
  </nav>
  <a class="top-cta" href="#contact">Let's connect <span>↗</span></a>
</header>
<main id="top">
  <section class="hero wrap">
    <div class="hero-copy">
      <p class="kicker"><span class="kicker-line"></span> SOFTWARE QUALITY · QA LEADERSHIP</p>
      <h1>Quality is not a final checkpoint.<br><em>It is built into every step.</em></h1>
      <p class="hero-lead"><?= e($summary) ?></p>
      <div class="hero-actions">
        <a class="button-primary" href="#work">Explore selected work <span>↗</span></a>
        <a class="text-cta" href="#experience">Explore my experience <span>↓</span></a>
      </div>
    </div>
    <aside class="hero-note" aria-label="Professional identity">
      <span class="note-index">01 / PROFILE</span>
      <div class="monogram">Q<span>A</span></div>
      <p class="note-role"><?= e($headline) ?></p>
      <p class="note-caption">A perspective shaped by software development, system analysis, and quality assurance.</p>
      <div class="note-rule"></div>
      <p class="note-foot">THINK CLEARLY. TEST THOROUGHLY. DELIVER WITH CONFIDENCE.</p>
    </aside>
  </section>

  <?php if (!empty($metrics)): ?>
  <section class="metrics wrap" aria-label="Verified portfolio metrics">
    <?php foreach ($metrics as $metric): ?>
      <div class="metric"><span><?= e((string)($metric['label'] ?? '')) ?></span><strong><?= e((string)($metric['value'] ?? '')) ?></strong><?php if (!empty($metric['note'])): ?><small><?= e((string)$metric['note']) ?></small><?php endif; ?></div>
    <?php endforeach; ?>
  </section>
  <?php endif; ?>

  <section class="intro-section wrap" id="about">
    <div class="section-label"><span>01</span> THE APPROACH</div>
    <div class="intro-content">
      <h2>Bridging business needs<br>and <em>technical quality.</em></h2>
      <div class="intro-columns">
        <p>My career began in software development, followed by system analysis and then quality assurance. This progression helps me understand how requirements become application features, how systems exchange data, and where defects can emerge across the delivery lifecycle.</p>
        <p>My QA approach combines structured planning, risk awareness, clear ownership, evidence-based execution, and practical communication. I aim to make quality visible early—not only report defects at the end of a project.</p>
      </div>
      <div class="profile-facts">
        <div><span>PROFESSIONAL FOUNDATION</span><strong>Development · Analysis · QA</strong></div>
        <div><span>EDUCATION</span><strong>Bachelor's in Information Technology</strong></div>
        <div><span>WORKING STYLE</span><strong>Structured · Collaborative · Evidence-led</strong></div>
      </div>
    </div>
  </section>

  <section class="experience-section" id="experience">
    <div class="wrap">
      <div class="section-heading">
        <div><p class="kicker">CAREER JOURNEY</p><h2>Experience across<br><em>the delivery lifecycle.</em></h2></div>
        <p class="section-aside">From building applications and translating requirements to coordinating testing and quality activities.</p>
      </div>
      <div class="timeline">
        <?php foreach ($experience as $i => $role): ?>
          <article class="timeline-row">
            <div class="timeline-date"><?= e((string)($role['period'] ?? '')) ?><small><?= e((string)($role['organization'] ?? '')) ?></small></div>
            <div class="timeline-main">
              <h3><?= e((string)($role['role'] ?? 'Professional experience')) ?></h3>
              <p><?= e((string)($role['description'] ?? '')) ?></p>
              <?php if (!empty($role['responsibilities'])): ?>
                <ul class="responsibility-list"><?php foreach ($role['responsibilities'] as $item): ?><li><?= e((string)$item) ?></li><?php endforeach; ?></ul>
              <?php endif; ?>
              <?php if (!empty($role['tags'])): ?><div class="project-tags"><?php foreach ($role['tags'] as $tag): ?><span><?= e((string)$tag) ?></span><?php endforeach; ?></div><?php endif; ?>
            </div>
            <div class="timeline-no"><?= sprintf('%02d', $i + 1) ?></div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="work-section wrap" id="work">
    <div class="section-heading">
      <div><p class="kicker">SELECTED WORK</p><h2>Case studies &<br><em>quality in practice.</em></h2></div>
      <p class="section-aside">Anonymized examples of testing challenges, delivery practices, and technical capabilities.</p>
    </div>
    <div class="project-list">
      <?php foreach ($projects as $i => $project): ?>
        <article class="project-row" data-category="<?= e((string)($project['filter'] ?? 'other')) ?>">
          <div class="project-meta"><span><?= e((string)($project['code'] ?? sprintf('CASE-%02d', $i + 1))) ?></span><span><?= e((string)($project['category'] ?? 'Case study')) ?></span></div>
          <div class="project-info">
            <h3><?= e((string)($project['name'] ?? 'Project')) ?></h3>
            <p><?= e((string)($project['summary'] ?? '')) ?></p>
            <?php if (!empty($project['challenge'])): ?><div class="case-detail"><h4>Challenge</h4><p><?= e((string)$project['challenge']) ?></p></div><?php endif; ?>
            <?php if (!empty($project['approach'])): ?><div class="case-detail"><h4>QA approach</h4><p><?= e((string)$project['approach']) ?></p></div><?php endif; ?>
            <?php if (!empty($project['responsibilities'])): ?><div class="case-detail"><h4>Responsibilities</h4><ul><?php foreach ($project['responsibilities'] as $item): ?><li><?= e((string)$item) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
            <div class="project-tags"><?php foreach (($project['skills'] ?? []) as $skill): ?><span><?= e((string)$skill) ?></span><?php endforeach; ?></div>
          </div>
          <div class="project-arrow" aria-hidden="true">↗</div>
        </article>
      <?php endforeach; ?>
    </div>
    <p class="confidential-note">Project descriptions are generalized for portfolio use. Specific client data, screenshots, system identifiers, and internal documents should only be published with approval.</p>
  </section>

  <section class="capabilities-section" id="leadership">
    <div class="wrap">
      <div class="section-heading">
        <div><p class="kicker">QA LEADERSHIP & DELIVERY</p><h2>Quality from planning<br>to <em>release readiness.</em></h2></div>
        <p class="section-aside">A practical combination of management discipline and hands-on technical understanding.</p>
      </div>
      <div class="capability-grid">
        <article><span class="cap-no">01</span><h3>Test planning & strategy</h3><p>Reviewing scope, requirements, dependencies, risks, environments, timelines, and entry/exit criteria to establish a realistic test approach.</p></article>
        <article><span class="cap-no">02</span><h3>Resource & task coordination</h3><p>Distributing work by business flow and priority, monitoring capacity, following up progress, and making ownership clear across the team.</p></article>
        <article><span class="cap-no">03</span><h3>Execution & defect control</h3><p>Monitoring coverage and execution, reviewing test evidence, validating defects, coordinating retests, and escalating blockers with context.</p></article>
        <article><span class="cap-no">04</span><h3>Reporting & release support</h3><p>Summarizing pass/fail status, outstanding defects, risks, dependencies, and readiness considerations so stakeholders can make informed decisions.</p></article>
      </div>
      <div class="quality-flow">
        <p class="flow-label">HOW I STRUCTURE QA DELIVERY</p>
        <div class="flow-steps"><span>Understand requirements</span><b>→</b><span>Assess risks</span><b>→</b><span>Plan & prepare</span><b>→</b><span>Execute & monitor</span><b>→</b><span>Report & improve</span></div>
      </div>
    </div>
  </section>

  <section class="toolkit-section wrap" id="toolkit">
    <div class="section-label"><span>04</span> TECHNICAL TOOLKIT</div>
    <div class="toolkit-content">
      <h2>Tools, methods &<br><em>technical foundations.</em></h2>
      <p class="toolkit-intro">The combination of testing, data, and development skills supports communication with both business stakeholders and technical teams.</p>
      <div class="skill-groups">
        <?php foreach ($skills as $group): ?>
          <article class="skill-group"><h3><?= e((string)($group['group'] ?? 'Skills')) ?></h3><div class="skill-pills"><?php foreach (($group['items'] ?? []) as $skill): ?><span><?= e((string)$skill) ?></span><?php endforeach; ?></div></article>
        <?php endforeach; ?>
      </div>
      <p class="skill-disclaimer">Tools and technologies are presented according to practical experience and current working knowledge. Learning-stage tools should be identified separately when added.</p>
    </div>
  </section>

  <section class="documentation-section" id="artifacts">
    <div class="wrap">
      <div class="section-heading"><div><p class="kicker">QA ARTIFACTS</p><h2>Making quality<br><em>visible and traceable.</em></h2></div><p class="section-aside">Examples of documentation used to plan, execute, monitor, and communicate testing.</p></div>
      <div class="artifact-grid">
        <article><span>TP</span><div><h3>Test Plan</h3><p>Scope, objectives, approach, environment, schedule, risks, dependencies, and exit criteria.</p></div></article>
        <article><span>TS</span><div><h3>Test Scenarios & Cases</h3><p>Business-flow coverage, preconditions, test data, execution steps, expected results, and traceability.</p></div></article>
        <article><span>DR</span><div><h3>Defect Reports</h3><p>Reproducible steps, actual and expected results, severity, priority, evidence, and retest status.</p></div></article>
        <article><span>TR</span><div><h3>Test Summary Reports</h3><p>Execution status, pass/fail trends, defect position, residual risks, and recommendations.</p></div></article>
        <article><span>RT</span><div><h3>Risk & Issue Tracking</h3><p>Testing dependencies, environment constraints, blockers, owners, mitigation, and follow-up actions.</p></div></article>
        <article><span>API</span><div><h3>API Test Collections</h3><p>Request examples, positive and negative cases, reusable assertions, and execution results.</p></div></article>
      </div>
      <p class="confidential-note">Public sample documents can be added here after sensitive business information and organization-specific details have been removed.</p>
    </div>
  </section>

  <section class="contact-section wrap" id="contact">
    <p class="kicker">HAVE A PROJECT IN MIND?</p>
    <h2>Let's make software<br><em>work better.</em></h2>
    <p>Interested in discussing QA leadership, software quality, testing strategy, or engineering opportunities?</p>
    <div class="contact-placeholder">Add approved LinkedIn, GitHub, and professional email details before publishing.</div>
  </section>
</main>
<footer class="site-footer"><span>© <?= date('Y') ?> <?= e($displayName) ?></span><span>Editorial portfolio · Built with PHP</span><a href="#top">Back to top ↑</a></footer>
<script src="assets/js/editorial.js"></script>
</body>
</html>
