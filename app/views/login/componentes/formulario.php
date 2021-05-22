<form class="form-signin" action="<?php echo RUTA_URL ?>/Login/acceder" method="POST" autocomplete="off">
    <br>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Email" required autofocus>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
    <br>
<button class="btn btn-lg btn-warning btn-block" type="submit">Entrar</button>
<br>

</form>

<a data-toggle="modal" href="" data-target="#registerModal">
    ¿Quieres registrarte?
</a>

