const form = document.getElementById('loginForm');
const errorAlert = document.getElementById('errorMessage');

form.addEventListener('submit', function (event) {
    event.preventDefault(); 
    errorAlert.classList.add('d-none'); 

    // Validação de campos vazios
    if (!form.checkValidity()) {
        event.stopPropagation();
        form.classList.add('was-validated');
        return;
    }

    // Leitura dos dados digitados
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const abaAtiva = document.querySelector('.nav-link.active').id;

    // Validação e Redirecionamento correto por perfil
    if (abaAtiva === 'candidato-tab' && email === 'candidato@teste.com' && password === '123456') {
        alert('Sucesso! Redirecionando para a Dashboard do Candidato...');
        window.location.href = 'https://google.com'; 
    } else if (abaAtiva === 'admin-tab' && email === 'admin@teste.com' && password === 'admin123') {
        alert('Sucesso! Redirecionando para o Painel Administrativo...');
        window.location.href = 'https://github.com'; 
    } else {
        // Mensagem de erro para credenciais inválidas
        errorAlert.classList.remove('d-none');
    }
});

// Evento do botão cadastrar
document.getElementById('btnCadastrar').addEventListener('click', () => {
    alert('Aqui você abriria a tela ou modal de cadastro!');
});