<table id="example" dataTable class="display">
 <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Availability</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($facilities as $facilities): ?>
	        <tr>
	            <td><?php echo $facilities->id; ?></td>
                <td><?php echo $facilities->name; ?></td>
                <td><?php echo $facilities->type; ?></td>
	            <td>
                    <?php if ( strtolower($facilities->status) == 'available' ): ?>
                        <span style="color : green;">  <?php echo $facilities->status; ?></span>
                    <?php endif; ?>
                    <?php if ( strtolower($facilities->status) == 'unavailable' ): ?>
                        <span style="color : red;">  <?php echo $facilities->status; ?></span>
                    <?php endif; ?>

                </td>
	            <td><a class='btn btn-flat btn-primary' href='facility/editfacility/<?php echo $facilities->id; ?>'>Edit</a>
                    <a class='btn btn-flat btn-success' href='facility/viewfacility/<?php echo $facilities->id; ?>'>View</a>
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
        window.location = "facility/deletefacility/"+<?php echo $facilities->id; ?>;
    } else {
        txt = "You pressed Cancel!";
    }

}
</script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
