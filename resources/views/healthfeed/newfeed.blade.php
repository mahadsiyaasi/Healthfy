<div class="row ">
	<form class="form" method="post" action="/registerfeed">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<div class="col-md-9" >
    <div class="box box-primary">
		<div class="w3-padding">
			<input type="text" name="title" class="w3-input form-control w3-border" autocomplete="0" placeholder="title of your header post"  style="font-size: 20px" required>
		</div>  
		<div class="w3-padding">
      <textarea class="w3-input" name="postmedia" id="postmedia" required></textarea>
		
		</div>
			</div>
	</div>
		<div class="col-md-3">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Publish Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              </li>
                <li class="list-group-item">
                	
                		<button class="btn w3-gray-light" type="submit">Pulish</button>
                	
                
                		<button class="pull-right btn w3-gray-light" type="button">Draft</button>
                	
                </li>
                <li class="list-group-item">
                	<div class="box-header with-border">
              <h3 class="box-title">Categories</h3>
            </div>
             <?php use Healthfy\Models\EnumListing;
              $categry = EnumListing::where("group_key","NewsFeed")->where("type_key","FeedType")->get();
              ?>
              @foreach($categry as $val)
                	
               <li class="list-group-item"><a><label><input type="radio" class="w3-check w3-checkbox w3-radio" name="categry" value="{{$val->status_id}}" required> {{$val->status_name}} </label></a>
                		

               @endforeach
                	
                </li>
            </div>
        </div>

		
		
	</div>
	</form>
	
</div>