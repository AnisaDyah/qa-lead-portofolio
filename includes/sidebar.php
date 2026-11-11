<aside class="sidebar" id="sidebar">
    <a class="brand" href="index.php">
        <span class="brand-mark">Q</span>
        <span>
            <strong>QA Portfolio</strong>
            <small>Quality & Engineering</small>
        </span>
    </a>

    <div class="nav-label">WORKSPACE</div>
    <nav class="side-nav" aria-label="Main navigation">
        <a class="nav-link<?= nav_is_active($page, 'dashboard') ?>" href="index.php?page=dashboard"><span>▦</span> Overview</a>
        <a class="nav-link<?= nav_is_active($page, 'projects') ?>" href="index.php?page=projects"><span>▣</span> Projects</a>
        <a class="nav-link<?= nav_is_active($page, 'qa-management') ?>" href="index.php?page=qa-management"><span>◫</span> QA Management</a>
        <a class="nav-link<?= nav_is_active($page, 'documentation') ?>" href="index.php?page=documentation"><span>▤</span> Documentation</a>
    </nav>

    <div class="nav-label">PROFILE</div>
    <nav class="side-nav" aria-label="Profile navigation">
        <a class="nav-link<?= nav_is_active($page, 'about') ?>" href="index.php?page=about"><span>◎</span> About me</a>
        <a class="nav-link<?= nav_is_active($page, 'experience') ?>" href="index.php?page=experience"><span>◷</span> Experience</a>
        <a class="nav-link<?= nav_is_active($page, 'technical-skills') ?>" href="index.php?page=technical-skills"><span>⌘</span> Technical skills</a>
        <a class="nav-link<?= nav_is_active($page, 'contact') ?>" href="index.php?page=contact"><span>✉</span> Contact</a>
    </nav>

    <div class="sidebar-note">
        <strong>Portfolio V1</strong>
        <p>Selected work and professional capabilities.</p>
    </div>
</aside>
