@extends('layouts.front')

@section('content')
 

 <!-- Page Title -->
 <div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Blog</h1>
          <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.
          <div class="text-center">
    <a href="{{ route('articles.create') }}" class="btn btn-green">Add Articles</a>
</div>

          </p>
        </div>
      </div>
    </div>
  </div>

</div><!-- End Page Title -->
 <!-- Blog Posts Section -->
 @include('includes.alerts.success')
 @include('includes.alerts.errors')
 @isset($articles)
    <section  class="blog-posts section"  >

      <div class="container">
        <div class="row gy-4">

        @foreach($articles as $index => $article)
        <div class="col-lg-4 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-3' }}">
           
              <div class="post-img">
                <img  style="width: 356px; height: 267px;" src="{{asset('assets/'.$article-> photo)}}"  alt=""  class="img-fluid">
              </div>

              <p class="post-category">{{$article -> categories}}</p>

              <h2 class="title">
            
                <a href="{{ route('blog-details',$article->id) }}" >{{$article -> title}}</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="{{asset('assets/'.$article->user-> photo)}}"  alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-author">{{$article->user->first_name}}</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">{{$article ->created_at}}</time>
                  </p>
     
                </div>
              </div>
          </article>
          </div><!-- End post list item -->
          @endforeach
         @endisset

        </div>
      </div>
    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

  @endsection
