<?php

declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
$path = __DIR__ . '/../data/reviews.json';
$rows = is_file($path) ? json_decode((string)file_get_contents($path), true) : [];
$rows = is_array($rows) ? array_values(array_filter($rows, static fn(array $r): bool => ($r['is_active'] ?? false) === true)) : [];
usort($rows, static fn(array $a, array $b): int => strcmp((string)($b['created_at'] ?? ''), (string)($a['created_at'] ?? '')));
echo json_encode($rows, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
