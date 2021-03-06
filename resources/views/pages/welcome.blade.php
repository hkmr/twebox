@extends('main')

@section('title' , '| HomePage')

@section('description' , 'tweblog ,best blogging sites ')


@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Twebox</h1>
                            <p class="pageInfo"><span class="type-it">WELCOME TO TWEBOX.COM <br>DISCOVER NEW STORIES AND SHARE TO WORLD.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="blog" >
        <div class="container">
            <div class="row">
                <p class="title head">Recent Stories</p>
                    <div class="col-md-9 col-sm-7">
                    <div class="infinite-scroll">
                    <div class="row grid">
                         @foreach($posts as $post)
                         <div class="col-md-9 col-sm-12 blog-padding-right blog-box grid-item">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                    @if($post->image == null)

                                    @else
                                    <img src="{{asset('/images/blog/' . $post->image)}}" class="img-responsive" alt="{{$post->title}}">
                                    @endif
                                    </a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="{{ route('blog.single', $post->slug) }}"><small>{{$post->created_at->diffForHumans()}}</small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <p class="post-title bold"><a href="{{ route('blog.single', $post->slug) }}">{{$post->title}}</a></p>
                                    <h3 class="post-author"><a href=" {{ '/profile/'. $post->user_id }} ">Posted by {{ $user->where('id',$post->user_id)->pluck('name')->first() }}</a></h3>
                                    <p>{{ substr(strip_tags($post->body), 0 ,250) }} {{ strlen(strip_tags($post->body)) >250 ? '...' : '' }}</p>
                                    <a href="{{ route('blog.single', $post->slug) }}" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="{{'/categories/'.$post->category->id }}"><i class="fa fa-tag fa-2x"></i>{{ $post->category->name }}</a></li>
                                            <li><a href="{{ route('blog.single', $post->slug) }}"><i class="fa fa-eye fa-2x"></i>{{ $post->views }} Views</a></li>
                                            <li><a href="{{ route('blog.single', $post->slug.'#comments') }}"><i class="fa fa-comment-o fa-2x"></i>{{ $post->comments()->count() }} Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                            {!! $posts->links() !!}

                    </div>
                      
                    </div>
                 </div>
                <!--/#blog-->


                 <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Popular Stories</h3>
                            @foreach($populars as $post)
                            <div class="media">
                                <div class="pull-left">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                    @if($post->image == null)
                                    
                                    @else
                                        <img src=" {{ asset('images/blog/'. $post->image) }} " alt="{{$post->name}}" height="52" width="52" />
                                    @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4><b><a href="{{ route('blog.single', $post->slug) }}">{{ substr(strip_tags($post->title), 0 ,50) }} {{ strlen(strip_tags($post->body)) >30 ? '...' : '' }}</a></b></h4>
                                    <p>posted {{$post->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            {{-- <ul class="nav navbar-stacked">
                              @foreach( $categories as $category)
                                <li><a href="{{'categories/'. $category->id }}">{{ $category->name }}<span class="pull-right">{{ $posts->where('category_id', $category->id)->count() }}</span></a></li>
                              @endforeach
                            </ul> --}}
                            @foreach( $categories as $category)
                                <form method="get" action="{{'categories/'. $category->id }}" style="display: inline; margin-bottom: 10px;">
                                    <button class="ui mini blue basic button" type="submit">{{ $category->name }}</button>
                                </form>
                            @endforeach
                        </div>

                        <!-- advertisment -->
                        <div class="sidebar-item tag-cloud">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog -->

@endsection