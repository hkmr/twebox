@if (Session::has('success') )	

	<script> 
	$.notify("{{ Session::get('success') }}",{
		type:"info",
		color: "#fff",
		background:"#4B7EE0",
		delay:3000,
		}); 
	</script>

@endif

<!-- This condition checks for error -->
@if (count($errors) > 0 )

		<ul>
			@foreach ($errors->all() as $error)
				<script>
					$.notify("{{ $error }}",{
						color: "#fff",
						background: "#D44950",
						delay:5000,
						close:true,
						}); 
				</script>

			@endforeach
		</ul>



@endif