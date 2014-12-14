@extends('layout')
@section('head')
<title>Request Account</title>
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
	<h5 style="border:4px solid #aaa;padding:15px;"><i><b>Notice:</b><br><br>&nbsp;&nbsp;&nbsp;&nbsp;If you would like to upload pictures to the media gallery, add events to the schedule, or edit scouting data you will need to have an account on this site. To get an account, email a site administrator and then fill out the form below. Please only check the admin box if you actually need administrative privileges. If we do not agree with you your account will not be approved.</i></h5>
	<h3>Account Request Form:</h3>
	<hr>
	{{ Form::open(array('method' => 'post')) }}
		<p{{ ( $errors->first('email') || $errors->first('password') || $errors->first('first_name') || $errors->first('last_name') ) ? ' style="border:4px solid #faa;padding:15px;"><b>Error: </b><br>' : '>' }}
			{{{ $errors->first('email') }}}
			{{{ $errors->first('password') }}}
			{{{ $errors->first('first_name') }}}
			{{{ $errors->first('last_name') }}}
			{{{ $errors->first('admin') }}}
			{{{ $errors->first('incorrect') }}}
		</p>
		<p>
			{{ Form::label('first_name', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name:') }}
			{{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'Sterling')) }}
		</p>
		<p>
			{{ Form::label('last_name', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name:') }}
			{{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Archer')) }}
		</p>
		<p>
			{{ Form::label('email', 'Email Address:') }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'codenamedutchess@abingtonfriends.net')) }}
		</p>
		<p>
			{{ Form::label('password', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:&nbsp;') }}
			{{ Form::password('password') }}
		</p>
		<p>
			{{ Form::label('admin', 'Request administrative access: ') }}
			{{ Form::checkbox('admin', 'false', false) }}
		</p>
		<p>
			{{ Form::submit('Submit Account Request') }}
		</p>
	{{ Form::close() }}
	<br><br><br><br>
</div>
@stop
@stop