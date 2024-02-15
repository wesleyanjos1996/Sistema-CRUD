<?php
require_once '../includes/header.php';
session_start();
if (!isset($_SESSION['log'])) {
	header('Location: ../../index.php');
}
?>
    <div class="container-fluid red">
        a
    </div>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light center-align">Novo Cliente</h3>
            <form action="../../controller/Client/create.php" method="POST">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name">
                    <label for="name">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="last" id="last">
                    <label for="last">Sobrenome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="email" id="email" autocomplete="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="date" name="birth" id="birth">
                    <label for="birth">Nascimento</label>
                </div>
                <button type="submit" name="btn-create" class="btn">Cadastrar</button>
                <a href="./client.php" class="btn green">Lista de Clientes</a>
            </form>
        </div>
    </div>
<?php
require_once '../includes/footer.php';
?>