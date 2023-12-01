<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-do List</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">

    <style type="text/css">
    li { font-size: 18px; }
    </style>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body role="document">
  
    <div class="container" role="main">
    
      <?php if ($flash['success']): ?>
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <?php echo $flash['success']; ?>
      </div>
      <?php endif; ?>

      <?php if ($flash['error']): ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <?php echo $flash['error']; ?>
      </div>
      <?php endif; ?>
      
      <div class="page-header">
        <h1>My Tasks</h1>
      </div>
      
      <ul class="list-group">
        <?php foreach ($data as $row): ?>
        <li class="list-group-item clearfix">
          <?php echo ucfirst($row['tdesc']); ?>
          <?php $ds = date('d M Y', strtotime($row['tdue'])); ?>
          <?php $ds = (date('d M Y', mktime()) == $ds) ? 'today' : $ds; ?>
          <?php $dlabel = (strtotime($row['tdue']) <= mktime()) ? 'danger' : 'default'; ?>
          <span class="label label-<?php echo $dlabel; ?>">Due <?php echo $ds; ?></span>
          <span class="pull-right">
          <a href="/delete/<?php echo $row['id']; ?>">
            <button class="btn btn-success">
              <span class="glyphicon glyphicon-ok"></span> Done!
            </button>
          </a>
          </span>
        </li>
        <?php endforeach; ?>
      </ul>

      <form class="form-inline" role="form" method="post" action="/add">
        <div class="form-group">
          <input type="text" name="tdesc" class="form-control" placeholder="I need to..." />
          <input type="text" name="tdue" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="by..." />
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add</button>
        </div>
      </form>
        
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    $('.datepicker').datepicker();
    </script>
  </body>
</html>