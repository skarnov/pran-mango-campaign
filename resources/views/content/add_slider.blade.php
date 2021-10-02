<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New Slider</h3>
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
                            <form method="POST" enctype="multipart/form-data" action="{{url('content/save_slider')}}" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Select  Album/ Create Album</label>
                                                <select required name="album_id" id="newAlbum" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach ($all_albums as $album)
                                                    <option value="{{ $album->pk_content_id }}">{{ $album->content_title }}</option>
                                                    @endforeach
                                                    <option value="createNewAlbum">Create New</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group" id="albumName" style="display: none">
                                            <div class="col-md-12">
                                                <label>Slider Album Name</label>
                                                <input class="form-control" name="name" value="{{ old('name') }}"  required="required" type="text">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label for="number">Serial</label>
                                                <input id="number" class="form-control" value="{{ old('serial') }}" name="serial" type="number">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label for="image">Slider Image <span class="required">*</span></label>
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
                                                <input class="form-control" value="{{ old('external_link') }}" name="external_link" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Title Area</label>
                                                <textarea id="tiny" name="title">{{ old('name') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Summary</label>
                                                <textarea id="tinySummary" name="summary">{{ old('summary') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="published">Published</option>
                                                    <option value="unpublished">Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/content/manage_sliders') }}" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Save</button>
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

        $("#newAlbum").change(function () {
            var value = this.value;
            if (value == 'createNewAlbum')
                $('#albumName').show();
            else
                $('#albumName').hide();
        });
        
        /* TinyMCE */
        tinymce.init({
            selector: 'textarea#tiny'
        });
        tinymce.init({
            selector: 'textarea#tinySummary'
        });
    });
</script>