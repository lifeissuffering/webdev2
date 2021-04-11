<?php
    require_once "db.php";
    $query =R::getAll('SELECT * FROM reviews'); 
    foreach($query as $row)
    {
        $id = $row['id'] . '<br>';
        $auID = $row['author_id'] . '<br>';
        $film = $row['film'] . '<br>';
        $video = $row['video'] . '<br>';
        $txt = $row['text'] . '<br>';
        $date = $row['date'] . '<br>';   
    }
?>
<body>
    <div class="main">
                    <?php
                    $query =R::getAll('SELECT * FROM reviews'); 
                    foreach($query as $row)
                    {
                        $id = $row['id'];
                        $author = R::load('users', $row['author_id']);
                        $authorName = $author->name;
                        $film = $row['film'];
                        $video = $row['video'];
                        $txt = $row['text'];
                        $date = $row['date']; 
                        $poster = $row['poster'];
                        
                        ?>
                       <?php echo '<a href="/review.php?next_id=' . $id . 
                       '&authorName=' . $authorName . '&film=' . $film .'">'?>
                            <div class="item">
                            <img src='uploads/<?php echo $poster?>' >
                            <div class="title">
                                <strong><?php echo $film?></strong>
                                <span><?php echo $authorName . ', ' . $date?></span>
                            </div>
                            </div>
                            </a>
                            <?php
                    }?> 
    </div>
</body>
</html>