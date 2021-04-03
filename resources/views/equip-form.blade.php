<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>EQUIPMENT</title>

	<style type="text/css">
		body {
			font-family: arial, verdana, sans-serif;
		}
        @page {
        size: 4.5in 8.5in;
        }

		.row {
		    max-width: 85.7142857143rem;
		    margin-left: auto;
		    margin-right: auto
		}

		.row::before,
		.row::after {
		    content: ' ';
		    display: table
		}

		.row::after {
		    clear: both
		}

		.row.collapse>.column,
		.row.collapse>.columns {
		    padding-left: 0;
		    padding-right: 0
		}

		.row .row {
		    max-width: none;
		    margin-left: -.7142857143rem;
		    margin-right: -.7142857143rem;
		    max-width: none
		}

		.row .row.collapse {
		    margin-left: 0;
		    margin-right: 0
		}

		.row.expanded {
		    max-width: none
		}

		.row.expanded .row {
		    margin-left: auto;
		    margin-right: auto
		}

		.column,
		.columns {
		    width: 100%;
		    float: left;
		    margin-bottom: 10px;
		}

		.medium-1 {
		    width: 8.3333333333%;
		}
		.medium-2 {
		    width: 16.6666666667%;
		}
		.medium-3 {
		    width: 25%;
		}
		.medium-4 {
		    width: 33.3333333333%;
		}
		.medium-5 {
		    width: 41.6666666667%;
		}
		.medium-6 {
		    width: 50%;
		}
		.medium-7 {
		    width: 58.3333333333%;
		}
		.medium-8 {
		    width: 66.6666666667%;
		}
		.medium-9 {
		    width: 75%;
		}
		.medium-10 {
		    width: 83.3333333333%;
		}
		.medium-11 {
		    width: 91.6666666667%;
		}
		.medium-12 {
		    width: 100%;
		}

		.b-b {
			border-bottom: 1px solid #353535;
		}

		.font-12 {
			font-size: 12px;
		}

		.m-l-10 {
			margin-left: 10px;
		}
		.m-l--20 {
			margin-left: -20px;
		}
		.m-l--35 {
			margin-left: -35px;
		}
		.m-l--40 {
			margin-left: -40px;
		}
		.text-center {
			text-align: center;
		}
	</style>

</head>
<body>

	<div style="width: 100%;">
		<p style="font-size: 12px; font-weight: bold; text-align: right; margin-top:-14px; margin-right: 40px;">
			Equipment # {{ $equipment->id}}
		</p>
	</div>

	<div style="margin-top: -20px">
		<div style="">

			<img style="margin-left: 110px;" src="{{ URL::to('images/oed.jpg') }}" width="120px"><br>
            <div style="text-align: center">
			<b style="font-size: 20px; margin-top: 20px; margin-bottom: 100px; margin-left: 0px;">Scan QR Code</b>
            </div>

		</div>

		<div style="width: 100%; text-align: center; margin-top: -20px">
            <br>

			<p style="font-size:12px; font-weight: bold;">Team JRS Software Engineering</p><br><br>

		</div>
	</div>

	<div class="row font-12">
		<div class="columns medium-4">
			<label><strong>EQ Name:</strong></label>
		</div>
		<div class="columns medium-4 b-b">
			<label>{{ $equipment->item_name }}</label>
		</div>
	
	</div>
	<br>
	<div class="row font-12">
		<div class="columns medium-4">
			<label><strong>Description:</strong></label>
		</div>
		<div class="columns medium-4 b-b">
			<label>{{ $equipment->item_description }}</label>
		</div>
		
		<!--<div class="columns medium-1">
			<label><strong>Home/Cell:</strong></label>
		</div>
		<div class="columns medium-2 b-b m-l-10">
			<label></label>
		</div>-->
	</div>
	<br>
	
	<br>
    <br>
    <br>
    <br>
    <div style="text-align: center">
    <img src="data:image/png;base64, {!! $qrcode !!}">
    </div>

	
	{{-- @if($equipment->count() > 4)
	<style>
	    div.page-break { page-break-inside:avoid; page-break-after:always; }
	</style>
    <div class="page-break"></div>
    @endif --}}
    
	<div class="row btm-grading">
		<style type="text/css">
			.rgf_header {
				padding-top: 10px;
			}
			.btm-grading {
				margin-top: 20px;
				display: block;
			}
			.btm-clientinfo {
				float: left;
				width: 50%;
				overflow: auto;
			}
			.btm-fees {
				width: 50%;
				float: right;
				overflow: auto;
			}

			.info-tab {
				width: 95%;
			}
			.info-tab-header {
				margin-bottom: -10px; 
				margin-top: -5px; 
				text-align: center;
			}
			.info-tab-ul {
				font-size: 10px; 
				padding-left: 0px; text-align: justify;
			}
		</style>
		{{-- <div class="btm-clientinfo column">
			
	

			<div style="font-size: 12px;">
				Date: _____________; Signature: ______________________
			</div>
		</div> --}}
	
	</div>

</body>
</html>