<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] == 'admin') {
    header("Location: login.php");
    exit();
}

// Fetching all users, questions, and answers
$users = $pdo->query("SELECT * FROM users")->fetchAll();
$questions = $pdo->query("SELECT * FROM questions")->fetchAll();
$answers = $pdo->query("SELECT * FROM answers")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Users</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo htmlspecialchars($user['username']); ?> - <?php echo htmlspecialchars($user['email']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Questions</h2>
    <ul>
        <?php foreach ($questions as $question): ?>
            <li><?php echo htmlspecialchars($question['question']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Answers</h2>
    <ul>
        <?php foreach ($answers as $answer): ?>
            <li><?php echo htmlspecialchars($answer['answer']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
