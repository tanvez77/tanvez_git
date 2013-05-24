    <!DOCTYPE html>
    <html>
    <head>
    <title>GiggedIn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>css/dropzone.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/dropzone.js"></script>
    </head>
    <body>
        <div class="container">
        <div class="modal-header pull-left">
            <form class="well" action="<?php echo base_url();?>gigged/search" method="post">
            <input type="text" name="tags" class="span3 search-query" placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        </div>
       <div class="modal-body push-left">
           <a href="<?php echo base_url();?>gigged">Home</a>
           <a href="<?php echo base_url();?>gigged/tags">Add/Edit Tags</a>
           <a href="<?php echo base_url();?>gigged/tags">Delete Image</a>
        </div>