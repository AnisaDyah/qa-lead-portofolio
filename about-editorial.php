<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/functions.php';

$profile = load_json('profile.json');
$experience = load_json('experience.json');
$name = trim((string)($profile['display_name'] ?? ''));
if ($name === '' || $name === 'Your Name') $name = 'QA Lead Portfolio';
$summary = trim((string)($profile['summary'] ?? ''));
if ($summary === '' || str_contains($summary, 'Replace with')) {
    $summary = 'A quality assurance professional with a foundation in software development and system analysis, connecting business requirements, technical implementation, and structured testing to help teams deliver reliable software.';
}
$career = [
    ['label' => '01', 'title' => 'Software development', 'period' => 'Aug 2020 — Oct 2021', 'text' => 'Started in full-stack development, building web application features and working directly with PHP, .NET, and relational databases.'],
    ['label' => '02', 'title' => 'System analysis', 'period' => 'Oct 2021 — Mar 2023', 'text' => 'Moved closer to business processes by translating requirements into functional specifications and supporting enterprise application integrations.'],
    ['label' => '03', 'title' => 'Quality assurance', 'period' => 'Mar 2023 — Present', 'text' => 'Focused on software quality through test planning, SIT and UAT coordination, defect management, reporting, and hands-on testing.'],
];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="About <?= e($name) ?> — QA, software development, system analysis, and quality leadership.">
  <title>About — <?= e($name) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/about-editorial.css">
</head>
<body>
  <div class="site-frame">
    <header class="about-nav">
      <a class="brand" href="editorial-preview.php">© <?= e(strtoupper($name)) ?></a>
      <nav aria-label="Main navigation">
        <a href="editorial-preview.php#work">WORK</a>
        <a class="active" href="about-editorial.php">ABOUT</a>
        <a href="editorial-preview.php#experience">EXPERIENCE</a>
        <a href="editorial-preview.php#contact">CONTACT</a>
      </nav>
    </header>

    <main>
      <section class="about-intro">
        <div class="intro-title">
          <p class="eyebrow">ABOUT</p>
          <h1>The person<br>behind the <span>quality.</span></h1>
        </div>
        <p class="intro-statement">A career shaped by code, business processes, and software quality. One consistent belief — quality is strongest when it is considered throughout the delivery lifecycle.</p>
      </section>

      <section class="bio-layout" aria-label="Professional biography">
        <figure class="portrait-wrap">
          <div class="portrait-placeholder" role="img" aria-label="Portrait placeholder for professional photograph">
            <span class="portrait-monogram">QA</span>
            <span class="portrait-instruction">YOUR BLACK & WHITE PORTRAIT</span>
          </div>
          <figcaption><span>( <?= e(strtoupper($name)) ?> )</span><span>BASED IN INDONESIA</span></figcaption>
        </figure>
        <div class="bio-copy">
          <h2>Quality is not only about finding defects. It is about understanding how the whole system works.</h2>
          <p><?= e($summary) ?></p>
          <p>My professional journey began in software development, continued through system analysis, and evolved into quality assurance. Each role added a different perspective: how applications are built, how business needs are translated into systems, and how to validate that the delivered solution works as intended.</p>
          <p>Today, I bring those perspectives into QA activities — from understanding requirements and preparing test strategies to coordinating execution, reviewing evidence, managing defects, and communicating quality status to stakeholders.</p>
        </div>
      </section>

      <section class="belief-section">
        <div class="belief-label"><span>01</span> PROFESSIONAL BELIEF</div>
        <div class="belief-content">
          <h2>Good quality comes from <span>clear thinking</span>, disciplined execution, and shared ownership.</h2>
          <p>I value practical processes that help teams work with clarity: requirements that can be tested, responsibilities that are understood, evidence that can be reviewed, and risks that are communicated early.</p>
        </div>
      </section>

      <section class="journey-section">
        <div class="journey-heading">
          <div><p class="eyebrow">CAREER JOURNEY</p><h2>Three perspectives.<br><span>One quality mindset.</span></h2></div>
          <p>My experience across development, analysis, and QA helps me see software delivery beyond a single testing phase.</p>
        </div>
        <div class="journey-list">
          <?php foreach ($career as $item): ?>
            <article class="journey-row">
              <span class="journey-number"><?= e($item['label']) ?></span>
              <div><h3><?= e($item['title']) ?></h3><p><?= e($item['text']) ?></p></div>
              <span class="journey-period"><?= e($item['period']) ?></span>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="education-row">
        <p class="eyebrow">EDUCATION</p>
        <div><h2>Bachelor of Information Technology</h2><p>State Polytechnic of Malang · Graduated 2020</p></div>
        <span>GPA 3.73 / 4.00</span>
      </section>
    </main>
    <footer class="about-footer"><span>© <?= date('Y') ?> <?= e($name) ?></span><a href="editorial-preview.php">BACK TO PORTFOLIO ↗</a></footer>
  </div>
</body>
</html>
