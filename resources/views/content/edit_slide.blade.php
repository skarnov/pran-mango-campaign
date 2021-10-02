<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Slide</h3>
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
                            <form method="POST" enctype="multipart/form-data" action="{{url('content/update_slide')}}" novalidate>
                                @csrf
                                <input class="form-control" name="id" value="{{ $slider_info->pk_content_id }}" type="hidden">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label for="number">Serial</label>
                                                <input id="number" class="form-control" value="{{ $slider_info->content_serial }}" name="serial" type="number">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label for="image">Slider Image <span class="required">*</span></label>
                                                <input type="hidden" name="previous_image" value="{{ $slider_info->featured_image }}"/>
                                                @if ($slider_info->featured_image)
                                                <img class="img-responsive avatar-view table-image" src="{{ URL::to('/uploads/') }}{{'/'}}{{ $slider_info->featured_image }} " alt="" title="{{ $slider_info->content_title }}">
                                                @else
                                                <img class="img-responsive avatar-view table-image" src="{{ URL::to('/assets/noImage.png') }}" alt="" title="No Image Available">
                                                @endif
                                                <input type="file" accept="image/*" name="image" class="file">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-md" disabled="" placeholder="Upload Image">
                                                    <span class="input-group-btn">
                                                        <button class="browse btn btn-primary input-md" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Link</label>
                                                <input class="form-control" value="{{ $slider_info->external_link }}" name="external_link" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Title Area</label>
                                                <textarea id="tiny" name="title">{{ $slider_info->additional_info }}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Summary</label>
                                                <textarea id="tinySummary" name="summary">{{ $slider_info->content_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    {{$status = $slider_info->content_status}}
                                                    <option value="published" {{ $status == 'published' ? 'selected':'' }}>Published</option>
                                                    <option value="unpublished" {{ $status == 'unpublished' ? 'selected':'' }}>Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/content/manage_sliders') }}" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
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
    });
</script>