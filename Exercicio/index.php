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
    <h3>EXERCÍCIOS</h3>

    <div class="text-end mb-2 conteudo-esconder-pdf">
        <button class="btn btn-success newUser " data-bs-toggle="modal" data-bs-target="#userForm">
            <i style='font-size:20px' class='fas'>&#xf44b;</i> CADASTRAR EXERCÍCIO 
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
                        <th>NOME DO EXERCÍCIO</th>
                        <th>TIPO</th>
                        <th>GRUPO</th>
                        <th>AJUSTES</th>
                    </tr>
                </thead>
                <tbody>
                <?php $exercicios = Db::conexao()->query("SELECT * FROM `exercicio`")->fetchAll(PDO::FETCH_OBJ); ?>
                <?php foreach ($exercicios as $exercicio) { ?>
                    <tr>
                        <td><?php echo $exercicio->nome; ?></td>
                        <td><?php echo $exercicio->tipo_exercicio; ?></td>
                        <td><?php echo $exercicio->grupo_muscular; ?></td>
                        <td class="conteudo-esconder-pdf">
                        <button 
                            class="conteudo-esconder-pdf btn btn-primary btn-sm p-0 ps-2 pe-2 botao-selecionar-exercicio"
                            data-id="<?php echo $exercicio->id; ?>"
                            data-nome="<?php echo $exercicio->nome; ?>"
                            data-tipo_exercicio="<?php echo $exercicio->tipo_exercicio; ?>"
                            data-grupo_muscular="<?php echo $exercicio->grupo_muscular; ?>">
                            
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
                <h4 class="modal-title">CADASTRO DE EXERCICIO</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" id="formulario-cadastrar" action="cadastrar.php">
                <div class="modal-body">
                    <div class="inputField">
                        <div class="mb-3">
                            <label for="exerciseName" class="form-label">Nome do exercício:</label>
                            <input type="text" id="exerciseName" name="nome" class="form-control small-input" required>
                        </div>
                        <div class="mb-3">
                            <label for="exerciseType" class="form-label">Escolha o tipo de treino:</label>
                            <select  name="exercicio" id="exerciseType" class="form-select small-select" required>
                                <option value="" disabled selected>Selecione o tipo de treino</option>
                                <option value="musculacao">Musculação</option>
                                <option value="cardio">Cardio</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exerciseGroup"  class="form-label">Grupo:</label>
                            <select name="grupo" id="exerciseGroup" class="form-select small-select" required>
                                <option value="" disabled selected>Selecione o tipo de treino</option>
                                <option value="ABDÔMEN">ABDÔMEN</option>
                                <option value="CARDIO">CARDIO</option>
                                <option value="DORSAL">DORSAL</option>
                                <option value="MEMBROS INFERIORES">MEMBROS INFERIORES</option>
                                <option value="MEMBROS SUPERIORES">MEMBROS SUPERIORES</option>
                                <option value="BICEPS">BICEPS</option>
                                <option value="TRICEPS">TRICEPS</option>
                                <option value="PEITORAL">PEITORAL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                <button type="submit" class="btn btn-success submit">SALVAR</button>
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
                            <label for="exerciseName" class="form-label">Nome do exercício:</label>
                            <input type="text" id="exerciseName" name="nome" class="form-control small-input" required>
                        </div>
                        <div class="mb-3">
                            <label for="exerciseType" class="form-label">Escolha o tipo de treino:</label>
                            <select  name="exercicio" id="exerciseType" class="form-select small-select" required>
                                <option value="" disabled selected>Selecione o tipo de treino</option>
                                <option value="musculacao">Musculação</option>
                                <option value="cardio">Cardio</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exerciseGroup"  class="form-label">Grupo:</label>
                            <select name="grupo" id="exerciseGroup" class="form-select small-select" required>
                                <option value="" disabled selected>Selecione o tipo de treino</option>
                                <option value="ABDÔMEN">ABDÔMEN</option>
                                <option value="CARDIO">CARDIO</option>
                                <option value="DORSAL">DORSAL</option>
                                <option value="MEMBROS INFERIORES">MEMBROS INFERIORES</option>
                                <option value="MEMBROS SUPERIORES">MEMBROS SUPERIORES</option>
                                <option value="BICEPS">BICEPS</option>
                                <option value="TRICEPS">TRICEPS</option>
                                <option value="PEITORAL">PEITORAL</option>
                            </select>
                        </div>
                    </div>
                </div>
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
