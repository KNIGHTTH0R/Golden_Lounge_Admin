<table id="example" dataTable class="display">
 <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actiion</th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($facility_types as $facility_types): ?>
	        <tr>
	            <td><?php echo $facility_types->id; ?></td>
                <td><?php echo $facility_types->facility_type; ?></td>
	            <td><a class='btn btn-flat btn-primary' href='facilitytype/editfacilitytype/<?php echo $facility_types->id; ?>'>Edit</a>
                    <a class='btn btn-flat btn-primary' href='facilitytype/viewfacilitytype/<?php echo $facility_types->id; ?>'>View</a>
                </td>
	        </tr>
        <?<?php endforeach ?>
    </tbody>
 </table>


 <script>
 $(function () {
$("#example").DataTable();
});
</script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
