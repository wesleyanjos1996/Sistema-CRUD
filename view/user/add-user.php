<?php
require_once '../includes/header.php';
session_start();
?>
    <div class="row center">
        <div class="col s12 m6 push-m3">
            <h3 class="light center-align">Novo Usuário</h3>
            <form action="../../controller/User/create-user.php" method="POST">
                <div class="input-field col s12">
                    <input type="text" name="username" id="username">
                    <label for="username">Nome de Usuário</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="password" id="password" autocomplete="new-password">
                    <label for="password">Senha</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="name" id="name">
                    <label for="name">Nome Completo</label>
                </div>
                <button type="submit" name="btn-create-user" class="btn">Cadastrar</button>
                <a href="../../index.php" class="btn">Login</a>
            </form>
        </div>
    </div>
<?php
require_once '../includes/footer.php';
?>