<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <script>
        setTimeout(function () {
            document.getElementById('alert').style.display = 'none';
        }, 4000);
    </script>
</head>

<table class="table table-striped table-bordered">
    @if ($message = session('success'))
        <div id="alert" class="alert alert-success">{{ $message }}</div>
    @endif

    @if ($message = session('fail'))
        <div id="alert" class="alert alert-danger">{{ $message }}</div>
    @endif

    @if ($message = session('status'))
        <div id="alert"class="alert alert-success">{{ $message }}</div>
    @endif


    <thead>

    <tr style="text-align: center">
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Tác giả</th>
        <th>Mô tả</th>
        <th>Nhà xuất bản</th>
        <th>Giá</th>
        <th>Bìa</th>
        <th>Tùy chọn</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td style="width: 100px">{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td><span class="description">{{ $book->description }}</span>
            </td>
            <td style="width: 120px">{{ $book->publisher }}</td>
            <td>{{ $book->price }} VND</td>
            <td style="width: 150px"><img src="{{url($book->images)}}" width="150px" height="auto"></td>
            <td>
                <button>
                    <a href="{{route('edit', ['id'=>$book->id])}}"><i
                            class="btn bi-pencil bg-primary"></i></a>
                </button>

                <form method="POST" onsubmit="return confirm('Xác nhận xóa?')"
                      action="{{ route('delete', ['id'=>$book->id]) }}">

                    @csrf
                    <input type="hidden" value="DELETE" name="_method">

                    <button type="submit"><a><i class="btn bg-danger bi-trash"></i></a></button>

                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="float-right">
    {!! $books->links() !!}
</div>
