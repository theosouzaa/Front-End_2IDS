// console.log('tudo certo')

class Cadastro{
    constructor(nome, defensivo, data, talhao, quantidade, calculo){
        this.nome = nome;
        this.produto = defensivo;
        this.data = data;
        this.talhao = talhao;
        this.quantidade = quantidade;
        this.calculo = calculo;
    }
}

let dados = [];

function validarFormulario(event){
    event.preventDefault();
    console.log('Entrou na função');
    
    let nome = document.getElementById('nome').value;
    let produto = document.getElementById('produto').value;
    let data = document.getElementById('data').value;
    let talhao = document.getElementById('talhao').value;
    let quantidade = document.getElementById('quantidade').value;
    
    if (!nome || !produto || !data || !talhao || !quantidade){
        alert('Todos os campos são OBRIGÁTORIOS!');
        return;
    }

    if(quantidade <=0){
        alert('Quantidade inválida!');
        return;
    }

    let calculo = (5 * quantidade);

    let cadastro = new Cadastro(nome, produto, data, talhao, quantidade, calculo);

    dados.push(cadastro);

    let saida = "";

    dados.forEach(function(c){
        saida += `Defensivo: ${c.produto}, Data: ${c.data}, Talhão: ${c.talhao}, Quantidade: ${c.quantidade}, Valor total: ${c.calculo} \n`;
    });

    document.getElementById('saida').textContent = saida;
}