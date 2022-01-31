<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Centro Odontológico</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../Atlantis/img/icon.ico" type="image/x-icon"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link async href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="/Atlantis/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../Atlantis/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="../../Atlantis/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../Atlantis/css/atlantis.min.css">
	<script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="wrapper">
            @include('layouts.partials.header')
			@include('layouts.partials.sidebar')
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="page-header">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card">
                                <div class="card-header">
                                    <canvas id="myChart" ></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['GUERRA AVALOS ALEXANDRA YESABELLA','SEGURA PUMA LUIS ALBERTO','ESQUIVEL GUTIERREZ LOLA'],
            datasets: [{
                label: '# of Votes',
                data: [3,2,4],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
<script src="../../Atlantis/js/core/jquery.3.2.1.min.js"></script>
<script src="../../Atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../Atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="../../Atlantis/js/core/popper.min.js"></script>
<script src="../../Atlantis/js/core/bootstrap.min.js"></script>
<script src="../../Atlantis/js/plugin/chart.js/chart.min.js"></script>
<script src="/Atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../../Atlantis/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script type="text/javascript" src="../../Atlantis/js/plugin/jqvmap/maps/jquery.vmap.world.js" charset="utf-8"></script>
<script src="../../Atlantis/js/plugin/chart-circle/circles.min.js"></script>
<script src="../../Atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../Atlantis/js/plugin/datatables/datatables.min.js"></script>
<script src="../../Atlantis/js/atlantis.min.js"></script>
<script src="../../Atlantis/js/plugin/select2.full.min.js"></script>


</html>