<?php

    $n = 10;
    function getRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

session_start();
if (is_array($_FILES)) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];

        $nameImg = getRandomString($n);

        $targetPath = "imagenes/" .$nameImg.".png";
        
        if (move_uploaded_file($sourcePath, $targetPath)) {
            ?>
<img class="image-preview"  width="250" height="250" src="<?php echo $targetPath; ?>"
	class="upload-preview" />
    <input type="hidden" id="nameImg" value="<?php echo $nameImg?>" />
<?php
        }
    }
}
?>