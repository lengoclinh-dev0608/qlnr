@extends('layouts.master')

@section('title', 'Admin - Danh lứa rắn lứa rắn')

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
                    <h1>Thêm lứa rắn mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Quản lý lứa rắn</a></li>
                        <li class="breadcrumb-item active">Thêm lứa rắn mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Vui lòng điền thông tin vào form bên dưới</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/api/book" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Ngày nuôi:</label>
                                    <input type="date" name="bookName" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <label>Ngày thay nước định kỳ:</label>
                                    <input type="date" name="coverPrice" class="form-control" placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <label>Lượng nước:</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter ...">
                                </div>
                                <div class="form-group">
                                    <label>Chất lượng nước:</label>
                                    <input type="text" name="language" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <div id="addBookCategory" class="row ml-1">

                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">


                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="coverImage" class="custom-file-input" id="exampleInputFile" />
                                            <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh phụ</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="formFileMultiple[]" class="custom-file-input" id="exampleInputFile" multiple />
                                            <label class="custom-file-label" for="exampleInputFile">Chọn ảnh</label>
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
                                            Thông tin khác:
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <textarea id="summernote" name="description">
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
                                        <button type="submit" class="btn btn-block btn-success btn-lg">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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

<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
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

    const authorItem = document.querySelector("#addBookAuthor");
    const publisherItem = document.querySelector("#addBookPublisher");
    const categoryItem = document.querySelector("#addBookCategory");
    const translatorItem = document.querySelector("#addBookTranslator");


    // Promise.all([
    //     fetch("http://localhost:3000/api/author"),
    //     fetch("http://localhost:3000/api/publisher"),
    //     fetch("http://localhost:3000/api/category"),
    //     fetch("http://localhost:3000/api/translator"),
    // ]).then(([author, publisher, category, translator]) => {
    //     author.json()
    //         .then(data => {
    //             const authorHTML = data.map((tg, index) => {
    //                 return `
    //                     <option value="${tg.authorId}">${tg.authorName}</option>
    //                     `
    //             })
    //             authorItem.innerHTML = authorHTML.join('');
    //         });

    //     publisher.json()
    //         .then(data => {
    //             const publisherHTML = data.map((nxb, index) => {
    //                 return `
    //                     <option value="${nxb.publisherId}">${nxb.publisherName}</option>
    //                 `
    //             })
    //             publisherItem.innerHTML = publisherHTML.join('');
    //         });

    //     translator.json()
    //         .then(data => {
    //             const translatorHTML = data.map((nd, index) => {
    //                 return `
    //                     <option value="${nd.translatorId}">${nd.translatorName}</option>
    //                 `
    //             })
    //             translatorItem.innerHTML = translatorHTML.join('');
    //         });

    //     category.json()
    //         .then(data => {
    //             const categoryHTML = data.map((tl, index) => {
    //                 return `
    //                     <div class="form-check col-sm-6">
    //                           <input id="${tl.categoryName}" name="bookCategory[]" class="form-check-input" type="checkbox" value="${tl.categoryId}">
    //                           <label for="${tl.categoryName}" class="form-check-label">${tl.categoryName}</label>
    //                     </div>
    //                 `
    //             })
    //             categoryItem.innerHTML = categoryHTML.join('');
    //         });

    // }).catch((err) => {
    //     console.log(err);
    // });
</script>