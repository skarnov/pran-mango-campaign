<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Store Locator</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/storelocator/css/b07d9d33bbdd307207fcfbd5de959a6e.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/storelocator/css/b07d9d33bbdd307207fcfbd5de959a6e.css" media="all" />
        <script type="text/javascript" src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/storelocator/js/44290ef97dddbf412d60f883bddc934c.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            Mage.Cookies.path = '/';
            Mage.Cookies.domain = '.catseye.com.bd';
            //]]>
        </script>
        <script type="text/javascript">
            //<![CDATA[
            optionalZipCountries = ["BD"];
            //]]>
        </script>
        <script type="text/javascript">//<![CDATA[
            var Translator = new Translate([]);
            //]]></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script type="text/javascript">var grid_equal_height = true;</script>
    </head>

    <body class=" storelocator-index-index sidebar-mobile-toggle body-stretched">
        <div class="wrapper">
            <div class="main-container col1-layout">
                <div class="main">
                    <div class="container">
                        <div class="row">
                            <div class="col-main col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <style type="text/css">
                                    .storelocator-page h2.text-left{
                                        background-color: #FFFFFF;
                                        color: #000000;
                                    }
                                    .search-button a.search.active{
                                        background-color: #000000;
                                        color: #FFFFFF;
                                    }
                                    .search-filter ul li label button,
                                    .search-filter ul li label button:hover{
                                        background-color: #000000;
                                        color: #FFFFFF;
                                    }
                                    .info-locator .title-list h2,
                                    .table-wrap h2.title-store,
                                    .form-information h2,
                                    .tab_wrap h2,
                                    .tab_content .tabs li.active,
                                    .tab_content .tabs li.active.full-width{
                                        background-color: #000000;
                                        color: #FFFFFF;
                                    }
                                </style><style type="text/css">
                                    .btn-go-direction {
                                        background-color: #000000 !important;
                                    }
                                </style>
                                <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyA2WcP_p6Nqfch4wSizbevy6BKVFFpNPKM&sensor=false&libraries=geometry,places"></script>
                                <script type="text/javascript" src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/storelocator/js/storelocator.js"></script>
                                <script type="text/javascript" src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/storelocator/js/markerclusterer_compiled.js"></script>
                                <div class="storelocator-page">
                                    <h2 class="text-left">Store Locator</h2>
                                    <div class="search-button">
                                        <a class="search search-distance active" id="search-distance" onclick="showDistance()"><span>Search by distance</span></a>
                                        <a class="search search-area-magestore" id="search-area-magestore" onclick="showArea()"><span>Search by area</span></a>
                                    </div>
                                    <div class="search-content">
                                        <div class="container-search">
                                            <div class="row search-by-distance" id="form-search-distance" style="margin: 0;">
                                                <div class="col-md-5 input-location">
                                                    <input type="text" class="form-control" placeholder="Please enter a location"/>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-3 hidden-sm hidden-xs label-radius"><label>Radius</label></div>

                                                        <div id="track1" class="track col-md-7 col-sm-8 col-xs-9">
                                                            <div id="handle1" class="handle" style="width: 0.5em;" ></div>
                                                        </div>
                                                        <div class="" style="padding: 0px"><span class="range-slider-label" id="range-slider-label">10 km</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-12 search-type">
                                                    <div class="">
                                                        <button class="button reset"><span><span>Reset</span></span></button>
                                                        <button class="button search-distance"><span><span>Search</span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hide" id="form-search-area-magestore">
                                                <div class="seach-by-area col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-input">
                                                        <div class="col col-sm-6 col-xs-12">
                                                            <select class="form-control" searchType="country">
                                                                <option value="">Select country</option>
                                                                <option selected="selected" value="BD">Bangladesh</option>
                                                            </select>
                                                        </div>
                                                        <div class="col col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control input-text" searchType="state" placeholder="State/Province"/>
                                                            <select class="form-control" searchType="state" style="display:none;">
                                                                <option value="">Select State/Province</option>
                                                            </select>
                                                        </div>
                                                        <div class="col col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control input-text" searchType="city" placeholder="City"/>
                                                        </div>
                                                        <div class="col col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control input-text" searchType="zipcode" placeholder="Zip code"/>
                                                        </div>
                                                        <div class="col col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control input-text" searchType="name" placeholder="Store Name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 search-type-area search-type">
                                                    <div class="">
                                                        <button class="button reset"><span><span>Reset</span></span></button>
                                                        <button class="button search-area-magestore"><span><span>Search</span></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="locator-content">
                                        <div class="container-locator">
                                            <div class="col-xs-12 col-md-8 col-sm-8 " id="map" style="float: right"></div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 info-locator">
                                                <div class="box">
                                                    <div class="title-list"><h2>Store List<p><span></span></p></h2></div>
                                                    <p style="display:none; text-align: center" id="result-search">No store is found!</p>
                                                    <ul id="list-store-detail">
                                                        <?php
                                                        foreach ($all_markers as $v) {
                                                            ?>
                                                            <li class="el-content">
                                                                <div class="top-box col-xs-12" style="padding: 0;">
                                                                    <div class="col-sm-3 col-xs-3 tag-store">
                                                                        <a href="javascript:;">
                                                                            <img src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/storelocator/img/image-default.png"/>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-sm-9 col-xs-9 tag-content">
                                                                        <h4><a href="javascript:;" class="view-detail"><?php echo $v->name ?></a></h4>
                                                                        <p><?php echo $v->address ?></p>
                                                                        <p><?php echo $v->state ?>&nbsp;</p>
                                                                        <p>Bangladesh</p>
                                                                        <span class="address-store" style="display:none"> <?php echo $v->name ?></span>
                                                                        <p class="phone-store"><?php echo $v->phone ?></p>
                                                                        <span class="btn btn-link street-view">Street View</span>
                                                                        <span class="btn btn-link direction">Direction</span>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        <?php } ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="direction_controller" style="display:none">
                                    <div class="custom-popup col-xs-12" id="option-direction" style="padding: 0; display: none">
                                        <ul class="vertical">
                                            <li class="travel car active" value="DRIVING"><span>A</span></li>
                                            <li class="travel bus" value="TRANSIT"><span>A</span></li>
                                            <li class="travel walk" value="WALKING"><span>A</span></li>
                                            <li class="travel bicycle" value="BICYCLING"><span>A</span></li>
                                        </ul>
                                        <div id="directions-el" class="col-xs-12">
                                            <div class="widget-directions-searchbox-handle">
                                                <div class="widget-directions-icon waypoint-handle"><label for="origin">A</label></div>
                                                <div class="widget-directions-icon waypoint-to"><label for="origin">C</label></div>
                                                <div class="widget-directions-icon waypoint-bullet"><label for="origin">B</label></div>
                                            </div>
                                            <div class="form-inputs">
                                                <input class="form-control customer-location start" type="text" autocomplete="off">
                                                <input class="form-control store-location end" readonly="true" type="text" autocomplete="off">
                                            </div>
                                            <div class="widget-directions-right-overlay"><button type="button" class="swap-locations" title="Swap locations A-B">Swap locations A-B</button></div>
                                            <div class="directions-panel"></div>
                                        </div>
                                        <div class="box-input">
                                            <button title="Go" class="button btn btn-show btn-go-direction">
                                                <span>Go</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="box-view">
                                    <div class="widget-mylocation">
                                        <button id="widget-mylocation-button" class="widget-mylocation-button" title="Show My Location" onclick="mapManager.currentPosition()">
                                            <div class="widget-mylocation-cookieless"></div>
                                        </button>
                                        <div class="widget-mylocation-tooltip widget-mylocation-tooltip-invisible">
                                            <div class="widget-mylocation-tooltip-label-wrapper">
                                                <div class="widget-mylocation-tooltip-label" style="display:none">
                                                    <label>Show My Location</label>
                                                </div>
                                            </div>
                                            <div class="widget-mylocation-tooltip-pointer"></div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var storeTranslate = {
                                        noneStore: '0 store',
                                        oneStore: '1 store',
                                        moreStore: ' stores',
                                        geocodeMissuccess: 'Geocode was not successful for the following reason: ',
                                        enterLocation: 'Please enter a location to search!',
                                        streetNotFound: 'Street View data cannot found for this location.',
                                        directionFailded: 'Directions request failed due to ',
                                        geoLocationFailded: 'Error: The Geolocation service failed.',
                                        geoLocationBrower: 'Error: Your browser doesn\'t support geolocation.',
                                    };
                                    var mapManager;
                                    var mcOptions = JSON.parse('[{"height":53,"url":"https:\/\/catseye.com.bd\/media\/storelocator\/images\/markerclusterer\/m1.png","width":53},{"height":56,"url":"https:\/\/catseye.com.bd\/media\/storelocator\/images\/markerclusterer\/m2.png","width":56},{"height":66,"url":"https:\/\/catseye.com.bd\/media\/storelocator\/images\/markerclusterer\/m3.png","width":66},{"height":78,"url":"https:\/\/catseye.com.bd\/media\/storelocator\/images\/markerclusterer\/m4.png","width":78},{"height":90,"url":"https:\/\/catseye.com.bd\/media\/storelocator\/images\/markerclusterer\/m5.png","width":90}]');
                                    var radius = 10;
                                    window.onload = function () {
                                        mapManager = new MapManager({
                                            map: $('map'),
                                            mcOption: mcOptions,
                                            unit: {label: 'km', value: '1000'},
                                            url_icon: 'https://catseye.com.bd/media/storelocator/images/icon/resize/{icon}',
                                            listInfo: $$('#list-store-detail li'),
                                            circleMarkerIcont: 'https://catseye.com.bd/skin/frontend/base/default/images/storelocator/center.png',
                                            mapStyle: [],
                                            stores: <?php echo json_encode($all_markers) ?>,
                                            countLabel: $$('.locator-content .title-list span').first()
                                        });
                                        mapManager.map.controls[google.maps.ControlPosition.LEFT_TOP].push($('box-view'));
                                        mapManager.filterByArea();
                                        var array = [1];
                                        for (i = 1; i <= 200; i++) {
                                            array.push(i);
                                        }
                                        var unit = 'km';
                                        var deaultRadius = 10;
                                        new Control.Slider('handle1', 'track1', {
                                            range: $R(1, 200), values: array, sliderValue: deaultRadius,
                                            onChange: function (v) {
                                                $('range-slider-label').update(v + unit);
                                                radius = v;
                                                mapManager.changeRadius(v);
                                            },
                                            onSlide: function (v) {
                                                $('range-slider-label').update(v + unit);
                                                radius = v;
                                                mapManager.changeRadius(v);
                                            }
                                        });
                                    };
                                    google.maps.event.addDomListener(window, 'load', function () {
                                        var autocomplete = new google.maps.places.Autocomplete($$('#form-search-distance input.form-control').first());

                                        google.maps.event.addListener(autocomplete, 'place_changed', function () {
                                            mapManager.codeAddress($$('#form-search-distance input.form-control').first().value, radius);
                                        });

                                    });

                                    var defaultOption = document.createElement('option');
                                    defaultOption.value = '';
                                    defaultOption.innerHTML = 'Select State/Province';
                                    if ($('form-search-area-magestore') && $('form-search-area-magestore').down('select[searchtype=country]')) {
                                        $('form-search-area-magestore').down('select[searchtype=country]').observe('change', function () {
                                            if (this.value !== 'Select country') {
                                                var inputState = $('form-search-area-magestore').down('input[searchtype=state]');
                                                var selectState = $('form-search-area-magestore').down('select[searchtype=state]');
                                                var states = mapManager.getStateByCountry(this.value);
                                                if (states.length > 0) {
                                                    inputState.hide();
                                                    selectState.show();
                                                    selectState.innerHTML = '';
                                                    selectState.appendChild(defaultOption);
                                                    for (var i = 0; i < states.length; i++) {
                                                        var option = document.createElement('option');
                                                        option.value = states[i];
                                                        option.innerHTML = states[i];
                                                        option.setAttribute('title', states[i]);
                                                        selectState.appendChild(option);
                                                    }
                                                    ;
                                                } else {
                                                    inputState.show();
                                                    selectState.hide();
                                                }
                                            }
                                        });
                                    }

                                    $$('#list-tag-ul input:checkbox').invoke('observe', 'click', function () {
                                        mapManager.filterbyTag();
                                    });

                                    $$('.container-search .button.reset').invoke('observe', 'click', function () {
                                        mapManager.resetMap();
                                    });
                                    if ($('storelocator_tag_check_all'))
                                        $('storelocator_tag_check_all').observe('click', function () {
                                            $$('#list-tag-ul input:checkbox').each(function (el) {
                                                el.checked = true;
                                                mapManager.filterbyTag();
                                            });
                                        });

                                    $$('button.search-distance').first().observe('click', function () {
                                        mapManager.codeAddress($$('#form-search-distance input.form-control').first().value, radius);
                                    });


                                    //Search by are
                                    $$('#form-search-area-magestore .reset').invoke('observe', 'click', function () {
                                        mapManager.resetMap();
                                    });
                                    $$('#form-search-area-magestore .search-area-magestore').invoke('observe', 'click', function () {
                                        mapManager.filterByArea();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>