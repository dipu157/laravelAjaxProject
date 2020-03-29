<table class="table table-bordered table-striped table-hover">
	<thead>
		<th>Sl</th>
		<th>Name</th>
		<th>Age</th>
		<th>Email</th>
		<th>Join Date</th>
		<th>Action</th>
	</thead>
	<tbody>
		@foreach($data as $emp)
		<tr>
			<td>{{ $sl++ }}</td>
			<td>{{ $emp->name }}</td>
			<td>{{ $emp->age }}</td>
			<td>{{ $emp->email }}</td>
			<td>{{ $emp->join_date }}</td>
			<td>
				<a href="{{ url('view/employee')}}" data-id="{{ $emp->id }}" id="viewEmp" class="btn btn-sm btn-primary">View</a>
				<a href="{{ url('edit/employee')}}" data-id="{{ $emp->id }}" id="editEmp" class="btn btn-sm btn-success">Edit</a>
				
				<a onclick="return confirm('Are You sure to delete?')" href="{{ url('delete/employee')}}" data-id="{{ $emp->id }}" id="deleteEmp" class="btn btn-sm btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>