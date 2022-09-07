<table class="table table-responsive-sm table-bordered table-striped">
    <thead>
      <tr>
        <th> No </th>
        <th> Nama </th>
        <th> Np </th>
        <th> Unit </th>
        <th> No.Hp/WA </th>
        <th> E-mail </th>
        <th> Alamat </th>
        <th> Bagian </th>
        <th> Tanggal Lahir </th>
        <th> Aksi </th>
      </tr>
    </thead>
    <tbody>
      @foreach($profile as $user)
      <tr>
        <th scope="row" style=" width:1%">{{$loop->iteration}}</th>
        <td style="width:10%">{{$user->nama}}</td>
        <td style=" width:5%">{{$user->np_user}}</td>
        <td style=" width:10%">{{$user->unit}}</td>
        <td style=" width:10%">{{$user->contact}}</td>
        <td style="width:10%">{{$user->email}}</td>
        <td style="width:30%">{{$user->alamat}}</td>
        <td style="width:10%">{{$user->sub_bagian}}</td>
        <td style=" width:7%">{{$user->tgl_lahir}}</td>
        <td style="width: 7%">
          <a href="{{route('manage-user.show',[ $user->id]) }}"  class="btn btn-success btn-sm btn-icon" style="width:auto; margin-left:15%"><i class="c-icon cil-pencil"></i></a>
          <form action="{{route('manage-user.destroy',[$user->np_user])}}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger btn-sm btn-icon" type="button" data-toggle="modal" data-target="#editUser-modal" style="width:auto" id="hapus" name="hapus"><i class="c-icon cil-trash"></i></button>
              {{-- Modal Delete --}}
              @include('layout.modal.edit-user')
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>