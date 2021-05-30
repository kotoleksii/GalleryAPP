<?php

if(!isset($_POST['frm_login'])) {
?>

<div class="logo">
        <img src="./assets/logo.png">
</div>

<form action="index.php?page=login" method="POST">

    <div class="container">
    <h2>Login Form</h2>
    
        <input type="text" name="useremail" placeholder="Enter email" id="email"><br>
        <input type="password" name="pass" placeholder="Enter password" id="pass"><br>

        <input name="frm_login" type="hidden">

        <p><input type="submit" value="SUBMIT" name="btn_submit"></p>
        <a href="index.php?page=registration">Unregistered?</a>
    </div>  

</form>

<?php
} else {
    include_once(ROOT . '/services/validation_service.php');
    include_once(ROOT . '/services/auth_service.php');
    ?><script src="./js/messagebox.js"></script><?php   

    $validationResult = loginValidate();

    if(!$validationResult['success']) {
        foreach($validationResult['errors'] as $error):
            ?>      
                <script type="text/javascript">
                    MessageBox('<?php echo $error; ?>', 'danger');
                </script>
            <?php
        endforeach;
    } else {
        if(!login($_POST['useremail'], $_POST['pass'])) {
            header('refresh:2;url=index.php?page=registration');
            ?>
                <script type="text/javascript">
                    MessageBox('Login or Password is incorrect', 'warning');
                </script>
            <?php
            exit;
        } else {
            $_SESSION['login'] = true;
            ?>
                <script type="text/javascript">
                    MessageBox('<?php echo 'Login Successful<br>' .
                        'Hi, ' . $_POST['useremail'] . '!'; ?>', 'success');
                </script>		
            <?php
        }
    }
}