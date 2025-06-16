$(document).ready(function() {
    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
    
    $('#formulario-cadastrar-dieta').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'cadastrar.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function (resposta) {
                alert('Cadastro realizado com sucesso!');
                location.reload(); // Recarrega para atualizar a tabela
            },
            error: function () {
                alert('Erro ao cadastrar. Verifique os dados.');
            }
        });
    });

    // Quando clica no botão EDITAR, preenche o modal
    $('.botao-selecionar-dieta').on('click', function () {
        const modal = $('#editar');
        
        modal.find('input[name="nome_aluno"]').val($(this).data('nome_aluno'));
        modal.find('select[name="dia_refeicao"]').val($(this).data('dia_refeicao'));
        modal.find('select[name="tipo_refeicao"]').val($(this).data('tipo_refeicao'));
        modal.find('input[name="horario_refeicao"]').val($(this).data('horario_refeicao'));
        modal.find('textarea[name="descricao"]').val($(this).data('descricao'));
        
        modal.modal('show');
    });

    // Enviar dados do formulário de edição
    $('#formulario-editar-dieta').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'editar.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function () {
                alert('Dieta editada com sucesso!');
                location.reload();
            },
            error: function () {
                alert('Erro ao editar.');
            }
        });
    });
});

