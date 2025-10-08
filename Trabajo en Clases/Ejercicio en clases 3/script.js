document.addEventListener('DOMContentLoaded', function() {
   
    const formulario = document.getElementById('ecuacionForm');
    
    
    formulario.addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        
        const a = parseFloat(document.getElementById('coeficienteA').value);
        const b = parseFloat(document.getElementById('coeficienteB').value);
        const c = parseFloat(document.getElementById('coeficienteC').value);
        
        
        if (a === 0) {
            alert('Error: El coeficiente "a" no puede ser cero en una ecuación cuadrática.');
            return;
        }
        
        
        calcularRaices(a, b, c);
    });
});


function calcularRaices(a, b, c) {
   
    mostrarEcuacion(a, b, c);
    
    
    const discriminante = calcularDiscriminante(a, b, c);
    
    
    mostrarDiscriminante(discriminante);
    
    
    if (discriminante > 0) {
       
        const raiz1 = (-b + Math.sqrt(discriminante)) / (2 * a);
        const raiz2 = (-b - Math.sqrt(discriminante)) / (2 * a);
        mostrarRaicesReales(raiz1, raiz2);
    } else if (discriminante === 0) {
        
        const raiz = -b / (2 * a);
        mostrarRaizDoble(raiz);
    } else {
        
        const parteReal = -b / (2 * a);
        const parteImaginaria = Math.sqrt(-discriminante) / (2 * a);
        mostrarRaicesComplejas(parteReal, parteImaginaria);
    }
}


function calcularDiscriminante(a, b, c) {
    return b * b - 4 * a * c;
}


function mostrarEcuacion(a, b, c) {
    const ecuacionDisplay = document.getElementById('ecuacionMostrada');
    
    
    const strA = a === 1 ? '' : a === -1 ? '-' : a;
    const strB = b >= 0 ? `+ ${b}` : `- ${Math.abs(b)}`;
    const strC = c >= 0 ? `+ ${c}` : `- ${Math.abs(c)}`;
    
    ecuacionDisplay.textContent = `${strA}x² ${strB}x ${strC} = 0`;
    ecuacionDisplay.style.display = 'block';
}


function mostrarDiscriminante(discriminante) {
    const discriminanteInfo = document.getElementById('discriminanteInfo');
    
    let mensaje = `Discriminante (Δ) = ${discriminante.toFixed(2)} → `;
    
    if (discriminante > 0) {
        mensaje += 'Dos raíces reales y distintas';
    } else if (discriminante === 0) {
        mensaje += 'Una raíz real doble';
    } else {
        mensaje += 'Dos raíces complejas conjugadas';
    }
    
    discriminanteInfo.textContent = mensaje;
    discriminanteInfo.style.display = 'block';
}


function mostrarRaicesReales(raiz1, raiz2) {
    
    document.getElementById('raicesImaginarias').classList.remove('mostrar');
    
 
    const raicesContainer = document.querySelector('.raices-container');
    raicesContainer.style.display = 'grid';
    
    
    document.querySelector('#raiz1 .valor-raiz').textContent = raiz1.toFixed(4);
    document.querySelector('#raiz2 .valor-raiz').textContent = raiz2.toFixed(4);
    
   
    document.getElementById('raiz1').className = 'raiz real';
    document.getElementById('raiz2').className = 'raiz real';
}


function mostrarRaizDoble(raiz) {
    
    document.getElementById('raicesImaginarias').classList.remove('mostrar');
    
   
    const raicesContainer = document.querySelector('.raices-container');
    raicesContainer.style.display = 'grid';
    
    
    document.querySelector('#raiz1 .valor-raiz').textContent = raiz.toFixed(4);
    document.querySelector('#raiz2 .valor-raiz').textContent = raiz.toFixed(4);
    
    
    document.getElementById('raiz1').className = 'raiz real';
    document.getElementById('raiz2').className = 'raiz real';
}


function mostrarRaicesComplejas(parteReal, parteImaginaria) {
    
    document.querySelector('.raices-container').style.display = 'none';
    
    
    const raicesImaginarias = document.getElementById('raicesImaginarias');
    raicesImaginarias.classList.add('mostrar');
    
    
    const raiz1 = `${parteReal.toFixed(4)} + ${parteImaginaria.toFixed(4)}i`;
    const raiz2 = `${parteReal.toFixed(4)} - ${parteImaginaria.toFixed(4)}i`;
    
    
    const raicesComplejas = raicesImaginarias.querySelectorAll('.valor-raiz');
    raicesComplejas[0].textContent = raiz1;
    raicesComplejas[1].textContent = raiz2;
    
    
    raicesImaginarias.style.display = 'block';
}


function limpiarCampos() {
    // Limpiar inputs
    document.getElementById('coeficienteA').value = '';
    document.getElementById('coeficienteB').value = '';
    document.getElementById('coeficienteC').value = '';
    
    
    document.getElementById('ecuacionMostrada').textContent = '';
    document.getElementById('discriminanteInfo').textContent = '';
    
   
    document.querySelectorAll('.valor-raiz').forEach(span => {
        span.textContent = '-';
    });
    

    document.querySelector('.raices-container').style.display = 'grid';
    document.getElementById('raicesImaginarias').classList.remove('mostrar');
    
  
    document.getElementById('raiz1').className = 'raiz real';
    document.getElementById('raiz2').className = 'raiz real';
}


function cargarEjemplo(a, b, c) {
    document.getElementById('coeficienteA').value = a;
    document.getElementById('coeficienteB').value = b;
    document.getElementById('coeficienteC').value = c;
    calcularRaices(a, b, c);
}