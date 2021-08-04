<?php
setcookie('user',$user['id'],time() - 3600, "/");
setcookie('user',$user['fio'],time() - 3600, "/");
header("Location: /")
?>