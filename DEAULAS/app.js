$(document).ready(function () {
    $(".botao-selecionar-aula").on("click", function () {
        let {
            id,
            nome_aula,
            dia_aula,
            horario_aula,
            professor_aula
        } = $(this).data();
        
        $("#editar").modal("show");
        
        $("#formulario-editar input[name='id']").val(id);
        $("#formulario-editar input[name='nome_aula']").val(nome_aula);
        $("#formulario-editar input[name='dia_aula']").val(dia_aula);
        $("#formulario-editar input[name='horario_aula']").val(horario_aula);
        $("#formulario-editar input[name='professor_aula']").val(professor_aula);     
    });

    $(".botao-gerar-pdf").on("click", function(){
        window.print();
    });
});