<?php
include("AES256Encryption.php");
$aes=new AES256Encryption();
echo ($aes->encrypt('Hello Fiber at Home'));
echo ("<br>".$aes->decrypt("BZfoiIkMgWHfIrC6PKLwdpaNqCOYfmWh6PjoCIhAr/I="));

?>