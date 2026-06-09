function loginGoogle(resposta){
    const token = resposta.credential;

    const dadosUsuario = decodeJwt(token);

}

// Função para desembaralhar os dados
function decodeJwt(jwt){
    const base64Url = token.split('.')[1];
    const base64 = base64Url.replace(/-/g, '+').replace(/_/g, "/");

    const jsonPayload = decodeURIComponent(
        atob(base64).split("").map(function (c){
            return "%" + ("00" + c.charAt(0).toString(16))
            .slice(-2);
        }).join("")
    );

    return JSON.parse(jsonPayload);
}