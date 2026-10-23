<?php

function formatDuration(int $seconds): string {
    $minutes = floor($seconds / 60);
    $sec = $seconds % 60;
    return sprintf("%d:%02d", $minutes, $sec);
}

function slugifyTitle(string $title): string {
    $slug = mb_strtolower(trim($title));
    $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $slug);
    return trim($slug, '-');
}
