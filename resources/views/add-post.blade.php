<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add</title>      
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
	<style>
	span{color:red;}
	</style>
	<body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
			<div class="card-header">
                        <h2>Add</h2>
                    </div>
				<div class="card-body">				
					<form action="{{ 'store' }}" method="post">
					@csrf
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Enter title">	
						 @error('title')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					
					<div class="form-group">
						<label for="body">Body</label>
						<input type="text" class="form-control" id="body" name="body" placeholder="Enter body">
						
						 @error('body')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					
					<button type="submit" class="btn btn-primary">Submit</button> 
					<a href="{{'/'}}" class="btn btn-secondary">Cancel</a> 
					</form>			
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>