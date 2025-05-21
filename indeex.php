<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="shortcut icon" href="images/logosite.png.png" type="Images/x-icon">
    <title>Cerisabela - Software de Programação</title>
</head>

<body>
    <!-- nosso cabeçalho -->
    <header>
        <h1> CERISABELA </h1>
        <p>Especializada em Software de Programação.</p>
    </header>

    <!-- Menu de navegação -->
    <nav>
        <a href="#sobre">Sobre</a>
        <a href="#serviços">Atividades</a>
        <a href="#estrutura">Estrutura</a>
        <a href="#contato">Contato</a>
    </nav>

    <div>
        <main>
            <div class="dest">
                Quantidade e Sustentabilidade na Produção de Gado de Corte!
            </div>

            <section id="sobre">
                <h2>Sobre Nós</h2>
                <p>Somos uma fazenda referenciada na criação e recria de gado de corte, utilizando práticas sustentáveis
                    e manejo de alta qualidade.</p>
            </section>

            <section id="serviços">
                <h2>Atividades</h2>
                <ul>
                    <li>Seleção Genética e Melhoramento</li>
                    <li>Manejo Nutricional para Cria e Recria</li>
                    <li>Sanidade Animal e Bem-Estar</li>
                    <li>Integração Lavoura-Pecuária</li>
                </ul>
            </section>

            <selection id="estrutura">
                <h2>Nossa Estrutura</h2>
                <p>Contamos com pastagens de qualidade, curral moderno, áreas de confinamento e gestão eficiente do
                    rebanho.</p>
            </selection>

            <selection id="contato">
                <h2>Contato</h2>
                <p>Email: contato@fazendanome.com</p>
                <p>Telefone: (11) 1234-5678</p>
            </selection>
        </main>
        <!-- Finalizando o main -->

        <footer>
            <p>&copy; 2025 Fazenda Nome - Todos os direitos reservados.</p>
        </footer>
    </div>
    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function () {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function (msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        }
        else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

</html>