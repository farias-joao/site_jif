@extends('site.home.master')

@section('title','Notícias')

@section('content')
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <h2>Ultimas Notícias</h2>
            <div class="row">
                <div class="col-lg-8">
                    @if(isset($notices))
                        @foreach($notices as $notice)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{url("storage/images/{$notice->image}")}}" alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{$notice->user->type}}</a></li>
                                        <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>{{count($notice->comments)}}
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h3>{{$notice->title}}</h3>
                                    </a>
                                    <p>{{substr($notice->content,0,10)}}...</p>
                                    <a class="button" href="{{ action('Site\NoticeController@show', $notice) }}">Leia Mais <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="single-recent-blog-post">
                            <h2>Nenhuma Notícia Cadastrada/h2>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-left"></i>
                                  </span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <i class="ti-angle-right"></i>
                                  </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Blog Post Area =================-->

@endsection