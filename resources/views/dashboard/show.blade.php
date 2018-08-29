@extends('layouts.master')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />
   @section('content')
               <div class="content">
                <div class="container-fluid">
                  <div class="row">
<style>
body {
	width: 100wh;
	height: 90vh;
	color: #fff;
		background: linear-gradient(-45deg, #29404c, #721d3e, #134456, #216354);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

h1,
h6 {
	font-family: 'Open Sans';
	font-weight: 300;
	text-align: center;
	position: absolute;
	top: 45%;
	right: 0;
	left: 0;
}</style>


                             <div class="col-lg-3 col-md-3 col-sm-6"> 
                              <a href="{{ url('/members') }}">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="purple">
                                   <i class="material-icons">&#xE85E;</i>
                                     <h3 class="title">                            
                                       {{ $total_members }}
                                   </h3>
                                </div>
                                <div class="card-content">
                                    <p>Members</p>                                   
                                </div>
                            </div>
                          </a>
                        </div>
                             <div class="col-lg-3 col-md-3 col-sm-6">
                              <a href="{{ url('/issues') }}">            
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                   <i class="material-icons">gavel</i>
                                     <h3 class="title">                            
                                       {{ $total_issue_qty }}

                                    </h3>
                                </div>
                                <div class="card-content">
                                    <p>Borrowed Books</p>                                   
                                </div>
                            </div>
                          </a>

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                              <a href="{{ url('issues_not_returned') }}">            
                            <div class="card card-stats">
                              @if ($total_issue_not_retrun_qty > 0)
                              <div class="card-header" data-background-color="red">                            
                              @else
                                <div class="card-header" data-background-color="green">
                                    @endif
                               <i class="material-icons">assignment_return</i>
                                     <h3 class="title">                            
                                       {{ $total_issue_not_retrun_qty }}

                                    </h3>
                                </div>
                                <div class="card-content">
                                    <p>Not returned books</p>                                          
                                </div>
                            </div>
                          </div>
                          </a>

                        </div>
                  </div>
                  <div class="row">
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:black;
   color: white;
   text-align: center;
}
</style>
                    <div class="footer">
                            <center><h6>Copyright 2018. All rights reserved.</h6>
    <h7>Designed and Developed by <a href="https://www.facebook.com/lg.loges" target="_blank">LOGES </a> & ZUREEN </h7></center>
                     
                    </div>
                  </div>
               </div>
               </div>
<script type="text/javascript">
  
var ctx = document.getElementById("myChart").getContext('2d');
 ctx.height = 400;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
       labels: [
    @foreach($chart as $key => $value)
      "{{ \Carbon\Carbon::parse($key)->formatLocalized('%d %b') }}",
    @endforeach

  ],
        datasets: [{
            label: "Issues",                    
            data: [
    @foreach($chart as $key => $value)
      {{$value}},
    @endforeach
    ],
      backgroundColor: 'rgba(0, 0, 0, 0.1)',
      borderColor: 'rgba(0, 192, 255, 1)',
      borderWidth: 3
        }]
    },
options: {
  legend: {
            labels: {
                fontColor: 'rgba(62, 62, 62, 1)',
                fontSize: 18
            }
        },

   elements: {
        line: {
            tension: 0
        }
    },
  maintainAspectRatio: false,
 responsive: true,
  showTooltips: true, 
  multiTooltipTemplate: "<%= value %>",
        scales: {
            yAxes: [{
              gridLines: {
        zeroLineColor: 'rgba(240, 240, 240, 1)',
         color: 'rgba(240, 240, 240, 1)'
    },
                ticks: {
                  fontColor: 'rgba(62, 62, 62, 1)',
                    fontSize: 12,
                    stepSize: 1,
                    beginAtZero:true,
                    userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 }
                }
            }],
            xAxes: [{
              gridLines: {
        zeroLineColor: 'rgba(240, 240, 240, 1)',
         color: 'rgba(240, 240, 240, 1)'
    },
                ticks: {
                    fontColor: 'rgba(62, 62, 62, 1)',
                    fontSize: 12,
                    stepSize: 1,
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
   @endsection