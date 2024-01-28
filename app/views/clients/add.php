<div class="container mt-5">
    <h2 class="mb-4">Add Client</h2>
    <form action="#" method="post" class="needs-validation client-form" id="add-client-form" novalidate>
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="invalid-feedback">
                Please enter a name.
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email *</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">
                Please enter a valid email.
            </div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone *</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
            <div class="invalid-feedback">
                Please enter a phone number.
            </div>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea id="note" name="note" class="form-control" style="border-color: #dee2e6; background-image: unset"></textarea>
        </div>
        <div class="mb-3">
            <p class="invalid-feedback">
                Please enter a phone number.
            </p>
        </div>
        <div class="mb-3">
            <p class="alert" id="alert-message" style="display: none"></p>
        </div>
        <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
</div>
<script src="/kendraITCRM/assets/js/form-handler.js"></script>
