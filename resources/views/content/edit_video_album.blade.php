<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View The Album</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content/manage_video_galleries') }}" class="btn btn-primary btn-sm">Manage Video Galleries</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
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
                        <div class="row">
                            @foreach ($album_info as $video)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="video view view-first">
                                        <div class="youtube-box">
                                            {{!! $video->featured_image !!}}
                                        </div>
                                        <div class="mask">
                                            <div class="tools tools-bottom">
                                                <a href="javascript:;" data-id="{{ $video->pk_content_id }}" class="show-alert"><i class="fa fa-times"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    jQ.push(function () {
        /* Current Menu Item */
        jQuery(function () {
            $('#contents').click();
            $(this).find('#videos').addClass('current-page');
        });
        /* End of Current Menu Item */

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
                        window.location.href = "{{ URL::to('/content/delete_video/') }}/" + id;
                    }
                }
            });
        });
    });
</script>