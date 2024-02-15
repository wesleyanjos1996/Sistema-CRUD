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
    <div class="container-fluid teal darken-1 top-div z-depth-2"></div>
    <div class="container">
        <div class="row center-align">
            <h1 class="center-align upper">Bem-vindo! <?php echo $data['login']?></h1>
            <div class="col s12 m6 push-m3">
                <a href="./client/client.php" class="btn z-depth-2">Consultar Cliente</a>
            </div>
        </div>
        <div class="center-align">
            <a href="../controller/logout.php" class="btn red z-depth-2">Logout</a>
        </div>
    </div>
<?php
require_once './includes/header.php';
?>