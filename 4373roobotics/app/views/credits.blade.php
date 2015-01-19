@extends('layout')
@section('head')
<title>Website Credits</title>
<style>
	#mini-pane {
		padding-left: 10%;
		padding-right: 3%;
		float: center;
		text-align: center;
		padding-top: 1%;
		/*border: 1px solid #000;*/
		outline: 1px solid #808080;
		width: 60%;
		height: 40%;
	}
	#mini-pane a:link { color:#000; }
	#mini-pane a:visited { color:#000; }
	#mini-pane a:hover { color:#808080; }
	#mini-pane a:active { color:#000; }
</style>
@stop
@section('content')
<div id="mini-pane">
<h1>Credits:</h1>
<h3>John Rison:</h3>
<h4><i>(Mentor, Server Owner, Cool guy)</i></h4>
<a href="https://twitter.com/johnrison">Twitter</a>
<br>
<a href="https://www.linkedin.com/profile/view?id=37921952">LinkedIn</a>
<br>
<a href="http://www.johnrison.com">Website</a>
<hr>
<h3>Ben ThunderPorpoise Hollinger</h3>
<h4><i>(Team Leader, Server Administrator)</i></h4>
<a href="https://twitter.com/thunderporpoise">Twitter</a>
<br>
<a href="https://github.com/thunderporpoise">GitHub</a>
<br>
<hr>
<h3>Henry &quot;Tesla&quot; Pitcairn:</h3>
<h4><i>(Web Developer, Server Administrator, Web Design)</i></h4>
<!-- <br> -->
<a href="https://github.com/735tesla">GitHub</a>
<br>
<a href="https://keybase.io/tesla">Keybase.IO</a>
<br>
<a href="https://twitter.com/735tesla">Twitter</a>
<br>
<a href="http://stackexchange.com/users/2938721">
<img src="http://stackexchange.com/users/flair/2938721.png" width="208" height="58" alt="profile for 735Tesla on Stack Exchange, a network of free, community-driven Q&amp;A sites" title="profile for 735Tesla on Stack Exchange, a network of free, community-driven Q&amp;A sites"></a>
<hr>
</div>
</style>

@stop
@stop