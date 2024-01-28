document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const hadClient = form.getAttribute('data-had-client') === 'true';
    const hadActivity = form.getAttribute('data-had-activity') === 'true';
    const activityId = form.getAttribute('data-activity-id');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(form);
        const dataObject = {};
        formData.forEach((value, key) => dataObject[key] = value);
        
        if (hadActivity && activityId) {
            dataObject['id'] = activityId;
        }
        
        const fetchOptions = {
            method: hadActivity ? 'PUT' : 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataObject)
        };
        
        const apiEndpoint = hadActivity ? '/kendraITCRM/api/activity/update' : '/kendraITCRM/api/activity/create';
        
        fetch(apiEndpoint, fetchOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log("Response data:", data);
                alert(data.message);
                
                // Conditionally reset form fields based on hadClient and hadActivity
                if (hadClient && !hadActivity) {
                    // Reset all fields except client_id
                    form.querySelectorAll('input, select, textarea').forEach(field => {
                        if (field.name !== 'client_id') {
                            if (field.type === 'select-one') field.selectedIndex = 0;
                            else field.value = '';
                        }
                    });
                } else if (!hadClient && !hadActivity) {
                    // Reset the entire form
                    form.reset();
                }
                // If both hadClient and hadActivity are true, no action is taken.
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error: ' + error);
            });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var deleteBtn = document.getElementById('deleteActivityBtn');
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function() {
            var activityId = this.getAttribute('data-activity-id');
            var clientId = new URLSearchParams(window.location.search).get('client_id');
            
            if (confirm("Are you sure you want to delete this activity?")) {
                fetch('/kendraITCRM/api/activity/delete', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: activityId })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message);
                        if (clientId) {
                            window.location.href = '/kendraITCRM/clients?id=' + clientId;
                        } else {
                            window.location.href = '/kendraITCRM/clients';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error: ' + error);
                    });
            }
        });
    }
});

