<?php
require "db.php";

$id = $_GET['next_id'];
$author = $_GET['authorName'];
$film = $_GET['film'];

$row = R::load('reviews', $id);
$poster = $row['poster'];
$review = $row['text'];
$date = $row['date']; 
$video = substr($row['video'], -11);

include "head.html";

?>

<body>
    <?php include "hat.php";?>
<div class="main">
    <div class="items">
        <h1><? echo $film?></h1><br>
        <div class="crop"><img src="uploads/<? echo $poster?>" alt="Poster"></div>
        <div class="subcontainer">
            <div>
                <h3>Обзор</h3>
                <? echo $review?>
            </div>
            <div>
                <? echo $author; echo ', '; echo $date?>
            </div>
            <? if ($video != ""){
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video.'" 
                title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>';
            }
            ?>
            <form class="comment" name="comment" action="comment.php" method="post">
                <p>
                    <label>Оставьте комментарий:</label>
                    <br />
                    <textarea id="text_comment" name="text_comment" cols="123" rows="10"<? if (!isset($_SESSION['logged_user'])){echo 'placeholder="Авторизуйтесь, чтобы оставлять комментарии"';
                    }?>></textarea>
                </p>
                <p>
                    <input type="hidden" name="page_id" value="<?echo $id?>"/>
                    <button class="btn btn-outline-primary me-2" type="submit" name="send">Отправить</button>
                </p>
            </form>
            <label for="comments">Комментарии</label>
            <div class="comments">  
                <div class="comm">
                <?php 
                    $result_set = R::getAll('SELECT * FROM comments WHERE page_id = ?', array($id));
                    foreach($result_set as $row) {?>
                        <strong><? echo $row['name'];?></strong>
                        <? echo $row['text'];?>
                        <br>
                        <span id="date_comm"><?echo $row['date'];?></span>
                    <?}
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>