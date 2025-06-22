<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../Sidebar/style.css">
    <script src="../Login/inactivity.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>ÁREA DE CADASTRO DE FICHA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include("../Classe/Conexao.php") ?>

<?php include("../Sidebar/index.php"); ?>

    <div class="container">
        <?php $dietas = Db::conexao()->query("SELECT * FROM dieta ORDER BY nome_aluno ASC")->fetchAll(PDO::FETCH_OBJ); ?>
        <?php $alunos = Db::conexao()->query("SELECT * FROM `aluno` WHERE ativo = 1")->fetchAll(PDO::FETCH_OBJ);?>
       
<section class="p-3" style="margin-left:85px;">
    <div class="text-end conteudo-esconder-pdf">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadastrar">
            CADASTRAR <i class="bi bi-people"></i>
        </button>
    </div>

    <br>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="pesquisa-aluno" class="form-control" placeholder="Buscar por nome do aluno...">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
        <div class="col-md-6 text-end conteudo-esconder-pdf">
            <button class="btn btn-danger botao-gerar-pdf">
                <i class="bi bi-file-earmark-pdf"></i> GERAR PDF
            </button>
        </div>
    </div>
</section>

        <table class="table table-striped table-hover mt-3 text-center table-bordered">
            <thead>
                <tr>
                    <th>ALUNO</th>
                    <th>DIA DA REFEIÇÃO</th>
                    <th>REFEIÇÃO</th>
                    <th>HORÁRIO DA REFEIÇÃO</th>
                    <th class="conteudo-esconder-pdf">AJUSTES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dietas as $dieta) { ?>
                    <tr>
                        <td>
                            <?php
                                $nomeAluno = '';
                                foreach ($alunos as $aluno) {
                                    if ($aluno->id == $dieta->nome_aluno) {
                                        $nomeAluno = $aluno->nome;
                                        break;
                                    }
                                }
                                echo $nomeAluno;
                            ?>
                        </td>
                        <td><?php echo $dieta->dia_refeicao; ?></td>
                        <td><?php echo $dieta->tipo_refeicao; ?></td>
                        <td><?php echo $dieta->horario_refeicao; ?></td>
                        <td class="conteudo-esconder-pdf">
                            <button 
                                class="btn btn-primary btn-sm p-0 ps-2 pe-2 botao-selecionar-dieta"
                                data-id="<?php echo $dieta->id; ?>"
                                data-nome_aluno="<?php echo $dieta->nome_aluno; ?>"
                                data-dia_refeicao="<?php echo $dieta->dia_refeicao; ?>"
                                data-tipo_refeicao="<?php echo $dieta->tipo_refeicao; ?>"
                                data-horario_refeicao="<?php echo $dieta->horario_refeicao; ?>"
                                data-descricao="<?php echo $dieta->descricao; ?>">
                                EDITAR
                            </button>
                            <button 
                                class="btn btn-primary btn-sm p-0 ps-2 pe-2 botao-visualizar-descricao"
                                data-descricao="<?php echo htmlspecialchars($dieta->descricao); ?>"
                            >
                                VISUALIZAR
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form method="POST" id="formulario-cadastrar-dieta">
            <div class="modal fade" id="cadastrar" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">PLANO ALIMENTAR</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ALUNO</label>
                                    <select name="nome_aluno" class="form-control" required>
                                        <option value="">SELECIONE...</option>
                                        <?php foreach($alunos as $aluno) { ?>
                                            <option value="<?php echo $aluno->id; ?>"><?php echo $aluno->nome; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>DIA DA REFEIÇÃO</label>
                                    <select class="form-control" name="dia_refeicao" required>
                                        <option value="">SELECIONE...</option>
                                        <option value="SEGUNDA">Segunda</option>
                                        <option value="TERCA">Terça</option>
                                        <option value="QUARTA">Quarta</option>
                                        <option value="QUINTA">Quinta</option>
                                        <option value="SEXTA">Sexta</option>
                                        <option value="SABADO">Sábado</option>
                                        <option value="TODOS OS DIAS">Todos os Dias</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>REFEIÇÃO</label>
                                    <select class="form-control" name="tipo_refeicao" required>
                                        <option value="">SELECIONE...</option>
                                        <option value="Café da Manhã">Café da Manhã</option>
                                        <option value="Pré Treino">Pré Treino</option>
                                        <option value="Almoço">Almoço</option>
                                        <option value="Lanche da Tarde">Lanche da Tarde</option>
                                        <option value="Jantar">Jantar</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>HORÁRIO DA REFEIÇÃO</label>
                                    <input type="time" class="form-control" name="horario_refeicao" required>
                                </div>
                                <div class="col-md-12">
                                    <label>DESCRIÇÃO</label>
                                    <textarea class="form-control" name="descricao" rows="4" placeholder="Digite a descrição aqui..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                            <button type="submit" class="btn btn-success submit">CADASTRAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form method="POST" id="formulario-editar-dieta">
        <input type="hidden" name="id"> 
            <div class="modal fade" id="editar" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">EDITAR PLANO ALIMENTAR</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ALUNO</label>
                                    <select name="nome_aluno" class="form-control" required>
                                        <option value="">SELECIONE...</option>
                                        <?php foreach($alunos as $aluno) { ?>
                                            <option value="<?php echo $aluno->id; ?>"><?php echo $aluno->nome; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>DIA DA REFEIÇÃO</label>
                                    <select class="form-control" name="dia_refeicao" required>
                                        <option value="">SELECIONE...</option>
                                        <option value="SEGUNDA">Segunda</option>
                                        <option value="TERCA">Terça</option>
                                        <option value="QUARTA">Quarta</option>
                                        <option value="QUINTA">Quinta</option>
                                        <option value="SEXTA">Sexta</option>
                                        <option value="SABADO">Sábado</option>
                                        <option value="TODOS OS DIAS">Todos os Dias</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>REFEIÇÃO</label>
                                    <select class="form-control" name="tipo_refeicao" required>
                                        <option value="">SELECIONE...</option>
                                        <option value="Café da Manhã">Café da Manhã</option>
                                        <option value="Pré Treino">Pré Treino</option>
                                        <option value="Almoço">Almoço</option>
                                        <option value="Lanche da Tarde">Lanche da Tarde</option>
                                        <option value="Jantar">Jantar</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>HORÁRIO DA REFEIÇÃO</label>
                                    <input type="time" class="form-control" name="horario_refeicao" required>
                                </div>
                                <div class="col-md-12">
                                    <label>DESCRIÇÃO</label>
                                    <textarea class="form-control" name="descricao" rows="4" placeholder="Digite a descrição aqui..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                            <button type="submit" class="btn btn-success">EDITAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="visualizarDescricaoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Descrição da Refeição</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <p id="descricao-visualizar" class="text-wrap"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
    <script>
$(document).ready(function() {
    // Função para filtrar a tabela pelo nome do aluno
    $('#pesquisa-aluno').on('input', function() {
        const termo = $(this).val().toLowerCase();
        
        $('table tbody tr').each(function() {
            const nomeAluno = $(this).find('td:first').text().toLowerCase();
            if (nomeAluno.includes(termo)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Se quiser que a pesquisa também funcione ao pressionar Enter
    $('#pesquisa-aluno').keypress(function(e) {
        if (e.which === 13) { // 13 é o código da tecla Enter
            e.preventDefault();
            $(this).trigger('input');
        }
    });
});
</script>
</body>
</html>