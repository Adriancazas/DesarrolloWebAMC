document.addEventListener('DOMContentLoaded', function() {
    
    const btn1 = document.getElementById('btn1');
    const btn2 = document.getElementById('btn2');
    const btn3 = document.getElementById('btn3');
    const btn4 = document.getElementById('btn4');
    const contenido = document.getElementById('contenido');
    const mensaje = document.getElementById('mensaje');
    const modalGaleria = document.getElementById('modalGaleria');
    const modalFormulario = document.getElementById('modalFormulario');


    btn1.addEventListener('click', cargarGaleria);
    btn2.addEventListener('click', cargarFormulario);
    btn3.addEventListener('click', cargarListado);
    btn4.addEventListener('click', cargarTemas);

  
    document.querySelectorAll('.cerrar').forEach(span => {
        span.addEventListener('click', function() {
            modalGaleria.style.display = 'none';
            modalFormulario.style.display = 'none';
        });
    });

    window.addEventListener('click', function(event) {
        if (event.target === modalGaleria) {
            modalGaleria.style.display = 'none';
        }
        if (event.target === modalFormulario) {
            modalFormulario.style.display = 'none';
        }
    });

    function cargarGaleria() {
        mensaje.textContent = 'Cargando galería...';
        
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                contenido.innerHTML = xhr.responseText;
                mensaje.textContent = 'Galería cargada correctamente';
                
                document.querySelectorAll('.miniatura').forEach(img => {
                    img.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        abrirModalReceta(id);
                    });
                });
            }
        };
        xhr.open('GET', 'galeria.php', true);
        xhr.send();
    }

    function abrirModalReceta(id) {
        const vista = document.getElementById('vista');
        vista.innerHTML = '<p>Cargando...</p>';
        
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                vista.innerHTML = xhr.responseText;
                modalGaleria.style.display = 'block';
            }
        };
        xhr.open('GET', `galeria.php?id=${id}`, true);
        xhr.send();
    }

  
    function cargarFormulario() {
        mensaje.textContent = 'Cargando formulario...';
        
        fetch('form_receta.html')
            .then(response => response.text())
            .then(html => {
                document.getElementById('contenidoFormulario').innerHTML = html;
                modalFormulario.style.display = 'block';
                mensaje.textContent = 'Formulario cargado';
                
                
                document.getElementById('formReceta').addEventListener('submit', guardarReceta);
            })
            .catch(error => {
                mensaje.textContent = 'Error al cargar formulario: ' + error;
            });
    }

    function guardarReceta(event) {
        event.preventDefault();
        
        const formData = new FormData(document.getElementById('formReceta'));
        
        fetch('guardar_receta.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mensaje.textContent = 'Receta guardada correctamente';
                modalFormulario.style.display = 'none';
                cargarGaleria(); // 
            } else {
                mensaje.textContent = 'Error: ' + data.message;
            }
        })
        .catch(error => {
            mensaje.textContent = 'Error al guardar: ' + error;
        });
    }

   
    function cargarListado() {
        mensaje.textContent = 'Cargando listado...';
        
        fetch('listar_recetas.php')
            .then(response => response.text())
            .then(html => {
                contenido.innerHTML = html;
                mensaje.textContent = 'Listado cargado';
                
              
                document.getElementById('filtroTipo').addEventListener('change', function() {
                    const tipo = this.value;
                    filtrarRecetas(tipo);
                });
            })
            .catch(error => {
                mensaje.textContent = 'Error al cargar listado: ' + error;
            });
    }

    function filtrarRecetas(tipo) {
        fetch(`listar_recetas.php?tipo=${tipo}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('tablaRecetas').innerHTML = html;
                mensaje.textContent = `Recetas filtradas: ${tipo}`;
            })
            .catch(error => {
                mensaje.textContent = 'Error al filtrar: ' + error;
            });
    }


    function cargarTemas() {
        mensaje.textContent = 'Cargando temas...';
        
        fetch('temas.html')
            .then(response => response.text())
            .then(html => {
                contenido.innerHTML = html;
                mensaje.textContent = 'Temas cargados';
                
       
                document.getElementById('btnAnadirColor').addEventListener('click', anadirColor);
                document.getElementById('selectTema').addEventListener('change', cambiarTema);
            })
            .catch(error => {
                mensaje.textContent = 'Error al cargar temas: ' + error;
            });
    }

    function anadirColor() {
        const color = document.getElementById('colorPicker').value;
        const grid = document.getElementById('gridColores');
        
        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta-color';
        tarjeta.style.backgroundColor = color;
        tarjeta.textContent = color;
        
        grid.appendChild(tarjeta);
    }

    function cambiarTema() {
        const tema = document.getElementById('selectTema').value;
        
        mensaje.textContent = `Tema cambiado a: ${tema}`;
    }
});