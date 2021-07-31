<?php use app\core\Auth; ?>

<div class="container">
<h3 class="text-center">Hello dear user,you can look through all the books with topics and authers on the table below</h3>

<p class="text-center my-5">If its your first time on our website please sign up now,and if you've signded up before you can submit your information and join us</p>
    <a class="btn btn-primary d-grid my-4" href="/login" role="button">login</a>
    <a class="btn btn-primary d-grid my-4" href="/signUp" role="button">Sign up</a>
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">row</th>
      <th scope="col">Book's name</th>
      <th scope="col">author</th>
      <th scope="col"></th>
      <?php if (Auth::getType() == 'admin') { ?>
      <th scope="col"></th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; foreach ($books as $book) { ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $book['name']; ?></td>
      <td><?php echo $book['author']; ?></td>
      <?php 
        if (Auth::getType() == 'normal') {
          $status = $book['borrowed'] == 0 ? '' : 'disabled'; ?>
          <td>
            <form action="/borrowBook" method="post">
              <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
              <input type="hidden" name="user_id" value="<?php echo Auth::getId();?>">
              <input type="submit"  class='btn btn-primary' <?php echo $status; ?> value="request to borrow">
            </form>
          </td>
        <?php } elseif (Auth::getType() == 'admin') { ?>
          <td>
            <form action="" method="post">
              <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
              <button onclick="document.location='/borrowBook'" class='btn btn-primary' <?php echo ''; ?> >edit</i></button>
            </form>
          </td>
          <td>
            <form action="" method="post">
              <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
              <button onclick="document.location='/borrowBook'" class='btn btn-primary' <?php echo ''; ?> >remove</i></button>
            </form>
          </td>
        <?php } else 
          echo "login to see :)";
      ?>
    </tr>
    <?php } ?>
  </tbody>
</table>



</div>