<div class="row" style="padding: 10px 0px 0px 15px;">
  @foreach($news as $new)
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
         <h6 style="font-weight: bold;"><i class="fa fa-angle-double-right"></i> TIN TỨC</h6>
        <img src="/img/news/{{$new->imgNew}}" style="width: 150px; height: 70px; float: left; padding-right: 10px;">
        <div>
          <div class="card-title" style="font-weight: bold; font-size: 15px; margin-bottom: 0px;">
            <a href="{{url('detailNew/'.$new->id)}}" style="text-decoration: none;">{{$new->title}}</a>
          </div> 
          <div style="color: rgba(0, 0, 0, .45); font-size: 13px;">{{$new->created_at}}</div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div> 