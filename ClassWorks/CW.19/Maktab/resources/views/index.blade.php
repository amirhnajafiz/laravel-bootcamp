<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body>
        <div class="container">
            <div class="border-bottom">
                <form action="/create" method="get">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password...">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="mt-3">
                <form action="/find" method="get">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Search</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name...">
                    </div>
                    <button type="submit" class="btn btn-primary">Find</button>
                </form>
                <?php if (isset($username)) { ?>
                    <div class="w-25 p-2 rounded bg-sucess text-light">
                        <?php echo $username; ?>
                    </div>
                <?php } else { ?>
                    <div class="w-25 p-2 rounded bg-warning text-dark">
                        <?php echo "No result"; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>