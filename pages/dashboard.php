<section class="welcome-row">
    <div>
        <div class="eyebrow">PROFESSIONAL PORTFOLIO</div>
        <h2>Quality leadership with a developer's perspective.</h2>
        <p class="lead">A portfolio of project planning, QA management, technical testing, and software development experience.</p>
        <div class="button-row">
            <a class="button button-primary" href="index.php?page=projects">Explore projects</a>
            <a class="button button-secondary" href="index.php?page=about">About me</a>
        </div>
    </div>
    <div class="profile-orbit" aria-hidden="true"><div class="orbit-inner">QA</div><span class="orbit-dot"></span></div>
</section>

<section class="metric-grid">
    <article class="metric-card"><span class="metric-label">Professional focus</span><strong>QA Leadership</strong><span class="metric-foot">Planning · Management · Quality</span></article>
    <article class="metric-card"><span class="metric-label">Technical background</span><strong>Software Development</strong><span class="metric-foot">PHP · API · SQL · Testing</span></article>
    <article class="metric-card"><span class="metric-label">Delivery approach</span><strong>End-to-end QA</strong><span class="metric-foot">From readiness to release</span></article>
</section>

<section class="content-grid">
    <article class="panel panel-large">
        <div class="section-heading"><div><div class="eyebrow">CAPABILITIES</div><h3>What I bring to a project</h3></div></div>
        <div class="capability-list">
            <div class="capability-item"><span class="capability-icon">01</span><div><strong>QA project planning</strong><p>Defining scope, approach, timelines, dependencies, and quality criteria.</p></div></div>
            <div class="capability-item"><span class="capability-icon">02</span><div><strong>Team and execution management</strong><p>Coordinating workload, progress, blockers, and testing priorities.</p></div></div>
            <div class="capability-item"><span class="capability-icon">03</span><div><strong>Technical quality assurance</strong><p>Applying API, database, integration, and performance testing practices.</p></div></div>
        </div>
    </article>
    <article class="panel">
        <div class="eyebrow">SELECTED PROJECTS</div><h3>Project showcase</h3>
        <?php foreach (array_slice($projects, 0, 3) as $project): ?>
            <div class="mini-project"><span class="status-dot"></span><div><strong><?= e($project['name'] ?? 'Project') ?></strong><small><?= e($project['category'] ?? 'Project case study') ?></small></div></div>
        <?php endforeach; ?>
        <a class="text-link" href="index.php?page=projects">View all projects →</a>
    </article>
</section>
