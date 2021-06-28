<?php
  require 'php/GetContacts.php';
  require 'php/GetMessages.php';
  require 'php/Online.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Chat Room</title>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="d-flex justify-content-center">
          <div class="col-12 col-md-8">
            <div class="bg-primary border border-primary" style="height: 100vh;">
              <div class="row h-100">
                <div class="col-4 h-100">
                  <div class="border-end px-2 h-100 ">
                    <div class="my-2 p-2 border border-light rounded" style="height:3.5rem">

                      <!-- A form for adding a new contact -->
                      <form class="d-flex justify-content-start" action="php/AddContact.php" method="post">
                        <a href="php/Logout.php?username=<?php echo $_GET['user']; ?>" class="d-inline-block btn btn-danger" style="margin-right:5px;">Logout</a>
                        <input type="submit" class="btn btn-outline-light me-2" name="" value="add" />
                        <input type="hidden" name="sender" value="<?php echo $_GET['user']; ?>" />
                        <input type="text" class="form-control" name="username" placeholder="username" required />
                      </form>

                      <?php if (isset($_GET['error'])) { ?>
                        <?php if ($_GET['error'] == 'fialedtofinduser') { ?>
                          <div class="alert alert-danger p-2 mt-2">
                            Username not found
                          </div>
                        <?php exit(); } ?>
                      <?php } ?>
                    </div>

                    <div class="overflow-auto pe-1" style="height: calc(100vh - 5rem)">
                      <h3 class="text-light">Contacts</h3>
                      <?php foreach ($contacts as $contact) { ?>
                        <a href="<?php echo "MyChatRoom.php?user={$_GET['user']}&chater=$contact"; ?>" class="btn btn-outline-light text-start w-100 my-2">
                          <div class="fs-5">
                            <?php echo $contact; ?>
                            <?php if(isOnline($contact, 'data/online.txt')) { ?>
                              <span class="badge bg-success light-text">Is online</span>
                            <?php } ?>
                          </div>
                        </a>
                      <?php } ?>
                    </div>

                  </div>
                </div>

                <div class="col-8">
                  <div class="h-100">
                    <?php if (array_key_exists('chater', $_GET)) { ?>
                      <div class="me-4 align-bottom overflow-auto" style="height: calc(100vh - 5rem); overflow:auto;">
                        <?php foreach ($messages as $message) { ?>
                          <div class="row">
                            <div class="d-flex justify-content-<?php echo $message['sender'] ? "end" : "start"; ?>">
                              <div class="col-7">
                                <div class="<?php echo $message['sender'] ? "bg-success" : "bg-warning"; ?> p-2 my-2 rounded">
                                  <?php echo $message['message']; ?>
                                  <div class="text-<?php echo $message['sender'] ? "info" : "secondary"; ?>">
                                    <?php echo date('l jS F Y h:i:s A', $message['time'])?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="me-4 py-2" style="height: 5rem;">
                        <div class="border border-light h-100 rounded">
                          <form class="h-100" action="php/SendMessage.php" method="post">
                            <div class="h-100 d-flex justify-content-start align-items-center">
                                <input type="text" class="form-control mx-2" name="message" placeholder="Message..." required maxlength="100">
                                <input type="hidden" name="sender" value="<?php echo $_GET['user'] ?>">
                                <input type="hidden" name="to" value="<?php echo $_GET['chater'] ?>">
                                <input type="submit" class="btn btn-outline-light mx-2" value="Send">
                            </div>
                          </form>
                        </div>
                      </div>
                    <?php } else { ?>
                      <div class="d-flex justify-content-center align-items-center h-100 fs-3 text-light">
                        Please select a friend to chat
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
