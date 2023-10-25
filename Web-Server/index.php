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
          <div class="infos">
            <h1><b>Data: <span id="data-hora"></span></b></h1>
            <p> Contagem de Visitantes: </p>
            <a><?php include 'contagem_visitas.php'; ?></a>
			<p> Local: </p>
			<a><span id="localizacao"></a>
			<p>Ip do cliente:</p>
			<a><span id="client-ip"></a>
			<p>Ip do servidor:</p>
			<a><span id="server-ip"></a>
          </div>
        </div>
      </div>
	  <div class="color-content">
        <div class="container">
          <div class="main-content">
            <div class="w-30 spes">
              <div class="third-color"><h6>FUSO HORÁRIO</h6></div>
              <div class="color-title">
                <p><span id="fuso-horario"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-area">
      <div class="container">
        <div class="text-content">
          <div class="w-80">
            <div class="footer-content">
              <div class="w-60">
                <p class="first-p">
                  Página com o código localizado atraves do seguinte <a href="https://github.com/JonatasCarrocine/Redes_de_Computadores/tree/main/Web-Server"> repositório </a>
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
		function updateInformation() {
            var dateTimeLocation = new Date();
            var currentDate = dateTimeLocation.toLocaleDateString();
            var currentTime = dateTimeLocation.toLocaleTimeString();
            var timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

            document.getElementById("fuso-horario").innerHTML = timeZone;
        }
	
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
		
		function getServerIP() {
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'get_server_ip.php', true);
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var data = JSON.parse(xhr.responseText);
					document.getElementById('server-ip').textContent = data.ip;
				}
			};
			xhr.send();
		}
		
		function updateClientInformation() {
			const { city, region, country } = data;
                    const clientInfo = "<strong>IP do Cliente:</strong> ${data.ip}<br><strong>Localização: </strong>${city}, ${region}, ${country}";
                    document.getElementById("client-info").innerHTML = clientInfo;
		}

        // Chamar a função para obter o IP
        getIP();
		getServerIP();

        // Chamar as funções para mostrar a data e hora e obter a localização
        mostrarDataHora();
        obterLocalizacao();
		updateInformation();
    </script>
  </body>
</html>
