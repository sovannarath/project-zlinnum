<span class="property">
                            <div class="header-title">
                                <strong style="font-size: 18px">PROPERTY INFORMATION</strong>
                            </div>
                                <datalist id="project_title">
                                    @foreach($datalist->result as $value)
                                        <option>{{$value->name}}</option>
                                    @endforeach
                                </datalist>
                                <div class="row">
                                    <div class="col-12 col-sm-3">
                                    <div class="position-relative form-group">
                                        <label class="">From Project</label>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="enable_project_name">
                                      <label class="custom-control-label" for="enable_project_name">Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="project_use">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group">
                                        <label class="">Project</label>
                                        <div class="input-group">
                                        <select class="custom-select project-title-in-property">
                                            @foreach($datalist->result as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group">
                                        <label class=""><span class="red-star">*</span>Title</label>
                                        <input type="text" class="form-control property-title" placeholder="Enter Title of property">
                                        <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="position-relative form-group"><label class="">Property Type</label>
                                            <select name="" id="property-type-select" class="form-control">
                                                <option value="Land">Land</option>
                                                <option value="Flat">Flat</option>
                                                <option value="Condo">Condo</option>
                                                <option value="Villa">Villa</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">Type (Sale/Rent)</label>
                                            <select name="" id="sale_rent" class="form-control">
                                                <option value="sale">Sale</option>
                                                <option value="rent">rent</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="position-relative form-group"><label class=""><span class="red-star">*</span>Unit Price</label>
                                           <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">$ </span>
                                               </div>
                                            <input type="number" class="form-control unit-price" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">Per Unit</span>
                                            </div>
                                        </div>
                                                 <small class="form-text has-error-text"></small>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="position-relative form-group"><label class=""><span class="red-star">*</span>Price/sqm</label>
                                           <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">$ </span>
                                               </div>
                                            <input type="number" class="form-control pri-per-s" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">Per Sqm</span>
                                            </div>
                                        </div>
                                                <small class="form-text has-error-text"></small>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="position-relative form-group">
                                            <label for=""><span class="red-star">*</span>Land Width</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control land-width" value="0">

                                            <div class="input-group-append">
                                                <div class="input-group-text">m</div>
                                            </div>
                                                </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="position-relative form-group">
                                            <label for=""><span class="red-star">*</span>Land Lenght</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control land-length" value="0">

                                            <div class="input-group-append">
                                                <div class="input-group-text">m</div>
                                            </div>
                                                </div>
                                                <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="position-relative form-group">
                                            <label for=""><span class="red-star">*</span>Total Land Area</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control total-area" value="0">

                                            <div class="input-group-append">
                                                <div class="input-group-text">sqm</div>
                                            </div>
                                                </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="more-property">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Building Width</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control building-width" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                            <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Bed Room</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control bed-room">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8+">8+</option>
                                                </select>
                                            </div>
                                            <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Building Height</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control building-height" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                               <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Bathrooms</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control bathroom">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8+">8+</option>
                                                </select>
                                            </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Common Area</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control common-area" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Living Room</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control living-room">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>No of Floor</label>
                                            <div class="input-group">
                                                <input type="text"  class="form-control no-of-floor" value="">
                                            </div>
                                            <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Dinning Room</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control dinning-room">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>

                                                </select>
                                            </div>
                                               <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Mazzanine Floor</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control mazzanine-floor" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                            <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Kitchen</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control kitchen">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>

                                                </select>
                                                </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Total Building Area</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control total-building" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>
                                              <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Air Conditioner</label>
                                            <div class="input-group">
                                                <select class="form-control air-con">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                              <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Private Area</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control private_area">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Parking</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control parking">
                                                    <option value="0">--None--</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label><span class="red-star">*</span>Balcony</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control balcony" value="0">
                                            </div>
                                             <small class="form-text has-error-text"></small>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group"><label for="">Description</label>
                                    <div class="input-group">
                                        <textarea name="" id="" cols="30" rows="5" class="form-control description-property"></textarea>
                                    </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                 </div>



                            <div class="header-title">
                                PROPERTY LOCATION
                            </div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-12 col-sm-3">
                                        <label for="customCheck1">Show Map</label>
                                     <div class="custom-control custom-switch" style="display: inline-block;margin-left: 20px;">
                                        <input type="checkbox" class="custom-control-input show-map-checkbox" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"></label>
                                    </div>
                                    </div>
                                    </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for=""><span class="red-star">*</span>Street No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control st-no" placeholder="Street No">
                                        </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="position-relative form-group"><label for=""><span class="red-star">*</span>House No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control ho-no" placeholder="House No">

                                        </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for=""><span class="red-star">*</span>Khan/District</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control khan" placeholder="District/Khan">

                                        </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for=""><span class="red-star">*</span>Sangkat/Commune</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control sangkat" placeholder="Commune">

                                        </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for=""><span class="red-star">*</span> Phum/Village</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control phum" placeholder="village">
                                        </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                        <label for=""><span class="red-star">*</span>Country</label>
                                        <div class="input-group">
                                            <select class="custom-select country_property" datasrc="{{route('get-city')}}">
                                                <option value="">-- Please Select Country --</option>
                                                @foreach($country_list as $value)
                                                    <option value='{"name":"{{$value->name}}","id":"{{$value->id}}"}'>{{$value->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                              <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                        <label for=""><span class="red-star">*</span>City/Province</label>
                                        <div class="input-group">
                                            <select class="custom-select city_property">
                                                <option value="">-- Please Select City --</option>
                                            </select>
                                        </div>
                                              <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                        <label for=""><span class="red-star">*</span>Lat</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control lat-number">
                                        </div>
                                              <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                        <label for=""><span class="red-star">*</span>lng</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control lnt-number">
                                        </div>
                                              <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="map-layout" id="map-layout">

                                        </div>

                                    </div>
                                </div>
                            <div class="header-title">NEIGHBORHOOD</div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Location address</th>
                                    <th scope="col">Distance(Km)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="item-list">
                                    <th><input type="text" class="form-control address-property" placeholder="Address" name="address"></th>
                                    <td><input type="text" class="form-control distance-property" value="0" name="bedroom"></td>
                                </tr>

                                </tbody><tbody class="add-more-item-list"></tbody>


                            </table>

                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <button class="btn btn-success add-more-borhood" style="width: 100%;">
                                        Add More
                                    </button>

                                </div>
                            </div>

                            <div class="header-title">
                                PROPERTY PHOTO
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="loading" style="text-align: center;padding: 60px;">
                                        <img src="{{asset('assets/custom/media/ShadowyGratefulHamster-size_restricted.gif')}}" alt="" style="width: 30px">
                                    </div>
                                    <span class="get-image-property">
                                    <div style="width: 100%;" class="review-image"></div>
                                    </span>
                                    <span class="close-f remove-button showoff">
                                                <i class="fa fa-close"></i>
                                            </span>
                                    <div class="select-image"><input type="file" name="gallery-image" multiple="" class="get-image" accept="gif|jpg|png">Select Galleries Image <br> <i class="fas fa-image" style="font-size: 50px;margin-top: 5px;"></i></div>

                                </div>
                            </div>
                                <br>
                                @if(isset($button_action))
                                 {{$button_action}}
                                    @else
                                <div class="row">
                                        <div class="col12 col-4"></div>
                                        <div class="col12 col-4"></div>
                                        <div class="col12 col-4" style="text-align: right"><button class="btn btn-success save-project" datasrc="{{route('store-property')}}" data-image="{{route('add-image-property')}}">Insert Project</button></div>
                                    </div>
                                    @endif
                            </span>

