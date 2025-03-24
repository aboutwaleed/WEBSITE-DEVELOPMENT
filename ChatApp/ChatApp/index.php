<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}
?>

<?php include_once "header.php"; ?>
<body>
<div class="container">
    <section class="form signup">
        <header style="text-align: center">WeChat!</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="name-details">
                <div class="field input">
                    <input type="text" name="fname" placeholder="Enter first name" required>

                </div>
                <div class="field input">
                    <input type="text" name="lname" placeholder="Enter last name" required>

                </div>
            </div>
            <div class="field input">
                <input type="email" name="email" placeholder="Enter your email" required >

            </div>
            <div class="field input">
                <input type="password" name="password" placeholder="Enter new password" required>

                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Sign Up!">
            </div>
        </form>
        <div class="link">Already have an account? <a href="login.php">Login now</a></div>
    </section>
</div>


<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>
</body>
</html>
