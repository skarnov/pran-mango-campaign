<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New Video Gallery</h3>
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
                            <form method="POST" enctype="multipart/form-data" action="{{url('content/save_video_gallery')}}" novalidate>
                                @csrf
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Select  Album/ Client Album</label>
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
                                    <div class="col-md-6 col-sm-6">
                                        <label>Album Name</label>
                                        <input class="form-control" name="name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <button id="firstButton" type="button" class="addMore btn btn-danger">Add More Video</button>
                                    </div>
                                </div>
                                <div class="addMoreVideos">

                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/content/manage_video_galleries') }}" class="btn btn-primary">Cancel</a>
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
        /* Current Menu Item */
        jQuery(function () {
            $('#contents').click();
            $(this).find('#videos').addClass('current-page');
        });
        /* End of Current Menu Item */

        /* Start Multiple Video */
        /* Auto Click */
        jQuery(function () {
            $('.addMore').click();
        });

        var addButton = $('.addMore');
        var wrapperArea = $('.addMoreVideos');
        var fieldHTML = "<div class='item form-group'>\
                    <div class='col-md-6 col-sm-6'>\
                        <label>Gallery Image</label>\
                            <input type='file' accept='image/*' name='image[]' class='file'>\
                                <div class='input-group'>\
                                    <input type='text' class='form-control input-md' disabled placeholder='Upload Image'>\
                                    <span class='input-group-btn'>\
                                        <button class='browse btn btn-primary input-md' type='button'><i class='glyphicon glyphicon-search'></i> Browse</button>\
                                    </span>\
                                </div>\
                                <span class ='AddMoreButton'><button type='button' class='addMore btn btn-danger'>Add More Image</button></span>\
                                <button type='button' class='DeleteMore btn btn-primary'>Delete This</button>\
                            </div>\
                        </div>\<div class='item form-group'>\
                            <div class='col-md-6 col-sm-6'>\
                                <label>YouTube Embedded Link</label>\
                                <textarea name='video[]' class='form-control noresize' style='height: 160px'></textarea>\
                                <span class ='AddMoreButton'><button type='button' class='addMore btn btn-danger'>Add More Image</button></span>\
                                <button type='button' class='DeleteMore btn btn-primary'>Delete This</button>\
                            </div>\
                        </div>";

        /* First Increment */
        $(addButton).click(function () {
            $(addButton).remove();
            $(wrapperArea).append(fieldHTML);
        });

        /* Others Increment */
        $(wrapperArea).on('click', '.addMore', function (e) {
            e.preventDefault();
            $('.AddMoreButton').remove();
            $(wrapperArea).append(fieldHTML);
        });

        /* Delete Input */
        $(wrapperArea).on('click', '.DeleteMore', function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });
        /* End Multiple Video */

        $("#newAlbum").change(function () {
            var value = this.value;
            if (value == 'createNewAlbum')
                $('#albumName').show();
            else
                $('#albumName').hide();
        });
    });
</script>