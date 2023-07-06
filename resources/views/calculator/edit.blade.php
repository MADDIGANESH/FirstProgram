<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-success p-5 m-5 text-dark bg-opacity-25">
    <section class=" p-1 m-5 bg-warning border border-black">
    <h1><center> Edit data </center></h1></section>
    
    <form class="bg-warning  border border-black p-5 m-5" action="/calculator/save/{{$data->id}} " method="post" >
    
    <div class="row">
    <div class="col ">
    <label for="formGroupExampleInput" class="form-label p-1 m-1"><b>Enter A value :</b></label><br>
    <input type="text" class="form-control" name="a" value="{{$data->a}}" aria-label="First name">
    </div>
     <div class="col" >
     <label for="formGroupExampleInput" class="form-label p-1 m-1"><b>Enter B value :</b></label><br>
    <input type="text" class="form-control" name="b" value="{{$data->b}}" aria-label="Last name">
    </div>
    <div class="col-md-4 p-1 m-1">
    <label for="inputState" class="form-label"> <b>Operation :</b></label>
    <select id="inputState" name="opr"  class="form-select">
     <option value="add" @if($data->opr=='add') selected @endif> Addition</option>
      <option value="sub" @if($data->opr=='sub') selected @endif> Subtraction</option>
      <option value="mul" @if($data->opr=='mul') selected @endif> Multiply</option>
      </select>
      @csrf
      </div>
      <div>
        <!-- <button type="submit" class="btn btn-success p-2 m-2"><b>Submit</b></button> -->
        <button type="submit" class="btn btn-success p-2 m-2"><b>Save</b></button>
        
        <a href="/calculator/logs" class="btn btn-success p-2 m-2"><b>logs</b></a>
      </div>
</form> 

</body>
</html>

