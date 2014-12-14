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
	<h3>User Login</h3>
	<hr>
	{{ Form::open(array('method' => 'post')) }}
	<h5>Username or Email: </h5>
	{{ Form::input('text', 'username', null) }}
	<br><br>
	<h5>Password: </h5>
	{{ Form::input('password', 'password', null) }}
	<br><br>
	{{ Form::input('submit', 'submit', 'Login') }}
	<br><br><br><br>
</div>
@stop
@stop