<?php

$host = 'sql109.infinityfree.com';
$user = 'if0_38164294';
$password = 'r9mTHqRLpYF6';
$database = 'if0_38164294_sports';

$connect = mysqli_connect($host, $user, $password, $database);


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM sports_equipment ORDER BY name";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Equipment Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Sports Equipment Store</h1>
</header>

<main>
    <h2>Available Products</h2>
    <div class="product-container">
        <?php while ($record = mysqli_fetch_assoc($result)): ?>
            <div class="product-card">
                <img src="images/<?= htmlspecialchars($record['image']); ?>" alt="<?= htmlspecialchars($record['name']); ?>">
                <h3><?= htmlspecialchars($record['name']); ?></h3>
                <p><strong>Category:</strong> <?= htmlspecialchars($record['category']); ?></p>
                <p><strong>Price:</strong> $<?= number_format($record['price'], 2); ?></p>
                <p><strong>Stock:</strong> <?= htmlspecialchars($record['stock']); ?> available</p>
                <button>Add to Cart</button>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> Sports Equipment Store. All rights reserved.</p>
</footer>

</body>
</html>

<?php
mysqli_close($connect);
?>
