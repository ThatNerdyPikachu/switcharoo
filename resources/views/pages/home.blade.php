@extends("master")

@section("content")

<br><div class="container">
	@foreach ($mods as $row)
	<div class="row">
		@foreach ($row as $mod)
		<div class="col-sm">
			<div class="card" style="width: 24rem;">
				<img class="card-img-top" src="{{ $mod->image_url }}">
				<div class="card-body">
					<h5 class="card-title">{{ $mod->name }}<br><small><i>Created by {{ $mod->user->name }} for <a href="">PLACEHOLDER</a></i></small></h5>
					<p class="card-text">{{ $mod->description }}</p>
					<a href="{{ route("view", ["mod" => $mod]) }}" class="btn btn-primary">View it!</a>
				</div>
			</div><br>
		</div>
		@endforeach
	</div>
	@endforeach
</div>

@endsection