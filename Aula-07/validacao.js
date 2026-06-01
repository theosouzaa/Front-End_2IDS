// console.log('Importou');

class Usuario{
    constructor(nome, email){
        this.nome = nome;
        this.email = email;
    }
}

let usuarios = [];

function validaFormulario(event){
    event.preventDefault();
    console.log('Entrou na função');

    let nome = document.getElementById('nome').value;
    let email = document.getElementById('email').value;

    if(!nome || !email){
        alert('Todos os campos são obrigatórios!');
        return;
    }

    let usuario = new Usuario(nome, email);

    usuarios.push(usuario);
    
    console.log(usuarios);

    let saida = "";

    usuarios.forEach(function (u){
        saida += `Nome: ${nome} | Email: ${email} \n`;
    });

    document.getElementById('saida').textContent = saida;

}