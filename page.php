<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $dat = $_POST['dat'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $hora = $_POST['hora'];

        
        $stmt = $conexao->prepare("INSERT INTO agenda(nome, email, dat, cpf, telefone, hora) VALUES (?, ?, ?, ?, ?, ?)");

        
        $stmt->bind_param("ssssss", $nome, $email, $dat, $cpf, $telefone, $hora);

        
        if($stmt->execute()){
            echo "<script>alert('Sua consulta foi agendada com sucesso!');</script>";
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }

        
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trafalgar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imagens/favicon-16x16.png" type="image/x-icon">
</head>
<body>


<style>
    *{
        margin: 0;      
    }
        
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }        
       
        
    header {
        display: flex; 
        justify-content: space-between; 
        margin-left: 50px;
        padding: 40px;             
    }
        
    nav#menu :hover {
        font-weight: bold;
         
        color: black;                                       
    }
    a{
        justify-content: center;
        flex-direction: row;
        color: rgb(4, 0, 0);
        text-decoration: none;
        text-align: center;
        margin: 0px;
        margin-right: 80px;   
                       
    }      
        
    .agenda {
        color: black;
        margin-left: 80px;
        margin-top: 200px;
        word-wrap: break-word;
        
    }
    .agenda button {
        background-color: #00A3FF; 
        border: none; 
        color: white; 
        padding: 10px 20px; 
        text-align: center; 
        text-decoration: none; 
        display: inline-block; 
        font-size: 16px; 
        cursor: pointer; 
        border-radius: 20px;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color:gray;
        
        font-weight: bold;

    }
        
    .agenda p{
        color:gray;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .img1{
        float: right;
        max-width: 1000px;
        max-height: 500px;
        margin-right: 100px;
        margin-top: 50px;
    }
    .center h1  {
        text-align: center;            
        margin-top: 20%;  
        font-size: 30px;  
        margin-left: 60px; 
        margin-bottom: 20px;                 
    }
    hr {
        border-color: black; 
        box-sizing: border-box;
        width: 50px;
        margin-top: 50%; 
        margin: 0 auto;
        border-width: thin;
    }
    .center p {
        font-size: 18px;
        text-align: center;
        color: grey;
        margin-top: 30px;

    }

    /*.container {
        display: flex;        
    }*/
    .service {
        display: flex;
        width: 100%;
        height: 320px;
        flex-direction: row;
        justify-content: center;
        
    }
    
    .card {
       margin-top: 40px;
       width: 250px;
       height: 250px;
       background-color: #fff;
       margin-right: 20px;
       border-radius: 12px;
       border: 1px solid #ccc;
       box-shadow: 5px 6px 4px 0px #ccc;
       display: flex;
       flex-direction: column;
       padding: 20px;
       justify-content: space-evenly;
       margin-bottom: 10px;
    }
    .card_title h3 {
        font-size: 20px;
    }
    .card_text p a {
        font-size: 15px;
        
    }
    .card_text p a:hover {
        font-size: 17px;
        font: bold;
        color: #00A3FF;
        
    }
    

    
    
    button#learn {
        background-color: white; 
        color: #00A3FF; 
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px; 
        cursor: pointer;
        border-radius: 30px;
        margin-left: 43%;
        max-height: 100%;
        width: 200px;
        height: 50px;
        margin-bottom: 10px;       
        border: 2px solid #00A3FF;      
        margin-top: 100px;
    }
    button#learn:hover {
        background-color: #e9ebec;
        
        font-weight: bold;
    }
    .agendamento h1  {
        text-align: center;            
        margin-top: 20%;  
        font-size: 30px;  
        margin-left: 0px;
        margin-top: 100px;
        margin-bottom: 10px;
    }
    .agendamento hr {
        border-color: black; 
        box-sizing: border-box; 
        width: 50px; 
        margin-top: 20px; 
        margin: 0 auto;
        border-width: thin; 
        margin-bottom: 40px;
        margin-top: 40px;
            
    }    
    
    
    
    .form button{
        cursor: pointer;
        width: 150px;
        background: transparent;
        border: 1.4px solid white;
        border-radius: 20px;
        color: white;
        font-weight: 700;
        line-height: 40px;
        grid-column: 1 / -1; 
        justify-self: center; 
        margin-top: 30px; 
        margin-bottom: 40px;
    }
    
    .form button:hover{
        background: white;
        border: 1.4px solid transparent;
        color: #458FF6;
    }
    
    
    label {
        color: #FFFFFF;
    }

    
    .formulario {
        display: grid;      
        grid-template-columns: 1fr 1fr;
        gap: 1px;
        background-color: #00A3FF;
        margin-top: 10px;
    }
    .coluna {
        margin-top: 40px;
        margin-right: 50px; 
        margin-left: 90px;
        
    }
    .colun {
        margin-top: 40px;
        margin-right: 50px; 
        margin-left: 50px;
        
    }
    
    
    .formulario input{
        font-weight: 300;
        font-size: 1em;
        line-height: 1.2;
        color: #000000b7;
        padding: 10px;
        margin-bottom: 30px;
        border: none;
        border-radius:10px;
        outline: none;
        width: 600px;
        
    }
    

    .container-p {
      display: flex;
      align-items: center;
      justify-content: space-around;
      padding: 20px;
      margin-bottom: 20px;
      margin-top: 200px;
    }
    .illustration img {
      width: 50%;
      height: 300px;
      margin-right: 80px; 
    }
    .text {
        width: 40%;
        margin-top: 50px;
        margin-left: 100px;
        margin-bottom: 20px;
    }
    .text h1 {
        color:black;
        font-size: 24px;
        margin-bottom: 20px;
    }
    .text hr {
        margin-left: 0px;
    }
    .text p {
        color: #666699;
        font-size: 16px;
        margin-bottom: 20px;
        display: block;
        margin-top: 20px;
    }
    
    .read-more-button {
        background-color: white;
        color: #00A3FF;
        padding: 10px 20px;
        border-radius: 20px;
        cursor: pointer;
        border: 1px solid #00A3FF;
        margin-bottom: 80px;
        width: 30%;
        display: block;
        margin-top: 100px;
        
    }

    .read-more-button:hover {
        background-color: #e9ebec;
        color: #00A3FF;
        font-weight: bold;
    }
    .footer {
        background-color: #00A3FF;
        color: white;
        padding: 20px;
        display: flex;
        margin-top: 80px;
        justify-content: center;
        padding: 30px;
    }
    .logo-section {
        width: 25%;
        margin-top: 40px;
    }
    .logo-section img {
        width: 25%;
    }
    .logo-section p {
        margin: 10px 0;
    }
    .links-section {
        display: flex;
        justify-content: space-between;
        width: 60%;
    }
    .links-section .column {
        margin-right: 10px;
        padding: 30px;
    }
    .links-section h4 {
        margin-bottom: 10px;
    }
    .links-section ul {
        list-style: none;
        padding: 0;
    }
    .links-section li {
        margin-bottom: 5px;
    }      
          
