<?php
session_start();

if (isset($_SESSION['id'])) {
  session_destroy();
  header('Location: connexion-admin.php');
  exit;
}