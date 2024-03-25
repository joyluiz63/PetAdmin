// Teste para verificar se o arquivo foi incluido no projeto
//alert ("Incluiu arquivo de funções JS");

// Permitir retorno no navegador no formulario apos o erro
if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}

// SOMENTE EXEMPLO, NÃO ESTA SENDO USADA
// Receber o formulario login
const formLogin = document.getElementById("form-login");

// Verificar se existe o formulario login
if(formLogin){
    // Aguardar o evento submit, aguardar o usuario clicar no botao acessar do formulario de login
    formLogin.addEventListener("submit", async(e) => {
        // Receber o valor do campo
        var username = document.querySelector("#username").value;

        // Verificar se o campo esta vazio
        if(username === ""){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo usuário!</p>";
            return;
        }

        // Receber o valor do campo
        var password = document.querySelector("#password").value;

        // Verificar se o campo esta vazio
        if(password === ""){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo senha!</p>";
            return;
        }
    });
}
// FIM EXEMPLO

// Calcular a força da senha
function passwordStrength(){
    // Cria a variavel para receber a força da senha
    var strength = 0;

    // Recebe o valor do form-campo senha (password)
    var password = document.getElementById("password").value;
    console.log("Senha: " + password);

    // Atribuir a força da senha conforme quantidade de caracteres que o usuário digitar
    if((password.length >= 6) && (password.length <= 7)){
        strength += 10;
    } else if(password.length > 7){
        strength += 25;
    }

    // Verificar se o usuário digitou letra minuscula
    if((password.length >=6) && (password.match(/[a-z]+/))){
        strength += 10;
    }

    // Verificar se o usuário digitou letra minuscula
    if((password.length >=6) && (password.match(/[A-Z]+/))){
        strength += 20;
    }

    // Verificar se o usuário digitou caracter especial
    if((password.length >=6) && (password.match(/[@#$%;*]+/))){
        strength += 20;
    }

    // Verificar se o usuário digitou número repetidos juntos, reduzir a força da senha
    if(password.match(/([1-9]+)\1{1,}/)){
        strength -= 25;
    }

    // Chamar a função para apresentar a força da senha (função descrita abaixo)
    viewStrength(strength);
}

// Função para apresentar a força da senha
function viewStrength(strength){
    if(strength < 30){
        document.getElementById("msgViewStrngth").innerHTML = "<p style='color: #d2322d;'>Senha Fraca</p> ";
    } else if((strength >= 30) && (strength < 50)){
        document.getElementById("msgViewStrngth").innerHTML = "<p style='color: #ed9c28;'>Senha Média</p> ";
    } else if((strength >= 50) && (strength < 70)){
        document.getElementById("msgViewStrngth").innerHTML = "<p style='color: #0088cc;'>Senha Boa</p> ";
    } else if(strength >= 70){
        document.getElementById("msgViewStrngth").innerHTML = "<p style='color: #47a447;'>Senha Forte</p> ";
    } else {
        document.getElementById("msgViewStrngth").innerHTML = "";
    }

    console.log("Força da senha: " + strength);
}

