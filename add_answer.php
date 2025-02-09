<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question_id = $_POST['question_id'];
    $answer = $_POST['answer'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO answers (question_id, user_id, answer) VALUES (?, ?, ?)");
    if ($stmt->execute([$question_id, $user_id, $answer])) {
        echo "Answer added successfully!";
    } else {
        echo "Error: Could not add answer.";
    }
}

// Fetching the question to display
$question_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM questions WHERE id = ?");
$stmt->execute([$question_id]);
$question = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Answer</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2><?php echo htmlspecialchars($question['question']); ?></h2>
    <form method="POST" action="">
        <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
        <textarea name="answer" placeholder="Your Answer" required></textarea>
        <button type="submit">Add Answer</button>
    </form>
</body>
</html>
