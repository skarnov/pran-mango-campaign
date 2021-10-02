<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Sliders</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content/manage_sliders') }}" class="btn btn-primary btn-sm">Manage Sliders</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-12">
                            @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <!-- Show Error -->
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <!-- End of Show Error -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Serial</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_slider_info as $slide)
                                    <tr>
                                        <td>
                                            @if ($slide->featured_image)
                                            <img class="img-responsive avatar-view table-image" src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $slide->featured_image }}" alt="" title="{{ $slide->featured_image }}">
                                            @else
                                            <img class="img-responsive avatar-view table-image" src="{{ URL::to('/assets/noImage.png') }}" alt="" title="No Image Available">
                                            @endif
                                        </td>
                                        <td>{{ $slide->content_serial }}</td>
                                        <td>
                                            @if ($slide->content_status == 'published')
                                            <span class="badge badge-success">Published</span>
                                            @endif
                                            @if ($slide->content_status == 'unpublished')
                                            <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                        </td>
                                        <td class="last">
                                            <a href="{{ URL('/content/edit_slide/') }}/{{ $slide->pk_content_id }}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="javascript:;" data-id="{{ $slide->pk_content_id }}" class="btn btn-danger btn-sm show-alert">Delete</a>
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
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    jQ.push(function () {
        /* Start Image Upload */
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
        /* End of Image Upload */

        /* Current Menu Item */
        jQuery(function () {
            $('#contents').click();
            $(this).find('#sliders').addClass('current-page');
        });
        /* End of Current Menu Item */

        /* TinyMCE */
        tinymce.init({
            selector: 'textarea#tiny'
        });
        tinymce.init({
            selector: 'textarea#tinySummary'
        });

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
                        window.location.href = "{{ URL::to('/content/delete_slide/') }}/" + id;
                    }
                }
            });
        });
    });
</script>