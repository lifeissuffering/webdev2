<?php
    require "db.php";
    include "head.html"; 
    include "hat.php"; 
    $data = $_POST;
    $poster =$_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    if ( isset($data['add_review']) )
    {
       move_uploaded_file($tmp_name, "uploads/" . $poster);
       $review = R::dispense('reviews');
       $review->film = $data['film-name'];
       $review->poster = $poster;
       $review->text = $data['text'];
       $review->video = $data['trailer'];
       $review->author = $_SESSION['logged_user'];
       $review->date = date('Y-m-d H:i');
       R::store($review);
       header('Location: /review.php?next_id=' . $review->id . 
       '&authorName=' . $review->author . '&film=' . $review->film);
    }
    ?>

<main class="main">
    <form class="addreview" action="/addreview.php" method="POST" enctype="multipart/form-data">
    <h1 class="h3 mb-3 fw-normal">Добавление обзора</h1>
            <div class="form-film-name">
                <input type="text" name="film-name" value="<?php echo @$data['film-name']; ?>" placeholder="Название фильма" required>
            
            </div>
            <div class="form-link-poster">
                <input type="url" name="trailer" area-multiline="true" value="<?php echo @$data['trailer']; ?>" placeholder="Ссылка на трейлер">
            </div>
            <input type="file" name="image" required>
            <textarea name="text" cols="123" rows="5" value="<?php echo @$data['text']; ?>" placeholder="Текст" required></textarea>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="add_review">Добавить обзор</button>
            <p class="mt-5 mb-3 text-muted">© 2021</p>
    </form>
</main>


