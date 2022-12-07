<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="container" style="height: 100vh;">
        <div class="mt-4">
            <h1>Data Users</h1>
        </div>
        <!-- Button trigger modal -->
        <div class="text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah User
            </button>
        </div>
        <!-- Modal -->
        <form action="{{ route('tambahuser') }}" method="POST">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama">
                            </div>
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="name@example.com">
                            </div>
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="********">
                            </div>
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" role="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <form action="{{ route('updateuser') }}" method="POST">
            @csrf
            <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateUserModalLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="id" name="id" hidden>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                <input type="text" id="name" name="name_put" class="form-control"
                                    placeholder="Masukkan nama">
                            </div>
                            @error('name_put')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" id="email" name="email_put" class="form-control"
                                    placeholder="name@example.com">
                            </div>
                            @error('email_put')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" id="password" name="password_put" class="form-control"
                                    placeholder="********">
                            </div>
                            @error('password_put')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" role="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <form action="{{ route('deleteuser') }}" method="POST">
            @csrf
            <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <input type="text" id="id_delete" name="id_delete" hidden>
                            <h6>Apakah Anda Yakin Ingin Menghapus User Ini?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" role="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="content mt-4">
            <table id="tableUsers" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['data'] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>{{ $item['updated_at'] }}</td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-success btn-sm" type="button"
                                        onclick="handleEditUser('{{ $item['id'] }}', '{{ $item['name'] }}', '{{ $item['email'] }}')">Edit</button>
                                    <button class="btn btn-danger btn-sm" type="button"
                                        onclick="handleDeleteUser('{{ $item['id'] }}')">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#tableUsers').DataTable();
    });
</script>
<script>
    //message with toastr
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
<script>
    function handleEditUser(idUser, nameUser, emailUser) {
        $("#updateUserModal").modal("show");

        const formId = $("#id");
        const formName = $("#name");
        const formEmail = $("#email");

        formId.val(idUser);
        formName.val(nameUser);
        formEmail.val(emailUser);
    }
</script>
<script>
    function handleDeleteUser(idUser) {
        $("#deleteUserModal").modal("show");

        const formId = $("#id_delete");

        formId.val(idUser);
    }
</script>

</html>
