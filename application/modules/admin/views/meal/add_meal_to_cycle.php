<?php echo $form->open(); ?>
<table id="example" dataTable class="display">
 <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Time Serving</th>
            <th>Time Serving</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($meals as $meals): ?>
            <tr>
                <td><?php echo $meals->id; ?></td>
                <td><?php echo $meals->name; ?></td>
                <td><?php echo $meals->type; ?></td>
                <td><?php echo $meals->time_serving; ?></td>
                <td><?php echo $meals->status; ?></td>

                <td><a class='btn btn-flat btn-primary' href='meal/editmeal/<?php echo $meals->id; ?>'>Edit</a>
                    <a class='btn btn-flat btn-success' href='meal/viewMeal/<?php echo $meals->id; ?>'>View</a>
                    <a class='btn btn-flat btn-danger' onclick="myFunction()">Delete</a>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="selected[]" value="<?php echo $meals->id; ?>">
                    </label>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
 </table>
<?php echo $form->bs3_submit(); ?>

<?php echo $form->close(); ?>
 <script>
 $(function () {
$("#example").DataTable();
});

function myFunction() {
    var txt;
   var r = confirm("Press a button!");
    if (r == true) {
        txt = "You pressed OK!";
        window.location = "meal/deletemeal/"+<?php echo $meals->id; ?>;
    } else {
        txt = "You pressed Cancel!";
    }

}
</script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
