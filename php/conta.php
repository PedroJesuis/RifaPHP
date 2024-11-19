<?php
    session_start(); // Certifique-se de que está escrito corretamente

    if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        // Se a sessão não estiver configurada, redireciona para o login
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nome']);
        header('Location: login.php');
        exit(); // Sempre use exit após o header para garantir que o script pare de rodar
    }
    $logado = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de rifas online para gerenciamento de rifas e informações do usuário.">
    <title>Minhas Rifas</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../css/conta.css">
</head>
<body>
  
    <header>
      
        <div class="header-container">
        <?php echo ("<h1> $logado </h1>"); ?>
        </div> 
      
    </header>
    <h2></h2>
    <div class="main-container">
        
        <div class="mycount">

            
              <h2 class="texte">Escolha sua imagem</h2>
              <input type="file" name="picture__input" id="picture__input">
              <label class="picture" for="picture__input" tabIndex="0">
                <span class="picture__image"></span>
              </label>
              <input type="submit"  id="inputsafe" value="Salvar foto">


        </div>
        

        
        <main class="main-content" >
          
            <h2>Suas informações pessoais</h2>

            <div class="address-fields">
              
                <input type="" placeholder="Rua Antonio Matheus da Silva">
                <input type="" placeholder="Número 133">
                <input type="" placeholder="Cidade Guaratinguetá">
                <input type="" placeholder="Estado Sp">
                <input type="" placeholder="CEP 12509830">
              
            </div>
          
            <div class="btn-container">
            <button class="btn create-raffle-btn">mudar dados</button>
            <a href="sair.php" class="Out" >Sair</a>
            </div>

        </main>
        
      
 </div>
  <script src="../js/conta.js"></script> 
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
 <script>
   AOS.init();
 </script>
</body>
</html>