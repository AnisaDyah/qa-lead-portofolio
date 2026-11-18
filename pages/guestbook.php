<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (empty($_SESSION['guestbook_csrf'])) $_SESSION['guestbook_csrf'] = bin2hex(random_bytes(32));
$reviewsFile = __DIR__ . '/../data/reviews.json';
$reviews = is_file($reviewsFile) ? json_decode((string) file_get_contents($reviewsFile), true) : [];
$reviews = is_array($reviews) ? $reviews : [];
$activeReviews = array_values(array_filter($reviews, static fn(array $r): bool => ($r['is_active'] ?? false) === true));
usort($activeReviews, static fn(array $a,array $b): int => strcmp((string)($b['created_at']??''),(string)($a['created_at']??'')));
$reviewCount = count($activeReviews);
?>
<link rel="stylesheet" href="assets/css/guestbook.css">
<section class="guestbook-page">
 <header class="guestbook-intro"><p class="guestbook-eyebrow">GUESTBOOK</p><h2>A few words from you.</h2><p class="guestbook-lead">Have we worked together? I’d love to hear about your experience working with me, whether on a project, in a team, or in any collaboration.</p></header>
 <div class="guestbook-columns">
  <section class="review-form-section" aria-labelledby="review-form-title"><h3 id="review-form-title">Leave a review</h3><p class="review-section-intro">Share your experience or feedback about working with me.</p>
   <form id="guestbook-form" class="guestbook-form" novalidate>
    <input type="hidden" name="csrf_token" value="<?= e($_SESSION['guestbook_csrf']) ?>">
    <div class="guestbook-honeypot" aria-hidden="true"><label>Leave empty<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
    <label class="form-field"><span>Your name <i>*</i></span><input name="name" maxlength="80" placeholder="e.g. Rizky Pratama" required></label>
    <label class="form-field"><span>Job title / position <i>*</i></span><input name="position" maxlength="100" placeholder="e.g. Project Manager" required></label>
    <label class="form-field"><span>Company</span><input name="company" maxlength="120" placeholder="e.g. PT. ITPI Technology"></label>
    <label class="form-field"><span>Relationship <i>*</i></span><select name="relationship" required><option>Colleague</option><option>Manager / Supervisor</option><option>Client</option><option>Project Collaborator</option><option>Recruiter</option><option>Other</option></select></label>
    <fieldset class="rating-field"><legend>Rating <i>*</i></legend><div class="rating-control" role="radiogroup" aria-label="Choose a rating"><button type="button" class="rating-star is-selected" data-rating="1" aria-label="1 star">★</button><button type="button" class="rating-star is-selected" data-rating="2" aria-label="2 stars">★</button><button type="button" class="rating-star is-selected" data-rating="3" aria-label="3 stars">★</button><button type="button" class="rating-star is-selected" data-rating="4" aria-label="4 stars">★</button><button type="button" class="rating-star is-selected" data-rating="5" aria-label="5 stars">★</button><span class="rating-value" id="rating-value">5 / 5</span></div><input type="hidden" name="rating" id="rating-input" value="5"></fieldset>
    <label class="form-field"><span>Your review <i>*</i></span><textarea name="review" rows="5" maxlength="1200" placeholder="Share your experience working with Anisa…&#10;(e.g. collaboration, work quality, communication, etc.)" required></textarea></label>
    <label class="form-field"><span>LinkedIn profile <small>(optional)</small></span><input type="url" name="linkedin" maxlength="300" placeholder="https://linkedin.com/in/…"></label>
    <p class="form-feedback" id="form-feedback" role="status" aria-live="polite"></p><button class="guestbook-submit" type="submit"><span>Submit review</span><span aria-hidden="true">→</span></button><p class="form-note">Your review will appear on this page immediately after submission.</p>
   </form>
  </section>
  <section class="reviews-section" aria-labelledby="reviews-title"><div class="reviews-heading"><h3 id="reviews-title">What people say</h3><span id="review-count"><?= $reviewCount ?> <?= $reviewCount === 1 ? 'review' : 'reviews' ?></span></div><div class="reviews-list" id="reviews-list">
   <?php if ($activeReviews): foreach ($activeReviews as $r): $rating=max(0,min(5,(int)($r['rating']??0))); ?>
    <article class="review-item"><div class="review-stars" aria-label="<?= $rating ?> out of 5 stars"><?= str_repeat('★',$rating) ?><span><?= str_repeat('☆',5-$rating) ?></span></div><blockquote><?= nl2br(e((string)($r['review']??''))) ?></blockquote><div class="review-person"><div><strong><?= e((string)($r['name']??'')) ?></strong><p><?= e((string)($r['position']??'')) ?><?php if (!empty($r['company'])): ?> · <?= e((string)$r['company']) ?><?php endif; ?></p><span class="relationship-tag"><?= e((string)($r['relationship']??'')) ?></span></div><?php if (!empty($r['linkedin']) && filter_var($r['linkedin'],FILTER_VALIDATE_URL)): ?><a class="linkedin-link" href="<?= e((string)$r['linkedin']) ?>" target="_blank" rel="noopener noreferrer"><b>in</b><span>View LinkedIn</span></a><?php endif; ?></div></article>
   <?php endforeach; else: ?><div class="empty-reviews" id="empty-reviews"><span class="empty-mark">“</span><p>No reviews yet. Be the first to share your experience.</p></div><?php endif; ?>
  </div></section>
 </div>
</section>
<script>window.GUESTBOOK_CONFIG={submitUrl:'<?= rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\\\') ?>/api/submit-review.php',csrfToken:<?= json_encode($_SESSION['guestbook_csrf']) ?>};</script><script src="assets/js/guestbook.js" defer></script>
