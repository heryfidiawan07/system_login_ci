<?php $this->load->view('template/admin/header') ?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Blank Page | Hi ... <?= $auth->name; ?></h1>
			<input type="button" class="btn btn-primary btn-sm" id="create_user" data-toggle="modal" data-target="#modal-create" value="Add User">
		</div>
		<div class="section-body">
			
			<div class="row">
			    <div class="card p-3 col-md-12">
			        <div class="table-responsive">
			            <table id="user_table" class="table table-bordered font-12">
			                <thead>
			                    <tr>
			                        <th>No</th>
			                        <th>NAME</th>
			                        <th>USERNAME</th>
			                        <th>EMAIL</th>
			                        <th>EDIT</th>
			                        <th>DELETE</th>
			                    </tr>
			                </thead>
			            </table>
			        </div>
			    </div>
			</div>

		</div>
	</section>
</div>

<!-- Modal Create -->
<div id="modal-create" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <form method="POST" id="form_create">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>CREATE USER</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm uppercase" placeholder="Name" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control form-control-sm lowercase nospace" placeholder="Username" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm lowercase nospace" placeholder="Email" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-sm lowercase nospace" placeholder="Password" required autocomplete="off">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-create">Save</button>
                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Create -->

<!-- Modal Edit -->
<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <form method="POST" id="form_edit" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>EDIT USER</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name_edit" id="name_edit" class="form-control form-control-sm uppercase" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username_edit" id="username_edit" class="form-control form-control-sm lowercase" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_edit" id="email_edit" class="form-control form-control-sm lowercase" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_edit" id="password_edit" class="form-control form-control-sm lowercase" required autocomplete="off">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-edit">Update</button>
                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Edit -->

<script>
$(document).ready(function () {

    var base_url = $('#base_url').val();
    
    var dataTable = $('#user_table').DataTable({
        'processing': true,
        'serverSide': true,
        'order': [],
        'ajax': {
            url : base_url+'dashboard/datatables',
            type: 'POST'
        },
        'columnDefs': [
            {
                'targets': [0,4,5],
                'orderable': false,
            },
            {
                "targets": [4,5],
                "className": "text-center",
            }
        ]
    });

    $('#form_create').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: base_url+'user/store/', 
            method: 'POST',
            data: $('#form_create').serialize(),
            success: function(data){
                data = JSON.parse(data);
                if (data.error) {
                    swal.fire(
                        'Opss...!',
                        data.error,
                        'warning'
                    )
                }
                if (data.success) {
                    swal.fire(
                        'Success!',
                        data.success,
                        'success'
                    )
                    dataTable.ajax.reload();
                }
                $('#form_create')[0].reset();
                $('#modal-create').modal('hide');
            }
        });
    });

    $(document).on('click','.edit_user', function() {
        const username = $(this).attr('id');
        // console.log(username);
        $.get(base_url+'user/get_user/'+username, function(data) {
            console.log(data);
            data = JSON.parse(data);
            if (data.error) {
                swal.fire(
                    'Opss...!',
                    data.error,
                    'warning'
                )
            }else {
                $('#name_edit').val(data.name);
                $('#username_edit').val(data.username);
                $('#email_edit').val(data.email);
                $('#password_edit').val('');
                $('#form_edit').attr('action', base_url+'user/update/'+data.username);
            }
        });
    });

    $('#form_edit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $('#form_edit').attr('action'), 
            method: 'POST',
            data: $('#form_edit').serialize(),
            success: function(data){
                data = JSON.parse(data);
                if (data.error) {
                    swal.fire(
                        'Opss...!',
                        data.error,
                        'warning'
                    )
                }
                if (data.success) {
                    swal.fire(
                        'Success!',
                        data.success,
                        'success'
                    )
                    dataTable.ajax.reload();
                }
                $('#form_edit')[0].reset();
                $('#modal-edit').modal('hide');
            }
        });
    });

    $(document).on('click', '.delete_user', function() {
        const username = $(this).attr('id');
        swal.fire({
            title: 'Are you sure?',
            text: "Delete "+username+" ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then(function(result){
            if (result.value) {
                $.get(base_url+"/user/destroy/"+username, function(data){
                    // console.log(data);
                    data = JSON.parse(data);
                    if (data.error) {
                        swal.fire(
                            'Opps...',
                            data.error,
                            'warning'
                        )
                    }
                    if (data.success) {
                        swal.fire(
                            'Deleted!',
                            data.success,
                            'success'
                        )
                        dataTable.ajax.reload();
                    }
                });
            }
        });
    });

});

// swal.fire(
//     'Success!',
//     'TEST',
//     'success'
// )
</script>

<?php $this->load->view('template/footer') ?>