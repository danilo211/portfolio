<?php
session_start();
include '../config/database.php';

$query = "SELECT * FROM tournaments";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
      integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./src/user/home.CSS">
</head>
<body>
<header>
        <h1>Torneio</h1>
    </header>
    
    <section class="torneio" id="torneioEinstein">
        <h2>Torneio Einstein 3</h2>
        <p>Participe do Torneio Einstein 3 e mostre seu talento! Para mais informações ou para se registrar, use os botões abaixo:</p>
        
        <div class="buttons">
            <a class="btn" href="https://wa.me/5519983358336" target="_blank" aria-label="Mais informações sobre o torneio">Mais informações</a>
            <a class="btn" href="./src/user/register.PHP" aria-label="Registrar-se no torneio">Registre-se</a>
        </div>
    </section>

    <div class="carousel">
        <div class="image-container" id="imgs">
            <img src="https://images.unsplash.com/photo-1599394022918-6c2776530abb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1458&q=80" alt="first-image" />
            <img src="https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="second-image" />
            <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="third-image" />
            <img src="https://images.unsplash.com/photo-1599561046251-bfb9465b4c44?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1492&q=80" alt="fourth-image" />
            <img src="https://images.unsplash.com/photo-1599394022918-6c2776530abb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1458&q=80" alt="first-image" />
            <img src="https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="second-image" />
            <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80" alt="third-image" />
            <img src="https://images.unsplash.com/photo-1599561046251-bfb9465b4c44?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1492&q=80" alt="fourth-image" />
          </div>

        <button class="arrow left-arrow" id="left">
            <i class="fas fa-arrow-left"></i>
        </button>

        <button class="arrow right-arrow" id="right">
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>
    <footer>
        <p>&copy; 2024 Torneios Einstein. Todos os direitos reservados pro professor Pedro.</p>
    </footer>
    <script src="./src/user/home.js"></script> 
</body>
</html>
