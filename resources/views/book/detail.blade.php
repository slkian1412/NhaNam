<!DOCTYPE html>
<html lang="en">

<head>
    @extends('head')
</head>
<x-app-layout>
<body>
<div class="container-fluid" style="margin-top: 50px">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <img src="{{url($books->images)}}" style="width: 400px" alt="">
        </div>

        <div class="col-sm-9">
            <h4><small><b>Thông tin sách</b></small></h4>
            <hr>
            <h2>{{$books->title}}</h2>
            <h5><span class="label label-danger">{{$books->author}}</span></h5><br>
            <p>{{$books->description}}</p>
            <br><br>


            <h4>Bình luận:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <br><br>

            <p><span class="badge">2</span> Comments:</p><br>

            <div class="row">
                <div class="col-sm-2 text-center">
                    <img src="/books/images/bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
                    <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <br>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="/books/images/bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
                    <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua.</p>
                    <br>
                    <p><span class="badge">1</span> Comment:</p><br>
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <img src="/books/images/bandmember.jpg" class="img-circle" height="65" width="65"
                                 alt="Avatar">
                        </div>
                        <div class="col-xs-10">
                            <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
                            <p>Me too! WOW!</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    @include('footer')
</footer>

</body>
</x-app-layout>
</html>

