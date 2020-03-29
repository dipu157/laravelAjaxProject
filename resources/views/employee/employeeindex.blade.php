@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-12">

			<div class="card">
				<div class="card-header">

					Employee Info

					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addEmpModal">
					  Add Employee
					</button>
				</div>

				<div class="card-body table-responsive" id="allemployeedata">
					<table class="table table-bordered table-striped table-hover" id="empTable">
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
				</div>
			</div>
		</div>
	</div>
</div>

<div id="getallemplyee" data-url="{{ url('getEmployee') }}"></div>

@include("employee.addEmployeeModal")
@include("employee.editEmployeeModal")
@include("employee.viewEmployeeModal")


@endsection

@push('scripts')

<script type="text/javascript">
	$(document).ready(function(){
   	$("#empTable").DataTable();
   });
</script>

@endpush

