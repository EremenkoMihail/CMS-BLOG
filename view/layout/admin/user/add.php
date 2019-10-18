<? include VIEW_DIR . "layout/admin/header.php"; ?>
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Добавить пользователя</h1>
        <div class="form-group">
            <label for="inputName" class="sr-only">Имя</label>
            <input type="text" id="inputName" name="name" class="form-control" placeholder="Имя" required autofocus>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
        </div>
        <div class="form-group">
            <label for="id_group">Группа пользователей</label>
            <select class="form-control" id="id_group" name="id_group">
                <option value="1">Администраторы</option>
                <option value="2">Контент-редакторы</option>
                <option value="3">Зарегистрированные пользователи</option>
            </select>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить</button>
    </form>
<? include VIEW_DIR . "layout/admin/footer.php"; ?>