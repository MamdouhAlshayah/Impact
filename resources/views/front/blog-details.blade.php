@extends('layouts.front')

@section('content')


@include('includes.alerts.success')
@include('includes.alerts.errors')
<main class="main">

<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Blog Details</h1>
          <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
        </div>
      </div>
    </div>
  </div>

</div><!-- End Page Title -->

<div class="container">
  <div class="row">

    <div class="col-lg-8">

      <!-- Blog Details Section -->
      <section id="blog-details" class="blog-details section">
        <div class="container">

          <article class="article">

            <div class="post-img">
              <img  src="{{asset('assets/'.$article  -> photo)}}" alt="" class="img-fluid">
            </div>

            <h2 class="title">{{$article -> title}}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$article ->user->first_name}}<tr>{{$article ->user->last_name}}  </a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{$article ->created_at}}</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">{{$article ->comments->count()}}</a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
              <blockquote>
                <p>
                {{$article -> content}}                </p>
              </blockquote>

            </div><!-- End post content -->

          </article>

        </div>
      </section><!-- /Blog Details Section -->

      <!-- Blog Author Section -->
      <section id="blog-author" class="blog-author section">

        <div class="container">
          <div class="author-container d-flex align-items-center">
            <img src="{{asset('assets/'.$article  ->user-> photo)}}" class="rounded-circle flex-shrink-0" alt="">
            <div>
              <h4>{{$article ->user->first_name}} <tr> {{$article ->user->last_name}}</h4>
              <!--<div class="social-links">
                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
              </div> -->
              <p>
                {{$article ->user->bio}}
              </p>
            </div>
          </div>
        </div>

      </section><!-- /Blog Author Section -->

      <section id="blog-comments" class="blog-comments section">
                    <div class="container">
                        <h4 class="comments-count"></h4>
                        @foreach ($article->comments as $comment)
                        <div id="comment-{{ $comment->id }}" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="{{asset('assets/'.$comment->user-> photo)}}" alt=""></div>
                                <div>
                                    <h5><a href="">{{$comment ->user->first_name}} <tr> {{$comment ->user->last_name}}</a> <a  class="reply"><i class="bi bi-reply-fill"></i> </a></h5>
                                    <time datetime="{{ $comment->created_at }}">{{ $comment->created_at }}</time>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div><!-- End comment -->
                        @endforeach
                    </div>
                </section><!-- /Blog Comments Section -->
     

      <!-- Comment Form Section -->
      <section id="comment-form" class="comment-form section">
        <div class="container">

          <form action="{{ route('comment.store',$article->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

            <h4>Post Comment</h4>
           
  
            <div class="row">
              <div class="col form-group">
                <textarea name="content" class="form-control" placeholder="Your Comment*"></textarea>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>

          </form>

        </div>
      </section><!-- /Comment Form Section -->

    </div>

    <div class="col-lg-4 sidebar">

      <div class="widgets-container">

        Search Widget 
        <div class="search-widget widget-item">
 <!--
          <h3 class="widget-title">Search</h3>
          <form action="">
            <input type="text">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
          </form>

        </div>/Search Widget -->

        <!-- Categories Widget -->
        <div class="categories-widget widget-item">

          <h3 class="widget-title">Categories</h3>
          <ul class="mt-3">
            <li><a href="#">General <span>(25)</span></a></li>
            <li><a href="#">Lifestyle <span>(12)</span></a></li>
            <li><a href="#">Travel <span>(5)</span></a></li>
            <li><a href="#">Design <span>(22)</span></a></li>
            <li><a href="#">Creative <span>(8)</span></a></li>
            <li><a href="#">Educaion <span>(14)</span></a></li>
          </ul>

        </div><!--/Categories Widget -->

        <!-- Recent Posts Widget -->
        <div class="recent-posts-widget widget-item">

          <h3 class="widget-title">Recent Posts</h3>

          <div class="post-item">
            <img  src="{{asset('assets/'.$article  -> photo)}}" alt="" class="flex-shrink-0">
            <div>
              <h4><a href="blog-details.html">{{$article ->title}}</a></h4>
              <time datetime="2020-01-01">{{$article ->created_at}}</time>
            </div>
          </div><!-- End recent post item-->

 
        </div><!--/Recent Posts Widget -->

        <!-- Tags Widget -->
        <div class="tags-widget widget-item">

          <h3 class="widget-title">Tags</h3>
          <ul>
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
          </ul>

        </div><!--/Tags Widget -->

      </div>

    </div>

  </div>
</div>

</main>
@endsection
