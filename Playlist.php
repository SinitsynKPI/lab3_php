<?php
require_once __DIR__ . '/Track.php';

class Playlist {
    protected array $tracks = [];

    public function addTrack(Track $track): void {
        $this->tracks[] = $track;
    }

    public function getTracks(): array {
        return $this->tracks;
    }

    public function totalDuration(): int {
        $total = 0;
        foreach ($this->tracks as $track) {
            $total += $track->getDurationSec();
        }
        return $total;
    }
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
