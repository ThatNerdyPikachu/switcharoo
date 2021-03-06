@extends("master")

@section("content")

<div class="container">
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/mods" method="POST" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="form-control">
         <label for="game">Game that your mod is for</label>
         <select class="form-control" id="game" name="game" required>
             <option selected disabled>Select a game</option>
             @foreach ($games as $game)
             <option value="{{ $game->id }}">{{ $game->name }}</option>
             @endforeach
         </select>
     </div>
     <div class="form-control">
         <label for="name">Mod name (max 256 chars.)</label>
         <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
     </div>
     <div class="form-control">
         <label for="description">Description (max 500 chars.)</label>
         <textarea name="description" class="form-control" id="description" placeholder="Description" maxlength="500" required></textarea>
     </div>
     <div class="form-control">
         <label for="file">The mod itself (.rar, .zip, or .7z)</label>
         <input type="file" name="file" class="form-control" id="file" accept=".zip,.rar,.7z" required>
     </div>
     <div class="form-control">
         <label for="image">An image to show off the mod</label>
         <input type="file" name="image" class="form-control" id="image" accept=".png,.jpg,.jpeg" required>
     </div>
     <br><button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

@endsection