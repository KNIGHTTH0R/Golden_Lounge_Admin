<table id="example" dataTable class="display">
 <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date Start</th>
            <th>Date End</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cycles as $cycles): ?>
            <tr>
                <td><?php echo $cycles->id; ?></td>
                <td><?php echo $cycles->name; ?></td>
                <td><?php echo $cycles->start_date; ?></td>
                <td><?php echo $cycles->end_date; ?></td>

                <td><a class='btn btn-flat btn-primary' href='meal/editmeal/<?php echo $cycles->id; ?>'>Edit</a>
                    <a class='btn btn-flat btn-success' href='meal/view_cycle/<?php echo $cycles->id; ?>'>View</a>
                    <a class='btn btn-flat btn-danger' onclick="myFunction()">Delete</a>
                </td>
            </tr>
        <?<?php endforeach ?>
    </tbody>
 </table>


 <script>
 $(function () {
$("#example").DataTable();
});

function myFunction() {
    var txt;
   var r = confirm("Press a button!");
    if (r == true) {
        txt = "You pressed OK!";
        window.location = "meal/deletemeal/"+<?php echo $cycles->id; ?>;
    } else {
        txt = "You pressed Cancel!";
    }

}
</script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
