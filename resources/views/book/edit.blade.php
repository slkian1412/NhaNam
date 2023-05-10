<head>
    @extends('head')
</head>
<x-app-layout>
<body>
<div class="container table-bordered" style="width: 40%; margin-top:40px">
    <div>
        <div class="col-sm-6 row">
            <h2><b>Sửa thông tin sách</b></h2>
        </div>
    </div>
    <div class="container-xl">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{route('update', ['id' => $book->id])}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" class="form-control" name="title" value="{{$book->title}}">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tác giả:</label>
                <input type="text" class="form-control" name="author" value="{{$book->author}}">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <textarea type="text" rows="10" class="form-control" name="description">{{$book->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Nhà xuất bản:</label>
                <input type="text" class="form-control" name="publisher" value="{{$book->publisher}}">
            </div>
            <label>Giá:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="price" value="{{$book->price}}" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1">VND</span>
            </div>
            <div class="form-group">
                <label>Bìa:</label>
                <input type="file" class="form-control" name="images">
                <img src="{{url($book->images)}}" alt="">
            </div>

            <button type="submit" class="btn btn-primary float-right">Lưu</button>
        </form>
    </div>
</div>
</body>

</x-app-layout>

