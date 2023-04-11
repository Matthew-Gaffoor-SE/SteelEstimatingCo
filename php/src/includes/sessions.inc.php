<?php
  $lifetime=3600;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime, httponly:true);
?>