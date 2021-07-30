<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>admin</title>
  </head>
  <body>
      <div class="container">
      <h3 class="text-center my-3">Hello dear admin</h3>
      <p class="text-center my-3 fw-bold">please help users with requests below</p>
  <form method="get" action="" id="adminsform">    
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User's name</th>
      <th scope="col">Book</th>
      <th scope="col">date</th>
      <th scope="col">approved?</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td><input type="date" id="" name=""></td>
      <td><input type="checkbox" id="" name="" value=""></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td><input type="date" id="" name=""></td>
      <td><input type="checkbox" id="" name="" value=""></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Larry the Bird</td>
      <td >Larry</td>
      <td><input type="date" id="" name=""></td>
      <td><input type="checkbox" id="" name="" value=""></td>
    </tr>
  </tbody>
</table>
<button type="submit" class="btn btn-primary" form="adminsform">Submit</button>
</form>


<h4 class="text-center my-3 fw-bold my-4">add new books</h4>

<form action="" id="adminsform2" method="get">

<div class="mb-3">
    <label for="bookname" class="form-label">Book's name</label>
    <input type="text" class="form-control" id="bookname" >
</div>

  <div class="mb-3">
    <label for="bookauthor" class="form-label">Author of book</label>
    <input type="text" class="form-control" id="bookauthor">
  </div>

<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date">
</div>

<button type="submit" class="btn btn-primary my-5" form="adminsform2">Submit</button>

</form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>