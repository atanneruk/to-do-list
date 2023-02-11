<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

</head>
<body>



<div class="container">
	<div class="row">
		<div class="col-12 col-lg-12">
			<img src="{{ asset('img/logo.png') }}" alt="logo" class="logo">
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-4">
			
			<form method="post" action="{{ route('task.store') }}">
				@csrf
				<div class="form-group @error('name') has-error @enderror">
				<input type="text" id="taskname" name="name" placeholder="Insert task name" class="form-control">
				</div>
				@error('name')
					<div class="alert alert-danger alert-dismissible show" role="alert">{{ $message }}</div>
				@enderror
				<div class="form-group">
				<button type="submit" class="w-100 btn btn-primary btn-block">Add</button>
				</div>
			</form>
			
		</div>
		<div class="col-12 col-lg-8">
			<div class="panel panel-default">
				<div class="panel-body">

					@if(session('success'))
						<div class="alert alert-success alert-dismissible show" role="alert">{{ session('success') }}</div>
					@endif

					<table class="table tasks-table">
						<thead>
							<tr><th scope="col">#</th><th scope="col" >Task</th><th scope="col"></th></tr>
						</thead>
						<tbody>
							@foreach($tasks as $task)
								<tr>
								<th scope="row">{{ $task->id }}</th>
								<td class="@if($task->complete) complete @endif">{{ $task->name }}</td>
								<td>
								<div class="actions">
								@if(!$task->complete)
								<form method="post" action="{{ route('task.complete', $task) }}" class="form-inline">
									@csrf
									<button type="submit" name="complete-{{ $task->id }}" class="btn btn-success"><i class="bi bi-check"></i></button>
								</form>
								<form method="post" action="{{ route('task.delete', $task) }}" class="form-inline">
									@csrf
									<button type="submit" name="delete-{{ $task->id }}" class="btn btn-danger"><i class="bi bi-x"></i></button>
								</form>
								@endif
								</div>
								</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-12 text-center footer">
			<p>Copyright &copy;2020 All Rights Reserved.</p>
		</div>
	</div>
</div>


</body>
</html>
