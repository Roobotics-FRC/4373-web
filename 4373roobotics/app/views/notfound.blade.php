@extends('layout')
@section('head')
<title>Not Found</title>
<style type="text/css">
	#mini-pane {
		padding-left: 10%;
		padding-right: 3%;
		top:50px;
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
<img src="{{{ asset('images/broken_robot.jpg') }}}" style="height:300px;" />
<hr>
<h3>Haha, actually I'm not, this one's your fault.</h3><h5><br> The page you tried to access does not exist.<br>Please correct any typos in the URL and take an online typing course to improve your proficiency.</h5>
<hr><br>
</div>
@stop
@stop