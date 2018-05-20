<table id="car_table" class="display" style="width:100%">
<thead>
    <tr>
        <th>Serial No.</th>
        <th>Manufacture</th>
        <th>Model Name</th>
        <th>Color</th>
        <th>Manufacture Year</th>
        <th>Registration Number</th>
        <th>Note</th>
    </tr>
</thead>
<tbody> 
    <?php
    foreach ($cars as $key => $value) {?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$value->manu_name?></td>
            <td><?=$value->model_name?></td>
            <td><?=$value->color?></td>
            <td><?=$value->manufacturing_year?></td>
            <td><?=$value->registration_number?></td>
            <td><?=$value->note?></td>
        </tr>
    <?php
    } ?>
</tbody>
<tbody>