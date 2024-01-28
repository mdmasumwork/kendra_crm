<div class="container mt-5">
    <?php if (isset($activity)): ?>
    <h2 class="mb-4">Update Activity</h2>
    <?php else: ?>
    <h2 class="mb-4">Add New Activity</h2>
    <?php endif; ?>
    <form action="#" id="activity_form" method="post" data-had-client="<?= isset($clientId) ? 'true' : 'false'; ?>" data-had-activity="<?= isset($activity) ? 'true' : 'false'; ?>" data-activity-id="<?= isset($activity) ? $activity['id'] : ''; ?>">

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select class="form-select" id="client_id" name="client_id" required>
                <option value="">Choose...</option>
                <?php if (isset($clientList)) : ?>
                    <?php foreach ($clientList as $clientOption): ?>
                        <option value="<?= $clientOption['id'] ?>" <?= isset($clientId) && $clientOption['id'] == $clientId ? "selected" : "" ?>><?= $clientOption['name'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="activity_type" class="form-label">Activity Type</label>
            <select class="form-select" id="activity_type" name="activity_type" required>
                <option value="">Choose...</option>
                <option value="Call" <?= isset($activity) && $activity['activity_type'] == 'Call' ? 'selected' : '' ?>>Call</option>
                <option value="Meeting" <?= isset($activity) && $activity['activity_type'] == 'Meeting' ? 'selected' : '' ?>>Meeting</option>
                <option value="Email" <?= isset($activity) && $activity['activity_type'] == 'Email' ? 'selected' : '' ?>>Email</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="activity_date" class="form-label">Activity Date</label>
            <input type="date" class="form-control" id="activity_date" name="activity_date" value="<?= $activity && $activity['activity_date'] ? $activity['activity_date'] : ''  ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"><?= isset($activity) && $activity['notes'] ? $activity['notes'] : '' ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="">Choose...</option>
                <option value="Pending" <?= isset($activity) && $activity['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Completed" <?= isset($activity) && $activity['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <p class="alert" id="alert-message" style="display: none"></p>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Activity</button>
        <?php if (isset($activity)) : ?>
            <a id="deleteActivityBtn" class="delete-btn btn btn-danger mx-2" data-activity-id="<?= $activity['id'] ?>">Delete Activity</a>
        <?php endif; ?>
    </form>
</div>
<script src="/kendraITCRM/assets/js/activity-form-handler.js"></script>
