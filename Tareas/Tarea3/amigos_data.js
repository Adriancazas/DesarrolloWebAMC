// Datos iniciales de amigos (simulando una base de datos)
let amigos = [
    {
        id: 1,
        nombres: "Juan",
        apellidos: "Pérez López",
        celular: "71234567",
        correo: "juan.perez@email.com"
    },
    {
        id: 2,
        nombres: "María",
        apellidos: "Gonzales Méndez",
        celular: "72345678",
        correo: "maria.gonzales@email.com"
    },
    {
        id: 3,
        nombres: "Carlos",
        apellidos: "Rodríguez Vargas",
        celular: "73456789",
        correo: "carlos.rodriguez@email.com"
    }
];

// Función para obtener el próximo ID disponible
function getNextId() {
    return amigos.length > 0 ? Math.max(...amigos.map(a => a.id)) + 1 : 1;
}

// Función para guardar datos en localStorage
function guardarEnLocalStorage() {
    localStorage.setItem('amigosData', JSON.stringify(amigos));
}

// Función para cargar datos desde localStorage
function cargarDesdeLocalStorage() {
    const datosGuardados = localStorage.getItem('amigosData');
    if (datosGuardados) {
        amigos = JSON.parse(datosGuardados);
    }
}

// Cargar datos al iniciar
cargarDesdeLocalStorage();