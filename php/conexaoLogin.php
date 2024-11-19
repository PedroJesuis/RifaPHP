<?php
session_start(); // Inicia uma sessão 

// Se existir submit
if (isset($_POST['submit'])) {
    // Inclui o arquivo de conexão com o banco de dados
    include('conexao.php');
    
    // Define as variáveis a partir do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se as variáveis foram definidas corretamente
    if (empty($email) || empty($senha)) {
        $mensagem_login = "Por favor, preencha todos os campos.";
    } else {
        // Prepara e executa a consulta
        $sql_check = "SELECT * FROM tblUsuario WHERE usuEmail = ? AND usuSenha = ?";
        $stmt_check = mysqli_prepare($conexao, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "ss", $email, $senha);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($result_check) < 1) { // Verifica se não há resultados
            $mensagem_login = "E-mail ou senha incorretos.";
        } else { // Se o usuário for encontrado
            $usuario = mysqli_fetch_assoc($result_check); // Obtém os dados do usuário
            $_SESSION['email'] = $usuario['usuEmail'];
            $_SESSION['senha'] = $usuario['usuSenha'];
            $_SESSION['nome'] = $usuario['usuNome'];
            
            $mensagem_login = "sucesso"; // Define a mensagem de sucesso
        }
    }
} else {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($mensagem_login) && $mensagem_login === "sucesso"): ?>
    <script>
        Swal.fire({
            title: 'Login realizado com sucesso!',
            text: 'Bem-vindo de volta!',
            icon: 'success'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../views/home.html'; // Redireciona para a página principal
            }
        });
    </script>
<?php elseif (isset($mensagem_login)): ?>
    <script>
        Swal.fire({
            title: 'Erro no login',
            text: '<?= $mensagem_login ?>',
            icon: 'error'
        }).then(() => {
            window.location.href = 'login.php'; // Redireciona para a página de login
        });
    </script>
<?php endif; ?>

</body>
</html>
