<button data-toggle="modal" data-target="#deleteVerif-modal{{ $id }}" id="delete" name="delete "class="btn btn-sm text-center btn-danger">
    Delete
</button>
<form action="{{ route('data-verifikasi.destroy',[$id]) }}" method="post" class="d-inline">
        @method('delete')
        @csrf
    @include('layout.modal.delete-verifikasi')
</form>