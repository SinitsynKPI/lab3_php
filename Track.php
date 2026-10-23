<?php

class Track {
    protected string $title;
    protected string $artist;
    protected int $durationSec;

    public function __construct(string $title, string $artist, int $durationSec) {
        $this->title = $title;
        $this->artist = $artist;
        $this->durationSec = $durationSec;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getArtist(): string {
        return $this->artist;
    }

    public function getDurationSec(): int {
        return $this->durationSec;
    }

    public function getInfo(): string {
        return "Трек: \"{$this->title}\" — Виконавець: {$this->artist}";
    }
}
