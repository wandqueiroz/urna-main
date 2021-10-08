<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web Urna Eletrônica</title>
    </head>
    <body>
        <div class="titulo"><h1>Web Urna Eletrônica</h1></div>
        <div class="urna">
            <div class="tela">
                <div class="d-1">
                    <div class="d-1-left">
                        <div class="d-1-1">
                            <span>SEU VOTO PARA</span>
                        </div>
                        <div class="d-1-2">
                            <span>SERVIDOR</span>
                        </div>
                        <div class="d-1-3">
                            <div class="numero pisca"></div>
                            <div class="numero"></div>
                        </div>
                        <div class="d-1-4">
                           
                        </div>
                    </div>
                    <div class="d-1-right">
                        <div class="d-1-image">
                            
                        </div>
                        
                    </div>
                </div>
                <div class="d-2">
                    Aperte a tela: <br/>
                    CONFIRMA para CONFIRMAR este voto<br/>
                    CORRIGE para CORRIGIR este voto
                </div>
            </div>
            <div class="esquerda">
                <div class="topo-esquerda"> 
                    <div class="logo"> <img src="Images/brasao.png" alt="" /> </div>
                    <div class="Justica-eleitoral">COTIC<br/>SDHDS</div>
                </div>
                <div class="teclado">
                    <div class="teclado--linha">
                        <div class="teclado--botao" onclick="clicou('1')">1</div>
                        <div class="teclado--botao" onclick="clicou('2')">2</div>
                        <div class="teclado--botao" onclick="clicou('3')">3</div>
                    </div>
                    <div class="teclado--linha">
                        <div class="teclado--botao" onclick="clicou('4')">4</div>
                        <div class="teclado--botao" onclick="clicou('5')">5</div>
                        <div class="teclado--botao" onclick="clicou('6')">6</div>
                    </div>
                    <div class="teclado--linha">
                        <div class="teclado--botao" onclick="clicou('7')">7</div>
                        <div class="teclado--botao" onclick="clicou('8')">8</div>
                        <div class="teclado--botao" onclick="clicou('9')">9</div>
                    </div>
                    <div class="teclado--linha">
                        <div class="teclado--botao" onclick="clicou('0')">0</div>
                    </div>
                    <div class="teclado--linha">
                        <div class="teclado--botao botao--branco" onclick="branco()">BRANCO</div>
                        <div class="teclado--botao botao--corrige" onclick="corrige()">CORRIGE</div>
                        <div class="teclado--botao botao--confirma" onclick="confirma()">CONFIRMA</div>
                    </div>
                </div>
            </div>
            
        </div>

        <h2><a href="index.php" target="_self"><strong>Recarregar</strong></a></h2>
        
        <link rel="stylesheet" href="css/style.css" />
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/etapas.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>
