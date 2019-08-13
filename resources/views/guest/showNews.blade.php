@extends('layouts.main')
@section('content')
<div style="margin-right: 80px; padding-left: 25px;">
<h1 style="text-align: center; padding: 20px;">Tin Tức</h1>
<table class="table">
	<tbody>
		@foreach($newss as $new)
		<tr>
			<td style="padding: 2px!important; float: right;">
				<img src="/img/news/{{$new->imgNew}}" style="width: 250px; height: 130px; padding: 10px;">
			</td>
			<td>
				<div class="card-title" style="font-weight: bold; font-size: 15px; margin-bottom: 0px;">
					<a href="{{url('detailNew/'.$new->id)}}" style="text-decoration: none;">{{$new->title}}</a>
				</div> 
				<div style="color: rgba(0, 0, 0, .45); font-size: 13px;">{{$new->created_at}}</div>
			</td>
		</tr>
		@endforeach
	</tbody>		
</table>
</div>
@stop