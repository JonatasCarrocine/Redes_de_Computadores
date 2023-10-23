<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Página WEB no Servidor Apache</title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <header class="header-area">
      <div class="container">
        <div class="header-content">
          <h1><b>Atividade de Projeto WEB</b></h1>
        </div>
      </div>
    </header>
    <div class="contend-area">
      <div class="download-section">
        <div class="container">
          <div class="download-content-section">
            <h1><b>Data: <span id="data-hora"></span></b></h1>
            <p>
			  
			  Contagem de Visitantes:
            </p>
            <a><?php include 'contagem_visitas.php'; ?></a>
          </div>
        </div>
      </div>
      <div class="color-content">
        <div class="container">
          <div class="main-content">
            <div class="w-30 spes">
              <div class="first-color"></div>
              <div class="color-title">
                <h6>LOCAL</h6>
                <p><span id="localizacao"></span></p>
              </div>
            </div>
            <div class="w-30 spes">
              <div class="second-color"></div>
              <div class="color-title">
                <h6>IP DO CLIENTE</h6>
                <p><span id="client-ip"></span></p>
              </div>
            </div>
            <div class="w-30 spes">
              <div class="third-color"></div>
              <div class="color-title">
                <h6>SO THIRSTY</h6>
                <p>Extra nice UI comes with the app</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOTER AREA START -->
    <footer class="footer-area">
      <div class="container">
        <div class="text-content">
          <div class="w-80">
            <div class="footer-content">
              <div class="w-60">
                <p class="first-p">
                  Design inspirado pelo seguinte repositório <a href="https://github.com/masudranashawon/starnight-app/tree/main"
					target="_blank"> link </a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright">
          <p>
            2023 &dash; Jonatas Carrocine &dash; Atividade de Redes de Computadores
          </p>
        </div>
      </div>
    </footer>
	
	<script>
        // Função para exibir a data e hora atual
        function mostrarDataHora() {
            const dataHoraElement = document.getElementById("data-hora");

            function atualizarDataHora() {
                const dataHora = new Date();
                dataHoraElement.textContent = dataHora.toLocaleString();
            }

            // Chamar a função para atualizar a data e hora a cada segundo
            atualizarDataHora();
            setInterval(atualizarDataHora, 1000);
        }
        // Função para obter a localização do cliente
        function obterLocalizacao() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    document.getElementById("localizacao").textContent = `Latitude: ${latitude}, Longitude: ${longitude}`;
                });
            } else {
                document.getElementById("localizacao").textContent = "Localização não disponível";
            }
        }
		
		// Função para fazer uma solicitação AJAX para obter o IP
        function getIP() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_ip.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    document.getElementById('client-ip').textContent = data.ip;
                }
            };
            xhr.send();
        }
        // Chamar a função para obter o IP
        getIP();
        // Chamar as funções para mostrar a data e hora e obter a localização
        mostrarDataHora();
        obterLocalizacao();
    </script>
  </body>
</html>
