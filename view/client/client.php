<?php
include_once '../../model/connect.php';
include_once '../includes/header.php';
include_once '../includes/modal.php';
session_start();
if (!isset($_SESSION['log'])) {
	header('Location: ../../index.php');
}
$id = $_SESSION['id-user'];
?>
    <div class="container-fluid teal darken-1 z-depth-2 top-div"></div>
    <div class="row">
	    <div class="col s12 m6 push-m3">
		    <h3 class="light center-align">Clientes</h3>
		    <hr>
		    <table class="striped">
			    <thead>
				    <tr>
					    <th class="center-align">Nome:</th>
					    <th class="center-align">Sobrenome:</th>
					    <th class="center-align">E-mail:</th>
					    <th class="center-align">Nascimento:</th>
					    <th class="center-align">Cadastrado em:</th>
				    </tr>
			    </thead>
			    <tbody>
                    <?php
                        $sql = "SELECT * FROM clientes WHERE idusuario = '$id'";
                        $result = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_array($result)) {
                    ?>
				    <tr>
					    <td class="center-align"><?php echo $data['nome'] ?></td>
					    <td class="center-align"><?php echo $data['sobrenome'] ?></td>
					    <td class="center-align"><?php echo $data['email'] ?></td>
					    <td class="center-align"><?php echo date('d/m/Y', strtotime($data['nascimento'])) ?></td>
					    <td class="center-align"><?php echo date('d/m/Y H:i:s', strtotime($data['created_at'])) ?></td>
					    <td class="center-align"><a href="./edit-client.php?id=<?php echo $data['idcliente'] ?>" class="btn-floating orange z-depth-2"><i class="material-icons">edit</i></a></td>
					    <td class="center-align"><a href="#modal<?php echo $data['idcliente'] ?>" class="btn-floating red modal-trigger z-depth-2"><i class="material-icons">delete</i></a></td>
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $data['idcliente'] ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção!</h4>
                                <p>Você tem certeza que deseja excluir este cliente?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="../../controller/Client/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $data['idcliente'] ?>">
                                    <button type="submit" name="btn-delete" class="btn red">Sim, excluir</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat orange">Cancelar</a>
                                </form>
                            </div>
                        </div>
				    </tr>
                    <?php
						    }
					    } else {
				    ?>
				    <tr>
					    <td class="center-align">-</td>
					    <td class="center-align">-</td>
					    <td class="center-align">-</td>
					    <td class="center-align">-</td>
				    </tr>
                    <?php
					    }
                        mysqli_close($connect);
				    ?>
			    </tbody>
		    </table>
		    <div class="center-align a-group">
                <a href="./add-client.php" class="btn z-depth-2">Adicionar cliente</a>
                <a href="../home.php" class="btn z-depth-2">Voltar</a>
            </div>
	    </div>
    </div>
<?php
require_once '../includes/footer.php';
?>