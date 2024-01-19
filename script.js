// Crie um objeto que mapeia marcas aos modelos de carros
const modelosPorMarca = {
    marca1: ["Corolla", "Camry", "RAV4"],
    marca2: ["Focus", "Fusion", "Escape"],
    marca3: ["Civic", "Accord", "CR-V"],
    marca4: ["Malibu", "Equinox", "Traverse"],
    marca5: ["Golf", "Passat", "Tiguan"],
    marca6: ["Altima", "Rogue", "Murano"]
};

// Função para preencher o menu suspenso de modelos com base na marca selecionada
document.addEventListener("DOMContentLoaded", function() {
    const selectMarca = document.getElementById('marca');
    const selectCarro = document.getElementById('carro');
    
    // Defina o valor selecionado para "marca2" (Ford) quando a página é carregada
    selectMarca.value = "marca2";
    
    // Chame a função para preencher as opções do carro com base na marca selecionada
    fillCarroOptions();

    selectMarca.addEventListener('change', fillCarroOptions);
    
    function fillCarroOptions() {
        const marcaSelecionada = selectMarca.value;
        selectCarro.innerHTML = ''; // Limpa as opções atuais
    
        if (modelosPorMarca[marcaSelecionada]) {
            modelosPorMarca[marcaSelecionada].forEach(function(modelo) {
                const option = document.createElement('option');
                option.value = modelo;
                option.textContent = modelo;
                selectCarro.appendChild(option);
            });
        }
    }
});


function calcularPreco() {
    const marcaSelecionada = document.getElementById('marca').value;
    const carroSelecionado = document.getElementById('carro').value;
    const valorModelo = parseFloat(document.getElementById('marca').options[document.getElementById('marca').selectedIndex].getAttribute('data-valor'));
    const diasSelecionados = parseInt(document.getElementById('dias').value);
    const divResultadoPreco = document.getElementById('resultado-preco');
    const valorTotal = valorModelo * diasSelecionados;

    if (!isNaN(valorModelo) && !isNaN(diasSelecionados)) {
        divResultadoPreco.textContent = 'Preço Total: R$ ' + valorTotal.toFixed(2);
        document.getElementById('valorTotal').value = valorTotal.toFixed(2);
    } else {
        divResultadoPreco.textContent = ''; // Limpa o resultado se os valores não forem numéricos
    }
}

function enviarFormulario() {
    calcularPreco(); // Chama a função para calcular o preço antes de enviar

    // Adicione aqui o código para enviar o formulário
    document.getElementById('formAluguel').submit(); // Isso irá enviar o formulário
}

function setaMarcaModelo() {
    {/* Obtenha referências para os elementos select */}
    var marcaSelect = document.getElementById('marca');
    var modeloSelect = document.getElementById('carro');

    {/* // Inicialize as variáveis com os valores selecionados */}
    var marca = marcaSelect.value;
    var modelo = modeloSelect.value;

    {/* // Adicione um ouvinte de evento 'change' para cada select */}
    marcaSelect.addEventListener('change', function() {
        marca = this.value; // Atualiza a variável marca quando a marca é alterada
    });

    modeloSelect.addEventListener('change', function() {
        modelo = this.value; // Atualiza a variável modelo quando o modelo é alterado
    });
}
