<div class="container mt-4">
    <h2 class="mb-3">Update Client</h2>
    <?php if (isset($client) && $client): ?>
        <form action="#" method="post" class="needs-validation client-form" id="update-client-form" novalidate>
            <div>
                <input type="hidden" name="id" id="id" value="<?php echo htmlspecialchars($client['id']); ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($client['name']); ?>" required>
                <div class="invalid-feedback">Please provide a valid name.</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($client['email']); ?>" required>
                <div class="invalid-feedback">Please provide a valid email.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone *</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($client['phone']); ?>" required>
                <div class="invalid-feedback">Please provide a valid phone number.</div>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea id="note" name="note" class="form-control" style="border-color: #dee2e6; background-image: unset"><?php echo htmlspecialchars($client['note']); ?></textarea>
            </div>
            <div class="mb-3">
                <p class="alert" id="alert-message" style="display: none"></p>
            </div>
            <button type="submit" class="btn btn-primary">Update Client</button>
        </form>
    <?php else: ?>
        <div class="alert alert-warning" role="alert">
            Client not found.
        </div>
    <?php endif; ?>
</div>
<script src="/kendraITCRM/assets/js/form-handler.js"></script>
