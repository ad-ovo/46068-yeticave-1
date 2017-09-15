<?= $nav; ?>

<form class="form container <?= !empty($login_error) ? 'form--invalid' : ''; ?>" action="../../login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?= (in_array('email', $login_error)) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= isset($login_item['email']) ? $login_item['email'] : ''; ?>">
        <span class="form__error"><?= $login_error_message['email']; ?></span>
    </div>
    <div class="form__item form__item--last <?= (in_array('password', $login_error)) ? 'form__item--invalid' : ''; ?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" >
        <span class="form__error"><?= $login_error_message['password']; ?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
