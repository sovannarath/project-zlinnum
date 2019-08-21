<span class="project">
    <div class="header-title">
        @php $lock = ""; @endphp

                            <strong style="font-size: 20px;">Project Information</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                <div class="position-relative form-group">
                                    <label class="">Project Type</label>
                                        <select name="projectType" class="form-control">
                                            @foreach($type as $value)
                                                @isset($old_data->project_type)
                                                    @if($value->name == $old_data->project_type)
                                                        @php $lock = "selected='selected'" @endphp
                                                    @else
                                                        @php $lock = "" @endphp
                                                    @endif
                                                @endisset
                                                <option
                                                    value="{{$value->id}}" {{$lock}}>{{\App\Http\Controllers\MasterController::check_centen($value->name)}}</option>
                                            @endforeach
                                        </select></div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group">
                                        <label class=""><span class="red-star">*</span>Project Title</label>
                                        <input type="text" class="form-control project-title"
                                               placeholder="Enter Project Title"
                                               value="@isset($old_data->title){{$old_data->title}}@endisset">
                                        <small class="form-text has-error-text"></small>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group">
                                        <label class=""><span class="red-star">*</span>Buil Date</label>
                                        <input type="text" class="form-control buil-date" placeholder="Enter Buil Date"
                                               id="datepicker"
                                               value="@isset($old_data->built_date){{$old_data->built_date}}@endisset">
                                        <small class="form-text has-error-text"></small>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group">
                                        <label class="">Complete Date</label>
                                        <input type="text" class="form-control complete-date"
                                               placeholder="Enter Complete Date" id="datepicker1"
                                               value="@isset($old_data->completed_date){{$old_data->completed_date}}@endisset"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class=""><span class="red-star">*</span>Guaranteed Rental Returns(%)</label>
                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control grr"
                                                   value="@isset($old_data->grr){{$old_data->grr}}@endisset">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                        </div>
                                        <small class="form-text has-error-text"></small>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">

                                    <div class="position-relative form-group">
                                        <label class="">Down Payment</label>
                                        <input type="number" class="form-control down-payment"
                                               value="@isset($old_data->down_payment){{$old_data->down_payment}}@endisset">
                                    </div>

                                </div>
                            </div>
                            <div class="header-title">
                                <strong style="font-size: 20px;">Price</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">Rent / Sale</label>
                                        <select class="custom-select sale-rent">
                                            @foreach(['sale','rent'] as $value)
                                                @isset($old_data->project_type)
                                                    @if($value == $old_data->rent_or_buy)
                                                        @php $lock = "selected='selected'" @endphp
                                                    @else
                                                        @php $lock = "" @endphp
                                                    @endif
                                                @endisset
                                                <option value="{{$value}}" {{$lock}}>{{ucwords($value)}}</option>
                                            @endforeach
                                        </select>
                                        <span class="apartment-option">
                                          <div style="margin-top: 10px;">
                                        <span
                                            style="width: 100%;background: green;color: white;display: block;padding: 5px;border-radius: 5px;text-align: center">Rent</span>
                                                </div>
                                         </span>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label class=""><span class="red-star">*</span>From Price</label>
                                        <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control from-price"
                                                   value="@isset($old_data->avg_annual_rent_from){{$old_data->avg_annual_rent_from}}@else {{0}} @endisset">
                                        </div>
                                        <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label class=""><span class="red-star">*</span>To Price</label>
                                        <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control to-price"
                                                   value="@isset($old_data->avg_annual_rent_to){{$old_data->avg_annual_rent_to}}@endisset">
                                        </div>
                                        <small class="form-text has-error-text"></small>
                                    </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class=""><span class="red-star">*</span>Total Price</label>

                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control total-price"
                                                   value="@isset($old_data->price){{$old_data->price}}@endisset">
                                        </div>
                                        <small class="form-text has-error-text"></small>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="">Price/Sqm</label>

                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control pri-s"
                                                   value="@isset($old_data->sqm_price){{$old_data->sqm_price}}@endisset">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Per Sqm</span>
                                            </div>

                                        </div>
                                        <small class="form-text has-error-text"></small>
                                    </div>

                                </div>
                            </div>
                                 <div class="tower">
                                     <div class="header-title">
                                <strong style="font-size: 20px;">Tower Type</strong>

                            </div>
                                     <span class="tower-result">

                                        @if(isset($old_data->tower_type))
                                         @foreach($old_data->tower_type as $item)
                                          <div class="row">
                                         <div class="col-12 col-sm-4">
                                          <div class="position-relative form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control tower-item" value="{{$item->type}}" id="{{$item->id}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Remove</span>
                                            </div>
                                        </div>
                                              </div>
                                         </div>
                                             </div>
                                         @endforeach
                                            @else
                                             <div class="row">
                                         <div class="col-12 col-sm-4">
                                          <div class="position-relative form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control tower-item" value="" id="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Remove</span>
                                            </div>
                                        </div>
                                              </div>
                                         </div>
                                             </div>
                                             <div class="row">
                                         <div class="col-12 col-sm-4">
                                          <div class="position-relative form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control tower-item" value="" id="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Remove</span>
                                            </div>
                                        </div>
                                              </div>
                                         </div>
                                             </div>
                                             <div class="row">
                                         <div class="col-12 col-sm-4">
                                          <div class="position-relative form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control tower-item" value="" id="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Remove</span>
                                            </div>
                                        </div>
                                              </div>
                                         </div>
                                             </div>
                                             <div class="row">
                                         <div class="col-12 col-sm-4">
                                          <div class="position-relative form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control tower-item" value="" id="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Remove</span>
                                            </div>
                                        </div>
                                              </div>
                                         </div>
                                             </div>


                                          @endif
                                     </span>
                                     <div class="row">
                                         <div class="col-12 col-6">
                                             <button class="add-more-tower-button btn btn-secondary">
                                                Add More Tower
                                            </button>
                                         </div>

                                     </div>

                                </div>
                            <div class="header-title">
                                <strong style="font-size: 20px;">Address</strong>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class=""><span
                                                class="red-star">*</span>Country</label>

                                        <select name="" id="" class="custom-select country-select"
                                                datasrc="{{route('get-city')}}">
                                            <option value='{"id":"0","name":""}'>-- Please Select Country--</option>
                                         @foreach($country_list as $value)
                                                @isset($old_data->country)
                                                    @if(strtolower($value->name) == strtolower($old_data->country))
                                                        @php $lock = "selected='selected'" @endphp
                                                    @else
                                                        @php $lock = "" @endphp
                                                    @endif
                                                @endisset
                                                <option
                                                    value='{"name":"{{$value->name}}","id":"{{$value->id}}"}' {{$lock}}>{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class=""><span
                                                class="red-star">*</span>City</label>
                                        <select name="" id="" class="custom-select city-select"
                                                data-value="@isset($old_data->city){{$old_data->city}}@endisset">
                                            <option value="">-- Please Select City--</option>
                                        </select>
                                        <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class=""><span
                                                class="red-star">*</span>Address 1#</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control address1"
                                                  placeholder="Enter Address 1#">@isset($old_data->address_1){{$old_data->address_1}}@endisset</textarea>
                                        <small class="form-text has-error-text"></small>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">Address 2#</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control address2"
                                                  placeholder="Enter Address 2#">@isset($old_data->address_2){{$old_data->address_2}}@endisset</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="header-title">
                                <strong style="font-size: 20px;"><span
                                        class="red-star">*</span>Basic Information</strong>
                            </div>

                            <div id="standalone-container" style="max-width: 800px;">

                                     <div id="editor"
                                          class="quill">@isset($old_data->description)@php echo $old_data->description @endphp @endisset</div>
                                     <small class="form-text has-error-text"></small>

                            </div>







                            <div class="header-title">
                                <strong style="font-size: 20px;">Feature</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <label class=""><span class="red-star">*</span>Title</label>

                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                                <input type="text" class="form-control feature-title"
                                                       placeholder="Title" style="max-width: 800px"
                                                       value="@isset($old_data->introductions[0]->name){{$old_data->introductions[0]->name}}@endisset"
                                                       id="@isset($old_data->introductions[0]->id){{$old_data->introductions[0]->id}}@endisset">
                                        </div>
                                          <small class="form-text has-error-text"></small>
                                    </div>

                                </div>
                            </div>
                        <div id="standalone-container" style="max-width: 800px;"><span class="red-star">*</span>
                                <div
                                    id="editor1">@isset($old_data->introductions[0]->description) @php echo $old_data->introductions[0]->description;@endphp @endisset</div>
                               <small class="form-text has-error-text"></small>
                                </div>

                            <div class="header-title">
                                <strong style="font-size: 20px;">Property Type</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 property-type">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Bedroom</th>
                                        <th scope="col">Bathroom</th>
                                        <th scope="col">Floor</th>
                                        <th scope="col">Parking</th>
                                        <th scope="col">Width</th>
                                        <th scope="col">Height</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @if(isset($old_data->property_types))
                                         @foreach($old_data->property_types as $item)
                                             <tr class="item-list">
                                        <input type="hidden" class="id_property_type" value="{{$item->id}}">
                                        <th><input type="text" class="form-control" placeholder="Type" name="type"
                                                   value="{{$item->type}}"></th>
                                        <td><input type="text" class="form-control" value="{{$item->bedroom}}"
                                                   name="bedroom"></td>
                                        <td><input type="text" class="form-control" value="{{$item->bathroom}}"
                                                   name="bathroom"></td>
                                        <td><input type="text" class="form-control" value="{{$item->floor}}"
                                                   name="floor"></td>
                                        <td><input type="text" class="form-control" value="{{$item->parking}}"
                                                   name="packing"></td>
                                        <td><input type="text" class="form-control" value="{{$item->width}}"
                                                   name="width"></td>
                                        <td><input type="text" class="form-control" value="{{$item->height}}"
                                                   name="height"></td>
                                        <td><button class="btn btn-dark remove-item-list">Remove</button></td>
                                    </tr>
                                         @endforeach
                                    @else
                                         <tr class="item-list">
                                        <input type="hidden" class="id_property_type">
                                        <th><input type="text" class="form-control" placeholder="Type" name="type"
                                                   value=""></th>
                                        <td><input type="text" class="form-control" value="0"
                                                   name="bedroom"></td>
                                        <td><input type="text" class="form-control" value="0"
                                                   name="bathroom"></td>
                                        <td><input type="text" class="form-control" value="0"
                                                   name="floor"></td>
                                        <td><input type="text" class="form-control" value="0"
                                                   name="packing"></td>
                                        <td><input type="text" class="form-control" value="0"
                                                   name="width"></td>
                                        <td><input type="text" class="form-control" value="0"
                                                   name="height"></td>
                                        <td><button class="btn btn-dark remove-item-list">Remove</button></td>
                                    </tr>



                                    @endif

                                    <tbody class="add-more-item-list"></tbody>
                                    </tbody>
                                </table>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <button class="btn btn-success add-more-item" style="width: 100%;">
                                                Add More
                                            </button>

                                        </div>
                                    </div>
                                    <div class="header-title">
                                        <strong style="font-size: 20px;">Thumbnail</strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="loading" style="text-align: center;padding: 60px;">
                                                <img
                                                    src="{{asset('assets/custom/media/ShadowyGratefulHamster-size_restricted.gif')}}"
                                                    alt="" style="width: 30px">
                                            </div>
                                            <div style="width: 100%;@isset($old_data->thumbnail) display:block  @endisset" class="review-image thumbnail" >
                                                @isset($old_data->thumbnail)
                                                    @php try{@endphp
                                                    @php  $type =  pathinfo($old_data->thumbnail, PATHINFO_EXTENSION); @endphp
                                                    <img src="data:image/{{$type.";base64,".base64_encode(file_get_contents($old_data->thumbnail))}}" style="width: 100%">
                                                    @php }catch(\Exception $e){ }@endphp
                                                @endisset
                                            </div>
                                            <span class="close-f remove-button  @isset($old_data->thumbnail) showon @else showoff @endisset ">
                                                <i class="fa fa-close"></i>
                                            </span>
                                            <div class="select-image" @isset($old_data->thumbnail) style="display: none" @endisset>
                                                <input type="file" name="thumbnail" class="get-image" accept="gif|jpg|png">Select Thumbnail Image <br> <i
                                                    class="fas fa-image"
                                                    style="font-size: 50px;margin-top: 5px;"></i></div>

                                        </div>
                                    </div>
                                    <div class="header-title">
                                        <strong style="font-size: 20px;">Image Galleries</strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="loading" style="text-align: center;padding: 60px;">
                                                <img
                                                    src="{{asset('assets/custom/media/ShadowyGratefulHamster-size_restricted.gif')}}"
                                                    alt="" style="width: 30px">
                                            </div>
                                            <div style="width: 100%;margin-bottom: 20px; @if(isset($old_data->galleries)) display:block @endif" class="review-image" >
                                                @isset($old_data->galleries)
                                                    @foreach($old_data->galleries as $item)
                                                        @php try{@endphp
                                                        <span class="image-plus" style="position: relative;display: inline-block">
                                                       @php  $type =  pathinfo($item->url, PATHINFO_EXTENSION); @endphp
                                                    <img src="data:image/{{$type.";base64,".base64_encode(file_get_contents($item->url))}}" style="width: 100px;">
                                                            <span class="close-f close-f1"><i class="fas fa-close"></i></span>
                                                        </span>
                                                    @php }catch(\Exception $e){ }@endphp
                                                    @endforeach
                                                @endisset
                                            </div>
                                            <div class="select-image">
                                                <input type="file" name="gallery-image" multiple class="get-image">Select Galleries Image <br>
                                                <i class="fas fa-image" style="font-size: 50px;margin-top: 5px;"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    {{$button_action}}

                            </div>
                            </div>
                            </span>
