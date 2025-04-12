<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/af6fbadd15.js" crossorigin="anonymous"></script>
    <title>Área de cadastro de exercício</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("../Classe/Conexao.php") ?>

<?php include("../Navbar/navbar.php"); ?>

<section class="p-3">
    <!-- Linha para o botão de Adicionar Exercício -->
    <div class="row mb-3 conteudo-esconder-pdf">
        <div class="col-12">
            <button class="btn btn-success newUser" data-bs-toggle="modal" data-bs-target="#userForm">
                <i style='font-size:20px' class='fas'>&#xf44b;</i> Matricular para aula
            </button>
            <div class="d-inline">
            <button class="btn btn-danger botao-gerar-pdf">
                <i class="bi bi-file-earmark-pdf"></i> GERAR PDF
            </button>
            </div>
        </div>
    </div>
    
</section>

<br>

<style>
    .short-input {
        width: 800px !important;  
        max-width: 100%;  
    }

    .input-group {
        max-width: 545px;  
    }

    .search-input {
        max-width: 545px;  
    }
</style>

<section>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover mt-3 text-center table-bordered">
                <thead>
                    <tr>
                        <th>Nome do aluno</th>
                        <th>Categoria de aula</th>
                        <th>Dia da semana</th>
                        <th>Horário de início</th>
                        <th>Professor</th>
                        <th>Local</th>
                        <th>Configurações</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php $aulas = Db::conexao()->query("SELECT * FROM `aulas`")->fetchAll(PDO::FETCH_OBJ); ?>

                <?php foreach ($aulas as $aula) { ?>
                    <tr>
                        <td><?php echo $aula->nome_aluno; ?></td>
                        <td><?php echo $aula->categoria_aula; ?></td>
                        <td><?php echo $aula->dia_semana; ?></td>
                        <td><?php echo $aula->horario_inicio; ?></td>
                        <td><?php echo $aula->professor; ?></td>
                        <td><?php echo $aula->local; ?></td>
                        <td class="conteudo-esconder-pdf">
                            <button 
                                class="conteudo-esconder-pdf btn btn-primary btn-sm p-0 ps-2 pe-2 botao-editar-aula"
                                data-id="<?php echo $aula->id; ?>"
                                data-nome_aluno="<?php echo $aula->nome_aluno; ?>"
                                data-categoria_aula="<?php echo $aula->categoria_aula; ?>"
                                data-dia_semana="<?php echo $aula->dia_semana; ?>"
                                data-horario_inicio="<?php echo $aula->horario_inicio; ?>"
                                data-professor="<?php echo $aula->professor; ?>"
                                data-local="<?php echo $aula->local; ?>"> 
                                EDITAR
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</section>


<div class="modal fade" id="userForm">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">CADASTRO DE AULA</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" id="formulario-cadastrar" action="cadastrar.php">
                <div class="modal-body">
                    <div class="inputField">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Nome do aluno:</label>
                            <input type="text" id="studentName" name="nome_aluno" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="classCategory" class="form-label">Categoria de aula:</label>
                            <select name="categoria_aula" id="classCategory" class="form-select" required>
                                <option value="" disabled selected>Selecione uma categoria</option>
                                <option value="Musculação">Musculação</option>
                                <option value="Cardio">Cardio</option>
                                <option value="Funcional">Funcional</option>
                                <option value="Pilates">Pilates</option>
                                <!-- Adicione outras categorias conforme necessário -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="weekDay" class="form-label">Dia da semana:</label>
                            <select name="dia_semana" id="weekDay" class="form-select" required>
                                <option value="" disabled selected>Selecione o dia</option>
                                <option value="Segunda-feira">Segunda-feira</option>
                                <option value="Terça-feira">Terça-feira</option>
                                <option value="Quarta-feira">Quarta-feira</option>
                                <option value="Quinta-feira">Quinta-feira</option>
                                <option value="Sexta-feira">Sexta-feira</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="startTime" class="form-label">Horário de início:</label>
                            <input type="time" id="startTime" name="horario_inicio" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="teacher" class="form-label">Professor:</label>
                            <input type="text" id="teacher" name="professor" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Local:</label>
                            <input type="text" id="location" name="local" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="settings" class="form-label">Configurações:</label>
                            <textarea id="settings" name="configuracoes" class="form-control" rows="3" placeholder="Observações, materiais necessários, etc."></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                    <button type="submit" class="btn btn-success">SALVAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

<form method="POST" id="formulario-editar" action="editar.php">
    <input type="hidden" name="id" class="form-control">
    <div class="modal fade" id="editar" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDITAR</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="inputField">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Nome do aluno:</label>
                            <input type="text" id="studentName" name="nome_aluno" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="classCategory" class="form-label">Categoria de aula:</label>
                            <input type="text" id="classCategory" name="categoria_aula" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="weekDay" class="form-label">Dia da semana:</label>
                            <select id="weekDay" name="dia_semana" class="form-select" required>
                                <option value="" disabled selected>Selecione o dia</option>
                                <option value="Segunda-feira">Segunda-feira</option>
                                <option value="Terça-feira">Terça-feira</option>
                                <option value="Quarta-feira">Quarta-feira</option>
                                <option value="Quinta-feira">Quinta-feira</option>
                                <option value="Sexta-feira">Sexta-feira</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="startTime" class="form-label">Horário de início:</label>
                            <input type="time" id="startTime" name="horario_inicio" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacher" class="form-label">Professor:</label>
                            <input type="text" id="teacher" name="professor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Local:</label>
                            <input type="text" id="location" name="local" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

        <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                <button type="submit" class="btn btn-success submit">SALVAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
