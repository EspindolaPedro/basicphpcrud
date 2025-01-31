<?php
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">ADICIONAR USUÁRIO</a>

<table border="1" width="100%">
    <tr> 
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇOES</th>

    </tr>

    <?php
   forEach($lista as $usuario):
    ?>
    <tr>
        <td><?php echo $usuario['id'];?></td>
        <td><?php echo $usuario['nome'];?></td>
        <td><?php echo $usuario['email'];?></td>
        <td>
            <a href="editar.php?id=<?=$usuario['id'];?>" >[ Editar ]</a>
            <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return  confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
        </td>
    </tr>
    <?php
   endforeach;
    ?>
</table>
