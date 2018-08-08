@extends("master")

@section("content")

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>

<form action="/mods" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="text" name="name"><br>
	<input type="text" name="description"><br>
	<input type="file" name="image">
	<input type="file" name="file">
	<input type="submit">
</form>

@endsection