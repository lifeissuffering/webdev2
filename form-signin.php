<body>  
    <main class ="form-signin">
        <form action="/signin.php" method = "POST">
            <h1 id="header_signin" class="h3 mb-3 fw-normal">Авторизация</h1>
            <div class="form-floating">
            <input type="email" name="email" value="<?php echo @$data['email']; ?>" placeholder="name@example.com">
            
            </div>
            <div class="form-floating">
            <input type="password" name="password" value="<?php echo @$data['password']; ?>" placeholder="Пароль">
            
            </div>

            <div class="checkbox mb-3">
            <label class = "checkbox">
                <input type="checkbox" value="remember-me"> Запомнить меня
            </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="do_signin">Войти</button>
            <p class="mt-5 mb-3 text-muted">© 2021</p>
        </form>
    </main>
</body>
</html>