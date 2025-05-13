<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/layout.css">
    <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon"> <!-- Nao Sei se fica -->
    <title> titulo da empresa </title>
</head>

<body>

    <!-- Nosso cabeçalho  -->
    <header>
        <h1>titulo da empresa</h1>
        <p> frase explicativa e curta sobre a empresa</p>
    </header>

    <!-- menu de navegação -->
    <nav>
        <a href="#sobre">Sobre</a>
        <a href="#servicos">Atividades</a>
        <a href="#estrutura">Nossa Estrutura</a>
        <a href="#contato">Contato</a>
    </nav> <!-- Nao Sei pra que serve ja que eles nao sao variaveis --> 

    <main>
        <div class="dest">
            frase que ficara no centro e em cima.
        </div>

        <section id="sobre">
            <div class="container"> <!-- Tem que ligar -->
                <img src="images/gado2.png" alt="Sobre a propriedade"> <!-- Nao sei se fica -->
                <div class="texto">
                    <h2>Sobre Nós</h2>
                    <p>fale sobre a empresa: o que ela faz, como faz, sua historia...</p>
                </div>
            </div>
        </section>

        <section id="atividade">
            <div class="container"></div> <!-- Tem que ligar -->
                <img src="images/atividades3.png" alt="Atividades da fazenda"> <!-- Nao sei se fica -->
                <div class="texto"></div>
                    <h2>Atividades</h2>
                    <ul>
                        <li>Atividades</li>
                        <li>atividades</li>
                        <li>atividades</li>
                        <li>atividaes</li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="estrutura">
            <div class="container">
                <img src="images/imagem4.png" alt="Estrutura da fazenda ">
                <div class="texto">
                    <h2>Nossa estrutura</h2>
                    <p>Contamos com pastagens de qualidade, curral moderno, áreas de confinamento e gestão eficiente do
                        rebanho
                    </p>
                </div>
            </div>
        </section>
        <section id="contato">
            <div class="container">
                <div class="texto">
                    <h2>Contato</h2>
                    <p>Email: contato@empresa.com</p>
                    <p>Telefone: (99) 9999-9999</p>
                </div>
            </div>
        </section>

        <!-- Finalizamos o main -->

    </main>
    <footer>
        <p>&copy;rodape com data de publicaçao, e falando sobre os direitos</p>
    </footer>
</body>

</html>