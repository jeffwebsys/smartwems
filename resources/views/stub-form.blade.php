<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>PURCHASE REQUEST FORM</title>

	<style type="text/css">
		body {
			font-family: arial, verdana, sans-serif;
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
		<p style="font-size: 12px; font-weight: bold; text-align: right; margin-top:-10px; margin-right: 40px;">
			Purchase Request Number # {{ $purchase->id}}
		</p>
	</div>

	<div style="margin-top: -20px">
		<div style="">

			<img style="margin-left: 110px;" src="{{ URL::to('images/oed.jpg') }}" width="120px">

			<b style="font-size: 30px; margin-top: 5px; margin-bottom: 100px; margin-left: 0px;">REQUEST FORM</hb1>

		</div>

		<div style="width: 100%; text-align: center; margin-top: -20px">

			<p style="font-size:12px; font-weight: bold;">Team JRS Company, Software Development Engineeering</p><br><br>

		</div>
	</div>

	<div class="row font-12">
		<div class="columns medium-2">
			<label><strong>Equipment Name:</strong></label>
		</div>
		<div class="columns medium-4 b-b">
			<label>{{ $purchase->purchaseEquipment->item_name }} </label>
		</div>
		<div class="columns medium-1">
			<label><strong>Company</strong></label>
		</div>
		<div class="columns medium-5 b-b">
			<label> San Jose Hospital</label>
		</div>
	</div>
	<br>
	<div class="row font-12">
		<div class="columns medium-2">
			<label><strong>Email Address:</strong></label>
		</div>
		<div class="columns medium-4 b-b">
			<label>{{ $purchase->purchaseUser->email }} </label>
		</div>
		<div class="columns medium-1">
			<label><strong>Address:</strong></label>
		</div>
		<div class="columns medium-5 b-b">
			<label> San Jose</label>
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

	<div class=" request-items" style="margin-top: 20px; margin-bottom: 20px;">

		<style>
			.request-items table, .request-items th, .request-items td {
			  	/*border: 1px solid black;*/
			  	border: 1px solid black;
			}

			.request-items table {
				border-collapse: collapse;
			}
			
			.request-items th, .request-items td {
			  	padding: 5px;
			  	text-align: center;
			}
		</style>

		<table style="width:100%; font-size: 12px;">
			<thead>
				<tr>
					<th>Equipment Section:</th>
                    <th width="50px">Procurement Id No:</th>
                	<th width="60px">Equipment ID</th>
                    <th width="100px">Equipment Name</th>
                    <th width="100px">Problem</th>
                    <th width="">Remarks</th>
                    <th width="90px">Required Budget</th>
                    <th width="90px">Requested By:</th>
				</tr>
			</thead>
			<tbody>
				{{-- @foreach($purchase AS $key => $value) --}}
				<tr>
                    <td>{{ $purchase->purchaseEquipment->eqlocation->title }}</td>
					<td>{{ $purchase->purchaseProcurement->id }}</td>
					<td>{{ $purchase->purchaseEquipment->id }}</td>
					<td>{{ $purchase->purchaseEquipment->item_name }}</td>
					<td>{{ $purchase->purchaseTicket->reason }}</td>
					<td>{{ $purchase->remarks }} -- remarks</td>
					<td>{{ $purchase->budget }} PHP</td>
					<td>{{ $purchase->purchaseUser->name }}</td>
					
				</tr>
				{{-- @endforeach --}}
				<tr>
					<td colspan="8">
						<h4 style="margin: 0px;">Additional Data</h4>
					</td>
				</tr>
				<tr>
					<!--<td colspan="2">-->
					<!--	<b>Ship Fee:</b>-->
					<!--	-->
					<!--</td>-->
					<td colspan="4">
                        @php 
                        $time = date('F j, Y, g:i a', strtotime($purchase->purchaseTicket->created_at));
                        @endphp
						<b>Ticket Created: {{ $time }} </b>
						
					</td>
					<td colspan="4">
						<b>Approved By: {{ $purchase->approved_by }}</b>
						
					</td>
					{{-- <td colspan="4">
						<b>Purchase Request Date: {{ date('F j, Y, g:i a', strtotime($purchase->created_at)) }}</b>
						
					</td> --}}
					{{-- <td colspan="2">
						<b>TEAM Jrs Dev Company:</b>
						
					</td> --}}
				</tr>
			</tbody>
		</table>
	</div>
	
	@if($purchase->count() > 4)
	<style>
	    div.page-break { page-break-inside:avoid; page-break-after:always; }
	</style>
    <div class="page-break"></div>
    @endif
    
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
		<div class="btm-clientinfo column">
			
	

			<div style="font-size: 12px;">
				Date: _____________; Signature: ______________________
			</div>
		</div>
	
	</div>

</body>
</html>