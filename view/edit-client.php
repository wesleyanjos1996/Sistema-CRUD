<?php
include_once '../model/connect.php';
include_once './includes/header.php';
session_start();
if (!isset($_SESSION['log'])) {
	header('Location: ../index.php');
}
if (isset($_GET['id'])) {
	$id = mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM clientes WHERE idcliente ='$id'";
	$result = mysqli_query($connect, $sql);
	$data = mysqli_fetch_array($result);
}
?>
    <div class="container-fluid red">
        a
    </div>
    <div class="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light center">Editar Cliente</h3>
            <form action="../controller/update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['idcliente'] ?>">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name" value="<?php echo $data['nome']?>">
                    <label for="name">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="last" id="last" value="<?php echo $data['sobrenome']?>">
                    <label for="last">Sobrenome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="email" id="email" value="<?php echo $data['email']?>" autocomplete="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="date" name="birth" id="birth" value="<?php echo $data['nascimento']?>">
                    <label for="birth">Nascimento</label>
                </div>
                <button type="submit" name="btn-update" class="btn">Atualizar</button>
                <a href="./client.php" class="btn green">Lista de Clientes</a>
            </form>
        </div>
    </div>
<?php
require_once './includes/footer.php';
?>