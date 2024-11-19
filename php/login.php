<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
  <div id="login">
        <div class="caixa">

          <a class="logo" href="acessar.html">
            <h2>RifaNet</h2>
          </a>

          <h1>Faça seu login</h1>

          
          <form action= "conexaoLogin.php" method="POST" >
          <label for="">Email
            <input type="email" id="email" placeholder="Digite seu e-mail" name="email" required>
          </label>
          <label for="">Senha
            <input type="password" id="senha" placeholder="Digite sua senha" name="senha" required>
          </label>

          <div class="control">
            <input type="submit" id="submit"  value="entrar" name="submit" class="btn-home"><br>
          </div>        
          </form>
        </div>     
  </div>
</body>
</html>