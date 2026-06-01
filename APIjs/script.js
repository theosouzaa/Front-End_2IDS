// capturar tags html
let video = document.getElementById('video');
let canva = document.getElementById('canvas');
let foto = document.getElementById('foto');
let botaoCaptura = document.getElementById('capture')

// acesso a camera
navigator.mediaDevices.getUserMedia({video:true})
    .then(stream => {
        // coloca img da webCam na tag video
        video.srcObject = stream;
    }).catch(error => {
        // exibimos um erro para o usuario
        alert(`Erro ao acessar a câmera: ${error}`)
    });

// Capturar a imagem ao clicar no botão
botaoCaptura.addEventListener('click', () => {
    let desenhoIMG = canvas.getContext('2d');
    canvas.width = video.videowidth;
    canvas.height = video.height;
    // Desenhar a imagem
    desenhoIMG.drawImage(video, 0, 0, canvas.width, canvas.height);
    fot.src = canvas.toDataURL('image/png');
});