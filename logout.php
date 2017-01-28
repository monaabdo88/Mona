<?php
session_start();
session_destroy();
echo"<script>window.open('login.php?logout_admin=yes','_self')</script>";