{{-- deactivate --}}
<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
             <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fas fa-user-slash"></i> Deactivate User
                </h3>
            </div>

            <div class="modal-body">
                Are you sure you want to deactivate <span class="fw-bold">{{ $user->name }}</span>?
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('admin.users.deactivate', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal" type="button">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- activate --}}
<div class="modal fade" id="activate-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
             <div class="modal-header border-primary">
                <h3 class="h5 modal-title text-primary">
                    <i class="fas fa-user-check"></i> Activate User
                </h3>
            </div>

            <div class="modal-body">
                Are you sure you want to activate <span class="fw-bold">{{ $user->name }}</span>?
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('admin.users.activate', $user->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal" type="button">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>