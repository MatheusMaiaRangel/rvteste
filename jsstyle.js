function generateQRCode(data) {
    const qrContainer = document.getElementById("qrcode");
    
    // Limpa qualquer QR Code gerado anteriormente
    qrContainer.innerHTML = "";

    // Gera o QR Code com os dados passados
    new QRCode(qrContainer, {
        text: data,        // Dados do QR Code (pode ser URL, texto, etc)
        width: 200,        // Largura do QR Code
        height: 200,       // Altura do QR Code
        colorDark: "#000", // Cor dos quadrados do QR Code
        colorLight: "#fff" // Cor do fundo do QR Code
    });
};

// Função para abrir o modal com o QR Code
function openModal() {
    const modal = document.getElementById("qrModal");
    const data = "https://www.instagram.com/mmr.maia"; // URL ou conteúdo para gerar o QR Code
    
    // Gerar o QR Code
    generateQRCode(data);

    // Mostrar o modal
    modal.style.display = "block";
};

// Função para fechar o modal
function closeModal() {
    const modal = document.getElementById("qrModal");
    modal.style.display = "none"; // Esconde o modal
};

// Ao clicar no botão, abre o modal
document.querySelector(".buttonqrcode").addEventListener("click", openModal);

// Ao clicar no "x" para fechar o modal
document.getElementsByClassName("close")[0].addEventListener("click", closeModal);

// Fechar o modal se clicar fora do conteúdo do modal
window.onclick = function(event) {
    const modal = document.getElementById("qrModal");
    if (event.target == modal) {
        closeModal();
    }
};
document.getElementById('cpf').addEventListener('input', function() {
    this.value = formatCPF(this.value);
});

function formatCPF(value) {
    value = value.replace(/\D/g, '');
    
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    
    return value;
};
function verificarSenha() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmar-senha").value;
    var mensagem = document.getElementById("mensagem");
    var button = document.querySelector("button");

    if (senha !== confirmarSenha) {
        mensagem.classList.add("error");
        mensagem.classList.remove("success");
        mensagem.style.color='red';
        mensagem.innerHTML = "Senhas incorretas!";
        button.disabled = true;
    } else {
        mensagem.classList.add("success");
        mensagem.style.color = "green";
        mensagem.classList.remove("error");
        mensagem.innerHTML = "Senhas corretas.";
        button.disabled = false;
    }
};

function togglePasswordVisibility(id) {
    var input = document.getElementById(id);
    var eyeIcon = document.getElementById('eye-icon-' + id);

    if (input.type === "password") {
        input.type = "text";
        eyeIcon.innerHTML = '<i class="bi bi-eye-slash"></i>';
    } else {
        input.type = "password";
        eyeIcon.innerHTML = '<i class="bi bi-eye"></i>';
    }
};
// Carregar os dados assim que a página for carregada
window.onload = carregarDados;