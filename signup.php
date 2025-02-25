<?php
include 'db.php';
$userError=$passwordError=$emailError="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    if(empty($username)){
        $userError="User name is required";
    }
    elseif(empty($password)){
            $passwordError="password is Required";

    } elseif(empty($email)){
        $emailError="Email is Required";
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Enter valid email format";
    }
    }
    else{
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $password, $email])) {
            echo "Registration successful!";
        } else {
            echo "Error: User could not be registered.";
        }
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="sstyle.css">
</head>
<body> <div class="box">
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <div class="error"><?php echo $userError?></div>
        <input type="password" name="password" placeholder="Password" required>
        <div class="error"><?php echo $passwordError?></div>
        <input type="email" name="email" placeholder="Email" required>
        <div class="error"><?php echo $emailError?></div>
        <button type="submit">signup</button>
    </form>
    </div>
</body>
</html>
