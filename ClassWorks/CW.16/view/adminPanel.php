<div class="container">
      <h3 class="text-center my-3">Hello dear admin</h3>
      <p class="text-center my-3 fw-bold">please help users with requests below</p>
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
    <?php $i = 1; foreach ($requests as $request) { ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $request['firstname'] . ' ' . $request['lastname']; ?></td>
      <td><?php echo $request['name']; ?></td>
      <td><?php echo date("Y/m/d", $request['start_time']) ?></td>
      <td>
       <form method="post" action="/requestResponse">
        <input type="hidden" name="reserve_id" value="<?php echo $request['id'] ?>">
        <input type="submit" class="btn btn-primary" name="action" value="accept"> 
        <input type="submit" class="btn btn-outline-primary" name="action" value="reject">
       </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>


<h4 class="text-center my-3 fw-bold my-4">add new books</h4>

<form action="/addBook" id="adminsform2" method="post">

<div class="mb-3">
    <label for="bookname" class="form-label">Book's name</label>
    <input name='name' type="text" class="form-control" id="bookname" >
</div>

  <div class="mb-3">
    <label for="bookauthor" class="form-label">Author of book</label>
    <input name='author' type="text" class="form-control" id="bookauthor">
  </div>

  <div class="mb-3">
    <label for="publisher" class="form-label">publisher</label>
    <input name='publisher' type="text" class="form-control" id="publisher">
  </div>

  <div class="mb-3">
    <label for="publishYear" class="form-label">Publush year</label>
    <input name='publish_year' type="text" class="form-control" id="publishYear">
  </div>

<button type="submit" class="btn btn-primary my-3" form="adminsform2">Submit</button>

</form>

</div>