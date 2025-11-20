function cargarGaleria() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'galeria.php', true);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('contenido').innerHTML = xhr.responseText;
            document.getElementById('mensaje').textContent = 'Galería de platillos ';
        }
    };
    
    xhr.send();
}

function abrirModal(receta) {
    const modalHTML = `
        <div id="modal" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); display:flex; justify-content:center; align-items:center; z-index:1000;">
            <div style="background:white; padding:20px; border-radius:10px; max-width:500px; text-align:center;">
                <img src="images/${receta.fotografia}" alt="${receta.titulo}" style="width:300px; height:300px; object-fit:cover; border-radius:5px;">
                <h3>${receta.titulo}</h3>
                <p><strong>Tipo:</strong> ${receta.tiporeceta}</p>
                <p><strong>Preparación:</strong> ${receta.preparacion}</p>
                <p><strong>Ingredientes:</strong></p>
                <ul style="text-align:left;">
                    ${receta.ingredientes.map(ing => `<li>${ing}</li>`).join('')}
                </ul>
                <button onclick="cerrarModal()" style="padding:10px 20px; background:#1a73e8; color:white; border:none; border-radius:5px; cursor:pointer; margin-top:10px;">
                    Cerrar
                </button>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
}

function cerrarModal() {
    const modal = document.getElementById('modal');
    if (modal) {
        modal.remove();
    }
}

function cargarFormulario() {
    fetch('form_receta.html')
        .then(response => response.text())
        .then(html => {
            const modalHTML = `
                <div id="modalForm" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); display:flex; justify-content:center; align-items:center; z-index:1000;">
                    <div style="background:white; padding:20px; border-radius:10px; max-width:500px; width:90%; max-height:90vh; overflow-y:auto;">
                        <button onclick="cerrarModalForm()" style="float:right; background:red; color:white; border:none; border-radius:50%; width:30px; height:30px; cursor:pointer;">X</button>
                        ${html}
                    </div>
                </div>
            `;
            
            document.body.insertAdjacentHTML('beforeend', modalHTML);
            document.getElementById('mensaje').textContent = 'Formulario del menu cargado correctamente';
        })
        .catch(error => {
            document.getElementById('mensaje').textContent = 'Error al cargar formulario';
            console.error('Error:', error);
        });
}

function cerrarModalForm() {
    const modal = document.getElementById('modalForm');
    if (modal) {
        modal.remove();
    }
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
            document.getElementById('mensaje').textContent = 'Receta guardada correctamente';
            cerrarModalForm();
            cargarGaleria(); 
        } else {
            document.getElementById('mensaje').textContent = 'Error al guardar: ' + data.message;
        }
    })
    .catch(error => {
        document.getElementById('mensaje').textContent = 'Error al guardar receta';
        console.error('Error:', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
   
    document.getElementById('btn1').addEventListener('click', cargarGaleria);
    document.getElementById('btn2').addEventListener('click', cargarFormulario);
    
    document.getElementById('mensaje').textContent = 'Seleccione una opción ';
});