<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" id="registerForm" style="display: none;">
    <h1 class="form-title">Register</h1>
    <form method="post" action="register.php">
         <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
            <label for="firstName">First Name</label>
         </div>

         <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
            <label for="lastName">Last Name</label>
         </div>

         <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="userEmail" id="userEmail" placeholder="Email" required>
            <label for="userEmail">Email</label>
         </div>

         <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="userPassword" id="userPassword" placeholder="Password" required>
            <label for="userPassword">Password</label>
         </div>
         <input type="submit" class="btn" value="Register" name="registerBtn">
    </form>

    <p class="or"> 
      ----------or---------

    </p>
 <div class="icons">
     <i class="fab fa-google"></i>
     <i class="fab fa-facebook"></i>
 </div>
   <div class="links">
   <p>Already have an account?</p>
   <button id="loginButton">Login</button>
 </div>
</div>

<div class="container" id="loginForm">
    <h1 class="form-title">Login</h1>
    <form method="post" action="login.php">
         <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="loginEmail" id="loginEmail" placeholder="Email" required>
            <label for="loginEmail">Email</label>
         </div>

         <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required>
            <label for="loginPassword">Password</label>
         </div>
         <p class="recover">
            <a href="#">Forgot Password?</a>
         </p>
         <input type="submit" class="btn" value="Login" name="loginBtn">
    </form>

    <p class="or"> 
      ----------or---------

    </p>
 <div class="icons">
     <i class="fab fa-google"></i>
     <i class="fab fa-facebook"></i>
 </div>

 <div class="links">
   <p>Don't have an account?</p>
   <button id="registerButton">Register</button>
 </div>
</div>
<script src="script.js"></script>
</body>
</html>
