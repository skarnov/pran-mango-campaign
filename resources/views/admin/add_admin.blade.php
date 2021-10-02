<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New Admin</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/admin/manage_admins') }}" class="btn btn-primary btn-sm">Manage Admins</a>
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
                            <form method="POST" action="{{url('/admin/save_admin')}}" novalidate>
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="name" class="form-control" data-validate-length-range="6" data-validate-words="1" name="name" value="{{ old('name') }}" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-2 col-sm-3" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="col-form-label col-md-2">Password <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="password" type="password" name="password" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password2" class="col-form-label col-md-2 col-sm-3">Repeat Password <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ URL::to('/admin/manage_admins') }}" class="btn btn-primary">Cancel</a>
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