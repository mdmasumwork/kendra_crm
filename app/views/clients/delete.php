<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Client</title>
    <link href="path/to/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Delete Client</h2>
    <?php if (isset($client) && $client): ?>
        <p>Are you sure you want to delete <?php echo htmlspecialchars($client['name']); ?>?</p>
        <form action="url-to-delete-client-handler?id=<?php echo $client['id']; ?>" method="post">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="back-to-client-list" class="btn btn-secondary">Cancel</a>
        </form>
    <?php else: ?>
        <p>Client not found.</p>
    <?php endif; ?>
</div>
<script src="path/to/bootstrap.bundle.js"></script>
</body>
</html>
