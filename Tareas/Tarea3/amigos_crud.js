// Funciones CRUD para gestionar amigos
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('amigo-form');
    const tablaBody = document.getElementById('amigos-body');
    const formTitle = document.getElementById('form-title');
    const submitBtn = document.getElementById('submit-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    let editando = false;

    // Cargar amigos en la tabla
    function cargarAmigos() {
        tablaBody.innerHTML = '';
        amigos.forEach(amigo => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${amigo.nombres}</td>
                <td>${amigo.apellidos}</td>
                <td>${amigo.celular}</td>
                <td>${amigo.correo}</td>
                <td class="acciones-btn">
                    <button class="btn-editar" onclick="editarAmigo(${amigo.id})">Editar</button>
                    <button class="btn-eliminar" onclick="eliminarAmigo(${amigo.id})">Eliminar</button>
                </td>
            `;
            tablaBody.appendChild(fila);
        });
    }

    // Agregar nuevo amigo
    function agregarAmigo(event) {
        event.preventDefault();
        
        const nuevoAmigo = {
            id: editando ? parseInt(document.getElementById('amigo-id').value) : getNextId(),
            nombres: document.getElementById('nombres').value,
            apellidos: document.getElementById('apellidos').value,
            celular: document.getElementById('celular').value,
            correo: document.getElementById('correo').value
        };

        if (editando) {
            // Actualizar amigo existente
            const index = amigos.findIndex(a => a.id === nuevoAmigo.id);
            if (index !== -1) {
                amigos[index] = nuevoAmigo;
            }
        } else {
            // Agregar nuevo amigo
            amigos.push(nuevoAmigo);
        }

        guardarEnLocalStorage();
        cargarAmigos();
        form.reset();
        cancelarEdicion();
    }

    // Editar amigo
    window.editarAmigo = function(id) {
        const amigo = amigos.find(a => a.id === id);
        if (amigo) {
            document.getElementById('amigo-id').value = amigo.id;
            document.getElementById('nombres').value = amigo.nombres;
            document.getElementById('apellidos').value = amigo.apellidos;
            document.getElementById('celular').value = amigo.celular;
            document.getElementById('correo').value = amigo.correo;
            
            formTitle.textContent = 'Editar Amigo';
            submitBtn.textContent = 'Actualizar';
            cancelBtn.style.display = 'inline-block';
            editando = true;
            
            // Scroll al formulario
            document.querySelector('.form-container').scrollIntoView({ 
                behavior: 'smooth' 
            });
        }
    }

    // Eliminar amigo
    window.eliminarAmigo = function(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este amigo?')) {
            amigos = amigos.filter(a => a.id !== id);
            guardarEnLocalStorage();
            cargarAmigos();
        }
    }

    // Cancelar edición
    function cancelarEdicion() {
        form.reset();
        formTitle.textContent = 'Agregar Nuevo Amigo';
        submitBtn.textContent = 'Guardar';
        cancelBtn.style.display = 'none';
        editando = false;
    }

    // Event listeners
    form.addEventListener('submit', agregarAmigo);
    cancelBtn.addEventListener('click', cancelarEdicion);

    // Cargar amigos al iniciar
    cargarAmigos();
});