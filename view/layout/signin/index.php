<? include  "header.php";?>
    <form class="form-signin" method="post">
        <img class="mb-4" src="{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Войти</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail"  name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> запомнить меня
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
<? include "footer.php";?>