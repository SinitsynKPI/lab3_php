<?php
require_once __DIR__ . '/lib/functions.php';
require_once __DIR__ . '/classes/Track.php';
require_once __DIR__ . '/classes/ExplicitTrack.php';
require_once __DIR__ . '/classes/Playlist.php';

// Створення плейлиста та додавання об'єктів (і базового, і похідного класу)
$playlist = new Playlist();

$playlist->addTrack(new Track("Bohemian Rhapsody", "Queen", 354));
$playlist->addTrack(new Track("Billie Jean", "Michael Jackson", 294));
$playlist->addTrack(new ExplicitTrack("Rap God", "Eminem", 383, "Parental Advisory"));
$playlist->addTrack(new ExplicitTrack("HUMBLE.", "Kendrick Lamar", 177, "Explicit Content"));

$searchArtist = "Queen";
$foundTracks = $playlist->findByArtist($searchArtist);
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Практична робота №3 — Варіант 14: Каталог музики</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; color: #333; }
        h1, h2, h3 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #34495e; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .summary { background: #e8f4f8; padding: 15px; border-left: 4px solid #3498db; margin-top: 20px; border-radius: 4px; }
        ul { background: #fff; padding: 15px 30px; border: 1px solid #ddd; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Практична робота №3: Основи ООП у PHP</h1>
    <h2>Варіант 14: Каталог музики / Плейлисти</h2>

    <h3>Список усіх треків у плейлисті:</h3>
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Назва та Slug</th>
                <th>Виконавець</th>
                <th>Тривалість</th>
                <th>Повна інформація (метод getInfo)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playlist->getTracks() as $index => $track): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td>
                        <strong><?= htmlspecialchars($track->getTitle()) ?></strong><br>
                        <small style="color: #7f8c8d;">slug: <?= slugifyTitle($track->getTitle()) ?></small>
                    </td>
                    <td><?= htmlspecialchars($track->getArtist()) ?></td>
                    <td><?= formatDuration($track->getDurationSec()) ?></td>
                    <td><?= htmlspecialchars($track->getInfo()) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="summary">
        <strong>Загальна тривалість плейлиста:</strong> <?= formatDuration($playlist->totalDuration()) ?> 
        (у секундах: <?= $playlist->totalDuration() ?> с.)
    </div>

    <h3>Результат пошуку за виконавцем "<?= htmlspecialchars($searchArtist) ?>":</h3>
    <ul>
        <?php foreach ($foundTracks as $track): ?>
            <li><?= htmlspecialchars($track->getInfo()) ?> — (<?= formatDuration($track->getDurationSec()) ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>