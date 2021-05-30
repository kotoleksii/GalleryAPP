<?php

if(!isset($_POST['frm_registration'])) {
?>

<div class="logo">
        <img src="./assets/logo.png">
</div>

<form action="index.php?page=registration" method="POST">

	<div class="container">
	<h2>Registration Form</h2>

		<input type="text" name="useremail" placeholder="Enter email" id="email"><br>
		<input type="password" name="pass" placeholder="Enter password" id="pass"><br>
		<input type="password" name="pass_confirm" placeholder="Repeat password" id="confirm_pass"><br>

		<input name="frm_registration" type="hidden">

		<p><input type="submit" value="SUBMIT" name="btn_submit"></p>
		<!-- <a href="index.php?page=login">Go back to login</a> -->
	</div>  

</form>

<?php
	} else {
        include_once(ROOT . '/services/validation_service.php');
        include_once(ROOT . '/services/auth_service.php');
		?><script src="./js/messagebox.js"></script><?php

        $validationResult = registerValidate();

        if(!$validationResult['success']) {
            foreach($validationResult['errors'] as $error):
                ?>      
					<script type="text/javascript">
						MessageBox('<?php echo $error; ?>', 'danger');
					</script>
				<?php
            endforeach;
        } else {
            if(!register($_POST['useremail'], $_POST['pass'])) {
                ?>
					<script type="text/javascript">
                    	MessageBox('You are already registered!', 'warning');
                	</script> 
                <?php
            } else {
                ?>
					<script type="text/javascript">
                    	MessageBox('All OK', 'success');
                	</script> 		
                <?php
            }
        }
	}