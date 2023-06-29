<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-dark-subtle">
    <section class="contaner bg-warning-subtle border border-black">
    <h1><center>String form</center></h1></section>
    
    <form class="bg-warning-subtle p-5 m-5" action="/mn/result1" method="get" >
    <div class="row">
    <div class="col ">
    <label for="formGroupExampleInput" class="form-label p-1 m-1">Enter String :</label><br>
    <input type="text" class="form-control" name="str" placeholder="Enter here" aria-label="First name">
    </div>

    <div class="col-md-4 p-1 m-1">
    <label for="inputState" class="form-label">Operation :</label>
    <select id="inputState" name="opr" class="form-select">
      <option value="str">String Reverse</option>
      <option value="noofw">No of Words</option>
      <option value="noofl">No of Letters</option>
        </select>
        </div>
        <div>
        <button type="submit" class="btn btn-success p-2 m-2">Submit</button>
        </div>
</form> 

</body>
</html>