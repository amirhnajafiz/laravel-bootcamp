<div class="container">
    <h3 class="text-center my-3">Hello dear <?php echo app\core\Auth::getName(); ?></h3>
    <form method="get" action="" id="usersform">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book's name(s)</th>
      <th scope='col'>Author</th>
      <th scope="col">Take time</th>
      <th scope="col">Delivery time</th>
      <th scope='col'></th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; foreach ($books as $book) { ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $book['name']; ?></td>
      <td><?php echo $book['author']; ?></td>
      <td><?php echo date("Y/m/d", $book['start_time']); ?></td>
      <td><?php echo date("Y/m/d", $book['deadline_time']); ?></td>
      <td>
        <form action="/returnBook" method="post">
          <input type="hidden" name='reserve_id' value='<?php echo $book['id']; ?>'>
          <input type="submit" name="action" value="give it back" class='btn btn-primary'>
        </form>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
