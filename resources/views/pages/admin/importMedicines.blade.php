@extends('layouts.master')

@section('title', 'Admin - Quản lý nhập thuốc')

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
          <h1>Danh sách hóa đơn nhập thuốc</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Quản lý nhập</li>
            <li class="breadcrumb-item active">Quản lý nhập thuốc</li>
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
                    <option value="name">Thời gian</option>
                  </select>
                </div>
              </div>
              <!-- <div class="col-md-3">
                                <div class="form-group">
                                    <label>Thể loại:</label>
                                    <select id="selectCategory" class="form-control" name="category">
                                        <option value="vanhoc">Tất cả</option>
                                        <option value="vanhoc">Văn học</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tác giả:</label>
                                    <select id="selectAuthor" class="form-control" name="author">
                                        <option value="1">Tất cả</option>
                                        <option value="1">Nguyễn Nhật Ánh</option>
                                    </select>
                                </div>
                            </div> -->
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="row">
              <div class="col-sm-3 col-md-12">
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                    <button type="button" class="btn btn-block btn-primary"><a href="/admin/addBook" class="text-white h-100 w-100">Thêm</a></button>
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
              <th class="text-center">Tên thuốc</th>
              <th class="text-center">Ngày nhập</th>
              <th class="text-center">Số lượng</th>
              <th class="text-center">Đơn giá</th>
              <th class="text-center">Thành tiền</th>
              <th class="text-center">Nhân viên</th>
              <th data-orderable="false" class="text-center">Thao tác</th>
              <th data-orderable="false" class="text-center">
                <input class="checkedAll" name="deleteMulti[]" type="checkbox">
              </th>
            </tr>
          </thead>
          <tbody id="dataTable">

            <?php
            foreach ($medicines as $medicine) {
            ?>
              <tr class="text-center">
                <td class="align-middle"><?= $medicine->pnt->STT_PNT ?></td>
                <td class="align-middle"><?= $medicine->thuoc->TENTHUOC ?></td>
                <td class="align-middle"><?= $medicine->pnt->NGAYNHAP ?></td>
                <td class="align-middle"><?= $medicine->SOLUONG ?></td>
                <td class="align-middle"><?= number_format($medicine->DONGIA, 0, ",", ".") . " vnđ" ?></td>
                <td class="align-middle"><?= number_format($medicine->SOLUONG * $medicine->DONGIA, 0, ",", ".") . " vnđ" ?></td>
                <td class="align-middle"><?= $medicine->pnt->nhanvien->NV_HO . " " . $medicine->pnt->nhanvien->NV_TEN ?></td>
                <td class="project-actions text-right text-center align-middle">
                  <a class="btn btn-primary btn-sm" href="#">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </a>
                  <a class="btn btn-info btn-sm" href="#">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <form action="/api/book/" method="DELETE" class="d-inline-block">
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
              <th class="text-center">Tên thuốc</th>
              <th class="text-center">Ngày nhập</th>
              <th class="text-center">Số lượng</th>
              <th class="text-center">Đơn giá</th>
              <th class="text-center">Thành tiền</th>
              <th class="text-center">Nhân viên</th>
              <th data-orderable="false" class="text-center">Thao tác</th>
              <th data-orderable="false" class="text-center">
                <input class="checkedAll" name="deleteMulti[]" type="checkbox">
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
            <h4 class="modal-title">Thông tin con thuốc</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

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
<script src="{{ asset('plugins/cbs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
</script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<!-- AdminLTE App -->
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
    const dataTable = document.getElementById("dataTable");
    const selectCategory = document.getElementById("selectCategory");
    const selectAuthor = document.getElementById("selectAuthor");


    let dataAuthor = await fetch("http://localhost:3000/api/author")
      .then(response => response.json())
      .then(data => {
        return data;
      })
      .catch(error => {
        console.log(error);
      });

    let authorHTML = dataAuthor.map((tg, index) => {
      return `
            <option value="${tg.authorId}">${tg.authorName}</option>
            `
    });
    selectAuthor.innerHTML = authorHTML.join('');

    let dataTranslator = await fetch("http://localhost:3000/api/translator")
      .then(response => response.json())
      .then(data => {
        return data;
      })
      .catch(error => {
        console.log(error);
      });

    let dataPublisher = await fetch("http://localhost:3000/api/publisher")
      .then(response => response.json())
      .then(data => {
        return data;
      })
      .catch(error => {
        console.log(error);
      });

    let dataCategory = await fetch("http://localhost:3000/api/category")
      .then(response => response.json())
      .then(data => {
        return data;
      })
      .catch(error => {
        console.log(error);
      });

    let categoryHTML = dataCategory.map((tl, index) => {
      return `
            <option value="${tl.categoryId}">${tl.categoryName}</option>
            `
    });
    selectCategory.innerHTML = categoryHTML.join('');

    let dataBook = await fetch("http://localhost:3000/api/book")
      .then(response => response.json())
      .then(data => {
        return data;
      })
      .catch(error => {
        console.log(error);
      });

    let bookHTML = dataBook.map((s, index) => {
      let categoryStr = s.Categories.map(ele => {
        return ele.categoryName;
      }).join(', ');

      return `
            <tr class="text-center">
                      <td class="align-middle">${s.bookId}</td>
                      <td class="align-middle">${s.bookName}</td>
                      <td><img src="${s.coverImage}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;"></td>
                      <td class="align-middle">${s.Authors[0].authorName}</td>
                      <td id="categoryLine" class="align-middle">${categoryStr}</td>
                      <td class="project-actions text-right text-center align-middle">
                        <button type="button" class="btn btn-primary btn-sm btnView" data-toggle="modal" data-target="#modal-lg" value="${s.bookId}">
                              <i class="fas fa-folder">
                              </i>
                              View
                        </button>

                        <button type="button" class="btn btn-info btn-sm btnEdit" data-toggle="modal" data-target="#modal-lg" value="${s.bookId}"> 
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </button>

                          <button type="button" class="btn btn-danger btn-sm btnDelete" value="${s.bookId}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                          </button>
                      </td>
                      <td class="align-middle">
                        <input class="checkMulti" name="deleteMulti[]" type="checkbox" value="${s.bookId}">
                      </td>
                    </tr>
            `
    });
    dataTable.innerHTML = bookHTML.join('');


    $('#example2').DataTable({
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

    const modalBody = document.querySelector('.modal-body')

    const btnEdit = document.querySelectorAll('.btnEdit');
    btnEdit.forEach(element => {
      const editId = element.value;

      element.onclick = function() {
        let bookItem = dataBook.find((currentEle, index) => {
          if (currentEle.bookId == editId) {
            return currentEle;
          };
        });

        // Author
        var authorStr = bookItem.Authors.map(element => {
          return element.authorName;
        }).join(', ');

        var authorItems = dataAuthor.map(element => {
          return `
                <option value="${element.authorId}">${element.authorName}</option>
              `;
        }).join('');

        // Category
        var categoryItems = dataCategory.map(element => {
          let checked = '';
          bookItem.Categories.map(ele => {
            if (element.categoryId == ele.categoryId) {
              checked = 'checked';
            }
          });
          return `
                <div class="form-check col-sm-6">
                      <input id="${element.categoryName}" name="bookCategory[]" class="form-check-input" type="checkbox" value="${element.categoryId}" ${checked}>
                      <label for="${element.categoryName}" class="form-check-label">${element.categoryName}</label>
                </div>
              `;

        }).join('');

        // Translator
        var translatorStr = bookItem.Translators.map(element => {
          return element.translatorName;
        }).join(', ');


        var translatorItems = dataTranslator.map(element => {
          return `
                <option value="${element.translatorId}">${element.translatorName}</option>
              `;
        }).join('');

        // Publisher
        var publisherStr = bookItem.Publisher.publisherName;
        var publisherItems = dataPublisher.map(element => {
          if (element.publisherName == publisherStr) return;
          return `
                <option value="${element.publisherId}">${element.publisherName}</option>
              `;
        }).join('');

        // Image
        var imageItems = bookItem.Images.map(element => {
          return `
                <div class="form-check col-sm-3">
                  <img src="${element.path}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;">
                </div>
              `;
        }).join('');

        modalBody.innerHTML = `
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Tên sách:</label>
                      <input type="text" name="bookName" class="form-control" value="${bookItem.bookName}">
                    </div>
                    <!-- Select multiple-->
                    
                    <div class="form-group">
                      <label>Tác giả</label>
                      <select id="addBookAuthor" name="bookAuthor[]" class="select2" multiple="multiple" data-placeholder="${authorStr}" style="width: 100%;">
                        ${authorItems}
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Giá bìa:</label>
                      <input type="text" name="coverPrice" class="form-control" value="${bookItem.coverPrice}">
                    </div>
                    <div class="form-group">
                      <label>Giá bán</label>
                      <input type="text" name="price" class="form-control" value="${bookItem.price}">
                    </div>
                    <div class="form-group">
                      <label>Ngôn ngữ</label>
                      <input type="text" name="language" class="form-control" value="${bookItem.language}">
                    </div>
                    <div class="form-group">
                      <label>Tập</label>
                      <input type="text" name="episode" class="form-control" value="${bookItem.episode? bookItem.episode : "Không"}">
                    </div>
                    <div class="form-group">
                      <label>Hình thức bìa</label>
                      <input type="text" name="bookLayout" class="form-control" value="${bookItem.bookLayout}">
                    </div>
                    <div class="form-group">
                      <label>Thể loại</label>
                      <div id="addBookCategory" class="row ml-1">
                          ${categoryItems}
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kích thước</label>
                      <input type="text" name="bookSize" class="form-control" value="${bookItem.bookSize}">
                    </div>
                    <div class="form-group">
                      <label>Số trang</label>
                      <input type="text" name="quantityOfPage" class="form-control" value="${bookItem.quantityOfPage}">
                    </div>
                    <div class="form-group">
                      <label>Trọng lượng</label>
                      <input type="text" name="weight" class="form-control" value="${bookItem.weight}">
                    </div>  
                    <div class="form-group">
                      <label>Người dịch</label>
                      <select id="addBookTranslator" name="bookTranslator[]" class="select2" multiple="multiple" data-placeholder="${translatorStr}" style="width: 100%;">
                        ${translatorItems}
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nhà xuất bản</label>
                      <select id="addBookbook" class="form-control" name="bookId">
                        <option value="${bookItem.Publisher.publisherId}">${bookItem.Publisher.publisherName}</option>
                        ${publisherItems}
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Năm xuất bản</label>
                      <input type="text" name="publishYear" class="form-control"value="${bookItem.publishYear}">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Ảnh bìa</label>
                        <div class="input-group">
                          <div class="row">
                            <div class="custom-file">
                              <input type="file" name="coverImage" class="custom-file-input" id="exampleInputFile"/>
                              <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                            </div>
                          </div>
                        </div>
                        <div class="input-group">
                          <div class="row mt-2">
                            <div class="form-check col-sm-3">
                              <img src="${bookItem.coverImage}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                        <div class="input-group">
                          <div class="row">
                            <div class="custom-file">
                              <input type="file" name="formFileMultiple[]" class="custom-file-input" id="exampleInputFile" multiple/>
                              <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                            </div>
                          </div>
                        </div>
                        <div class="input-group">
                          <div class="row mt-2">
                            ${imageItems}
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          Mô tả sách:
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <textarea id="summernote" name="description">
                          ${bookItem.description}
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                          <button type="reset" class="btn btn-block btn-default btn-lg">Làm lại</button>
                      </div>
                      <div class="col-md-6">
                          <button id="btnSaveEdit" type="button" class="btn btn-block btn-success btn-lg" value="${bookItem.bookId}">Thêm</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
            `;


        $(function() {
          bsCustomFileInput.init();
          //Initialize Select2 Elements
          $('.select2').select2()
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })
          //Summernote
          $('#summernote').summernote()

        })

        // Edit
        const btnSaveEdit = document.querySelector('#btnSaveEdit');
        const saveId = btnSaveEdit.value;
        btnSaveEdit.onclick = function() {
          const bookInput = document.querySelector('#bookInput');
          let databook = {
            bookName: bookInput.value,
          }
          const url = 'http://localhost:3000/api/book/' + btnSaveEdit.value;

          console.log(url);

          fetch(url, {
              headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
              },
              method: 'PUT',
              body: JSON.stringify(databook),
            })
            .then((response) => response.json())
            .then((data) => {

              console.log('Success:', data);

              if (data.bookId == saveId) {
                alert('Đã cập nhật thành công');
                document.querySelector("input[name=book]").value = data.bookName;
              }
              document.querySelector('#btnClomedicineit').click();
              // bookInput.value = '';
              reload();

            })
            .catch((error) => {
              console.error('Error:', error);
            });
        };

      };


    });
    const btnView = document.querySelectorAll('.btnView');
    btnView.forEach(element => {
      const viewId = element.value;

      element.onclick = function() {
        let bookItem = dataBook.find((currentEle, index) => {
          if (currentEle.bookId == viewId) {
            return currentEle;
          };
        });

        // Author
        var authorStr = bookItem.Authors.map(element => {
          return element.authorName;
        }).join(', ');

        // Category
        var categoryItems = bookItem.Categories.map(ele => {
          return `
                <div class="form-check col-sm-6">
                      <input name="bookCategory[]" class="form-check-input" type="checkbox" value="${ele.categoryId}" checked disabled>
                      <label class="form-check-label">${ele.categoryName}</label>
                </div>
              `;
        }).join('');

        // Translator
        var translatorStr = bookItem.Translators.map(element => {
          return element.translatorName;
        }).join(', ');

        console.log(translatorStr)

        // Publisher
        var publisherStr = bookItem.Publisher.publisherName;
        var publisherItems = dataPublisher.map(element => {
          if (element.publisherName == publisherStr) return;
          return `
                <option value="${element.publisherId}">${element.publisherName}</option>
              `;
        }).join('');

        // Image
        var imageItems = bookItem.Images.map(element => {
          return `
                <div class="form-check col-sm-3">
                  <img src="${element.path}" class="elevation-2" alt="User Image" style="width: 60px; height:80px;">
                </div>
              `;
        }).join('');

        modalBody.innerHTML = `
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Tên sách:</label>
                      <input type="text" name="bookName" class="form-control" value="${bookItem.bookName}">
                    </div>
                    <!-- Select multiple-->
                    
                    <div class="form-group">
                      <label>Tác giả</label>
                      <select id="addBookAuthor" name="bookAuthor[]" class="select2" multiple="multiple" data-placeholder="${authorStr}" style="width: 100%;">
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Giá bìa:</label>
                      <input type="text" name="coverPrice" class="form-control" value="${bookItem.coverPrice}">
                    </div>
                    <div class="form-group">
                      <label>Giá bán</label>
                      <input type="text" name="price" class="form-control" value="${bookItem.price}">
                    </div>
                    <div class="form-group">
                      <label>Ngôn ngữ</label>
                      <input type="text" name="language" class="form-control" value="${bookItem.language}">
                    </div>
                    <div class="form-group">
                      <label>Tập</label>
                      <input type="text" name="episode" class="form-control" value="${bookItem.episode? bookItem.episode : "Không"}">
                    </div>
                    <div class="form-group">
                      <label>Hình thức bìa</label>
                      <input type="text" name="bookLayout" class="form-control" value="${bookItem.bookLayout}">
                    </div>
                    <div class="form-group">
                      <label>Thể loại</label>
                      <div id="addBookCategory" class="row ml-1">
                          ${categoryItems}
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Kích thước</label>
                      <input type="text" name="bookSize" class="form-control" value="${bookItem.bookSize}">
                    </div>
                    <div class="form-group">
                      <label>Số trang</label>
                      <input type="text" name="quantityOfPage" class="form-control" value="${bookItem.quantityOfPage}">
                    </div>
                    <div class="form-group">
                      <label>Trọng lượng</label>
                      <input type="text" name="weight" class="form-control" value="${bookItem.weight}">
                    </div>  
                    <div class="form-group">
                      <label>Người dịch</label>
                      <select id="addBookTranslator" name="bookTranslator[]" class="select2" multiple="multiple" data-placeholder="${translatorStr}" style="width: 100%;">
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nhà xuất bản</label>
                      <select id="addBookbook" class="form-control" name="bookId">
                        <option value="${bookItem.Publisher.publisherId}">${bookItem.Publisher.publisherName}</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Năm xuất bản</label>
                      <input type="text" name="publishYear" class="form-control"value="${bookItem.publishYear}">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                      
                      <div class="input-group">
                        <div class="row mt-2">
                          ${imageItems}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          Mô tả sách:
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <textarea id="summernote1" name="description">
                          ${bookItem.description}
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                          <button type="reset" class="btn btn-block btn-default btn-lg">Làm lại</button>
                      </div>
                      <div class="col-md-6">
                          <button id="btnSaveEdit" type="button" class="btn btn-block btn-success btn-lg" value="${bookItem.bookId}">Thêm</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
            `;
        $(function() {
          bsCustomFileInput.init();
          //Initialize Select2 Elements
          $('.select2').select2()
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })
          //Summernote
          $('#summernote1').summernote()

        })
      }
    });

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