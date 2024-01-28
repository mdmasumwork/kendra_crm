function deleteClient(clientId) {
    if (confirm("Are you sure you want to delete this client?")) {
        fetch('api/client/delete', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: clientId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.message === "Client deleted successfully") {
                    alert(data.message);
                    window.location.href = 'clients';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => alert("Network error: " + error));
    }
}
