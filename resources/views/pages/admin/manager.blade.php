@extends('layouts.master')

@section('title', 'Admin - Danh sách lứa rắn')

@section('style-libraries')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

@stop

@section('styles')
{{--custom css item suggest search--}}
<style>
    .autocomplete-group {
        padding: 2px 5px;
    }
</style>
@stop

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý nhân viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-sm-12 col-md-9">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sắp xếp theo:</label>
                                    <select class="form-control" name="sortBy">
                                        <option value="id">ID</option>
                                        <option value="name">Tên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select id="selectPermission" class="form-control" name="category">
                                        <option value="Nhân viên">Nhân viên</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="row">
                            <div class="col-sm-3 col-md-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <button type="button" data-toggle="modal" data-target="#modal-lg" class="btn btn-block btn-primary">Thêm</button>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <button type="button" class="btn btn-danger btn-block btnDelete" value="${s.bookId}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mt-2 pt-2">
                            <input type="search" class="form-control" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Họ và tên</th>
                            <th class="text-center">Avatar</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Quyền</th>
                            <th data-orderable="false" class="text-center">Thao tác</th>
                            <th data-orderable="false" class="text-center">
                                <input class="checkedAll" name="deleteMulti[]" type="checkbox">
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        <?php
                        foreach ($workers as $worker) {
                        ?>
                            <tr class="text-center">
                                <td class="align-middle"><?= $worker->NV_ID ?></td>
                                <td class="align-middle"><?= $worker->NV_HO . ' ' . $worker->NV_TEN ?></td>
                                <td><img src="<?= $worker->AVATAR ?>" class="elevation-2" alt="User Image" style="width: 60px; height:80px;"></td>
                                <td class="align-middle"><?= $worker->EMAIL ?></td>
                                <td id="categoryLine" class="align-middle"><?= $worker->NV_TAIKHOAN ?></td>
                                <td class="align-middle"><?= $worker->QUYEN ?></td>
                                <td class="project-actions text-right text-center align-middle">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="/api/manager/${manager.managerId}" method="DELETE" class="d-inline-block">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <input class="checkMulti" name="deleteMulti[]" type="checkbox" value="">
                                </td>
                            </tr>
                        <?php
                        }

                        ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Họ và tên</th>
                            <th class="text-center">Avatar</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Quyền</th>
                            <th class="text-center">Thao tác</th>
                            <th class="text-center">
                                <button type="button" class="btn btn-danger btn-sm btnDelete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.modal -->

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cập nhật nhân viên</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">

                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Họ và tên:</label>
                                        <input type="text" name="managerName" class="form-control">
                                    </div>
                                    <!-- Select multiple-->

                                    <div class="form-group">
                                        <label>Tên đăng nhập:</label>
                                        <input type="text" name="userName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu:</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền:</label>
                                        <input type="text" name="permission" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh đại diện:</label>
                                        <div class="input-group">
                                            <div class="row w-100">
                                                <div class="custom-file ml-2">
                                                    <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile" multiple />
                                                    <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="justify-content-between d-flex w-100 p-2">
                                    <button type="button" id="btnCloseEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" id="btnSaveEdit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop

@section('scripts')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
\
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
\
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


