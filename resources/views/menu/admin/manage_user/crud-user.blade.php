<button href="javascript:void(0)" data-toggle="modal" data-target="#editUser-modal" onclick="edit({{ $id }})" type="button" class="btn btn-sm text-center btn-success" >
   <span>Edit</span>
</button>
    <button data-toggle="modal" data-target="#deleteUser-modal{{ $np_user }}" id="delete" name="delete "class="btn text-center btn-sm btn-danger">
        <span>Delete</span>
    </button>
<form action="{{ route('manage-user.destroy',[$np_user]) }}" method="post" class="d-inline">
        @method('delete')
        @csrf
    @include('layout.modal.delete-user')
</form>