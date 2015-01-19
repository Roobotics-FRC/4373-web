@extends('layout')

@section('head')
<meta name="keywords" content="4373, abington friends, afs, robotics, frc, first" />
<meta name="description" content="The website of FRC Team 4373" />
<meta name="DC.title" content="FRC team 4373" />
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
<title>FRC Team 4373</title>
@stop

-@section('content')
<!-- <p>hello world</p> -->
<div id="background">

<!-- <img src="{{ asset('images/header2.jpg') }}" style="width:100%;padding:0px;pading-left:0px;position:fixed;"> -->
</div>
<div class="about">
<img src="/images/homepic.png" alt="programming" style="width:auto;max-height:60% auto;display:block;margin-left:auto;margin-right:auto;margin: 0 auto;max-width:96%;" /><br>
<h3>Robotics at <a class="bodylink" href="http://www.abingtonfriends.net/Home/Home">AFS</a></h3>
<p class="bodytext">
On any day of the week you’ll find a lively throng of students brainstorming, coding and building in the Upper School robotics lab. “Students pick up a lot of valuable skills here, above and beyond what they learn in the classroom,” says Upper School Math, Science and Engineering Teacher John Silvers.  The hands-on, practical skill building involved in designing and creating a robot engages students on multiple levels. Working together as a team they learn to problem solve, take risks, bounce back from failure and reach for creative, innovative solutions. While developing these vital 21st- century skills, they’re also having a whole lot of fun!
</p>

<br><hr>
<h3>FIRST Robotics Competition</h3>
<p class="bodytext">
For the last three years the AFS Robotics Team has taken part in the FIRST Robotics Competition, an international high school robotics competition. Each January a new challenge (design a robot that can shoot hoops, launch Frisbees, etc) is delivered to all teams, along with a standardized kit of motors, parts and computer components. After six weeks of intense problem solving, prototyping, writing code and building, the teams face off in district and regional events. In its first year of competition, our team scored the most points of any rookie team. Last year, they advanced to the regionals and won the Industrial Design Award.
</p>
</div>
<br><br><br><br><br>
@stop

@stop
