$(document).ready(function() {
    let alunosSelecionados = [];

    // Adiciona aluno à lista no modal de cadastro
    $('#formulario-cadastrar-aluno-evento .botao-cadastro-alunos').click(function () {
        const selectAluno = $('#formulario-cadastrar-aluno-evento select[name="aluno_id"]');
        const alunoId = selectAluno.val();
        const alunoNome = selectAluno.find('option:selected').text();

        if (!alunoId) {
            alert("Selecione um aluno antes de adicionar.");
            return;
        }

        // Evita duplicidade
        if (alunosSelecionados.find(aluno => aluno.id == alunoId)) {
            alert("Aluno já adicionado.");
            return;
        }

        alunosSelecionados.push({ id: alunoId, nome: alunoNome });

        atualizarTabelaAlunos();
        selectAluno.val('');
    });

    function atualizarTabelaAlunos() {
        const tbody = $('#cadastro-alunos');
        tbody.empty();

        alunosSelecionados.forEach((aluno, index) => {
            tbody.append(`
                <tr>
                    <td>${aluno.nome}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger remover-aluno" data-index="${index}">Remover</button>
                    </td>
                </tr>
            `);
        });
    }

    // Remove aluno da lista
    $(document).on('click', '.remover-aluno', function () {
        const index = $(this).data('index');
        alunosSelecionados.splice(index, 1);
        atualizarTabelaAlunos();
    });

    // Submete cadastro com os alunos
    $('#formulario-cadastrar-aluno-evento').submit(function (e) {
        e.preventDefault();

        if (alunosSelecionados.length === 0) {
            alert("Adicione pelo menos um aluno.");
            return;
        }

        const dadosFormulario = $(this).serializeArray();
        const dados = {};
        dadosFormulario.forEach(item => dados[item.name] = item.value);

        dados['alunos'] = alunosSelecionados;

        $.ajax({
            url: 'cadastrar.php',
            method: 'POST',
            data: JSON.stringify(dados),
            contentType: 'application/json',
            success: function (resposta) {
                alert('Cadastro realizado com sucesso!');
                location.reload();
            },
            error: function () {
                alert('Erro ao cadastrar.');
            }
        });
    });

    // ---- FORMULÁRIO DE EDIÇÃO (com lógica semelhante) ---- //
    $('#formulario-editar-aluno-evento .botao-cadastro-alunos').click(function () {
        const selectAluno = $('#formulario-editar-aluno-evento select[name="aluno_id"]');
        const alunoId = selectAluno.val();
        const alunoNome = selectAluno.find('option:selected').text();

        if (!alunoId) {
            alert("Selecione um aluno antes de adicionar.");
            return;
        }

        if (alunosSelecionados.find(aluno => aluno.id == alunoId)) {
            alert("Aluno já adicionado.");
            return;
        }

        alunosSelecionados.push({ id: alunoId, nome: alunoNome });
        atualizarTabelaAlunos();
        selectAluno.val('');
    });

    $('#formulario-editar-aluno-evento').submit(function (e) {
        e.preventDefault();

        if (alunosSelecionados.length === 0) {
            alert("Adicione pelo menos um aluno.");
            return;
        }

        const dadosFormulario = $(this).serializeArray();
        const dados = {};
        dadosFormulario.forEach(item => dados[item.name] = item.value);

        dados['alunos'] = alunosSelecionados;

        $.ajax({
            url: 'editar.php',
            method: 'POST',
            data: JSON.stringify(dados),
            contentType: 'application/json',
            success: function (resposta) {
                alert('Edição realizada com sucesso!');
                location.reload();
            },
            error: function () {
                alert('Erro ao editar.');
            }
        });
    });

    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
});

