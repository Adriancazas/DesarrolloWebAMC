document.addEventListener('DOMContentLoaded', function() {

    const imagen = document.getElementById('imagen');
    const inputCantidad = document.getElementById('cantidad');
    const btnAgrandar = document.getElementById('agrandar');
    const btnReducir = document.getElementById('reducir');
    const anchoActual = document.getElementById('ancho-actual');
    const altoActual = document.getElementById('alto-actual');
    
   
    const anchoInicial = 400;
    const altoInicial = 300;
    
    
    imagen.width = anchoInicial;
    imagen.height = altoInicial;
    actualizarInfo();
    
    
    function actualizarInfo() {
        anchoActual.textContent = imagen.width;
        altoActual.textContent = imagen.height;
    }

    function validarCantidad() {
        const cantidad = parseInt(inputCantidad.value);
        if (isNaN(cantidad) || cantidad <= 0) {
            alert('Por favor ingrese una cantidad válida (número mayor a 0)');
            inputCantidad.value = 50;
            return false;
        }
        return true;
    }
    

    function agrandarImagen() {
        if (!validarCantidad()) return;
        
        const cantidad = parseInt(inputCantidad.value);
        const nuevoAncho = imagen.width + cantidad;
        const nuevoAlto = imagen.height + (cantidad * (altoInicial / anchoInicial));
        
       
        imagen.style.transition = 'all 0.5s ease';
        imagen.width = nuevoAncho;
        imagen.height = nuevoAlto;
        
       
        setTimeout(actualizarInfo, 500);
       
        imagen.style.boxShadow = '0 8px 25px rgba(76, 175, 80, 0.4)';
        setTimeout(() => {
            imagen.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
        }, 500);
    }
    
    
    function reducirImagen() {
        if (!validarCantidad()) return;
        
        const cantidad = parseInt(inputCantidad.value);
        const nuevoAncho = Math.max(50, imagen.width - cantidad); // Mínimo 50px
        const nuevoAlto = Math.max(50, imagen.height - (cantidad * (altoInicial / anchoInicial)));
        
      
        imagen.style.transition = 'all 0.5s ease';
        imagen.width = nuevoAncho;
        imagen.height = nuevoAlto;
        
   
        setTimeout(actualizarInfo, 500);
        
      
        imagen.style.boxShadow = '0 8px 25px rgba(244, 67, 54, 0.4)';
        setTimeout(() => {
            imagen.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
        }, 500);
    }
    
    
    function resetearImagen() {
        imagen.style.transition = 'all 0.5s ease';
        imagen.width = anchoInicial;
        imagen.height = altoInicial;
        setTimeout(actualizarInfo, 500);
    }
    
  
    btnAgrandar.addEventListener('click', agrandarImagen);
    btnReducir.addEventListener('click', reducirImagen);
    
    
    imagen.addEventListener('dblclick', resetearImagen);

    inputCantidad.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            agrandarImagen();
        }
    });
    

    inputCantidad.addEventListener('input', function() {
        const valor = parseInt(this.value);
        if (valor > 500) {
            this.value = 500;
        } else if (valor < 1) {
            this.value = 1;
        }
    });
    

    console.log('Sistema de control de imagen cargado correctamente');
    console.log('Funciones disponibles:');
    console.log('- Clic en "Agrandar" para aumentar el tamaño');
    console.log('- Clic en "Reducir" para disminuir el tamaño');
    console.log('- Doble clic en la imagen para resetear al tamaño original');
});