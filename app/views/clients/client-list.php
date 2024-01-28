<div class="container my-4">
    <h1 class="mb-4">Client List</h1>
    <?php if (isset($clients) && count($clients) > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="d-none d-md-table-cell">Email</th> <!-- Hidden on small screens -->
                    <th class="d-none d-md-table-cell">Contact</th> <!-- Hidden on small screens -->
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($client['id']); ?></td>
                        <td><?php echo htmlspecialchars($client['name']); ?></td>
                        <td class="d-none d-md-table-cell"><?php echo htmlspecialchars($client['email']); ?></td>
                        <td class="d-none d-md-table-cell"><?php echo htmlspecialchars($client['phone']); ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="clients?id=<?php echo $client['id']; ?>">View Details</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
    <?php else: ?>
        <p class="alert alert-warning">No client found.</p>
    <?php endif; ?>
</div>
