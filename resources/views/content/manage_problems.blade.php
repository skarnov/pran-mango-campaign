<div class="right_col" role="main">
    <div class="">
        <div class="problem-title">
            <div class="title_left">
                <h3>Manage Problems</h3>
            </div>
            <!--            <div class="title_right">
                            <div class="form-group pull-right">
                                <a href="{{ URL::to('/content/add_problem') }}" class="btn btn-primary btn-sm">Add New Problem</a>
                            </div>
                        </div>-->
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <div class="x_panel">
                    <form method="POST" action="{{url('content/filter_problem')}}" novalidate>
                        @csrf
                        <fieldset>
                            <div class="control-group col-md-6">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <div class="col-md-4 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" name="start" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                        </div>
                                        <div class="col-md-4 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" name="end" class="form-control has-feedback-left" id="single_cal2" placeholder="First Name" aria-describedby="inputSuccess2Status">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Filter</button>
                            </div>
                        </fieldset>
                    </form>
                    <div class="table-responsive">
                        <table class="display table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Date</th>
                                    <th class="column-title">User Details</th>
                                    <th class="column-title">Problem Details</th>
                                    <th class="column-title">Status</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="contentTable">
                                @foreach ($all_problems as $problem)
                                <tr class="odd pointer">
                                    <td>{{ date('jS F Y', strtotime($problem->create_date)) }}</td>
                                    <td class="" style="width: 30%">
                                        Name: {{ $problem->client_name }} <br/>
                                        Gender: <span class="text-capitalize">{{ $problem->gender }}</span> <br/>
                                        Age: {{ $problem->age }} <br/>
                                        Occupation: {{ $problem->occupation }} <br/>
                                        Area: {{ $problem->area }} <br/>
                                        Ward: {{ $problem->ward }} <br/>
                                        City Corporation: <span class="text-capitalize">{{ $problem->city }}</span> <br/>
                                    </td>
                                    <td class="" style="width: 40%">
                                        Main Problem: {{ $problem->main_problem }} <br/>
                                        User Suggestion: {{ $problem->solve_suggestion }} <br/>
                                        User Initiative: {{ $problem->self_suggestion }} <br/>
                                        Volunteer: <span class="text-capitalize">{{ $problem->volunteer_status }}</span> <br/>
                                        Pran Suggestion: {{ $problem->suggestion }} <br/>
                                    </td>
                                    <td class="">
                                        @if ($problem->problem_status == 'active')
                                        <span class="badge badge-success">Featured</span>
                                        @endif
                                        @if ($problem->problem_status == 'inactive')
                                        <span class="badge badge-danger">Not Featured</span>
                                        @endif
                                    </td>
                                    <td class="last">
                                        @if ($problem->problem_status == 'active')
                                        <a href="feature_problem_no/{{ $problem->pk_problem_id }}" class="btn btn-primary btn-sm">Not Feature</a>
                                        @endif
                                        @if ($problem->problem_status == 'inactive')
                                        <a href="feature_problem_yes/{{ $problem->pk_problem_id }}" class="btn btn-warning btn-sm">Feature</a>
                                        @endif
                                        <a href="javascript:;" data-id="{{ $problem->pk_problem_id }}" class="btn btn-danger btn-sm show-alert">Delete</a>
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
        <div class="clearfix"></div>
    </div>
</div>
<script>
    jQ.push(function () {
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
                        window.location.href = "{{ URL::to('/content/delete_problem/') }}/" + id;
                    }
                }
            });
        });
    });
</script>