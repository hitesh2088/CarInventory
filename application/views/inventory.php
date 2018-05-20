<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to CodeIgniter</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style type="text/css">

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    li > a {
        margin-right:5px !important
    }
    </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body>

<div id="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" >Welcome to Car Inventory!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <button class="nav-link btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addmanufacture">Add Manufacture</button>
            </li>
            <li class="nav-item">
                <button class="nav-link btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addmodel">Add Car Model</button>
            </li>
        </ul>
    </div>
    </nav>
    <div id="body">
        <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Manufacture</th>
                <th>Model Name</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody> 
            <?php 
            foreach ($cars as $key => $value) {?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=$value->manu_name?></td>
                    <td><?=$value->model_name?></td>
                    <td><?=$value->car_count?></td>
                </tr>
            <?php
            } ?>
        </tbody>
        <tbody>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
        $('#table tbody').on('click', 'tr', function () {
        var carmodel = $(this).find("td:eq(2)").text();
        $.ajax({
            type:'POST',
            url:'<?=site_url('home/cardetail') ?>',
            data:{model_name:carmodel},
            success:function(data){
                console.log(data);
                $('#carmodel').find('.modal-body').html(data);
                $('#car_table').DataTable();
                $('#carmodel').modal('show')
            },
            error:function(error){
                console.log(error);
                $('#addmanufacture').modal('hide');
                alert('Manufacturer is not added')
            }
        });
        
        });
    });
</script>
</div>

</body>
</html>