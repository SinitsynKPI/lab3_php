<?php
/**
 * Бібліотека допоміжних функцій для каталогу музики (Варіант 14)
 */

// Форматування тривалості з секунд у формат MM:SS
function formatDuration(int $seconds): string {
    $minutes = floor($seconds / 60);
    $sec = $seconds % 60;
    return sprintf("%d:%02d", $minutes, $sec);
}

// Генерація посилання (slug) з назви треку
function slugifyTitle(string $title): string {
    $slug = mb_strtolower(trim($title));
    $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $slug);
    return trim($slug, '-');
}