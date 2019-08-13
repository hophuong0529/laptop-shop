@extends('layouts.main')
@section('content')
<img src="/img/news/{{$new->imgNew}}" width="95%" style="padding: 0px 0px 20px 15px">
<div style="padding-left: 50px; padding-right: 50px;">
	<h1 style="padding: 20px 20px 0px 0px; color: #ba1826;">{{$new->title}}</h1>
	<?= html_entity_decode($new->content); ?>
</div>
@stop