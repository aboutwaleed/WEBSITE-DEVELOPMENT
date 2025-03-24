<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}
?>

<?php include_once "header.php"; ?>
<body>
<div class="container">
    <section class="form login">
        <header style="text-align: center">WeChat!</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
                <input type="email" name="email" placeholder="Email goes here" required>

            </div>
            <div class="field input">
                <input type="password" name="password" placeholder="Password goes here" required>

                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        <div class="link">Don't have an account? <a href="index.php">Create one now</a></div>
    </section>
</div>


<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/login.js"></script>
</body>
</html>