<script>
    !async function() {

        // Fetch data
        const dataTableF = document.getElementById("dataTable");
        const selectPermission = document.getElementById("selectPermission");

        let dataManager = await fetch("http://localhost:3000/api/manager")
            .then(response => response.json())
            .then(data => {
                return data;
            })
            .catch(error => {
                console.log(error);
            });

        let managerHTML = dataManager.map((manager, index) => {
            const pass = manager.password

            return `
            <tr class="text-center">
                      <td class="align-middle">${manager.managerId}</td>
                      <td class="align-middle">${manager.managerName}</td>
                      <td><img src="${manager.avatar}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;"></td>
                      <td class="align-middle">${manager.email}</td>
                      <td id="categoryLine" class="align-middle">${manager.userName}</td>
                      <td id="categoryLine" class="align-middle">${manager.permission}</td>
                      <td class="project-actions text-right text-center align-middle"> 
                        <button type="button" class="btn btn-primary btn-sm btnView" data-toggle="modal" data-target="#modal-lg" value="2">
                              <i class="fas fa-eye">
                              </i>
                              View
                        </button>
                        <button type="button" class="btn btn-info btn-sm btnEdit" data-toggle="modal" data-target="#modal-lg" value="${manager.managerId}"> 
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </button>

                          <button type="submit" class="btn btn-danger btn-sm btnDelete" value="${manager.managerId}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                          </button>
                      </td>
                      <td class="align-middle">
                        <input class="checkMulti" name="deleteMulti[]" type="checkbox" value="${manager.bookId}">
                      </td>
                    </tr>
            `
        });
        dataTableF.innerHTML = managerHTML.join('');




        var table;
        if ($.fn.dataTable.isDataTable('#example')) {
            table = $('#example2').DataTable();
            table.clear();
            table.rows.add(jsonData).draw();
        } else {
            table = $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,

                // Vietsub notifications
                "language": {
                    "emptyTable": "Hiện không có sản phẩm nào",
                    "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_",
                    "ifnoEmpty": "Hiển thị từ 0 đến 0 của 0",
                    "search": "Tìm kiếm",
                    "paginate": {
                        "previous": "Trở lại",
                        "next": "Tiếp &nbsp",
                        "last": "Trang cuối",
                        "first": "Trang đầu",
                    },
                }
            });
        }

        const modalBody = document.querySelector('.modal-body')

        const btnEdit = document.querySelectorAll('.btnEdit');
        btnEdit.forEach(element => {
            const editId = element.value;

            element.onclick = function() {

                let managerItem = dataManager.find((currentEle, index) => {
                    if (currentEle.managerId == editId) {
                        return currentEle;
                    };
                });
                console.log('hello' + managerItem.managerName)

                modalBody.innerHTML = `
              <form>
                <div class="row">
                  
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Họ và tên:</label>
                      <input type="text" name="managerName" class="form-control" value="${managerItem.managerName}">
                    </div>
                    <!-- Select multiple-->
                    
                    <div class="form-group">
                      <label>Tên đăng nhập:</label>
                      <input type="text" name="userName" class="form-control" value="${managerItem.userName}">
                    </div>
                    <div class="form-group">
                      <label>Mật khẩu:</label>
                      <input type="text" name="password" class="form-control" value="${managerItem.password}">
                    </div>
                    <div class="form-group">
                      <label>Email:</label>
                      <input type="text" name="email" class="form-control" value="${managerItem.email}">
                    </div>
                    <div class="form-group">
                      <label>Quyền:</label>
                      <input type="text" name="permission" class="form-control" value="${managerItem.permission}">
                    </div>

                      <div class="form-group">
                          <label for="exampleInputFile">Ảnh đại diện:</label>
                          <div class="input-group">
                            <div class="row w-100">
                              <div class="custom-file ml-2">
                                <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile" multiple/>
                                <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                              </div>
                            </div>
                          </div>
                          <div class="input-group">
                            <div class="row mt-2">
                              <div class="form-check col-sm-3">
                                  <img src="${managerItem.avatar}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;">
                              </div>
                            </div>
                          </div>
                      </div>
                      
                  
                </div>

                <div class="justify-content-between d-flex w-100 p-2">
                      <button type="button" id="btnCloseEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="btnSaveEdit" class="btn btn-primary" value="${managerItem.managerId}">Save changes</button>
                    </div>
                </div>
            </form>
            `;

                // Edit
                const btnSaveEdit = document.querySelector('#btnSaveEdit');
                const saveId = btnSaveEdit.value;
                btnSaveEdit.onclick = function() {

                    let avatar = document.querySelector("input[name=avatar]").value ? document.querySelector("input[name=avatar]").value : '/img/avatar/avatar.png';
                    let password = document.querySelector("input[name=password]").value;

                    const manager = {
                        managerName: document.querySelector("input[name=managerName]").value,
                        userName: document.querySelector("input[name=userName]").value,
                        email: document.querySelector("input[name=email]").value,
                        permission: document.querySelector("input[name=permission]").value,
                        password: document.querySelector("input[name=password]").value,
                        avatar: avatar,
                    };

                    const url = 'http://localhost:3000/api/manager/' + btnSaveEdit.value;

                    console.log(url);

                    fetch(url, {
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            },
                            method: 'PUT',
                            body: JSON.stringify(manager),
                        })
                        .then((response) => response.json())
                        .then((data) => {

                            console.log('Success:', data);

                            if (data.managerId == saveId) {
                                alert('Đã cập nhật thành công');
                                document.querySelector("input[name=manager]").value = data.managerName;
                            }
                            document.querySelector('#btnCloseEdit').click();
                            makeEmpty();
                            reload();

                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                };

            };


        });


        // Delete
        const btnDelete = document.querySelectorAll('.btnDelete');
        btnDelete.forEach(element => {
            const deleteId = element.value;

            element.onclick = function() {
                const url = 'http://localhost:3000/api/manager/' + deleteId;
                fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                        method: 'DELETE',
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        console.log('Success:', data);
                        reload();
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }
        });

        // Add
        const btnSaveEdit = document.querySelectorAll('#btnSaveEdit');
        btnSaveEdit.forEach(element => {

            element.onclick = function() {
                let avatar = document.querySelector("input[name=avatar]").value ? document.querySelector("input[name=avatar]").value : '/img/avatar/avatar.png';
                let password = document.querySelector("input[name=password]").value;

                const manager = {
                    managerName: document.querySelector("input[name=managerName]").value,
                    userName: document.querySelector("input[name=userName]").value,
                    email: document.querySelector("input[name=email]").value,
                    permission: document.querySelector("input[name=permission]").value,
                    password: document.querySelector("input[name=password]").value,
                    avatar: avatar,
                };

                const url = 'http://localhost:3000/api/manager/';
                fetch(url, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                        method: 'POST',
                        body: JSON.stringify(manager),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        console.log('Success:', data);
                        document.querySelector('#btnCloseEdit').click();
                        makeEmpty();
                        reload();
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }
        });

        function reload() {
            // Reload
            console.log('reload')
            const dataManagerNew = fetch("http://localhost:3000/api/manager")
                .then(response => response.json())
                .then(data => {
                    let managerHTML = data.map((manager, index) => {
                        const pass = manager.password

                        return `
                  <tr class="text-center">
                            <td class="align-middle">${manager.managerId}</td>
                            <td class="align-middle">${manager.managerName}</td>
                            <td><img src="${manager.avatar}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;"></td>
                            <td class="align-middle">${manager.email}</td>
                            <td id="categoryLine" class="align-middle">${manager.userName}</td>
                            <td id="categoryLine" class="align-middle">${manager.permission}</td>
                            <td class="project-actions text-right text-center align-middle">
                              
                              <button type="button" class="btn btn-info btn-sm btnEdit" data-toggle="modal" data-target="#modal-lg" value="${manager.managerId}"> 
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                              </button>

                                <button type="submit" class="btn btn-danger btn-sm btnDelete" value="${manager.managerId}">
                                      <i class="fas fa-trash">
                                      </i>
                                      Delete
                                </button>
                            </td>
                          </tr>
                  `
                    });
                    dataTableF.innerHTML = managerHTML.join('');

                    const modalBody = document.querySelector('.modal-body')

                    const btnEdit = document.querySelectorAll('.btnEdit');
                    btnEdit.forEach(element => {
                        const editId = element.value;

                        element.onclick = function() {

                            let managerItem = data.find((currentEle, index) => {
                                if (currentEle.managerId == editId) {
                                    return currentEle;
                                };
                            });
                            console.log('hello' + managerItem.managerName)


                            modalBody.innerHTML = `
                    <form>
                      <div class="row">
                        
                        <div class="col-sm-12">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Họ và tên:</label>
                            <input type="text" name="managerName" class="form-control" value="${managerItem.managerName}">
                          </div>
                          <!-- Select multiple-->
                          
                          <div class="form-group">
                            <label>Tên đăng nhập:</label>
                            <input type="text" name="userName" class="form-control" value="${managerItem.userName}">
                          </div>
                          <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="text" name="password" class="form-control" value="${managerItem.password}">
                          </div>
                          <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control" value="${managerItem.email}">
                          </div>
                          <div class="form-group">
                            <label>Quyền:</label>
                            <input type="text" name="permission" class="form-control" value="${managerItem.permission}">
                          </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh đại diện:</label>
                                <div class="input-group">
                                  <div class="row w-100">
                                    <div class="custom-file ml-2">
                                      <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile" multiple/>
                                      <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="input-group">
                                  <div class="row mt-2">
                                    <div class="form-check col-sm-3">
                                        <img src="${managerItem.avatar}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;">
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                        
                      </div>

                      <div class="justify-content-between d-flex w-100 p-2">
                            <button type="button" id="btnCloseEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="btnSaveEdit" class="btn btn-primary" value="${managerItem.managerId}">Save changes</button>
                          </div>
                      </div>
                  </form>
                  `;

                            // Edit
                            const btnSaveEdit = document.querySelector('#btnSaveEdit');
                            const saveId = btnSaveEdit.value;
                            btnSaveEdit.onclick = function() {

                                let avatar = document.querySelector("input[name=avatar]").value ? document.querySelector("input[name=avatar]").value : '/img/avatar/avatar.png';
                                let password = document.querySelector("input[name=password]").value;

                                const manager = {
                                    managerName: document.querySelector("input[name=managerName]").value,
                                    userName: document.querySelector("input[name=userName]").value,
                                    email: document.querySelector("input[name=email]").value,
                                    permission: document.querySelector("input[name=permission]").value,
                                    password: document.querySelector("input[name=password]").value,
                                    avatar: avatar,
                                };

                                const url = 'http://localhost:3000/api/manager/' + btnSaveEdit.value;

                                console.log(url);

                                fetch(url, {
                                        headers: {
                                            'Accept': 'application/json',
                                            'Content-Type': 'application/json',
                                        },
                                        method: 'PUT',
                                        body: JSON.stringify(manager),
                                    })
                                    .then((response) => response.json())
                                    .then((data) => {

                                        console.log('Success:', data);

                                        if (data.managerId == saveId) {
                                            alert('Đã cập nhật thành công');
                                            document.querySelector("input[name=manager]").value = data.managerName;
                                        }
                                        document.querySelector('#btnCloseEdit').click();
                                        makeEmpty();
                                        reload();

                                    })
                                    .catch((error) => {
                                        console.error('Error:', error);
                                    });
                            };

                        };

                    });

                    // Delete
                    const btnDelete = document.querySelectorAll('.btnDelete');
                    btnDelete.forEach(element => {
                        const deleteId = element.value;

                        element.onclick = function() {
                            const url = 'http://localhost:3000/api/manager/' + deleteId;
                            fetch(url, {
                                    headers: {
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json',
                                    },
                                    method: 'DELETE',
                                })
                                .then((response) => response.json())
                                .then((data) => {
                                    console.log('Success:', data);
                                    reload();
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                                });
                        }
                    });
                })
                .catch(error => {
                    console.log(error);
                });

        };

        function makeEmpty() {
            document.querySelector("input[name=avatar]").value = '';
            document.querySelector("input[name=password]").value = '';
            document.querySelector("input[name=managerName]").value = '';
            document.querySelector("input[name=userName]").value = '';
            document.querySelector("input[name=email]").value = '';
            document.querySelector("input[name=permission]").value = '';

        };

        const checkedAll = document.querySelectorAll('.checkedAll');
        const checkMulti = document.querySelectorAll('.checkMulti');
        checkedAll.forEach(element => {
            element.onclick = function() {
                checkMulti.forEach(ele => {
                    ele.checked = ele.checked ? false : true;
                });
            };
        });

    }();
</script>