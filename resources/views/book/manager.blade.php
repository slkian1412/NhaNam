<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Nhà sách Nhã Nam</title>
    <style>
        .description {
            width: 400px;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

</head>
<x-app-layout>
    <body>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_user_data(page);
            });

            function fetch_user_data(page) {
                $.ajax({
                    url: "/manager-ajax?page=" + page,
                    success: function (data) {
                        $('#table_data').html(data);
                    }
                });
            }
        });
    </script>
    <div class="container-xl" style="margin-top: 30px; ">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6" style="text-align: left">
                            <h2>Quản lý <b>Sách</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success " style="float: right"
                               data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Thêm đầu sách</span></a>
                        </div>
                    </div>
                </div>
                <div id="table_data">
                    @include('book/pagination_manager')
                </div>
            </div>

        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" name="publisher" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" name="images" class="form-control-file" multiple>
                        </div>
                        <div class="modal-footer">
                            <button type="cancel" class="btn btn-primary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </body>
</x-app-layout>

<footer>
    @include('footer')
</footer>
