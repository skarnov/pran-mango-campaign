<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit The Offer</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content/manage_offers') }}" class="btn btn-primary btn-sm">Manage Offers</a>
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
                            <form method="POST" enctype="multipart/form-data" action="{{url('content/update_offer')}}" novalidate>
                                @csrf
                                <input class="form-control" name="id" value="{{$offer_info->pk_content_id}}" type="hidden">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="number">Serial</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="number" value="{{$offer_info->content_serial}}" class="form-control" name="serial" type="number">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="name">Name <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="name" value="{{$offer_info->content_title}}" class="form-control" data-validate-length-range="6" data-validate-words="1" name="name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="image">Featured Image <span class="required">*</span></label>
                                    <input type="hidden" name="previous_image" value="{{$offer_info->featured_image}}"/>
                                    <div class="col-md-6 col-sm-6">
                                        @if ($offer_info->featured_image)
                                        <img class="img-responsive avatar-view table-image" src="{{ URL::to('/uploads/') }}{{'/'}}{{ $offer_info->featured_image }} " alt="" title="{{ $offer_info->content_title }}">
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
                                    <label class="col-form-label col-md-2 col-sm-3">Link</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{$offer_info->external_link}}" name="external_link" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3">Status</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="status" class="form-control">
                                            {{$status = $offer_info->content_status}}
                                            <option value="published" {{ $status == 'published' ? 'selected':'' }}>Published</option>
                                            <option value="unpublished" {{ $status == 'unpublished' ? 'selected':'' }}>Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/content/manage_offers') }}" class="btn btn-primary">Cancel</a>
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
            $(this).find('#offers').addClass('current-page');
        });
        /* End of Current Menu Item */
    });
</script>