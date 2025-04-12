$(document).ready(function () {
    $(".botao-selecionar-aula").on("click", function () {
        let {
            id,
            nome,
            tipo_exercicio,
            grupo_muscular,
            categoria_aula,
            dia_semana,
            horario_inicio,
            professor,
            local
        } = $(this).data();
        
        $("#editar").modal("show");
        
        $("#formulario-editar input[name='id']").val(id);
        $("#formulario-editar input[name='nome']").val(nome);
        $("#formulario-editar input[name='tipo_exercicio']").val(tipo_exercicio);
        $("#formulario-editar input[name='grupo_muscular']").val(grupo_muscular);
        $("#formulario-editar input[name='categoria_aula']").val(categoria_aula);
        $("#formulario-editar input[name='dia_semana']").val(dia_semana);
        $("#formulario-editar input[name='horario_inicio']").val(horario_inicio);
        $("#formulario-editar input[name='professor']").val(professor);
        $("#formulario-editar input[name='local']").val(local);        

    });

    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
});