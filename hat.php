<body>
<div class="container" id="hat">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
    <?php if( isset($_SESSION['logged_user']) ) : ?>
      Здравствуйте, <?php echo($_SESSION['logged_user']->name);?>!
    <?php else :?>
      Вы не авторизованы!
    <?php endif; ?>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
      <?php if( $_SESSION['logged_user']->role == 'moder') : ?>
        <li><a href="./addreview.php" class="nav-link px-2 link-secondary">Добавить обзор</a></li>
      <?php endif; ?>
    </ul>
    
    <?php if( isset($_SESSION['logged_user']) ) : ?>
      <div class="col-md-3 text-end">
        <a href="./logout.php"><button type="button" class="btn btn-outline-primary me-2">Выйти</button></a>
      </div>  
      
    <?php else : ?>
      <div class="col-md-3 text-end">
        <a href="./signin.php"><button type="button" class="btn btn-outline-primary me-2">Войти</button></a>
        <a href="./registration.php"><button type="button" class="btn btn-primary">Регистрация</button></a>
      </div>
    <?php endif; ?>
  </header>
</div>
</body>
</html>