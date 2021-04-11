<?php
    require "db.php";
    include "head.html"; 
    include "hat.php"; 
    $data = $_POST;
    if ( isset($data['do_signup']) )
    {
        $errors = array();
        if ($data['password'] != $data["password2"])
        {
            $errors[] = 'Пароли не совпадают!';
        }
        if (trim($data['name']) == '')
        {
            $errors[] = 'Введите имя!';
        } 
        if (trim($data['email']) == '')
        {
            $errors[] = 'Введите Email!';
        } 
        if (($data['password']) == '')
        {
            $errors[] = 'Введите пароль!';
        }
        if (R::count('users', "email = ?", array($data['email']))>0)
        {
            $errors[] = 'Пользователь с таким почтовым адресом уже существует!';
        }
        if (empty($errors))
        {
            $user = R::dispense('users');
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            $user->role = 'basic';
            R::store($user);
            header('Location: /signin.php');

        } else
        {
            echo '<div id=error style="color: red">'.array_shift($errors).'</div><hr>';
        }
    }
    
?>
<main class="form-signup">
    <form action='/registration.php' method='POST'>

    <h1 id="header_signup" class="h3 mb-3 fw-normal">Заполните данные</h1>
        <div class="form-floating">
            <input type="text" name="name" value="<?php echo @$data['name']; ?>"  placeholder="Ваше имя">
        </div>
        <div class="form-floating">
            <input type="email" name="email" value="<?php echo @$data['email']; ?>" placeholder="name@example.com">            
        </div>
        <div class="form-floating">
            <input type="password" name="password" value="<?php echo @$data['password']; ?>"  placeholder="Придумайте пароль">
        </div>
        <div class="form-floating">
            <input type="password" name="password2" value="<?php echo @$data['password2']; ?>"  placeholder="Повторите пароль">
        </div>
        <button class="mt-3 w-100 btn btn-lg btn-primary" type="submit" name="do_signup">Зарегистрироваться</button>
                <p class="mt-5 mb-3 text-muted">© 2021</p>
    </form>
</main>