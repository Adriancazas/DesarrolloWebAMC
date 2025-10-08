function fechaLiteral(fechaStr) {
    const numeros = {
        '0': 'cero', '1': 'uno', '2': 'dos', '3': 'tres', '4': 'cuatro',
        '5': 'cinco', '6': 'seis', '7': 'siete', '8': 'ocho', '9': 'nueve',
        '10': 'diez', '11': 'once', '12': 'doce', '13': 'trece', '14': 'catorce',
        '15': 'quince', '16': 'dieciséis', '17': 'diecisiete', '18': 'dieciocho',
        '19': 'diecinueve', '20': 'veinte', '21': 'veintiuno', '22': 'veintidós',
        '23': 'veintitrés', '24': 'veinticuatro', '25': 'veinticinco',
        '26': 'veintiséis', '27': 'veintisiete', '28': 'veintiocho',
        '29': 'veintinueve', '30': 'treinta', '31': 'treinta y uno'
    };

    const meses = {
        '01': 'enero', '02': 'febrero', '03': 'marzo', '04': 'abril',
        '05': 'mayo', '06': 'junio', '07': 'julio', '08': 'agosto',
        '09': 'septiembre', '10': 'octubre', '11': 'noviembre', '12': 'diciembre'
    };

    function numeroALiteral(num) {
        if (num <= 31) return numeros[num];
        
        const unidades = ['', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
        const decenas = ['', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];
        const especiales = ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve'];
        
        if (num < 10) return unidades[num];
        if (num < 20) return especiales[num - 10];
        if (num < 30) return 'veinti' + unidades[num - 20];
        
        const decena = Math.floor(num / 10);
        const unidad = num % 10;
        
        if (unidad === 0) return decenas[decena];
        return decenas[decena] + ' y ' + unidades[unidad];
    }

    function añoALiteral(año) {
        const mil = Math.floor(año / 1000);
        const centena = Math.floor((año % 1000) / 100);
        const decena = año % 100;
        
        let resultado = '';
        
        if (mil > 0) {
            resultado += (mil === 1 ? 'mil' : numeroALiteral(mil) + ' mil');
        }
        
        if (centena > 0) {
            if (resultado) resultado += ' ';
            if (centena === 1) {
                resultado += decena === 0 ? 'cien' : 'ciento';
            } else if (centena === 5) {
                resultado += 'quinientos';
            } else if (centena === 7) {
                resultado += 'setecientos';
            } else if (centena === 9) {
                resultado += 'novecientos';
            } else {
                resultado += numeroALiteral(centena) + 'cientos';
            }
        }
        
        if (decena > 0) {
            if (resultado) resultado += ' ';
            resultado += numeroALiteral(decena);
        }
        
        return resultado;
    }

    const partes = fechaStr.split('/');
    if (partes.length !== 3) return 'Formato inválido';

    const dia = partes[0];
    const mes = partes[1];
    const año = partes[2];

    if (!numeros[dia] || !meses[mes]) return 'Fecha inválida';

    const diaLiteral = numeros[dia];
    const mesLiteral = meses[mes];
    const añoLiteral = añoALiteral(parseInt(año));

    return `${diaLiteral} de ${mesLiteral} de ${añoLiteral}`;
}

document.addEventListener('DOMContentLoaded', function() {
    const fechaInput = prompt('Ingrese una fecha en formato dd/mm/aaaa (ej: 08/10/2025):');
    
    if (fechaInput) {
        const resultado = fechaLiteral(fechaInput);
        document.getElementById('resultado').textContent = `Fecha en literal: ${resultado}`;
    } else {
        document.getElementById('resultado').textContent = 'No se ingresó ninguna fecha.';
    }
});