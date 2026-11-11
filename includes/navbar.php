<header class="site-header">
  <a class="site-brand" href="index.php?page=about">© Anisa Almahfudi</a>
  <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">MENU <span>☰</span></button>
  <nav class="primary-nav" id="primary-nav" aria-label="Main navigation">
    <a href="index.php?page=about" class="<?= $page === 'about' ? 'active' : '' ?>">ABOUT</a>
    <a href="index.php?page=experience" class="<?= $page === 'experience' ? 'active' : '' ?>">EXPERIENCE</a>
    <div class="nav-dropdown">
      <button class="nav-dropdown-trigger <?= in_array($page, ['projects','qa-management','technical-skills','documentation'], true) ? 'active' : '' ?>" type="button" aria-expanded="false">WORKSPACE <span>⌄</span></button>
      <div class="nav-dropdown-menu">
        <a href="index.php?page=projects" class="<?= $page === 'projects' ? 'active' : '' ?>"><span>01</span> Project</a>
        <a href="index.php?page=qa-management" class="<?= $page === 'qa-management' ? 'active' : '' ?>"><span>02</span> Management Skills</a>
        <a href="index.php?page=technical-skills" class="<?= $page === 'technical-skills' ? 'active' : '' ?>"><span>03</span> Technical Skills</a>
        <a href="index.php?page=documentation" class="<?= $page === 'documentation' ? 'active' : '' ?>"><span>04</span> Documentation</a>
      </div>
    </div>
    <a href="index.php?page=contact" class="<?= $page === 'contact' ? 'active' : '' ?>">CONTACT</a>
  </nav>
</header>
