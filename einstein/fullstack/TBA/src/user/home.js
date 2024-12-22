document.addEventListener('DOMContentLoaded', function() {
    var stream = document.querySelector('.image-container'); // Seletor da área das imagens
    var items = document.querySelectorAll('.image-container img'); // Seleciona as imagens
    
    var prev = document.querySelector('.left-arrow'); 
    var next = document.querySelector('.right-arrow'); 
  
    // Função para mover para a próxima imagem
    function moveToNext() {
      stream.appendChild(items[0]); // Move a primeira imagem para o final
      items = document.querySelectorAll('.image-container img'); // Atualiza o NodeList de imagens
    }
  
    // Função para mover para a imagem anterior
    function moveToPrev() {
      stream.insertBefore(items[items.length - 1], items[0]); // Move a última imagem para o início
      items = document.querySelectorAll('.image-container img'); // Atualiza o NodeList de imagens
    }
  
    // Evento de clique para o botão "Prev"
    prev.addEventListener('click', function() {
      moveToPrev();
    });
  
    // Evento de clique para o botão "Next"
    next.addEventListener('click', function() {
      moveToNext();
    });
  
    // Rotação automática do carrossel a cada 3 segundos
    setInterval(function() {
      moveToNext(); // Mover para a próxima imagem a cada 3 segundos
    }, 1000); // 3000 milissegundos = 3 segundos
  });
  