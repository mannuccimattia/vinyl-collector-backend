<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1"
    aria-labelledby="deleteModal{{ $id }}Label" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h1 class="modal-title text-danger fs-5 fw-semibold" id="deleteModal{{ $id }}Label">
                    Unreversible changes ahead!
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to <strong>permanently delete</strong> this entry?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Undo</button>
                <form {{ $attributes }} method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
