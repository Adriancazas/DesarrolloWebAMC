document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('hobbie-form');
    const tablaBody = document.getElementById('hobbies-body');
    const formTitle = document.getElementById('form-title');
    const submitBtn = document.getElementById('submit-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    let editando = false;

   
    function cargarHobbies() {
        obtenerHobbies()
            .then(hobbies => {
                tablaBody.innerHTML = '';
                hobbies.forEach(hobbie => {
                    const fila = document.createElement('tr');
                    fila.innerHTML = `
                        <td><img src="../image/hobbies/${hobbie.fotografia}" alt="${hobbie.nombre}" class="hobbie-image"></td>
                        <td>${hobbie.nombre}</td>
                        <td>${hobbie.descripcion}</td>
                        <td class="acciones-btn">
                            <button class="btn-editar" onclick="editarHobbieForm(${hobbie.id})">Editar</button>
                            <button class="btn-eliminar" onclick="eliminarHobbieConfirm(${hobbie.id})">Eliminar</button>
                        </td>
                    `;
                    tablaBody.appendChild(fila);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                tablaBody.innerHTML = '<tr><td colspan="4">Error al cargar los hobbies</td></tr>';
            });
    }

    
    function agregarHobbieForm(event) {
        event.preventDefault();
        
        const formData = new FormData();
        formData.append('nombre', document.getElementById('nombre').value);
        formData.append('descripcion', document.getElementById('descripcion').value);
        formData.append('fotografia', document.getElementById('fotografia').files[0]);
        
        agregarHobbie(formData)
            .then(result => {
                if (result === 'success') {
                    cargarHobbies();
                    form.reset();
                    alert('Hobbie agregado correctamente');
                } else {
                    alert('Error: ' + result);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al agregar hobbie');
            });
    }

    
    window.editarHobbieForm = function(id) {
        obtenerHobbies()
            .then(hobbies => {
                const hobbie = hobbies.find(h => h.id === id);
                if (hobbie) {
                    document.getElementById('hobbie-id').value = hobbie.id;
                    document.getElementById('nombre').value = hobbie.nombre;
                    document.getElementById('descripcion').value = hobbie.descripcion;
                    
                    formTitle.textContent = 'Editar Hobbie';
                    submitBtn.textContent = 'Actualizar';
                    cancelBtn.style.display = 'inline-block';
                    editando = true;
                    
                    document.querySelector('.form-container').scrollIntoView({ 
                        behavior: 'smooth' 
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

  
    function actualizarHobbieForm(event) {
        event.preventDefault();
        
        const id = document.getElementById('hobbie-id').value;
        const formData = new FormData();
        formData.append('id', id);
        formData.append('nombre', document.getElementById('nombre').value);
        formData.append('descripcion', document.getElementById('descripcion').value);
        
        const fotoInput = document.getElementById('fotografia');
        if (fotoInput.files[0]) {
            formData.append('fotografia', fotoInput.files[0]);
        }
        
        editarHobbie(formData)
            .then(result => {
                if (result === 'success') {
                    cargarHobbies();
                    cancelarEdicion();
                    alert('Hobbie actualizado correctamente');
                } else {
                    alert('Error: ' + result);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al actualizar hobbie');
            });
    }

    
    window.eliminarHobbieConfirm = function(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este hobbie?')) {
            eliminarHobbie(id)
                .then(result => {
                    if (result === 'success') {
                        cargarHobbies();
                        alert('Hobbie eliminado correctamente');
                    } else {
                        alert('Error: ' + result);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al eliminar hobbie');
                });
        }
    }

    
    function cancelarEdicion() {
        form.reset();
        formTitle.textContent = 'Agregar Nuevo Hobbie';
        submitBtn.textContent = 'Guardar';
        cancelBtn.style.display = 'none';
        editando = false;
    }

    
    if (form) {
        form.addEventListener('submit', function(e) {
            if (editando) {
                actualizarHobbieForm(e);
            } else {
                agregarHobbieForm(e);
            }
        });
    }
    
    if (cancelBtn) {
        cancelBtn.addEventListener('click', cancelarEdicion);
    }

    
    cargarHobbies();
});