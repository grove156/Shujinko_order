<!DOCTYPE html>
<?php date_default_timezone_set('Australia/Melbourne'); ?>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewpoint" content="width = device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<title>Shujinko Order</title>
</head>
<body>
    <div class="container">
        <div class="text-center" style="height:250px"><img src="image/shujinkologo.jpg" class="img-fluid" alt="Responsive image"></div>

        <div class="row">
            <div class="col-3"></div>

                <div class="align-middle form-group col-6 border bg-light text-dark rounded-lg" style="height: 500px">
                  <div class="text-center m-5"><h3><?php echo date("Y-m-d h:i"); ?></h3></div>
                      <form action="process/login_process.php" method="POST" >
                          <label><h4>ID:</h4></label>
                          <input type="text" class="form-control" name='id' placeholder="Enter Your ID"/>
                          <br/>
                          <label><h4>Password:</h4></label>
                          <input type="password" class="form-control" name='password' placeholder="Enter Your Password"/>
                          <br/>
                          <div class='text-right'>
                            <input type="submit" class="btn btn-primary" value="Login">
                          </div>
                      </form>

                </div>

            <div class="col-3"></div>
        </div>
        <div class="row"  style="height:200px">
        </div>
    </div>
</body>
