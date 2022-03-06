<?php
session_start();
session_destroy();
header("location: /p_p/index.php");
exit();