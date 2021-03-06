@extends('main')

@section('title' , '| View Post')

@section('description', 'show all your twebox posts')

@section('content')

		<section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <a href="{{ route('blog.single', $post->slug) }}">
                                    @if($post->image == null)
                                    <!-- <img src=" {{ asset('images/blog/blog-default.jpg') }} " alt="default-image" class="img-responsive" /> -->

                                    @else
                                    <img src="{{asset('/images/blog/' . $post->image)}}" class="img-responsive" />

                                    @endif
                                    </a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="{{ route('blog.single', $post->slug) }}"><small>{{ $post->created_at->diffForHumans() }}</small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }} </a></h2>
                                    <p>Read time: <span class="eta"></span></p>
                                    <h3 class="post-author"><a href="{{ '/profile/'. $post->user_id }}">Posted by {{ $users->where('id',$post->user_id)->pluck('name')->first() }}</a></h3>
                                    <div class="post-body">
                                    <article>
                                        <p>{!! $post->body !!}</p>
                                    </article>
                                    </div>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><i class="fa fa-tag"></i> {{ $post->category->name }}</li>
                                            <li><i class="fa fa-eye"></i> {{$post->views}} Views</li>
                                            <li><i class="fa fa-comments"></i> {{ $post->comments()->count() }} Comments</li>
                                        </ul>
                                        <ul class="nav navbar-nav post-nav">
                                        	
												<li>
												<span id="tags-container"></span>
												</li>
										</ul>
                                    </div>
                                    
                                    
                                    <div class="response-area" id="comments">
                                    <h2 class="bold">Comments</h2>
                                    <ul class="media-list">
                                    	@foreach( $post->comments as $comment)

                                    
                                        <li class="media">
                                            <div class="post-comment">
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posted by <a href="{{ $comment->user_id }}">{{ $comment->name }}</a></span>
                                                    <p> {{ $comment->comment }} </p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><a href="#"><i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>                   
                                </div><!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <div class="media">
                                {!! Html::linkRoute('posts.edit', 'Edit' , array($post->id), array('class' => 'btn btn-primary btn-block') ) !!}
                            </div>
                            <div class="media">
                                {!! Form::open([ 'route' =>['posts.destroy',$post->id] , 'method' => 'DELETE' ]) !!}

                                {!! Form::submit('Delete' , ['class' => 'btn btn-danger btn-block' ,'onclick'=> 'return confirm("Delete This story ?")', 'id'=>'delete']) !!}

								{!! Form::close() !!}
                            </div>
                            <div class="media">
                                {{ Html::linkRoute('posts.index', '<< See all Posts', [], ['class' => 'btn btn-warning btn-block'] ) }}
                            </div>
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                              @foreach( $categories as $category)
                                <li><a href="{{'categories/'. $category->id }}">{{ $category->name }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                            <h3>Advertisment</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->


@endsection