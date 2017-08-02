@extends('main')

@section('title', '| Edit Post')

@section('description', 'edit your twebox posts')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

	<section id="portfolio-information" class="padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    
                    {!! Form::model($post , ['route' => ['posts.update', $post->id] ,'method' => 'PUT' ,'files' => true ]) !!}

                    {{ Form::label('title', 'Title:') }}
					{{ Form::text('title',null, ['class'=> 'form-control input-lg'] ) }}

					{{ Form::label('category_id', 'Category:',['class'=> 'form-spacing-top' ]) }}
					{{ Form::select('category_id', $categories, null, ['class' => 'form-control ']) }}

					{{ Form::label('featured_image','Update cover Image:', ['class' => 'form-spacing-top']) }}
					{{ Form::file('featured_image') }}

					{{ Form::label('body', 'Body:' , ['class'=> 'form-spacing-top' ]) }}
					{{ Form::textarea('body', null, ['class'=> 'form-control'] ) }}

                </div>

					<div class="col-md-3 col-sm-5">
	                    <div class="sidebar blog-sidebar">
	                        <div class="sidebar-item  recent">
	                            <div class="media">
	                                {{ date('j M, Y h:ia',strtotime($post->created_at) ) }}
	                            </div>
	                            <div class="media">
	                                {{ date('j M, Y h:ia',strtotime($post->updated_at) ) }} 
	                            </div>
	                            <div class="media">
	                                {!! Html::linkRoute('posts.show', 'Cancel' , array($post->id), array('class' => 'btn btn-danger btn-block') ) !!}
	                            </div>
	                            <div class="media">
	                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
	                            </div>
	                        </div>
	                        
	                        <div class="sidebar-item tag-cloud">
	                            <h3>Advertisment</h3>
	                            
	                        </div>
	                    </div>
	                </div>


					{!! Form::close() !!}

            </div>
        </div>
    </section>

@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$(".select2-multi").select2();
		$(".select2-multi").select2().val( {!! json_encode($post->tags()->allRelatedIds()) !!} ).trigger('change');
	</script>

	<script src='/js/tinymce/tinymce.min.js'></script>

	<script>
	    var editor_config = {
	        path_absolute : "{{ URL::to('/') }}/",
	        selector: "textarea",
	        plugins: [
	            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	            "searchreplace wordcount visualblocks visualchars code fullscreen",
	            "insertdatetime media nonbreaking save table contextmenu directionality",
	            "emoticons template paste textcolor colorpicker textpattern textcolor"
	        ],
	        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | fontselect | forecolor | fontsizeselect",
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
