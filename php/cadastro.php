    <!-- <?php 
    $mensagem_cadastro = ""; 

    if (isset($_POST['submit'])) { // Se o usuário enviar os dados ao apertar em submit
        include('conexao.php'); // Chama a conexão com o banco

        // Criação das variáveis com seus respectivos dados
        $nome = ucwords(strtolower($_POST['nome']));
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];

        // Verifica se o e-mail, telefone, CPF já estão cadastrados
        $sql_check = "SELECT * FROM tblUsuario WHERE usuEmail = ? OR usuTelefone = ? OR usuCpf = ?";
        $stmt_check = mysqli_prepare($conexao, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "sss", $email, $telefone, $cpf);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($result_check) > 0) { // Se já está cadastrado
            $user = mysqli_fetch_assoc($result_check);
            if ($user['usuEmail'] === $email) {
                $mensagem_cadastro = "Este e-mail já está cadastrado.";
            } elseif ($user['usuTelefone'] === $telefone) {
                $mensagem_cadastro = "Este telefone já está cadastrado.";
            } elseif ($user['usuCpf'] === $cpf) {
                $mensagem_cadastro = "Este CPF já está cadastrado.";
            }
        } else {
            // Inserção no banco de dados
            $sql_insert = "INSERT INTO tblUsuario (usuNome, usuTelefone, usuCpf, usuNasc, usuEmail, usuSenha, usuCep, usuEndereco, usuNumero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($conexao, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "sssssssss", $nome, $telefone, $cpf, $data_nascimento, $email, $senha, $cep, $endereco, $numero);

            $resultado = mysqli_stmt_execute($stmt_insert);

            if ($resultado) {
                $mensagem_cadastro = "sucesso"; 
            } else {
                $mensagem_cadastro = "Ocorreu um erro durante o cadastro. Por favor, tente novamente.";
            }
        }
    }
    ?> -->

<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro.com</title>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

    <div class="form">
        <div class="form-header">
            <div class="title">
                <h1><a href="index.html">Cadastre-se</a></h1>
            </div>
        </div>
        <form action="cadastro.php" method="POST" class="input-group">
            
                <label for="firstname">Nome
                <input id="firstname" type="text" name="nome" placeholder="Nome Completo" required>
                </label>
            
                <label for="telefone">Telefone
                <input id="telefone" type="number" name="telefone" placeholder="(xx) xxxx-xxxx" required>
                </label>
            
                <label for="cpf">CPF
                <input id="cpf" type="number" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
                </label>
            
                <label for="nasc">Data de Nascimento
                <input id="nasc" type="date" name="data_nascimento" required>
                </label>
            
                <label for="email">Email
                <input id="email" type="email" name="email" placeholder="Email" required>
                </label>
            
                <label for="password">Senha
                <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                </label>

                <label for="cep">CEP
                <input id="cep" type="number" name="cep" placeholder="CEP (opcional)">
                </label>

                <label for="endereco">Endereço</label>
                <input id="endereco" type="text" name="endereco" placeholder="Endereço (opcional)">
                </label>

                <label for="numero">Número</label>
                <input id="numero" type="number" name="numero" placeholder="Número (opcional)">
                </label>

                <div class="control">
                <input id="password" type="submit" name="submit" value="cadastrar" class="btn-home">
                </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if ($mensagem_cadastro === "sucesso"): ?>
    <script>
        Swal.fire({
            title: 'Cadastro realizado!',
            text: 'Seu cadastro foi feito com sucesso!',
            icon: 'success'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });
    </script>
<?php elseif (!empty($mensagem_cadastro)): ?>
    <script>
        Swal.fire({
            title: 'Erro no cadastro',
            text: 'Esses dados ja foram utilizadas',
            icon: 'error'
        });
    </script>
<?php endif; ?>

</body>
</html>
