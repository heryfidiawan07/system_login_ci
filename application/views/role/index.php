<?php $this->load->view('template/admin/header') ?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <input type="button" class="btn btn-primary btn-sm float-right" id="btn_create" data-toggle="modal" data-target="#modal-create" value="Add Role">
            </div>
		</div>
		<div class="section-body">
			
			<div class="row">
			    <div class="card p-3 col-md-12">
			        <div class="table-responsive">
			            <table id="role_table" class="table table-bordered font-12">
			                <thead>
			                    <tr>
			                        <th>No</th>
			                        <th>NAME</th>
			                        <th>DESCRIPTION</th>
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
                    <h5>CREATE ROLE</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Name" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control" placeholder="Description" required autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Menu</label>
                        <?php foreach ($menus as $menu): ?>
                            <div class="form-check">
                                <input name="menus[]" class="form-check-input menus" type="checkbox" value="<?= $menu->id; ?>" id="<?= $menu->id; ?>">
                                <label class="form-check-label bold text-primary font-16">
                                    <?= $menu->name; ?>
                                </label>
                            </div>
                            <?php foreach ($actions as $action): ?>
                                <?php if ($action->menu_id == $menu->id): ?>
                                     <div class="form-check form-check-inline">
                                        <input name="<?= $menu->id; ?>_actions[]" class="form-check-input actions action_<?= $menu->id; ?>" data-menu="<?= $menu->id; ?>" type="checkbox" value="<?= $action->id; ?>" disabled>
                                        <label class="form-check-label italic"><?= $action->alias; ?></label>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                            <div class="mb-4"></div>
                        <?php endforeach ?>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="btn_save">Save</button>
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
        <form method="POST" id="form_update" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>EDIT ROLE</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name_edit" id="name_edit" class="form-control form-control-sm" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description_edit" id="description_edit" rows="5" class="form-control" placeholder="Description" required autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Menu</label>
                        <?php foreach ($menus as $menu): ?>
                            <div class="form-check">
                                <input name="menus_edit[]" class="form-check-input menus" type="checkbox" value="<?= $menu->id; ?>" id="edit_<?= $menu->id; ?>">
                                <label class="form-check-label bold text-primary font-16">
                                    <?= $menu->name; ?>
                                </label>
                            </div>
                            <?php foreach ($actions as $action): ?>
                                <?php if ($action->menu_id == $menu->id): ?>
                                     <div class="form-check form-check-inline">
                                        <input name="<?= $menu->id; ?>_actions_edit[]" class="form-check-input actions action_edit_<?= $menu->id; ?>" data-menu="<?= $menu->id; ?>" id="action_<?= $action->id; ?>_<?= $menu->id; ?>" type="checkbox" value="<?= $action->id; ?>" disabled>
                                        <label class="form-check-label italic"><?= $action->alias; ?></label>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                            <div class="mb-4"></div>
                        <?php endforeach ?>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="btn_update">Update</button>
                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Edit -->

<script>
$(document).ready(function () {

    const base_url = $('#base_url').val();
    
    const dataTable = $('#role_table').DataTable({
        'processing': true,
        'serverSide': true,
        'order': [],
        'ajax': {
            url : base_url+'role/datatables',
            type: 'POST'
        },
        'columnDefs': [
            {
                'targets': [0,3,4],
                'orderable': false,
            },
            {
                "targets": [3,4],
                "className": "text-center",
            }
        ]
    });

    btn_save_and_update();

    $('.menus').click(function() {
        let menu_id = $(this).attr('id');
        if ($(this).is(':checked')) {
            $('.action_'+menu_id).prop('disabled',false);
            $('.action_'+menu_id).prop('checked',true);
        }else {
            $('.action_'+menu_id).prop('disabled',true);
            $('.action_'+menu_id).prop('checked',false);
        }
        btn_save_and_update();
    });
    
    $('.actions').click(function() {
        let menu_id = $(this).attr('data-menu');
        if ($('.action_'+menu_id).filter(':checked').length == 0) {
            $('#'+menu_id).prop('checked',false);
            $('.action_'+menu_id).prop('disabled',true);
        }
        if ($('.action_edit_'+menu_id).filter(':checked').length == 0) {
            $('#edit_'+menu_id).prop('checked',false);
            $('.action_edit_'+menu_id).prop('disabled',true);
        }
        btn_save_and_update();
    });

    function btn_save_and_update() {
        if ($('.actions').filter(':checked').length < 1) {
            $('#btn_save').prop('disabled',true);
            $('#btn_update').prop('disabled',true);
        }else {
            $('#btn_save').prop('disabled',false);
            $('#btn_update').prop('disabled',false);
        }
    }

    $('#form_create').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: base_url+'role/store/', 
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

    $(document).on('click','.btn_edit', function() {
        let id = $(this).attr('id');
        // console.log(id);
        $.get(base_url+'role/get_role/'+id, function(data) {
            // console.log(data);
            data = JSON.parse(data);
            if (data.error) {
                swal.fire(
                    'Opss...!',
                    data.error,
                    'warning'
                )
            }else {
                $('#name_edit').val(data.role.name);
                $('#description_edit').val(data.role.description);

                $.each(data.role_menu, function(index, role_menu) {
                    // console.log(role_menu);
                    $('#edit_'+role_menu.menu_id).prop('checked',true);
                });
                $.each(data.role_menu_action, function(index, role_menu_action) {
                    // console.log(role_menu_action);
                    $('#action_'+role_menu_action.action_id+'_'+role_menu_action.menu_id).prop('checked',true);
                    $('.action_edit_'+role_menu_action.menu_id).prop('disabled',false);
                    // $('#action_'+role_menu_action.action+'_'+role_menu_action.menu_id).prop('checked',true);
                });

                $('#form_update').attr('action', base_url+'role/update/'+data.role.id);
            }
        });
    });

    $('#form_update').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $('#form_update').attr('action'), 
            method: 'POST',
            data: $('#form_update').serialize(),
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
                $('#form_update')[0].reset();
                $('#modal-edit').modal('hide');
            }
        });
    });

    $(document).on('click', '.btn_delete', function() {
        let id = $(this).attr('id');
        let name = $(this).attr('data-name');
        swal.fire({
            title: 'Are you sure?',
            text: "Delete "+name+" ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then(function(result){
            if (result.value) {
                $.get(base_url+"/role/destroy/"+id, function(data){
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

    $('#modal-edit').on('hidden.bs.modal', function () {
        $('.menus').prop('checked',false);
        $('.actions').prop('checked',false);
        if ($('.actions').is(':checked') == false) {
            $('.actions').prop('disabled',true);
        }
    });

});
</script>

<?php $this->load->view('template/footer') ?>