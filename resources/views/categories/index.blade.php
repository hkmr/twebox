@extends('main')

@section('title', '| All Categories')

@section('description', 'tweBox all categories')

@section('content')
	
	<section id="company-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="about-us">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h2 class="bold">All Categories</h2>
                        <div class="row padding-bottom">

                            @foreach ( $categories as $category )

                            <div class="category-box">
                                <h3><a href="{{'categories/'.$category->id }}">{{ $category->name }}</a>  </h3>
                            </div>

                            @endforeach

                            <div class="blog-pagination">
                                {!! $categories->links(); !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="our-skills">
                            <h2 class="bold">Create New Category</h2>
                            
                            {!! Form::open([ 'route' => 'categories.store', 'method' => 'POST' ]) !!}

								{{ Form::label('name', 'Name:') }}
								{{ Form::text('name', null, ['class' => 'form-control']) }}<br>

								{{ Form::submit('Create', ['class' => 'btn btn-primary btn-block']) }}

							{!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category -->

@endsection