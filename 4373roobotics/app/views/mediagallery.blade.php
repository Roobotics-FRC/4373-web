@extends('layout')

@section('head')
<meta name="keywords" content="4373, abington friends, afs, robotics, frc, first, images" />
<meta name="description" content="Pictures from FRC Team 4373" />
<meta name="DC.title" content="FRC team 4373 - Media" />
<link rel="stylesheet" href="{{ asset('css/mediagallery.css') }}">
<title>FRC Team 4373 - Media</title>
<style type="text/css">
	#media-well {
		height:80%;
		width:80%;
		display: block;
	    margin-left: auto;
	    margin-right: auto;
	}
</style>
@stop

@section('content')
<!-- <p>hello world</p> -->
<div id="background">

<!-- <img src="{{ asset('images/header2.jpg') }}" style="width:100%;padding:0px;pading-left:0px;position:fixed;"> -->
</div>
@foreach (Image::orderBy('ID', 'DESC')->get() as $image)
	@if (Sentry::check() || ($image->public == true))
		<div class="about">
			<a href="{{{ asset($image->file_path) }}}"><img src="{{{ asset($image->file_path) }}}" id="media-well" alt="{{{ explode(".", $image->name)[0] }}}" /></a>
			<hr>
			<p>
			<a href="/image/download/{{{ $image->id }}}"><h4>Download &quot;{{{ explode(".", $image->name)[0] }}}&quot;</h4></a>
			<h5><i>Submitted by {{{ $image->user->first_name . ' ' . $image->user->last_name }}} at {{{ $image->created_at }}}</i></h5>
			&nbsp;&nbsp;&nbsp;&nbsp;{{{ $image->description }}}
			{{ $image->public != true ? Sentry::getUser()->hasAccess('admin') ? "<br><br><i>This image is not currenly public. <a href=\"/image/togglepublic/$image->id?_token=" . Session::token() . "\">(Change that)</a></i>" : "<br><br><i>This image is not currenly public.</i>" : "" }}
			</p>
		</div>
		<br><br><br><br><br>
	@endif
@endforeach

@stop

@stop