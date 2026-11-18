<?php

declare(strict_types=1);
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
    function reply(int $status, array $data): never
    {
        http_response_code($status);
        echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Allow: POST');
        reply(405, ['success' => false, 'message' => 'Method not allowed.']);
    }
    $data = json_decode(file_get_contents('php://input') ?: '', true);
        if (!is_array($data)) reply(400, ['success' => false, 'message' => 'Invalid request data.']);
            $token = (string)($_SESSION['guestbook_csrf'] ?? '');
        if (!$token || !hash_equals($token, (string)($data['csrf_token'] ?? ''))) reply(403, ['success' => false, 'message' => 'Session expired. Refresh the page and try again.']);
        if (!empty($data['website'])) reply(200, ['success' => true, 'message' => 'Thank you.']);
            $name = trim((string)($data['name'] ?? ''));
            $position = trim((string)($data['position'] ?? ''));
            $company = trim((string)($data['company'] ?? ''));
            $relationship = trim((string)($data['relationship'] ?? ''));
            $message = trim((string)($data['review'] ?? ''));
            $rating = filter_var($data['rating'] ?? null, FILTER_VALIDATE_INT);
            $linkedin = trim((string)($data['linkedin'] ?? ''));
            $allowed = ['Colleague', 'Manager / Supervisor', 'Client', 'Project Collaborator', 'Recruiter', 'Other'];
        if ($name === '' || mb_strlen($name) > 80 || $position === '' || mb_strlen($position) > 100 || mb_strlen($company) > 120 || !in_array($relationship, $allowed, true) || $rating === false || $rating < 1 || $rating > 5 || $message === '' || mb_strlen($message) > 1200) reply(422, ['success' => false, 'message' => 'Please complete the required fields and check the length of your entries.']);
        if ($linkedin !== '' && (!filter_var($linkedin, FILTER_VALIDATE_URL) || !preg_match('~^https://(www\.)?linkedin\.com/~i', $linkedin))) reply(422, ['success' => false, 'message' => 'Enter a valid HTTPS LinkedIn profile URL.']);
            $review = ['id' => 'REV-' . bin2hex(random_bytes(6)), 'name' => $name, 'position' => $position, 'company' => $company, 'relationship' => $relationship, 'rating' => (int)$rating, 'review' => $message, 'linkedin' => $linkedin, 'is_active' => true, 'created_at' => date('Y-m-d H:i:s')];
            $file = __DIR__ . '/../data/reviews.json';
            $fp = @fopen($file, 'c+');
        if (!$fp) reply(500, ['success' => false, 'message' => 'Review storage is unavailable.']);
        if (!flock($fp, LOCK_EX)) {
            fclose($fp);
            reply(500, ['success' => false, 'message' => 'Could not lock review storage.']);
        }
    rewind($fp);
    $rows = json_decode(stream_get_contents($fp) ?: '[]', true);
    if (!is_array($rows)) $rows = [];
        array_unshift($rows, $review);
        $json = json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        rewind($fp);
        $ok = $json !== false && ftruncate($fp, 0) && fwrite($fp, $json . PHP_EOL) !== false;
        fflush($fp);
        flock($fp, LOCK_UN);
        fclose($fp);
    if (!$ok) reply(500, ['success' => false, 'message' => 'Could not save review.']);
    reply(201, ['success' => true, 'review' => $review]);
