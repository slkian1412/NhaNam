<head>
    @extends('head')
</head>
<table>
    @foreach ($books as $book)
        <div class=" col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="{{asset($book->images)}}" height="250px"
                     alt="{{$book->title}}"/>
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder {{$book->category_id}}">{{$book->title}}</h5>
                    </div>
                    <div
                        style="position: absolute; bottom: 70px; left: 0; right: 0 ;text-align: center; margin: 0px 50px 0px 50px; font-weight:bold; width: 130px ">
                        <!-- Product price-->
                        {{$book->price}} VND
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                                href="{{route('detail', ['id'=>$book->id])}}">Chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</table>
<div style="position: absolute; bottom: 0;">
    {!! $books->links() !!}
</div>
