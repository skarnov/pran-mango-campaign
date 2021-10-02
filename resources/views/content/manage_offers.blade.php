<div class="right_col" role="main">
    <div class="">
        <div class="offer-title">
            <div class="title_left">
                <h3>Manage Offers</h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right">
                    <a href="{{ URL::to('/content/add_offer') }}" class="btn btn-primary btn-sm">Add New Offer</a>
                </div>
            </div>
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
                    <div class="table-responsive">
                        <table class="display table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Image</th>
                                    <th class="column-title">Serial</th>
                                    <th class="column-title">Offer Name</th>
                                    <th class="column-title">Link</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="contentTable">
                                @foreach ($all_offers as $offer)
                                <tr class="odd pointer">
                                    <td class="">
                                        @if ($offer->featured_image)
                                        <img class="img-responsive avatar-view table-image" src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $offer->featured_image }}" alt="" title="{{ $offer->featured_image }}">
                                        @else
                                        <img class="img-responsive avatar-view table-image" src="{{ URL::to('/assets/noImage.png') }}" alt="" title="No Image Available">
                                        @endif
                                    </td>
                                    <td class="">{{ $offer->content_serial }}</td>
                                    <td class="">{{ $offer->content_title }}</td>
                                    <td class="">{{ $offer->external_link }}</td>
                                    <td class="last">
                                        <a href="edit_offer/{{ $offer->pk_content_id }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="javascript:;" data-id="{{ $offer->pk_content_id }}" class="btn btn-danger btn-sm show-alert">Delete</a>
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
                        window.location.href = "{{ URL::to('/content/delete_offer/') }}/" + id;
                    }
                }
            });
        });
    });
</script>