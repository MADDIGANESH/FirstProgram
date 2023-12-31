<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-info-subtle ">
    <section class=" container bg-light-subtle p-5 mx-auto my-5">
    <center>
    @if(request()-> get('delete'))
    <div class= "alert alert-danger b b-danger" role="alert">
        <div><h2>
        you trying to delete ({{request()->get('id')}}) are you sure
        </h2>
        </div>
        <form action="/calculator/destroy/{{request()->get('id')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">confirm delete </button> 
            <a href="/calculator/logs">
            <button type="button" class="btn btn-info"> Cancel</button>
            </a>
        </form>
         </div>
            @endif
            </center>
        <h1 ><center>Calculator Log's</center></h1>
        <hr>
        <br>
        <!-- "table table-danger -->
        <table class="table table-bordered border-primary p-4 my-3">
            <thead class="table-dark">
                <tr>
                 <th scope=" col">id</th>
                    <th scope="col">a</th>
                    <th scope="col">b</th>
                    <th scope="col">opr</th>
                    <th scope="col">result</th>
                    <th scope="col">created</th>
                    <th scope="col">updated</th>
                    <!-- <th scope="col">Edit operation</th> -->
                    <th colspan=2>Edit & Delete operation</th>
                    <!-- <th scope="col">edit</th>
                    <th scope="col">delete</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr class=>
                <td scope="row"  > <a href="calculator/show/{{$d->id}}"  >{{$d->id}} </a></th>
                    <td>{{$d->a}}</td>
                    <td>{{$d->b}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>

                    <!-- "{{url('calculator/edit/'.$d->id)}}" -->
                    <!-- <td><center><a class="btn btn-success p-1" href="/calculator/edit/".{{$d->id}} >Edit the value </a></center></td> -->
                    <!-- <td><a class="btn btn-success p-1" href="{{url('calculator/show/'.$d->id)}}"  >Edit the value </a></center></td> -->
                    <td><center><a class="btn btn-success p-1" href="{{url('calculator/edit/'.$d->id)}}" > Edit the value </a></center></td>
                   <td> <a href="?delete=1&id={{$d->id}}" class="btn btn-danger">delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <center>
        <a class="btn btn-primary" href="/calculator/form"> back to form</a>
        </center>
    </section>
</body>

</html>