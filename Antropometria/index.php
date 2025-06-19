<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação Antropometria</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../Sidebar/style.css">
    <script src="../Login/inactivity.js"></script>
</head>
<body>

<?php include("../Classe/Conexao.php") ?>

<?php include("../Sidebar/index.php"); ?>

<section class="p-3" style="margin-left:85px;"></section>

    <div class="container">
        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detalhamento</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Nome completo</label>
                            <select required>
                                <option disabled selected>Busque teu nome</option>
                                <option value="">SELECIONE...</option>
                                        <?php foreach($alunos as $aluno) { ?>
                                            <option value="<?php echo $aluno->id; ?>"><?php echo $aluno->nome; ?></option>
                                        <?php } ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Objetivo com essa Avaliação</label>
                            <input type="text" placeholder="Digite seu Objetivo" required>
                        </div>

                        <div class="input-field">
                            <label>Data da Avaliação</label>
                            <input type="date" placeholder="Digite a Data da Avaliação" required>
                        </div>

                        <div class="input-field">
                            <label>% Massa Gorda</label>
                            <input type="text" placeholder="Digite a Massa Gorda" required>
                        </div>

                        <div class="input-field">
                            <label>% Massa Magra</label>
                            <input type="text" placeholder="Digite a Massa Magra" required>
                        </div>

                        <div class="input-field">
                            <label>Massa Gorda</label>
                            <input type="text" placeholder="Digite a Massa Gorda em kg" required>
                        </div>

                        <div class="input-field">
                            <label>Massa Magra</label>
                            <input type="text" placeholder="Digite a Massa Magra em kg" required>
                        </div>

                        <div class="input-field">
                            <label>Razão cintura/quadril</label>
                            <input type="text" placeholder="Digite a Razão Razão cintura/quadril" required>
                        </div>

                        <div class="input-field">
                            <label>Altura (m)</label>
                            <input type="text" id="altura" step="0.01" placeholder="Digite sua altura" required oninput="calcularIMC()">
                        </div>

                        <div class="input-field">
                            <label>Peso (kg)</label>
                            <input type="text" id="peso" step="0.1" placeholder="Digite seu peso" required oninput="calcularIMC()">
                        </div>

                        <div class="input-field">
                            <label>IMC</label>
                            <input type="text" id="imc" placeholder="IMC calculado" readonly>
                        </div>

                        <div class="input-field">
                            <label>Categoria</label>
                            <input type="text" id="categoria" placeholder="Classificação" readonly>
                        </div>

                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Circunferências</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Pescoço</label>
                            <input type="text" placeholder="Medida do Pescoço" required>
                        </div>

                        <div class="input-field">
                            <label>Ombro</label>
                            <input type="text" placeholder="Medida do Ombro" required>
                        </div>

                        <div class="input-field">
                            <label>Peitoral</label>
                            <input type="text" placeholder="Medida do do Peitoral" required>
                        </div>

                        <div class="input-field">
                            <label>Cintura</label>
                            <input type="text" placeholder="Medida da Cintura" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Abdomen</label>
                            <input type="text" placeholder="Medida do Abdomen" required>
                        </div>

                        <div class="input-field">
                            <label>Quadril</label>
                            <input type="text" placeholder="Medida do Quadril" required>
                        </div>

                        <div class="input-field">
                            <label>Braço Esquerdo Relaxado</label>
                            <input type="text" placeholder="Medida do Braço Esquerdo Relaxado" required>
                        </div>

                        <div class="input-field">
                            <label>Braço Direito Relaxado</label>
                            <input type="text" placeholder="Medida do Braço Direito Relaxado" required>
                        </div>

                        <div class="input-field">
                            <label>Antebraço Esquerdo</label>
                            <input type="text" placeholder="Medida do Antebraço Esquerdo" required>
                        </div>

                        <div class="input-field">
                            <label>Antebraço Direito</label>
                            <input type="text" placeholder="Medida do Antebraço Direito" required>
                        </div>

                        <div class="input-field">
                            <label>Punho Esquerdo</label>
                            <input type="text" placeholder="Medida do Punho Esquerdo" required>
                        </div>

                        <div class="input-field">
                            <label>Punho Direito</label>
                            <input type="text" placeholder="Medida do Punho Direito" required>
                        </div>

                        <div class="input-field">
                            <label>Panturrilha Esquerda</label>
                            <input type="text" placeholder="Medida Panturrilha Esquerda" required>
                        </div>

                        <div class="input-field">
                            <label>Panturrilha Direita</label>
                            <input type="text" placeholder="Medida Panturrilha Direita" required>
                        </div>

                        <div class="input-field">
                            <label>Coxa Esquerda</label>
                            <input type="text" placeholder="Medida Coxa Esquerda" required>
                        </div>

                        <div class="input-field">
                            <label>Coxa Direita</label>
                            <input type="text" placeholder="Medida Coxa Direita" required>
                        </div>

                    <div class="details ID">
                        <span class="title">Dobras Cutâneas</span>
        
                        <div class="fields">
                            <div class="input-field">
                                <label>Bíceps</label>
                                <input type="text" placeholder="Medida do Bíceps" required>
                            </div>
        
                            <div class="input-field">
                                <label>Abdominal</label>
                                <input type="text" placeholder="Medida do Abdominal" required>
                            </div>

                            <div class="input-field">
                                <label>Tríceps</label>
                                <input type="text" placeholder="Medida do Tríceps" required>
                            </div>
    
                            <div class="input-field">
                                <label>Suprailíaca</label>
                                <input type="text" placeholder="Medida da Suprailíaca" required>
                            </div>
    
                            <div class="input-field">
                                <label>Axiliar média</label>
                                <input type="text" placeholder="Medida Axiliar média" required>
                            </div>
    
                            <div class="input-field">
                                <label>Subescapular</label>
                                <input type="text" placeholder="Medida da Subescapular" required>
                            </div>
    
                            <div class="input-field">
                                <label>Tórax</label>
                                <input type="text" placeholder="Medida do Tórax" required>
                            </div>
    
                            <div class="input-field">
                                <label>Coxa</label>
                                <input type="text" placeholder="Medida da Coxa" required>
                            </div>
                            
                            <button onclick="" style="background-color: #DC3545; color: white; padding: 10px; border: none; border-radius: 5px;">
                                <i class="fas fa-file-pdf"></i> Gerar PDF
                            </button>
                            

    <script src="script.js"></script>
    <script>
        function calcularIMC() {
            let altura = parseFloat(document.getElementById("altura").value.replace(",", "."));
            let peso = parseFloat(document.getElementById("peso").value.replace(",", "."));
            let imcField = document.getElementById("imc");
            let categoriaField = document.getElementById("categoria");
        
            if (!isNaN(altura) && !isNaN(peso) && altura > 0) {
                let imc = peso / (altura * altura);
                imcField.value = imc.toFixed(2);
        
                let categoria = "";
                if (imc < 18.5) {
                    categoria = "Abaixo do peso";
                } else if (imc < 24.9) {
                    categoria = "Peso normal";
                } else if (imc < 29.9) {
                    categoria = "Sobrepeso";
                } else if (imc < 34.9) {
                    categoria = "Obesidade Grau 1";
                } else if (imc < 39.9) {
                    categoria = "Obesidade Grau 2";
                } else {
                    categoria = "Obesidade Grau 3";
                }
        
                categoriaField.value = categoria;
            } else {
                imcField.value = "";
                categoriaField.value = "";
            }
        }
        </script>
        
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("btnGerarPDF").addEventListener("click", function () {
                gerarPDF();
            });
        });
        
        function gerarPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
        
            doc.setFontSize(16);
            doc.text("Avaliação Antropométrica", 10, 10);
        
            let y = 20;
            const campos = document.querySelectorAll(".input-field");
            
            campos.forEach(campo => {
                let label = campo.querySelector("label").innerText;
                let input = campo.querySelector("input, select");
                let valor = input ? input.value : "";
                
                doc.setFontSize(12);
                doc.text(`${label}: ${valor}`, 10, y);
                y += 7;
            });
        
            doc.save("avaliacao_antropometrica.pdf");
        }
    </script>
        
</body>
</html>