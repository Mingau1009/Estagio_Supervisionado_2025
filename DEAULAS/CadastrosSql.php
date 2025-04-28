<?php
    $criaaulas = Db::conexao()->query("SELECT * FROM `criaaula`")->fetchAll(PDO::FETCH_OBJ);

    foreach ($criaaulas as $criaaula) {
?>
    <tr>
        <td><?php echo $criaaula->nome_aula; ?></td>
        <td><?php echo $criaaula->dia_aula; ?></td>
        <td><?php echo substr($criaaula->horario_aula, 0, 5); ?></td>
        <td><?php echo $criaaula->professor_aula; ?></td>
        <td class="conteudo-esconder-pdf">
            <button 
                class="conteudo-esconder-pdf btn btn-primary btn-sm p-0 ps-2 pe-2 botao-selecionar-aula"
                data-id="<?php echo $criaaula->id; ?>"
                data-nome_aula="<?php echo $criaaula->nome_aula; ?>"
                data-dia_aula="<?php echo $criaaula->dia_aula; ?>"
                data-horario_aula="<?php echo $criaaula->horario_aula; ?>"
                data-professor_aula="<?php echo $criaaula->professor_aula; ?>">
                EDITAR
            </button>
        </td>
    </tr>
<?php } ?>