@extends('site.home.master')

@section('title','Noticia')

@section('content')
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid" src={{asset("storage/images/$notice->image")}} alt="">
                        <div class="user_details">
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        @if(isset($notice))
                                            <h5>{{$notice->user->name}}</h5>
                                            <p>12 Dec, 2017 11:21 am</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42" src="img/blog/user-img.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{{$notice->content}}</p>
                        <div class="news_d_footer flex-column flex-sm-row">
                            <a class="align-middle mr-2" href=""><i
                                        class="ti-themify-favicon"></i></span>{{count($notice->comments)}}</a>
                            <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h2>Comentários</h2>
                        @foreach($notice->comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c1.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">{{$comment->author_comment_name}}</a></h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                            <p class="comment">
                                                {{$comment->content}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="comment-form">
                        <h4>Deixe um comentário</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Nome"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Comentario"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comentario'"
                                          required=""></textarea>
                            </div>
                            <a href="#" class="button submit_btn">Enviar Comentário</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection