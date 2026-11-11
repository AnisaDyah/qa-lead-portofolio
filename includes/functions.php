<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/app.php';

/**
 * Read a JSON file from the private application data directory.
 * Returns an empty array if the file is missing or invalid.
 */
function load_json(string $filename): array
{
    $path = __DIR__ . '/../data/' . basename($filename);

    if (!is_file($path) || !is_readable($path)) {
        return [];
    }

    $contents = file_get_contents($path);
    if ($contents === false) {
        return [];
    }

    $decoded = json_decode($contents, true);
    return is_array($decoded) ? $decoded : [];
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function nav_is_active(string $current, string $target): string
{
    return $current === $target ? ' is-active' : '';
}
