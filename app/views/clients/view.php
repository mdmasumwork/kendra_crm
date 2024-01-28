<div class="container mt-5">
    <h2 class="mb-4">View Client</h2>
    <?php if (isset($client) && $client): ?>
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title"><?php echo htmlspecialchars($client['name']); ?></h4>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($client['email']); ?></h6>
                <p class="card-text"><?php echo htmlspecialchars($client['phone']); ?></p>
                <?php if ($client['note']): ?>
                    <h6>Note</h6>
                    <p><?= htmlspecialchars($client['note']) ?></p>
                <?php endif; ?>
                <a href="edit-client?id=<?php echo $client['id']; ?>" class="btn btn-primary me-2">Edit</a>
                <button class="btn btn-danger" onclick="deleteClient(<?= $client['id'] ?>)">Delete</button>
            </div>
        </div>

        <!-- Client Activities Section -->
        <div class="d-flex w-100 justify-content-between mb-2">
            <h2 class="mb-0">Activities</h2>
            <a href="activity?client_id=<?= $client['id'] ?>" class="btn btn-primary">Add Activity</a>
        </div>
        <div class="list-group">
            <?php if (isset($activities) && count($activities)): ?>
                <?php foreach ($activities as $activity): ?>
                    <a href="activity?client_id=<?= $client['id'] ?>&activity_id=<?= $activity['id'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= htmlspecialchars($activity['activity_type']) ?></h5>
                            <small><?= htmlspecialchars($activity['activity_date']) ?></small>
                        </div>
                        <p class="mb-1"><?= htmlspecialchars($activity['notes']) ?></p>
                        <small>Status: <?= htmlspecialchars($activity['status']) ?></small>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p class="alert alert-warning">Client not found.</p>
    <?php endif; ?>
</div>
<script src="/kendraITCRM/assets/js/client-deletion.js"></script>
