@extends('layouts.main')
@section('content')
    <div class="jumbotron">
            <h1 class="text-center">Pedigrab</h1>
    <!-- /#slider -->
    </div>
    <div id="slider-wrapper">
        <div id="slider" class="nivoSlider">
            <img src="images/slider/bg1.jpg" alt="image" width="680" title="photo1"  />
            <a href="#">
                <img src="images/slider/bg2.jpg" alt="" width="680" title="photo 2" />
            </a>
            <img src="images/slider/bg3.jpg" alt="image" width="680" title="photo 3" />
        </div>
    </div>
    <!-- /#demo -->

        <div class="row">
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>
        <hr>
    </div> <!-- /container -->
@endsection
