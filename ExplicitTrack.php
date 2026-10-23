<?php
require_once __DIR__ . '/Track.php';

class ExplicitTrack extends Track {
    protected string $warningLabel;

    public function __construct(string $title, string $artist, int $durationSec, string $warningLabel = "Explicit Content") {
        parent::__construct($title, $artist, $durationSec);
        $this->warningLabel = $warningLabel;
    }

    public function getWarningLabel(): string {
        return $this->warningLabel;
    }

    public function getInfo(): string {
        $baseInfo = parent::getInfo();
        return "{$baseInfo} [Попередження: {$this->warningLabel}]";
    }
}