</style>
    <header>
        
            <img class="logo" src="imagens/logo.png" alt="logo"> 
            <nav id="menu">
                <a href="#">Home</a>
                <a href="#">Find a doctor</a>
                <a href="#">Apps</a>
                <a href="#">Testimonials</a>
                <a href="#">About us</a>
            </nav>
        
    </header>
    <img class="img1" src="imagens/imagem1.png" alt="imagen1">
    <div class="agenda">
        <h1>Virtual Healthcare <br> for you</h1>
        <p>Trafalgar provides progressive, and affordable <br> healthcare,
            accessible on mobile and online <br> for everyone
        </p>
        <button type="submit">Consult today</button>
        
       
    </div>
    <div class="center">
        <h1> <a href="">Our services</a></h1>
        <hr>
         <p>We provide to you the best choice for your. Adjust it to your healthcare
            needs and make sure your undergo treatmente<br> with our highly qualified
            doctors oyu can consult with us whitch typa of service is suitable for
            your health
         </p>
    </div>
    <div class="service">
        <div class="card">
            <div class="card_img">
                <img src="imagens/busca.png" alt="busca">
            </div>
            <div class="card_title">
                <h3><a href="#">Search doctor</a></h3>
            </div>
            <div class="card_text">
                <p> <a href="">Choose your doctor from thousands
                    of specialists, general, and trusted
                    hospital...</a></p>
            </div>
        </div>
        <div class="card">
            <div class="card_img">
                <img src="imagens/frasco.png" alt="">
            </div>
            <div class="card_title">
                <h3> Online pharmacy </h3>
            </div>
            <div class="card_text">
                <p> 
                    <a href="">Buy your medicines with our mobile application with a simple
                        delivery ...
                    </a>
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card_img">
                <img src="imagens/consulta.png" alt="">
            </div>
            <div class="card_title">
                <h3>Consultation</h3>
            </div>
            <div class="card_text">
                <p> 
                    <a href="">Free consultation with our trusted doctors and get the best <br>
                        recomendations...
                    </a>
                </p>
            </div>
        </div>

    </div>
    <div class="service">
        <div class="card">
            <div class="card_img">
                <img src="imagens/ficha.png" alt="">
            </div>
            <div class="card_title">
                <h3>Details info</h3>
            </div>
            <div class="card_text">
                <p>
                    <a href="">
                        Free consultation with our trusted doctors and get the best <br>
                        recomendations...
                    </a>
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card_img">
                <img src="imagens/remedio.png" alt="">
            </div>
            <div class="card_title">
                <h3>Emergency care</h3>
            </div>
            <div class="card_text">
                <p>
                    <a href="">
                        You can get 24/7 urgent care for yourself ot your children
                        and your lovely family...
                    </a>
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card_img">
                <img src="imagens/documento.png" alt="">
            </div>
            <div class="card_title">
                <h3>
                    Tracking
                </h3>
            </div>
            <div class="card_text">
                <p>
                    <a href="">
                        Track and save your medical hostory and health data...
                    </a>
                </p>
            </div>
        </div>

    </div>
    <div class="container">
        
    </div>
    <div class="container2">
        
    </div>
    <button id="learn" type="submit">Learn more</button>
    <div class="agendamento">
        <h1> Agendar consulta</h1>
        <hr>
    </div > 
    
    <div class="form">
        <form class="formulario" action="page.php" method="POST">
            
            <div class="coluna">
                <label for="name">Nome</label><br>
                <input type="text" name="nome" id="nome" >
    
                <label for="cpf">E-mail</label><br>
                <input type="email" name="email" id="email" >
    
                <label for="email">Data</label><br>
                <input type="date" name="dat" id="dat" >
            </div>
            <div class="colun">
                <label for="phone">CPF</label><br>
                <input type="text" name="cpf" pattern="\d{11}" title="Digite um CPF no formato: 12345678901" required>

    
                <label for="date">Telefone</label><br>
                <input type="tel" name="telefone" pattern="\d{10,11}" title="Digite um telefone no formato: 11912345678" required>

    
                <label for="time">Horário</label><br>
                <input type="time" name="hora" id="hora" >
            </div>
            <button type="submit" name="submit" id="submit">Enviar</button>
        </form>
    </div>    
