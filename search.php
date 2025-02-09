<?php
include 'db.php';
session_start();

$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['query'])) {
    $query = $_GET['query'];
    $stmt = $pdo->prepare("SELECT * FROM questions WHERE question LIKE ?");
    $stmt->execute(['%' . $query . '%']);
    $results = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="GET" action="">
        <input type="text" name="query" placeholder="Search questions" required>
        <button type="submit">Search</button>
    </form>

    <h2>Search Results:</h2>
    <?php if ($results): ?>
        <ul>
            <?php foreach ($results as $result): ?>
                <li>
                    <a href="add_answer.php?id=<?php echo $result['id']; ?>">
                        <?php echo htmlspecialchars($result['question']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
