@extends('layout')
@section('head')
<title>{{{ Sentry::getUser()->first_name }}}</title>
<style type="text/css">
	.img_preview {
		width: 10%;
		height: 10%;
	}
	#mini-pane {
		padding-left: 10%;
		padding-right: 3%;
		float: center;
		text-align: left;
		padding-top: 1%;
		outline: 1px solid #808080;
		width: 85%;
		height: 40%;
	}
	#mini-pane a:link { color:#000; }
	#mini-pane a:visited { color:#000; }
	#mini-pane a:hover { color:red;font-weight:bold;font-style: italic;text-decoration: none; }
	#mini-pane a:active { color:#000; }
</style>
@stop
@section('content')
<div id="mini-pane">
	<h3>Add Images to Media Gallary</h3>
	{{ Form::open(array('method' => 'POST', 'url' => '/image/upload', 'files'=>true)) }}
		<p>
			{{{ $errors->first('image') }}}
		</p>
		<p>
			{{ Form::file('images[]', array('multiple'=>true)) }}
		</p>
		<p>
			{{ Form::label('description', 'Image description: ') }}
			{{ Form::text('description', Input::old('description'), 
				array('placeholder'=>'Yup yup yup')) }}
		</p>
		<p>
			{{ Form::submit('Upload') }}
		</p>
	{{ Form::close() }}
	<br><hr><br>
	<h3>My Images:</h3>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>ID</th>
				<th>Image</th>
				<th>Name</th>
				<th>Desciption</th>
				<th>Actions</th>
			</thead>
			<tbody>
				@foreach (Sentry::getUser()->images as $image)
					<tr>
						<td>{{{ $image->id }}}</td>
						<td><a href="{{{ asset($image->file_path) }}}"><img src="{{{ asset($image->file_path) }}}" alt="{{{ $image->name }}}" class="img_preview" /></a></td>
						<td>{{{ $image->name }}}</td>
						<td>{{{ $image->description }}}</td>
						<td><a href="/image/delete/{{{ $image->id }}}?_token={{{ Session::token() }}}">Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<br><hr><br>
	<h3>Other Users' Images:</h3>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>User</th>
				<th>ID</th>
				<th>Image</th>
				<th>Name</th>
				<th>Desciption</th>
			</thead>
			<tbody>
				@foreach ( (Image::whereNotIn( 'user_id', array(Sentry::getUser()->id) )->get()) as $image)
					<tr>
						<td>{{{ $image->user->first_name }}}</td>
						<td>{{{ $image->id }}}</td>
						<td><a href="{{{ asset($image->file_path) }}}"><img src="{{{ asset($image->file_path) }}}" alt="{{{ $image->name }}}" class="img_preview" /></a></td>
						<td>{{{ $image->name }}}</td>
						<td>{{{ $image->description }}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
@stop