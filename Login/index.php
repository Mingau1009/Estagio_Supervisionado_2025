<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta tag viewport essencial para responsividade -->
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        /* Estilos adicionais para responsividade */
        @media screen and (max-width: 600px) {
            .login-form {
                width: 90% !important;
                padding: 20px !important;
            }
            
            .login-form .text {
                font-size: 24px !important;
            }
            
            .field input {
                padding: 12px 15px 12px 40px !important;
                font-size: 14px !important;
            }
            
            .field .fas {
                line-height: 45px !important;
            }
            
            button {
                padding: 12px !important;
                font-size: 16px !important;
            }
            
            img {
                width: 100px !important;
                height: 100px !important;
            }
        }
    </style>
</head>

<body>
    <div class="login-form">
        <div style="overflow-x: auto; width: 100%; text-align: center;"> <!-- Ajuste para centralizar a logo -->
            <img src="logo.jpeg" alt="Login" style="max-width: 130px; height: auto;"> <!-- Imagem responsiva -->
        </div>

        <form onsubmit="return login(event)">
            <div class="text">Login</div>

            <div class="field">
                <div class="fas fa-envelope"></div>
                <input type="text" id="usuario" placeholder="Usuário" required>
            </div>

            <div class="field password-field">
                <div class="fas fa-lock"></div>
                <input type="password" id="senha" placeholder="Senha" required>
                <span class="fas fa-eye" id="togglePassword"></span>
            </div>

            <button type="submit">LOGIN</button>
        </form>
    </div>

    <script>
        // Alternar visibilidade da senha
        document.getElementById('togglePassword').addEventListener('click', function() {
            const senhaInput = document.getElementById('senha');
            const type = senhaInput.type === 'password' ? 'text' : 'password';
            senhaInput.type = type;
            this.classList.toggle('fa-eye-slash');
        });

        // Função de login - apenas cria novo token sem verificar existência
        async function login(event) {
            event.preventDefault();

            const usuario = document.getElementById('usuario').value;
            const senha = document.getElementById('senha').value;

            try {
                const response = await fetch('login.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ usuario, senha })
                });

                const data = await response.json();

                if (response.ok && data.token) {
                    // Armazena o novo token e redireciona
                    localStorage.setItem('token', data.token);
                    localStorage.setItem('lastActivity', Date.now());
                    window.location.href = '../Dashboard/index.php';
                } else {
                    alert(data.erro || 'Erro desconhecido.');
                    
                    // Limpa campos conforme instrução do servidor
                    if (data.resetar_campos) {
                        document.getElementById('usuario').value = '';
                        document.getElementById('senha').value = '';
                    } else {
                        document.getElementById('senha').value = '';
                    }
                    document.getElementById('usuario').focus();
                }
            } catch (error) {
                alert('Erro de conexão com o servidor.');
            }
        }
    </script>
</body>
</html>