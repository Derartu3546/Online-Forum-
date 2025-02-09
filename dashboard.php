<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user information
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Fetch user's questions
$questions_stmt = $pdo->prepare("SELECT * FROM questions WHERE user_id = ?");
$questions_stmt->execute([$user_id]);
$questions = $questions_stmt->fetchAll();

// Fetch user's answers
$answers_stmt = $pdo->prepare("SELECT * FROM answers WHERE user_id = ?");
$answers_stmt->execute([$user_id]);
$answers = $answers_stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
        <a href="profile.php" class="btn btn-primary">Edit Profile</a>
        <a href="add_question.php" class="btn btn-success">Add Question</a>
        <a href="search.php" class="btn btn-info">Search Questions</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>

        <h2>Your Questions</h2>
        <?php if ($questions): ?>
            <ul class="list-group">
                <?php foreach ($questions as $question): ?>
                    <li class="list-group-item">
                        <strong><?php echo htmlspecialchars($question['subject']); ?>:</strong>
                        <?php echo htmlspecialchars($question['question']); ?>
                        <a href="add_answer.php?id=<?php echo $question['id']; ?>" class="btn btn-link">Answer</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>You have not asked any questions yet.</p>
        <?php endif; ?>

        <h2>Your Answers</h2>
        <?php if ($answers): ?>
            <ul class="list-group">
                <?php foreach ($answers as $answer): ?>
                    <li class="list-group-item">
                        Answered: <?php echo htmlspecialchars($answer['answer']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>You have not answered any questions yet.</p>
        <?php endif; ?>
    </div>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
