<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portal Mieszkańca PK - Pulpit Główny</title>
    <link rel="stylesheet" href="/css/tokens.css">
    <link rel="stylesheet" href="/css/globals.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/scripts/theme.js"></script>
</head>

<body>
    <?php require __DIR__ . '/partials/navigation.php'; ?>

    <main class="main-dashboard-wrapper">
        <?php require __DIR__ . '/partials/greeting.php'; ?>

        <div class="columns-container">
            <div class="left-column">
                <?php require __DIR__ . '/partials/schedule.php'; ?>
                <?php require __DIR__ . '/partials/rooms.php'; ?>
            </div>

            <?php require __DIR__ . '/partials/sidebar.php'; ?>
        </div>

        <?php require __DIR__ . '/partials/footer.php'; ?>
    </main>

    <?php require __DIR__ . '/partials/mobile-nav.php'; ?>
</body>

</html>
