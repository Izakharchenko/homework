<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Todo</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>
                @endif

                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">
                <h2>Add Todo</h2>
                <form class="row g-3 justify-content-center" action="{{route('todos.store')}}" method="post">
                    @csrf
                    <div class="col-6">
                        <input type="text" class="form-control" name="title" placeholder="title">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary mb-3" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>TODO LIST</h1>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Crated_at</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                    <tr>
                        <th scope="col">{{$todo->index}}</th>
                        <th scope="col">{{$todo->title}}</th>
                        <th scope="col">{{$todo->created_at}}</th>
                        <th scope="col">
                            @if($todo->is_completed)
                            <div class="badge bg-success">Completed</div>
                            @else
                            <div class="badge bg-warning">Not Completed</div>
                            @endif
                        </th>
                        <th scope="col">
                            <a href="{{route('todos.edit', ['todo' => $todo->id])}}" class="btn btn-info">Edit</a>
                            <form style="display:inline" class="inline" action="{{route('todos.destroy', ['todo'=> $todo->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>