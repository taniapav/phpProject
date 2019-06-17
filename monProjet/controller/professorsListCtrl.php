<?php
$users = new users();

if(!empty($_GET['deleteId'])){
  $users->id = $_GET['deleteId'];
  $users->deleteUsers();
}

$usersList = $users->getProfList();
 ?>
