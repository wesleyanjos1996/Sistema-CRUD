<?php
require_once '../model/connect.php';
require_once './includes/header.php';
session_start();
if (!isset($_SESSION['log'])) {
	header('Location: ../index.php');
}
$id = $_SESSION['id-user'];
$sql = "SELECT * FROM usuarios WHERE idusuario = '$id'";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
mysqli_close($connect);
?>
    <div class="container-fluid red">
        <header>
            o
        </header>
    </div>
    <div class="container">
        <div class="row center-align">
            <h1 class="center-align">Usuário <?php echo $data['login']?></h1>
            <div class="col s12 m6 push-m3">
                <a href="./client/client.php" class="btn">Consultar Cliente</a>
            </div>
        </div>
        <div class="center-align">
            <a href="../controller/logout.php" class="btn red">Logout</a>
        </div>
    </div>
<?php
require_once './includes/header.php';
?>