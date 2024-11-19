const numerosContainer = document.getElementById('numeros');
const pagamentoSection = document.getElementById('pagamento');
const numeroSelecionadoSpan = document.getElementById('numeroSelecionado');
const alerta = document.getElementById('alerta');
let numeroSelecionado = null;

// Gerar botões de números da rifa
for (let i = 1; i <= 100; i++) {
  const botao = document.createElement('button');
  botao.textContent = i;
  botao.addEventListener('click', () => selecionarNumero(i, botao));
  numerosContainer.appendChild(botao);
}

function selecionarNumero(numero, botao) {
  // Remover seleção anterior
  if (numeroSelecionado !== null) {
    const botaoAnterior = document.querySelector('.numeros button.selecionado');
    if (botaoAnterior) botaoAnterior.classList.remove('selecionado');
  }

  // Atualizar número selecionado
  numeroSelecionado = numero;
  botao.classList.add('selecionado');
  numeroSelecionadoSpan.textContent = numeroSelecionado;

  // Mostrar a seção de pagamento sem rolagem automática
  pagamentoSection.style.display = 'block';
}

// Confirmar pagamento
document.getElementById('confirmarPagamento').addEventListener('click', () => {
  if (numeroSelecionado) {
    alerta.textContent = `Pagamento do número ${numeroSelecionado} foi confirmado!`;
  } else {
    alerta.textContent = 'Por favor, selecione um número da rifa antes de confirmar o pagamento.';
  }
});
