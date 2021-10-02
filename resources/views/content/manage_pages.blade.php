<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Pages</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content/add_page') }}" class="btn btn-primary btn-sm">Add New Page</a>
                </div>
            </div>
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
                        <table class="display table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Slug</th>
                                    <th class="column-title">Name</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="contentTable">
                                @foreach ($all_pages as $page)
                                <tr class="odd pointer">
                                    <td class="">{{ $page->page_slug }}</td>
                                    <td class="">{{ $page->page_name }}</td>
                                    <td class="last">
                                        <a href="content/edit_page/{{ $page->pk_page_id }}" class="btn btn-success btn-sm">Content</a>
                                        @if ($page->page_type == 'additional')
                                        <a href="javascript:;" data-id="{{ $page->pk_page_id }}" class="btn btn-danger btn-sm show-alert">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
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
                        window.location.href = "{{ URL::to('/content/delete_page/') }}/" + id;
                    }
                }
            });
        });
    });
</script>