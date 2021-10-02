<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-cogs"></i> System Settings</h2>
                        <ul class="nav navbar-right panel_toolbox"></ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12">
                            @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <form method="POST" action="{{url('/settings/update_settings')}}" novalidate>
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-2" for="name">Application Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input value="{{$config->app_name}}" id="name" class="form-control" data-validate-length-range="6" data-validate-words="1" name="app_name" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-2" for="name">Copyright Info <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input value="{{$config->copyright_info}}" id="name" class="form-control" data-validate-length-range="6" name="copyright_info" required="required" type="text">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/admin') }}" class="btn btn-primary">Cancel</a>
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
