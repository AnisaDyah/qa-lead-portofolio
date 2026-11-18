<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once __DIR__ . '/includes/functions.php';

$allowedPages = ['about','experience','projects','project-detail','qa-management','technical-skills','documentation','guestbook','contact'];
$page = (string)($_GET['page'] ?? 'about');
if (!in_array($page, $allowedPages, true)) {
    http_response_code(404);
    $page = 'about';
}
$profile = load_json('profile.json');
$projects = load_json('projects.json');
$skills = load_json('skills.json');
$experience = load_json('experience.json');
$review = load_json('review.json');
$pageTitles = [
 'about'=>'About','experience'=>'Experience','projects'=>'Projects',
 'qa-management'=>'Management','technical-skills'=>'Technical',
 'documentation'=>'Documentation','contact'=>'Contact', 'project-detail' => 'Project Details',
 'guestbook' => 'Guestbook',
];
$pageTitle = $pageTitles[$page] ?? 'Portfolio';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/navbar.php';
?>
<main id="top" class="page-shell">
  <?php require __DIR__ . '/pages/' . $page . '.php'; ?>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
