{{-- -- message success -- --}}

@if ($message = Session::get('success'))
    <div  class="container w-25 my-5 alert alert-success alert-block">
	    <strong>{{$message}}</strong>
	</div>
@endif

{{-- -- message warning -- --}}

@if ($message = Session::get('warning'))
    <div  class="container w-25 my-5 alert alert-warning alert-block">
	    <strong>{{$message}}</strong>
	</div>
@endif

{{-- -- message error-- --}}

@if ($errors->any())
    <div  class="container w-25 my-5 alert alert-danger">
	    <ul>
		    @foreach ($errors->all() as $error)
			    <li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

{{-- -- message success -- --}}

@if ($message = Session::get('statut'))
    <div  class="container w-25 my-5 alert alert-primary alert-block">
	    <strong>{{$message}}</strong>
	</div>
@endif