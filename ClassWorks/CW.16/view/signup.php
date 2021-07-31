<div class="container">
        <h3 class="text-center my-4">please fill the information below to join our website</h3>
    <form method="post" action="/signUp">
    <div class="mb-3">
    <label for="firstname" class="form-label">Firstname</label>
    <input name='firstname' type="text" class="form-control" id="firstname" >
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Lastname</label>
    <input name='lastname' type="text" class="form-control" id="lastname" >
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input name='email' type="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name='password' type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   
</div>