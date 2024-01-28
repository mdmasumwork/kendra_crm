document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('add-client-form');
    
    if (form) {
        form.action = 'api/client/create';
        
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const isValidForm = validateForm(form);
            if (!isValidForm) {
                return;
            }
            
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    showAlert('alert-message', data.message, true);
                    resetForm(form);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('alert-message', "Server error", false);
                });
        });
    }
    
    const updateForm = document.getElementById('update-client-form');
    if (updateForm) {
        updateForm.action = 'api/client/update';
        
        updateForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const isValidForm = validateForm(updateForm);
            if (!isValidForm) {
                return;
            }
            
            const updateFormData = new FormData(updateForm);
            const object = {};
            updateFormData.forEach((value, key) => object[key] = value);
            const json = JSON.stringify(object);
            
            fetch(updateForm.action, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: json
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    showAlert('alert-message', data.message, true);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('alert-message', "Server error", false);
                });
        });
    }
});

function validateForm(form) {
    form.classList.add('was-validated');
    Array.from(form.elements).forEach(function (input) {
        if (input.name != 'note') {
            input.addEventListener('blur', function () {
                if (input.value.trim() !== '') input.classList.add('was-validated');
            });
        }
    });
    
    if (!form.checkValidity()) {
        return false;
    }
    return true;
}

function resetForm(form) {
    form.classList.remove('was-validated');
    Array.from(form.elements).forEach(function (input) {
        input.classList.remove('was-validated');
    });
    form.reset();
}


function showAlert(id, message, isSuccess) {
    const alertDiv = document.getElementById(id);
    alertDiv.style.display = 'block'; // Show the alert div
    alertDiv.className = 'alert'; // Reset any previous class
    
    if (isSuccess) {
        alertDiv.classList.add('alert-success');
    } else {
        alertDiv.classList.add('alert-danger');
    }
    
    alertDiv.textContent = message; // Set the message text
    
    setTimeout(function() {
        alertDiv.style.display = 'none'; // Hide the alert after 5 seconds
    }, 3000);
}


