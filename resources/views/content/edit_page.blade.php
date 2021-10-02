<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit The Page</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content') }}" class="btn btn-primary btn-sm">Manage Pages</a>
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
                            <form method="POST" action="{{url('/content/update_page')}}" novalidate>
                                @csrf
                                <input name="id" type="hidden" value="{{$page_info->pk_page_id}}">
                                <input name="slug" type="hidden" value="{{$page_info->page_slug}}">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="name">Name <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="name" value="{{$page_info->page_name}}" class="form-control" data-validate-length-range="6" name="name" required="required" type="text">
                                    </div>
                                </div>
                                @if (isset($all_galleries))
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3 text-capitalize">Select Album</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="gallery_id" class="form-control">
                                            <option value="">Select One</option>
                                            @foreach ($all_galleries as $v)
                                            <option value="{{ $v->pk_content_id }}" {{ $v->pk_content_id ==  $gallery_info->fk_content_id  ? 'selected'  : '' }}>{{ $v->content_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/content/manage_pages') }}" class="btn btn-primary">Cancel</a>
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
        /* Current Menu Item */
        jQuery(function () {
            $('#contents').click();
            $(this).find('#pages').addClass('current-page');
        });
        /* End of Current Menu Item */
    });
</script>