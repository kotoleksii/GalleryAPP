<div class="example-1">
    <div class="form-group">
        <h2>Gallery</h2>

    </div> 
</div>

<?php

$images = array_diff(scandir(STORAGE), ['.', '..']);

foreach($images as $image):
    ?>
        <a href="<?='storage/' . $image?>" target='_blank'>
            <img class="img-thumbnail photo" src="<?php echo 'storage/' . $image;?>" alt="<?=$image?>">
        </a><br>
    <?php
endforeach;

?>