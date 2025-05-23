<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/af6fbadd15.js" crossorigin="anonymous"></script>
    <title>Área de cadastro de aula </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("../Classe/Conexao.php") ?>

<?php include("../Navbar/navbar.php"); ?>

<section class="p-3">
    <h3>CADASTRO PARA AULA</h3>

    <div class="text-end mb-2 conteudo-esconder-pdf">
        <button class="btn btn-success newUser " data-bs-toggle="modal" data-bs-target="#userForm">
            CADASTRO PARA AULA <i class="bi bi-people"></i>
        </button>
    </div>

    <form method="get" class="mb-2 conteudo-esconder-pdf">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar por nome...">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </form>

    <div class="col-12 text-end conteudo-esconder-pdf">
        <div class="d-inline">
            <button class="btn btn-danger botao-gerar-pdf">
                <i class="bi bi-file-earmark-pdf"></i> GERAR PDF
            </button>
        </div>
        <div class="d-inline">
            <div class="dropdown d-inline">
                <button class="btn btn-warning dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">ORDENAR</button>
                <ul class="dropdown-menu filtro-opcoes" aria-labelledby="filterDropdown">
                    <li><a class="dropdown-item" href="?ordenar=DESC">AULAS ATIVAS</a></li>
                    <li><a class="dropdown-item" href="?ordenar=ASC">AULAS INATIVAS</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

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
                        <th>NOME DO ALUNO</th>
                        <th>NOME DA AULA</th>
                        <th>DIA DA AULA</th>
                        <th>HORARIO DA AULA</th>
                        <th>PROFESSOR</th>
                        <th>LOCAL DA AULA</th>
                        <th>AJUSTES</th>
                    </tr>
                </thead>
                <tbody>
                    
    <?php
    $aulas = Db::conexao()->query("SELECT * FROM `aulas`")->fetchAll(PDO::FETCH_OBJ);

    foreach ($aulas as $aula) {
?>
    <tr>
        <td><?php echo $aula->nome_aluno; ?></td>
        <td><?php echo $aula->categoria_aula; ?></td>
        <td><?php echo $aula->dia_semana; ?></td>
        <td><?php echo $aula->horario_inicio; ?></td>
        <td><?php echo $aula->professor; ?></td>
        <td><?php echo $aula->local_aula; ?></td>
        <td class="conteudo-esconder-pdf">
            <button 
                class="btn btn-primary btn-sm p-0 ps-2 pe-2 botao-selecionar-aula"
                data-id="<?php echo $aula->id; ?>"
                data-nome_aluno="<?php echo $aula->nome_aluno; ?>"
                data-categoria_aula="<?php echo $aula->categoria_aula; ?>"
                data-dia_semana="<?php echo $aula->dia_semana; ?>"
                data-horario_inicio="<?php echo $aula->horario_inicio; ?>"
                data-professor="<?php echo $aula->professor; ?>"
                data-local_aula="<?php echo $aula->local_aula; ?>">
                EDITAR
            </button>
        </td>
    </tr>
<?php } ?>


<div class="modal fade" id="userForm">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Aula</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" id="formulario-cadastrar" action="cadastrar.php">
                <div class="modal-body">
                    <div class="inputField">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Nome do Aluno:</label>
                            <input type="text" id="studentName" name="nome_aluno" class="form-control small-input" required>
                        </div>

                        <div class="mb-3">
                            <label for="classCategory" class="form-label">Categoria da Aula:</label>
                            <input type="text" id="classCategory" name="categoria_aula" class="form-control small-input" required>
                        </div>

                        <div class="mb-3">
                            <label for="classDay" class="form-label">Dia da Semana:</label>
                            <select name="dia_semana" id="classDay" class="form-select small-select" required>
                                <option value="" disabled selected>Selecione o dia da semana</option>
                                <option value="segunda">Segunda-feira</option>
                                <option value="terca">Terça-feira</option>
                                <option value="quarta">Quarta-feira</option>
                                <option value="quinta">Quinta-feira</option>
                                <option value="sexta">Sexta-feira</option>
                                <option value="sabado">Sábado</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="classTime" class="form-label">Horário da Aula:</label>
                            <input type="time" id="classTime" name="horario_aula" class="form-control small-input" required>
                        </div>

                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Professor:</label>
                            <input type="text" id="teacherName" name="professor" class="form-control small-input" required>
                        </div>

                        <div class="mb-3">
                            <label for="classLocation" class="form-label">Local da Aula:</label>
                            <input type="text" id="classLocation" name="local_aula" class="form-control small-input" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success submit">Salvar</button>
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
            <label for="studentName" class="form-label">Nome do Aluno:</label>
            <input type="text" id="studentName" name="nome_aluno" class="form-control small-input" required>
        </div>

        <div class="mb-3">
            <label for="classCategory" class="form-label">Categoria da Aula:</label>
            <input type="text" id="classCategory" name="categoria_aula" class="form-control small-input" required>
        </div>

        <div class="mb-3">
            <label for="classDay" class="form-label">Dia da Semana:</label>
            <select name="dia_semana" id="classDay" class="form-select small-select" required>
                <option value="" disabled selected>Selecione o dia da semana</option>
                <option value="segunda">Segunda-feira</option>
                <option value="terca">Terça-feira</option>
                <option value="quarta">Quarta-feira</option>
                <option value="quinta">Quinta-feira</option>
                <option value="sexta">Sexta-feira</option>
                <option value="sabado">Sábado</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="classTime" class="form-label">Horário da Aula:</label>
            <input type="time" id="classTime" name="horario_aula" class="form-control small-input" required>
        </div>

        <div class="mb-3">
            <label for="teacherName" class="form-label">Professor:</label>
            <input type="text" id="teacherName" name="professor" class="form-control small-input" required>
        </div>

        <div class="mb-3">
            <label for="classLocation" class="form-label">Local da Aula:</label>
            <input type="text" id="classLocation" name="local_aula" class="form-control small-input" required>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
    <button type="submit" class="btn btn-success submit">Salvar</button>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
