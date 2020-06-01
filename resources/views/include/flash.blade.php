<style type="text/css">
.alert
{
  margin:20px 0px !important;
}

</style>
<div class="container">

	<div class="row">
		
	<div class="col-sm-6 col-sm-offset-3">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
		        <strong>{{ $message }}</strong>
		</div>
		@endif


		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
		        <strong>{{ $message }}</strong>
		</div>
		@endif


		@if ($message = Session::get('warning'))
		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif


		@if ($message = Session::get('info'))
		<div class="alert alert-info alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif


		@if (count($errors) > 0)		
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
		            @foreach ($errors->all() as $error)
		                <strong>{{ $error }}</strong><br>
		            @endforeach 
				</div> 
		@endif


		<div id="custom-msg">
		    
		</div>
	</div>
	</div>
</div>