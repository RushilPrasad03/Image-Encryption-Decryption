<?php
session_start();

if(empty($_SESSION['username'])){
    header("Location:login.php");
}

$option = $_POST['op'];
$key = $_POST['key'];
$image =  basename($_FILES['doc']['name']);

if($option=="decrypt"){
    require 'lib/aes.php';
    require 'lib/aesctr.php';

    $namaFile = file_get_contents($_FILES['doc']['tmp_name']);
    $encFile = AesCtr::decrypt($namaFile,$key,128);
    $enkrip = file_put_contents("decrypt/".($_FILES['doc']['name']), $encFile);

    if ($enkrip) {
        $ress= "File Has Been Decrypted";
    }
    else{
        $ress="Incorrect Pin";
    }
}
elseif($option=="encrypt"){
    require 'lib/aes.php';
    require 'lib/aesctr.php';

    $namaFile = file_get_contents($_FILES['doc']['tmp_name']);
    $encFile = AesCtr::encrypt($namaFile,$key,128);
    $enkrip = file_put_contents("encrypt/".($_FILES['doc']['name']), $encFile);

    if ($enkrip) {
        $ress= "File Has Been Encrypted";
    }
}
else{
    echo "Kuch to gadbad hai";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Encryption</title>
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <a id="download-btn" href="<?php echo $option;?>/<?php echo $image;?>" download></a>
    <script>
        document.getElementById("download-btn").click();
        history.go(-1);
    </script>
</body>
</html>