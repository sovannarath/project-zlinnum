@extends('template.master')
@section('title') New Project @endsection
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>New Project</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">New Project</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        {{--<div class="card-header">
                            <strong class="card-title">User</strong>
                        </div>--}}
                        <div class="card-body">
                            <div class="flex-to-block">
                                <div class="item active main-item" type="project">Project</div>
                                <div class="item main-item" type="property">Property</div>
                            </div>
                            <span class="project">
                            <div class="header-title">
                            <strong style="font-size: 20px;">Project Information</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group"><label class="">Project
                                            Type</label><select name="projectType" class="form-control">
                                            <option value="Borey">Borey</option>
                                            <option value="Condo">Condo</option>
                                            <option value="Apartment">Apartment</option>
                                        </select></div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group"><label class="">Project
                                            Title</label>
                                        <input type="text" class="form-control" placeholder="Enter Project Title"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group">
                                        <label class="">Buil Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Buil Date" id="datepicker"></div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group">
                                        <label class="">Complete Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Complete Date" id="datepicker1"></div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class="">Guaranteed Rental Returns(%)</label>
                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">%</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group">
                                        <label class="">Down Payment</label>
                                        <input type="text" class="form-control" value="0"></div>

                                </div>
                            </div>
                            <div class="header-title">
                                <strong style="font-size: 20px;">Price</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">Rent / Sale</label>
                                        <select id="" class="custom-select sale-rent">
                                            <option value="sale">Sale</option>
                                            <option value="rent">Rent</option>
                                        </select>
                                        <span class="apartment-option">
                                          <div style="margin-top: 10px;">
                                        <span style="width: 100%;background: green;color: white;display: block;padding: 5px;border-radius: 5px;text-align: center">Rent</span>
                                                </div>
                                         </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label class="">Total Price</label>

                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control" value="0">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="">Price/Sqm</label>

                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Per Sqm</span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                                 <div class="tower">
                                     <div class="header-title">
                                <strong style="font-size: 20px;">Tower Type</strong>

                            </div>
                                     <span class="tower-result">
                                          <div class="row">
                                         <div class="col-12 col-sm-4">
                                          <div class="position-relative form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control">
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
                                            <input type="text" class="form-control">
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
                                            <input type="text" class="form-control">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">Remove</span>
                                            </div>
                                        </div>
                                              </div>
                                    </div>
                                             </div>
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
                                    <div class="position-relative form-group"><label class="">Country</label>
                                        <select name="" id="" class="custom-select">
                                            <option value="">-- Please Select Country--</option>
                                            <option value="">Sale</option>
                                            <option value="">Rent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">City</label>
                                        <select name="" id="" class="custom-select">
                                            <option value="">-- Please Select City--</option>
                                            <option value="">Phnom Penh</option>
                                            <option value="">Siem Reap</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">Address 1#</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Enter Address 1#"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="position-relative form-group"><label class="">Address 1#</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Enter Address 2#"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="header-title">
                                <strong style="font-size: 20px;">Basic Information</strong>
                            </div>


                                <div id="editor"></div>

                            <div class="header-title">
                                <strong style="font-size: 20px;">Feature</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <label class="">Title</label>

                                    <div class="position-relative form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Title">
                                        </div>
                                    </div>

                                </div>
                            </div>

                                <div id="editor1"></div>

                            <div class="header-title">
                                <strong style="font-size: 20px;">Property Type</strong>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Bedroom</th>
                                        <th scope="col">Bathroom</th>
                                        <th scope="col">Floor</th>
                                        <th scope="col">Parking</th>
                                        <th scope="col">Width</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="item-list">
                                        <th><input type="text" class="form-control" placeholder="Type" name="type"></th>
                                        <td><input type="text" class="form-control" value="0" name="bedroom"></td>
                                        <td><input type="text" class="form-control" value="0" name="bathroom"></td>
                                        <td><input type="text" class="form-control" value="0" name="floor"></td>
                                        <td><input type="text" class="form-control" value="0" name="packing"></td>
                                        <td><input type="text" class="form-control" value="0" name="width"></td>
                                        <td><button class="btn btn-dark remove-item-list">Remove</button></td>
                                    </tr>
                                     <tr class="item-list">
                                        <th><input type="text" class="form-control" placeholder="Type" name="type"></th>
                                        <td><input type="text" class="form-control" value="0" name="bedroom"></td>
                                        <td><input type="text" class="form-control" value="0" name="bathroom"></td>
                                        <td><input type="text" class="form-control" value="0" name="floor"></td>
                                        <td><input type="text" class="form-control" value="0" name="packing"></td>
                                        <td><input type="text" class="form-control" value="0" name="width"></td>
                                        <td><button class="btn btn-dark remove-item-list">Remove</button></td>
                                    </tr>
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
                                                <img src="{{asset('assets/custom/media/ShadowyGratefulHamster-size_restricted.gif')}}" alt="" style="width: 30px">
                                            </div>
                                            <div style="width: 100%;" class="review-image"></div>
                                            <span class="close-f remove-button showoff">
                                                <i class="fa fa-close"></i>
                                            </span>
                                            <div class="select-image"><input type="file" name="thumbnail" class="get-image">Select Thumbnail Image <br> <i class="fas fa-image" style="font-size: 50px;margin-top: 5px;"></i></div>

                                        </div>
                                    </div>
                                    <div class="header-title">
                                        <strong style="font-size: 20px;">Image Galleries</strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="loading" style="text-align: center;padding: 60px;">
                                                <img src="{{asset('assets/custom/media/ShadowyGratefulHamster-size_restricted.gif')}}" alt="" style="width: 30px">
                                            </div>
                                            <div style="width: 100%;" class="review-image"></div>
                                            <span class="close-f remove-button showoff">
                                                <i class="fa fa-close"></i>
                                            </span>
                                            <div class="select-image"><input type="file" name="gallery-image" multiple class="get-image">Select Galleries Image <br> <i class="fas fa-image" style="font-size: 50px;margin-top: 5px;"></i></div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col12 col-4"></div>
                                        <div class="col12 col-4"></div>
                                        <div class="col12 col-4" style="text-align: right"><button class="btn btn-success">Insert Project</button></div>
                                    </div>

                            </div>
                            </div>
                            </span>
                            {{-- Property start Element --}}
                            <span class="property">
                            <div class="header-title">
                                <strong style="font-size: 18px">PROPERTY INFORMATION</strong>
                            </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group"><label class="">Title</label><input type="text" class="form-control" placeholder="Enter Title of property"></div>
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
                                            <select name="" id="" class="form-control">
                                                <option value="sale">Sale</option>
                                                <option value="rent">rent</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="position-relative form-group"><label class="">Unit Price</label>
                                           <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">$ </span>
                                               </div>
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">Per Unit</span>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="position-relative form-group"><label class="">Price/sqm</label>
                                           <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">$ </span>
                                               </div>
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1">Per Sqm</span>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="position-relative form-group">
                                            <label for="">Land Width</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <div class="input-group-text">m</div>
                                            </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="position-relative form-group">
                                            <label for="">Land Lenght</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <div class="input-group-text">m</div>
                                            </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="position-relative form-group">
                                            <label for="">Total Land Area</label>
                                            <div class="input-group">
                                            <input type="number" class="form-control" value="0">
                                            <div class="input-group-append">
                                                <div class="input-group-text">sqm</div>
                                            </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="more-property">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Building Width</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Bed Room</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                    <option value="">8+</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Building Height</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Bathrooms</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                    <option value="">8+</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Common Area</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Living Room</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>No of Floor</label>
                                            <div class="input-group">
                                                <input type="text"  class="form-control" value="">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Dinning Room</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>

                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Mazzanine Floor</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Kitchen</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>

                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Total Building Area</label>
                                            <div class="input-group">
                                                <input type="number"  class="form-control" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">m</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Air Conditioner</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Parking</label>
                                            <div class="input-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">--None--</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>

                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">

                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="position-relative form-group">
                                            <label>Balcony</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="0">
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <div class="position-relative form-group"><label for="">Description</label>
                                    <div class="input-group">
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>



                            <div class="header-title">
                                PROPERTY LOCATION
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for="">Street No</label>
                                        <div class="input-group"><input type="text" class="form-control" placeholder="Street No"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for="">House No</label>
                                        <div class="input-group"><input type="text" class="form-control" placeholder="House No"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for="">City/Province</label>
                                        <div class="input-group"><input type="text" class="form-control" placeholder="Privince/City"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for="">Khan/District</label>
                                        <div class="input-group"><input type="text" class="form-control" placeholder="District/Khan"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for="">Sangkat/Commune</label>
                                        <div class="input-group"><input type="text" class="form-control" placeholder="Commune"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="position-relative form-group"><label for="">Phum/Village</label>
                                        <div class="input-group"><input type="text" class="form-control" value="village"></div>
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
                                    <th><input type="text" class="form-control" placeholder="Address" name="address"></th>
                                    <td><input type="text" class="form-control" value="0" name="bedroom"></td>
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
                                        <img src="http://localhost/project-zillen/assets/custom/media/ShadowyGratefulHamster-size_restricted.gif" alt="" style="width: 30px">
                                    </div>
                                    <div style="width: 100%;" class="review-image"></div>
                                    <span class="close-f remove-button showoff">
                                                <i class="fa fa-close"></i>
                                            </span>
                                    <div class="select-image"><input type="file" name="gallery-image" multiple="" class="get-image">Select Galleries Image <br> <i class="fas fa-image" style="font-size: 50px;margin-top: 5px;"></i></div>

                                </div>
                            </div>
                                <br>
                                <div class="row">
                                        <div class="col12 col-4"></div>
                                        <div class="col12 col-4"></div>
                                        <div class="col12 col-4" style="text-align: right"><button class="btn btn-success">Insert Project</button></div>
                                    </div>
                                 </span>
                            {{-- Property End Element --}}
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div>
@endsection
@section('script')
    <script>
        var doc = $(document);
        $(document).ready(function () {
            $('.new-project').addClass('active');
            $('.sub-new1').addClass('active');
            $('#datepicker').datetimepicker({
                format:"D-MMM-Y"
            });
            $('#datepicker1').datetimepicker({
                format:"D-MMM-Y"
            });
        });
        var toolbarOptions = [
            [{ 'header': 1 }, { 'header': 2 }],
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote'],// custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean'],
            ['link','image','video']


        ];
        new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Detail',
        });
        new Quill('#editor1', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Detail',
        });
    </script>



@endsection


