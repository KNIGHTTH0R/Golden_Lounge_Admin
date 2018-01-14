<table id="example" dataTable class="display">
 <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($staffs as $staffs): ?>
	        <tr>
	            <td><?php echo $staffs->id; ?></td>
                <td><?php echo $staffs->name; ?></td>
                <td><?php echo $staffs->position; ?></td>

	            <td><a class='btn btn-flat btn-primary' href='staff/editstaff/<?php echo $staffs->id; ?>'>Edit</a>
                    <a class='btn btn-flat btn-success' href='staff/viewstaff/<?php echo $staffs->id; ?>'>View</a>
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
   var r = confirm("Do you want to delete this record");
    if (r == true) {
        txt = "Delete";
        window.location = "staff/deletestaff/"+<?php echo $staffs->id; ?>;
    } else {
        txt = "Cancel!";
    }

}
</script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
