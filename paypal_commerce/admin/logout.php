<?php
 session_start();

 session_destroy();

 echo '<script>window.open("login.php?logout=Your Are Logout Come Back Soon !","_self")</script>';

?>