<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Laravel 10</title>
	</head>
       <body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ">			
                        <h4>
                            Blog Listing                            
                        </h4>
                    </div>
				
				<div class="card-body">	
				<table class="table table-bordered table-striped">
				 <tr>							 
				 <th>Title</th>				
				 </tr>
				@foreach($blogs as $row)
				 <tr>				 
				
				 <td>{{ $row['name'] }}</td>	
				
				 </tr>
				 @endforeach				 
				 </table>				
						 
				</div>			
			</div>
		</div>
	</div>
</body>
</html>
