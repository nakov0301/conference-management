<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeTalks</title>
</head>
<body>
    <h1>
        <?php foreach($foo as $item): ?>
            <?php echo $item; ?> <br>
        <?php endforeach; ?>

        <br><br>

        @foreach($foo as $item)
            {{ $item }} <br>
        @endforeach
    </h1>
</body>
</html>