</div>
    
    <div class="container-p">
        <div class="illustration"></div>
        <img src="imagens/imagem2.png" alt="consulta">
        <div class="text">
          <h1>Leading healthcare <br> providers</h1>
          <hr>
          <p>Trafalgar providers progressive, and affordable <br>
             healthcare, acessible on mobile and online for <br>
             everyone. To us, it's not just work. We take pride <br>
             in the solutionns we deliver
          </p>
          
          <button class="read-more-button" onclick="toggleMoreText()">Learn more</button>
        </div>
      </div>
        
    </div>
    
    <div class="footer">
        <div class="logo-section">
          <img src="imagens/logo.png" alt="Logo Trafalgar" />
          <p>Trafalgar fornece saúde progressiva e acessível, acessível no celular e online para todos</p>
          <p>©Trafalgar PTY LTD 2020. Todos os direitos reservados</p>
        </div>
        <div class="links-section">
          <div class="column">
            <h4>Empresa</h4>
            <ul>
              <li>Sobre</li>
              <li>Depoimentos</li>
              <li>Encontre um médico</li>
              <li>Aplicativos</li>
            </ul>
          </div>
          <div class="column">
            <h4>Região</h4>
            <ul>
              <li>Indonésia</li>
              <li>Cingapura</li>
              <li>Hong Kong</li>
              <li>Canadá</li>
            </ul>
          </div>
          <div class="column">
            <h4>Ajuda</h4>
            <ul>
              <li>Centro de ajuda</li>
              <li>Contato</li>
              <li>FAQ</li>
              <li>Termos de serviço</li>
            </ul>
          </div>
        </div>
    </div>  
    

</body>

</html>
