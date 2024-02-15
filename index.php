<?php
require_once './model/connect.php';
session_start();
if (isset($_POST['btn-login'])) {
	$erro = [];
    $login = mysqli_escape_string($connect, $_POST['login']);
    $password = mysqli_escape_string($connect, $_POST['password']);
	
    if (empty($login) or empty($password)) {	
        $erro[] = '<p>O campo login/senha precisa ser preenchido</p>';
    } else {
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            // $senha = md5($senha);
			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$password'";
			$result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) == 1) {
				$data = mysqli_fetch_array($result);
				mysqli_close($connect);
				$_SESSION['log'] = true;
				$_SESSION['id-user'] = $data['idusuario'];
				header('Location: ./view/home.php');
			}
		} else {
			$erro[] = "<p>Usuário não existe!</p>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="./node_modules/materialize-css/dist/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="./assets/css/custom.css" type="text/css">
</head>
<body>
    <div class="container" id="top">
        <div class="row">
            <div class="col s12 m6 push-m3">
                <h1 class="center-align light">Acesso</h1>
                <?php
                    if(!empty($erro)) {
                        foreach($erro as $erro) {
                            echo $erro;
                        }
                    }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="center-align">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="login" name="login" type="text" class="validate">
                            <label for="login">Usuário</label>
                          </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">Senha</label>
                          </div>
                    </div>
                    <button type="submit" class="btn z-depth-2 waves-effect waves-teal" name="btn-login">Entrar</button>
                    <a href="./view/user/add-user.php" class="btn z-depth-2 waves-effect waves-teal" name="btn-cad">Cadastrar</a>
                </form>
            </div>
        </div>
    </div>
    <footer class="page-footer teal darken-1 z-depth-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Sistema CRUD</h5>
                    <p class="grey-text text-lighten-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis molestiae doloribus distinctio architecto at, id nisi rem! Temporibus, vero vitae? Sequi eius est voluptatum deserunt blanditiis repellendus vitae esse pariatur.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://github.com/wesleyanjos1996" target="_blank" title="GitHub">GitHub</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://linkedin.com/in/wesleyanjos96/" target="_blank" title="Linkdin">Linkdin</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://wesleyanjos1996.github.io/" target="_blank" title="Portfolio">Portfólio</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <p class="center">&copy; 2024</p>
            </div>
        </div>
      </footer>
     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="./node_modules/materialize-css/dist/js/materialize.min.js"></script>
</body>
</html>