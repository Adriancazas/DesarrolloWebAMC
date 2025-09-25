document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const correo = document.getElementById('correo').value;
            const password = document.getElementById('password').value;
            
            const formData = new FormData();
            formData.append('correo', correo);
            formData.append('password', password);
            
            fetch('../php/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    window.location.href = 'yo.html';
                } else {
                    document.getElementById('login-message').textContent = data;
                    document.getElementById('login-message').className = 'login-message error';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('login-message').textContent = 'Error de conexión';
                document.getElementById('login-message').className = 'login-message error';
            });
        });
    }
    
    
    const protectedPages = ['mishobbies.html'];
    const currentPage = window.location.pathname.split('/').pop();
    
    if (protectedPages.includes(currentPage)) {
        checkAuthentication();
    }
});

function checkAuthentication() {
    fetch('../php/check_auth.php')
    .then(response => {
        if (response.status === 401) {
            window.location.href = 'formlogin.html';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function logout() {
    fetch('../php/logout.php')
    .then(() => {
        window.location.href = 'formlogin.html';
    })
    .catch(error => {
        console.error('Error:', error);
    });
}