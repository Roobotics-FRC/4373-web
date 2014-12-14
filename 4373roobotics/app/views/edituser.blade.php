@extends('layout')
@section('head')
<title>{{{ Sentry::getUser()->first_name }}}</title>
<style type="text/css">
	.img_preview {
		width: 50px;
		height: 50px;
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
@if (Sentry::check())
	<h3>Change password:</h3>
	{{ Form::open(array('methodd'=>'POST', 'url'=>'/account/' . Sentry::getUser()->id . '/changepassword')) }}
		<p>
			{{{ $errors->first('oldpassword') }}}
			{{{ $errors->first('newpassword') }}}
			{{{ $errors->first('confirmnewpassword') }}}
		</p>
		<p>
			{{ Form::label('oldpassword', 'Current Password: ') }}
			{{ Form::password('oldpassword') }}
		</p>
		<p>
			{{ Form::label('newpassword', 'New Password: ') }}
			{{ Form::password('newpassword') }}
		</p>
		<p>
			{{ Form::label('newpassword_confirmation', 'Confirm New Password: ') }}
			{{ Form::password('newpassword_confirmation') }}
		</p>
		<p>
			{{ Form::submit('Change password') }}
		</p>
	{{ Form::close() }}
	<h3>Edit Info:</h3>
	@if (!Sentry::getUser()->hasAccess('admin'))
		<h3>Update Name</h3>
		{{ Form::open(array('method' => 'POST', 'url' => "/account/" . Sentry::getUser()->id . '/edit')) }}
			<p>
				{{ Form::label('first_name', 'First Name: ') }}
				{{ Form::text('first_name', Sentry::getUser()->first_name) }}
			</p>
			<p>
				{{ Form::label('last_name', 'Last Name: ') }}
				{{ Form::text('last_name', Sentry::getUser()->last_name) }}
			</p>
			<p>
				{{ Form::submit('Change Name') }}
			</p>
		{{ Form::close() }}
	@else
		@foreach (User::all() as $cur_user)
			<h4>Update Name For: {{{ $cur_user->email }}}:</h4>
			{{ Form::open(array('method' => 'POST', 'url' => "/account/" . $cur_user->id . '/edit')) }}
				<p>
					{{{ $errors->first('first_name') }}}
					{{{ $errors->first('last_name') }}}
				</p>
				<p>
					{{ Form::label('first_name', 'First Name: ') }}
					{{ Form::text('first_name', $cur_user->first_name) }}
				</p>
				<p>
					{{ Form::label('last_name', 'Last Name: ') }}
					{{ Form::text('last_name', $cur_user->last_name) }}
				</p>
				<p>
					{{ Form::submit('Change Name') }}
				</p>
			{{ Form::close() }}
			<hr>
		@endforeach
	@endif
@endif
</div>
@stop
@stop