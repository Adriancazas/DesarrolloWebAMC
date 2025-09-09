
function obtenerHobbies() {
    return fetch('../php/obtener_hobbies.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener hobbies');
            }
            return response.json();
        });
}


function agregarHobbie(formData) {
    return fetch('../php/agregar_hobbie.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text());
}


function editarHobbie(formData) {
    return fetch('../php/editar_hobbie.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text());
}


function eliminarHobbie(id) {
    const formData = new FormData();
    formData.append('id', id);
    
    return fetch('../php/eliminar_hobbie.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text());
}