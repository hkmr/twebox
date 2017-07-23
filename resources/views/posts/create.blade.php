@extends('main')

@section('title','| Create New Post')

@section('description', 'create new post in tweBox')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

	 

@endsection

@section('content')

	<section id="portfolio-information" class="padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    
                    {!! Form::open(array('route' => 'posts.store' , 'data-parsley-validate' => '', 'files' => true)) !!}

                    <div class="form-group">
					{{ Form::label('title','Story Title:') }}
					{{ Form::text('title', null, array('class' => 'form-control' , 'required' => '' ,
					'maxlength' => '255', 'placeholder' => "What's Your Story Title")) }}
					</div>

					<div class="form-group">
					{{ Form::label('category_id', 'Story Category:') }}
					<select class="form-control" name='category_id'>
					</div>

					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
					</select>
					</div>

					<div class="form-group">
					{{ Form::label('tags', 'Story Tags:') }}
					<select class="form-control select2-multi" name='tags[]' multiple="multiple">

					@foreach ($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
						
					</select>
					</div>

					{{ Form::label('featured_image','Upload Story cover Image') }}
					{{ Form::file('featured_image') }}

					<div class="form-group">
					{{ Form::label('body','Story Body:') }}
					{{ Form::textarea('body', null, array('class' => 'form-control','id'=>'post-body')) }}
					</div>

					{{ Form::submit('PUBLISH  STORY', array('class' => 'btn btn-success btn-lg btn-block' ,'style' => 'margin-top:20px;')) }}
				{!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$(".select2-multi").select2({placeholder: "Select Your Tags."});
	</script>

	<script src='/js/tinymce/tinymce.min.js'></script>

	<script>
	    var editor_config = {
	        path_absolute : "{{ URL::to('/') }}/",
	        selector: "textarea",
	        menubar: false,
	        plugins: [
	            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	            "searchreplace wordcount visualblocks visualchars code fullscreen",
	            "insertdatetime media nonbreaking save table contextmenu directionality",
	            "emoticons template paste textcolor colorpicker textpattern textcolor"
	        ],
	        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | fontselect | forecolor | fontsizeselect",
	        content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],
	        relative_urls: false,
	        file_browser_callback : function(field_name, url, type, win) {
	            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
	            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	            if (type == 'image') {
	                cmsURL = cmsURL + "&type=Images";
	            } else {
	                cmsURL = cmsURL + "&type=Files";
	            }
	            tinyMCE.activeEditor.windowManager.open({
	                file : cmsURL,
	                title : 'Filemanager',
	                width : x * 0.8,
	                height : y * 0.8,
	                resizable : "yes",
	                close_previous : "no"
	            });
	        }
	    };
	    tinymce.init(editor_config);
	</script>

	 
@endsection