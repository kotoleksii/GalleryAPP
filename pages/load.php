<?php

if(!isset($_POST['frm_upload'])) {
?>

<form action="index.php?page=load" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
    
    <div class="example-1">
        <div class="form-group">
        <h2>Load Images</h2>
            <label class="label">
                <i class="material-icons">attach_file</i>
                <span class="title">Add Image</span>
                <input class="form-control" type="file" id="actual-btn" accept="image/*" name="user_image">
            </label>
        </div>
        <span id="file-chosen">No file chosen</span>
    </div>

    <input type="hidden" name="frm_upload">

    <p><input type="button" id="submit-btn" value="LOAD" name="btn_submit" disabled></p>

</form>

<?php
}else {
    ?><script src="./js/messagebox.js"></script><?php 

    $error_message = 'Upload erorr: ' . $_FILES['user_image']['error'];


    if ($_FILES['user_image']['error'] > 0){
        ?>      
            <script type="text/javascript">
                MessageBox('<?php echo $error_message ?>', 'danger');
            </script>
        <?php
    } else {
        if(is_uploaded_file($_FILES['user_image']['tmp_name'])) {
            move_uploaded_file(
                $_FILES['user_image']['tmp_name'],
                STORAGE . $_FILES['user_image']['name']
            );

        ?>      
            <script type="text/javascript">
                MessageBox('File was uploaded!', 'success');
            </script>
        <?php
        }
    }
}