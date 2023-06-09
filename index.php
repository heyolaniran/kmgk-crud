<?php 
if(session_status() === PHP_SESSION_ACTIVE)
  header("Location: /dashboard/", true, 301); 
else { 
    header("Location: /login/", true, 301); 
}
  ?>