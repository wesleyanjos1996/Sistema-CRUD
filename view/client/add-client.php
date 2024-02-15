<?php
require_once '../includes/header.php';
session_start();
if (!isset($_SESSION['log'])) {
	header('Location: ../../index.php');
}
?>
    <div class="container-fluid teal darken-1 z-depth-2 top-div"></div>
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
                <div class="row center">
                    <button type="submit" name="btn-create" class="btn z-depth-2">Cadastrar</button>
                    <a href="./client.php" class="btn z-depth-2">Lista de Clientes</a>
                </div>
            </form>
        </div>
    </div>
<?php
require_once '../includes/footer.php';
?>