<div class="modal" tabindex="-1" id="m-delete" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="url">
                <input type="hidden" name="table">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <p>Are you sure.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="m-delete-confirm-btn">Delete</button>
            </div>
        </div>
    </div>
</div>
