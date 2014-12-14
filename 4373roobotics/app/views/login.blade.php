@extends('layout')
@section('head')
<title>Administrative Login</title>
<style type="text/css">
	#mini-pane {
		padding-left: 10%;
		padding-right: 3%;
		float: center;
		text-align: left;
		padding-top: 1%;
		outline: 1px solid #808080;
		width: 60%;
		height: 40%;
	}
</style>
@stop
@section('content')
<div id="mini-pane">
	<br><br><br>
	<h3>Login</h3>
	<hr>
	{{ Form::open(array('method' => 'post', 'url' => '/user/login')) }}
		<p>
			{{{ $errors->first('email') }}}
			{{{ $errors->first('password') }}}
			{{{ $errors->first('incorrect') }}}
		</p>
		<p>
			{{ Form::label('email', 'Email Address:') }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'codenamedutchess@abingtonfriends.net')) }}
		</p>
		<p>
			{{ Form::label('password', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:&nbsp;') }}
			{{ Form::password('password') }}
		</p>
		<p>{{ Form::submit('Login') }}</p>
	{{ Form::close() }}
	<br><br><br><br>
</div>
@stop
@stop