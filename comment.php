<?php
  require_once "db.php";
  $page_id = $_POST["page_id"];
  if (isset($_SESSION['logged_user'])){
    $date = date('Y-m-d H:i');
    $name = $_SESSION["logged_user"]->name;
    $text_comment = $_POST["text_comment"];
    $comment = R::dispense('comments');
    $comment->date = $date;
    $comment->name = $name;
    $comment->page_id = $page_id;
    $comment->text = $text_comment;
    R::store($comment);
  }
  header("Location: /review.php?next_id=$page_id");
?>