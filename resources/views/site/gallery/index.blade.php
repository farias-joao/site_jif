@extends('site.home.master')

@section('title','Galeria')

@section('content')

    <div class="container">
        <div class="box">
            <div class="box-body">
                <div class=" sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="single-sidebar-widget__title">Galeria</h4>
                            @foreach($gallery as $image)
                                <figure class="image"><img alt="{{$image->title}}" height="472"
                                                           src="{{url("storage/images/gallery/{$image->path}")}}"
                                                                   width="630">
                                    <figcaption>{{$image->title}}</figcaption>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection