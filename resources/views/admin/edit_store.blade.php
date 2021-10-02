<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit The Store</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/admin/manage_stores') }}" class="btn btn-primary btn-sm">Manage Stores</a>
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
                            <form method="POST" action="{{url('/admin/update_store')}}" novalidate>
                                @csrf
                                <input name="id" value="{{ $store_info->storelocator_id }}" type="hidden">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="name" class="form-control" value="{{ $store_info->name }}" name="name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="phone">Mobile <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" id="mobile" name="phone" value="{{ $store_info->phone }}"required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="state">State <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="state" name="state" value="{{ $store_info->state }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="state_id">State ID <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="state_id" name="state_id" value="{{ $store_info->state_id }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="latitude">Latitude <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="latitude" name="latitude" value="{{ $store_info->latitude }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="longtitude">Longtitude <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="longtitude" name="longtitude" value="{{ $store_info->longtitude }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="city">City <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="city" name="city" value="{{ $store_info->city }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="address">Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="address" name="address" value="{{ $store_info->address }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/admin/manage_stores') }}" class="btn btn-primary">Cancel</a>
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
            $('#stores').click();
            $(this).find('#stores').addClass('current-page');
        });
        /* End of Current Menu Item */
    });
</script>