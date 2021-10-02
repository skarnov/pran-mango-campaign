<div class="right_col" role="main">
    <div class="">
        <div class="offer-title">
            <div class="title_left">
                <h3>Manage Video Galleries</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content/add_video_gallery') }}" class="btn btn-primary btn-sm">Add New Video Gallery</a>
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
                                    <th class="column-title">Album Name</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="contentTable">
                                @foreach ($all_galleries as $gallery)
                                <tr class="odd pointer">
                                    <td class="">{{ $gallery->content_title }}</td>
                                    <td class="last">
                                        <a href="edit_video_album/{{ $gallery->pk_content_id }}" class="btn btn-primary btn-sm">View & Edit</a>
                                        <a href="javascript:;" data-id="{{ $gallery->pk_content_id }}" class="btn btn-danger btn-sm show-alert">Delete Album</a>
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
                        window.location.href = "{{ URL::to('/content/delete_video_album/') }}/" + id;
                    }
                }
            });
        });
    });
</script>