@extends("master")

@section("content")

<div class="container">
	<br>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">{{ $mod->name }}</h5>
			<p class="card-text">{{ $mod->description }}</p>
			<img src="{{ $mod->image_url }}">
			<br><br><a href="{{ $mod->url }}" class="btn btn-primary">Download!</a>
		</div>
	</div>
</div>

@endsection