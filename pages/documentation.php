<?php
/**
 * Documentation page — editorial portfolio layout.
 * Evidence files are optional. Add sanitized previews and downloadable files
 * under assets/images/documentation/ and assets/documents/documentation/.
 */
$documentationDataPath = __DIR__ . '/../data/documentation.json';
$documentationData = json_decode(file_get_contents($documentationDataPath), true);
$documentationItems = $documentationData['items'] ?? [];

if (!is_array($documentationItems)) {
    $documentationItems = [];
};
?>
        <section class="documentation-intro">
            <p class="documentation-eyebrow">Workspace / Documentation</p>
            <h1>Making quality<br><span>visible and traceable.</span></h1>
            <p class="documentation-lead">Examples of documentation used to plan, execute, monitor, and communicate testing.</p>
        </section>

        <section class="documentation-list" aria-label="QA documentation and evidence">
            <?php foreach ($documentationItems as $index => $item): ?>
                <details class="documentation-item" <?= $index === 0 ? '' : '' ?>>
                    <summary class="documentation-summary">
                        <span class="documentation-code"><?= htmlspecialchars($item['code'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="documentation-copy">
                            <span class="documentation-title"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></span>
                            <span class="documentation-description"><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></span>
                        </span>
                        <span class="documentation-status <?= htmlspecialchars($item['status_class'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="documentation-chevron" aria-hidden="true">⌄</span>
                    </summary>

                    <div class="documentation-evidence">
                        <div class="evidence-heading">
                            <div>
                                <p class="documentation-eyebrow">Selected evidence</p>
                                <h2><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                            </div>
                            <span class="evidence-count"><?= count($item['evidence']) ?> previews</span>
                        </div>

                        <div class="evidence-gallery">
                            <?php foreach ($item['evidence'] as $evidence): ?>
                                <?php if (is_file(__DIR__ . '/../' . $evidence['image'])): ?>
                                    <!-- <a class="evidence-card" href="<?= htmlspecialchars($evidence['image'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">
                                        <img src="<?= htmlspecialchars($evidence['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['title'] . ' — ' . $evidence['label'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                                        <span><?= htmlspecialchars($evidence['label'], ENT_QUOTES, 'UTF-8') ?></span>
                                    </a> -->
                                    <button
                                        class="evidence-card"
                                        type="button"
                                        data-preview-src="<?= htmlspecialchars($evidence['image']) ?>"
                                        data-preview-caption="<?= htmlspecialchars($item['title'] . ' — ' . $evidence['label']) ?>">
                                        <img src="<?= htmlspecialchars($evidence['image']) ?>" alt="" loading="lazy">
                                        <span><?= htmlspecialchars($evidence['label']) ?></span>
                                    </button>
                                <?php else: ?>
                                    <div class="evidence-placeholder" aria-label="Preview not uploaded: <?= htmlspecialchars($evidence['label'], ENT_QUOTES, 'UTF-8') ?>">
                                        <span class="placeholder-mark">＋</span>
                                        <span><?= htmlspecialchars($evidence['label'], ENT_QUOTES, 'UTF-8') ?></span>
                                        <small>Preview to be added</small>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="evidence-actions">
                            <span class="evidence-file-type"><?= htmlspecialchars($item['file_type'], ENT_QUOTES, 'UTF-8') ?> sample</span>
                            <?php if (is_file(__DIR__ . '/../' . $item['file'])): ?>
                                <a class="evidence-link" href="<?= htmlspecialchars($item['file'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">View document ↗</a>
                                <a class="evidence-download" href="<?= htmlspecialchars($item['file'], ENT_QUOTES, 'UTF-8') ?>" download>Download ↓</a>
                            <?php else: ?>
                                <span class="evidence-unavailable">Document not published yet</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </details>
            <?php endforeach; ?>
        </section>

        <p class="documentation-note">Public sample documents can be added after sensitive business information and organization-specific details have been removed.</p>
        <dialog class="evidence-lightbox">
    <div class="evidence-lightbox-panel">
        <div class="evidence-lightbox-toolbar">
            <p class="evidence-lightbox-caption" id="evidence-lightbox-caption"></p>
            <button class="evidence-lightbox-close" type="button">×</button>
        </div>
        <img class="evidence-lightbox-image" src="" alt="">
    </div>
</dialog>

<script src="assets/js/documentation.js" defer></script>

