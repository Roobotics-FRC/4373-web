@extends('layout')

@section('head')
<link rel="stylesheet" href="{{ asset('css/mediagallery.css') }}">
<title>Team 4373 - Media</title>
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
<div class="about">
<a href="{{{ asset($image->file_path) }}}"><img src="{{{ asset($image->file_path) }}}" id="media-well" /></a>
<hr>
<p>
<a href="/image/download/&quot;{{{ $image->id }}}&quot;"><h4>Download {{{ explode(".", $image->name)[0] }}}</h4></a>
<h5><i>Submitted by {{{ $image->user->first_name . ' ' . $image->user->last_name }}} at {{{ $image->created_at }}}</i></h5>
&nbsp;&nbsp;&nbsp;&nbsp;{{{ $image->description }}}
</p>
</div>
<br><br><br><br><br>
@endforeach

@stop

@stop