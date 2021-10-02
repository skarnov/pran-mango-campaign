<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Users</h3>
            </div>
<!--            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/admin/add_admin') }}" class="btn btn-primary btn-sm">Add New User</a>
                </div>
            </div>-->
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <div class="x_panel">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">ID</th>
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Member Since </th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($all_users as $user)
                                <tr class="odd pointer">
                                    <td class="">{{ $user->fb_id }}</td>
                                    <td class="">{{ $user->client_name }}</td>
                                    <td class="">{{ $user->create_date }}</td>
                                    <td class="last">
                                        <a href="javascript:;" data-id="{{ $user->pk_client_id }}" class="btn btn-danger btn-sm show-alert">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    jQ.push(function () {
        $(document).on("click", ".show-alert", function (e) {
            var id = $(this).attr("data-id");
            bootbox.confirm({
                message: "Are you sure you want to delete this item?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result == true) {
                        window.location.href = "{{ URL::to('/admin/delete_user/') }}/" + id;
                    }
                }
            });
        });
    });
</script>