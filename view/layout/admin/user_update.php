<?include "header.php";?>
<h1><?=$title?></h1>
    <form method="post">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Имя" value="<?=$content['name']?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com" value="<?= $content['email']?>">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="******">
        </div>
        <div class="form-group">
            <label for="id_group">Группа пользователей</label>
            <select class="form-control" id="id_group" name="id_group">
                <option value="1">Администраторы</option>
                <option value="2">Контент-редакторы</option>
                <option value="3">Зарегистрированные пользователи</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
        <button class="btn btn-link"><a href="/index.php/admin/">Отмена</a></button>
    </form>

    <div class="col"><?//=$content['id_group']?></div>

<?include "footer.php";?>