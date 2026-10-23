<?php
require_once __DIR__ . '/Track.php';

/**
 * Клас-менеджер Playlist (Варіант 14)
 */
class Playlist {
    protected array $tracks = [];

    // Додавання треку до плейлиста
    public function addTrack(Track $track): void {
        $this->tracks[] = $track;
    }

    // Отримання всіх треків
    public function getTracks(): array {
        return $this->tracks;
    }

    // Розрахунок загальної тривалості плейлиста
    public function totalDuration(): int {
        $total = 0;
        foreach ($this->tracks as $track) {
            $total += $track->getDurationSec();
        }
        return $total;
    }

    // Пошук треків за виконавцем
    public function findByArtist(string $artist): array {
        $result = [];
        foreach ($this->tracks as $track) {
            if (mb_stripos($track->getArtist(), $artist) !== false) {
                $result[] = $track;
            }
        }
        return $result;
    }
}