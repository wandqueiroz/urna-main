function funcao_pdf(){
    var pega_dados = document.getElementById('table-pdf').innerHTML;

// Obtém a data/hora atual
var data = new Date();
// Guarda cada pedaço em uma variável

var dia     = data.getDate();           // 1-31
var mes     = data.getMonth();          // 0-11 (zero=janeiro)
var ano4    = data.getFullYear();       // 4 dígitos
var hora = data.getHours();          // 0-23
var min  = data.getMinutes();        // 0-59
var seg  = data.getSeconds();        // 0-59


// Formata a data e a hora (note o mês + 1)
var str_data = dia + '/' + (mes+1) + '/' + ano4;
var str_hora = hora + ':' + min + ':' + seg; 

// Mostra o resultado
//alert('Hoje é ' + str_data + ' às ' + str_hora);
    var janela = window.open('','','width=800, heigth=600');
    janela.document.write('<html><head> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> ');
    janela.document.write('<title> APURAÇÃO DOS VOTOS SERVIDOR DESTAQUE SDHDS 2021 </title></head>');
    janela.document.write('<body style="text-align: center;">');
    janela.document.write('<div class="header" style="background-color: #ffcd02; width: 100%; height: 10rem;"><img style="width: 5rem; padding-top: 1rem;" src="./Images/sd2.svg"></div><br><br>');
    janela.document.write(pega_dados);
    janela.document.write('<footer>Documento gerado em ' + str_data + ' às ' + str_hora +'</footer>');
    janela.document.write('</body></html>');
    janela.document.close();
    janela.print(); 
   /*  janela.document.write('<html><head>');
    janela.document.write('<title> APURAÇÃO DOS VOTOS SERVIDOR DESTAQUE SDHDS 2021 </title></head>')
    janela.document.write('<body style="text-align: center;">');
    janela.document.write('<div class="header"><img src="./Images/sd2.svg"></div><br><br>');
    janela.document.write(pega_dados);
    janela.document.write('<footer>Documento gerado em ' + str_data + ' às ' + str_hora +'</footer>');
    janela.document.write('</body></html>');
    janela.document.close();
    janela.print(); */
   

    
    
}
