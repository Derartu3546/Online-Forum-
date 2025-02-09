<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO questions (user_id, subject, question) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_id, $subject, $question])) {
        echo "Question added successfully!";
    } else {
        echo "Error: Could not add question.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Question</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="question" placeholder="Your Question" required></textarea>
        <button type="submit">Add Question</button>
    </form>
</body>
</html>
