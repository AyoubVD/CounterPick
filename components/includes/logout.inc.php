<?php

session_start();
session_unset();
session_destroy();

header("location:../error_succeshandels.php?log=out");
exit();