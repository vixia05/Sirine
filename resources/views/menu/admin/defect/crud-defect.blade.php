<button href="javascript:void(0)" data-toggle="modal" data-target="#editDefect-modal" onclick="edit({{ $id }})" type="button" class="btn text-center btn-info" >
    <span>Detail</span>
</button>
<button href="javascript:void(0)" data-toggle="modal" data-target="#editDefect-modal" onclick="edit({{ $id }})" type="button" class="btn text-center btn-success" >
    <span>Edit</span>
</button>
<button data-toggle="modal" data-target="#deleteDefect-modal{{ $np_user }}" id="delete" name="delete "class="btn text-center btn-danger">
    <span>Delete</span>
</button>
<form action="{{ route('defect.destroy',[$id]) }}" method="post" class="d-inline">
        @method('delete')
        @csrf
    @include('layout.modal.delete-defect')
</form>