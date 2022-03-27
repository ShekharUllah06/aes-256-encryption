<?php
include("AES256Encryption.php");
$aes=new AES256Encryption();
echo ($aes->encrypt('hello'));
echo ("<br>".$aes->decrypt("frygkIpG9LTdyx6ar2e3rQ=="));

?>