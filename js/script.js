let seuVotoPara = document.querySelector('.d-1-1 span')
let cargo = document.querySelector('.d-1-2 span')
let descricao = document.querySelector('.d-1-4')
let aviso = document.querySelector('.d-2')
let lateral = document.querySelector('.d-1-right')
let numeros = document.querySelector('.d-1-3')

let etapaAtual = 0
let numero = ''
let votoBranco = false
let votos = []

document.body.addEventListener('keydown', function (event) {
  const key = event.key;
 
  //alert(`Key: ${key}`);
  
  if((apenasNum(key) || key == 0) && key != ' '){
    //alert('deu');
    clicou(key);
  }else if(key == 'Enter'){
    confirma();
  }else if(key == 'Backspace'){
    corrige();
  }
  
});

function apenasNum(string){
  var numStr = string.replace(/[^0-9]/g,'');
  return parseInt(numStr);
}

function comecarEtapa() {
  let etapa = etapas[etapaAtual]

  let numeroHTML = ''
  numero = ''
  votoBranco = false

  for (let i = 0; i < etapa.numeros; i++) {
    if (i === 0) {
      numeroHTML += '<div class="numero pisca"></div>'
    } else {
      numeroHTML += '<div class="numero"></div>'
    }
  }

  seuVotoPara.style.display = 'none'
  cargo.innerHTML = etapa.titulo
  descricao.innerHTML = ''
  aviso.style.display = 'none'
  lateral.innerHTML = ''
  numeros.innerHTML = numeroHTML
}
function atualizaInterface() {
  let etapa = etapas[etapaAtual]
  let candidato = etapa.candidatos.filter(item => {
    if (item.numero === numero) {
      return true
    } else {
      return false
    }
  })
  if (candidato.length > 0) {
    candidato = candidato[0]
    seuVotoPara.style.display = 'block'
    aviso.style.display = 'block'
    //descricao.innerHTML = 'Nome: ${candidato.nome}<br/>Partido: ${candidato.setor}';
    descricao.innerHTML =
      'Nome: ' + candidato.nome + '<br/>' + 'Setor: ' + candidato.setor

    let fotosHTML = ''
    for (let i in candidato.fotos) {
      if (candidato.fotos[i].small) {
        fotosHTML +=
          '<div class="d-1-image small"> <img src="Images/' +
          candidato.fotos[i].url +
          '" alt="" />' +
          candidato.fotos[i].legenda +
          '</div>'
      } else {
        //fotosHTML += '<div class="d-1-image"> <img src="Images/${candidato.fotos[i].url}" alt="" />${candidato.fotos[i].legenda}</div>';
        fotosHTML +=
          '<div class="d-1-image"> <img src="Images/' +
          candidato.fotos[i].url +
          '" alt="" />' +
          candidato.fotos[i].legenda +
          '</div>'
      }
    }

    lateral.innerHTML = fotosHTML
  } else {
    seuVotoPara.style.display = 'block'
    aviso.style.display = 'block'
    descricao.innerHTML = '<div class="aviso--grande pisca">VOTO NULO</div>'
  }
}

function clicou(n) {
  let somNumeros = new Audio()
  somNumeros.src = 'audios/numeros.mp3'
  somNumeros.play()

  let elNumero = document.querySelector('.numero.pisca')
  if (elNumero !== null) {
    elNumero.innerHTML = n
    //numero = '${numero}${n}';
    numero = numero + n

    //fazer com que o campo de número pisque e após preenchido passe para o proximo campo
    elNumero.classList.remove('pisca')
    if (elNumero.nextElementSibling !== null) {
      elNumero.nextElementSibling.classList.add('pisca')
    } else {
      atualizaInterface()
    }
  }
}

function branco() {
  numero === ''
  votoBranco = true

  seuVotoPara.style.display = 'block'
  aviso.style.display = 'block'
  numeros.innerHTML = ''
  descricao.innerHTML = '<div class="aviso--grande pisca">VOTO EM BRANCO</div>'
  lateral.innerHTML = ''
}
function corrige() {
  let somCorrige = new Audio()
  somCorrige.src = 'audios/corrige.mp3'
  somCorrige.play()
 
  comecarEtapa()
}
function confirma() {
  let etapa = etapas[etapaAtual]

  let candidato = etapa.candidatos.filter(item => {
    if (item.numero === numero) {
      return true
    } else {
      return false
    }
  })

  let nomeObj = candidato[0]['nome']
  let setorObj = candidato[0]['setor']
  
  let votoConfirmado = false
  let somConfirma = new Audio('audios/confirma.mp3')

  if (votoBranco === true) {
    votoConfirmado = true
    somConfirma.play()
   
    votos.push({
      etapa: etapas[etapaAtual].titulo,
      voto: 'branco'
    })
  } else if (numero.length === etapa.numeros) {
    votoConfirmado = true
    somConfirma.play()

    votos.push({
      etapa: etapas[etapaAtual].titulo,
      voto: numero
    })
  }

  if (votoConfirmado) {
    console.log(candidato[0]['nome'])
    etapaAtual++
    
    registraVoto(nomeObj, setorObj);
    if (etapas[etapaAtual] !== undefined) {
      comecarEtapa()
    } else {
      document.querySelector('.tela').innerHTML =
        '<div class="aviso--gigante pisca">FIM</div>'
      console.log(votos)
    }
  }
}

function registraVoto(nomeObj,setorObj){

  let nome = nomeObj
  let setor = setorObj
  
  $.ajax({
    method: 'POST',
    url: "/urna-main/database/gravar.php",
    data: {numero: numero,
          nome: nome,
        setor: setor},
}).done(function(result){
  console.log(result);
});

}
comecarEtapa()
