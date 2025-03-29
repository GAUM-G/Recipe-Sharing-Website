<?php
session_start();
session_destroy();
echo "<script>
        sessionStorage.removeItem('loggedInUser');
        window.location.href = 'homepage.html';
      </script>";
exit();
?>
