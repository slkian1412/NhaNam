<head>
    @include('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .hovered-card {
            transform: scale(1.15) !important;
            transition: transform 0.25s ease-in-out;
        }
    </style>
</head>
<x-app-layout>
    <body>
    <script>
        $(document).on('keyup', function (e){
            e.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url:"{{ route('search') }}",
                method: 'GET',
                data:{search_string:search_string},
                success:function (res){
                    $('#table_data').html(res);
                }
            });
        })
    </script>
    @include('header')
    <section class="py-5 ">
        <div class="container px-4 px-lg-5 mt-5">
{{--            <form method="GET">--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <input--}}
{{--                        type="text"--}}
{{--                        name="search"--}}
{{--                        value="{{ request()->get('search') }}"--}}
{{--                        class="form-control"--}}
{{--                        placeholder="Search..."--}}
{{--                        aria-label="Search"--}}
{{--                        aria-describedby="button-addon2">--}}
{{--                    <button class="btn btn-success" type="submit" id="button-addon2">Search</button>--}}
{{--                </div>--}}
{{--            </form>--}}
            <input type="text" name="search" id="search" class="mb-4 form-control" placeholder="Search here...">
{{--            <div align="center">--}}
{{--                @foreach($categories as $category)--}}
{{--                    <button class="btn btn-primary filter-button " data-filter="all">{{$category->name}}</button>--}}
{{--                @endforeach--}}
{{--            </div>--}}
            <hr>
            <div id="table_data" class="row gx-5 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" style="position: relative;">
                @include('book/pagination_books')
            </div>
        </div>
    </section>
    </body>
</x-app-layout>

<footer>
    @include('footer')
</footer>
