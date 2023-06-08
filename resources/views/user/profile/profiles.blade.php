@extends('layouts.user.profile.layout')
@section('title')
    <title>{{ $websiteLang->where('lang_key','dashboard')->first()->custom_text }}</title>
@endsection

@section('user-dashboard')


  <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Profile Details </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                         <a href="" class="btn btn-info d-none d-lg-block m-l-15 text-white"  data-bs-toggle="modal" data-bs-target="#exampleModal-3" data-whatever="@mdo"><i class="fa fa-plus-circle  padd5"></i>Add New Profile </a>
                         
                          </div>
                    </div>
                </div>
              

                      <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                  <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="{{ $user->image ? url($user->image) : url($default_image->image) }}" class="img-circle" width="150" height="150" />
                                        <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                        <h6 class="card-subtitle"></h6>
                                      
                                    </center>
                                      <div class="row" style="padding:12px">
                                            <div class="col-12"><a href="javascript:void(0)" class="link">Total Properties: <font class="font-medium">{{ $totalinvestments->groupby('property_id')->count() }}</font></a></div>
                                            <div class="col-12"><a href="javascript:void(0)" class="link">Total Invested:  <font class="font-medium">${{ $totalinvestments->sum('investment_amount') }}</font></a></div>
                                        </div>
                                </div>
                                <div>
                                    <hr>
                                </div>
                                <div class="card-body" style="padding:1.3rem ! important">
                                     <h5><strong>Email address </strong></h5>
                                    <h6>{{ $user->email }}</h6>
                                     <h5><strong>Phone </strong></h5>
                                    <h6>{{ $user->phone }}</h6>
                                     
                                   <h5><strong>Address </strong></h5>
                                    <h6>{{ $user->address }}</h6>
                                 
                                </div>

                                

                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Bank Accounts</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Accreditations</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#Updates" role="tab">Updates</a> </li>
                                    </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        @if($user->account_number)
                                        <div class="card-body">
                                            <h5><strong>Bank Name </strong></h5>
                                    <h6 style="font-weight:300">{{ $user->bank_name }}</h6>
                                    <h5><strong>Account Number </strong></h5>
                                    
                                    <h6 style="font-weight:300">{{ $user->account_number }}</h6>
                                     <h5><strong>Bank Address </strong></h5>
                                   
                                     <h6 style="font-weight:300">{{ $user->bank_address }}</h6>
                                            
                                        
                                        </div>
                                        @else
                                         <div class="card-body">
                                          <p style="text-align:center;padding:30px;">No Bank Details</p>
                                        </div>
                                        @endif
                                        <!--<div class="row ">-->
                                        <!--        <div class="card-body border-top">-->
                                        <!--                <div class="d-flex no-block align-items-center">-->
                                        <!--                        <a href="" class="btn btn-rounded btn-outline-primary  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="@mdo">Add Bank Account</a>-->
                                                                 
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--    </div>-->
                                    </div>
                                    <!--second tab-->
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                        <div class="card-body">
                                          <p style="text-align:center;padding:30px;">No Accreditation Available</p>
                                        </div>
                                    </div>
                                    <!--#3 rd -->
                                    <div class="tab-pane" id="Updates" role="tabpanel">
                                            <div class="card-body">
                                                    <div class="profiletimeline">
                                                         @foreach($updates as $item)
                                                            <div class="sl-item">
                                                                <div class="sl-left"> <img src="{{ url($item->thumbnail_image) }}" alt="user" class="img-circle" /> </div>
                                                                <div class="sl-right">

                                                                    <div><a href="javascript:void(0)" class="link">{{ $item->title }}</a> <span class="sl-date">{{ date('M d',strtotime($item->created_at)) }}</span>
                                                                  
                                                                                <p>
                                                                                       {{ $item->description }}   
                                                                                </p>
            
                                                                       
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                          @endforeach 
                                                          
                                                        </div>
                                            </div>
                                        </div>
                             
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->

               







          
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        
        
        <!-- Updates Model Pop Ups  -->
<div class="modal" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Add Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                        <div class="row">
                               
                                    <div class="col-md-12">
                                            <label for="behName1" class="form-label">Choose Profile *</label>
                                            <div class="form-group">
                                                    <select class="form-select form-control" id="participants1" name="location">
                                                             <option value="">LLC</option>
                                                            <option value="">individual</option>
                                                        </select> 
                                                     </div>  
                                    </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                        <label for="behName1" class="form-label"> City</label>
                                       <div class="form-group">
                                          <input type="text" class="form-control" id="" name="IRA Name">
                                      </div>  
                                     </div>
                                 <div class="col-md-6">
                                        <label for="behName1" class="form-label">State/Province</label>
                                        <div class="form-group">
                                                <select class="form-select form-control" id="participants1" name="location">
                                                        <option value="">LIC</option>
                                                        <option value="">IRA</option>
                                                        <option value="">Trust</option>
                                                    </select> 
                                                 </div> 
                                     </div>
                                    
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                        <label for="behName1" class="form-label">Zip Code</label>
                                       <div class="form-group">
                                          <input type="text" class="form-control" id="" name="IRA Name">
                                      </div>  
                                     </div>
                                 <div class="col-md-6">
                                        <label for="behName1" class="form-label">Tax ID</label>
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="" name="Tax ID">
                                            </div>   
                                     </div>
                                    
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                       <label for="behName1" class="form-label">IRA Name</label>
                                      <div class="form-group">
                                         <input type="text" class="form-control" id="" name="IRA Name">
                                     </div>  
                                    </div>
                                    <div class="col-md-6">
                                           <label for="behName1" class="form-label"> In care of (Optional)</label>
                                          <div class="form-group">
                                             <input type="text" class="form-control" id="" name="IRA Name">
                                         </div>  
                                        </div>
                         </div>

                         <h4 class="modal-title">Investors</h4>
                           <div class="investors">
                                <div class="row">
                                        <div class="col-md-6">
                                               <label for="behName1" class="form-label">First Name </label>
                                              <div class="form-group">
                                                 <input type="text" class="form-control" id="" name="First Name">
                                             </div>  
                                            </div>
                                            <div class="col-md-6">
                                                   <label for="behName1" class="form-label">Last Name</label>
                                                  <div class="form-group">
                                                     <input type="text" class="form-control" id="" name="Last Name">
                                                 </div>  
                                                </div>
                                 </div>
        
                                 <div class="row">
                                        <div class="col-md-6">
                                               <label for="behName1" class="form-label">Email</label>
                                              <div class="form-group">
                                                 <input type="Email" class="form-control" id="" name="First Name">
                                             </div>  
                                            </div>
                                            <div class="col-md-6">
                                                   <label for="behName1" class="form-label">Phone </label>
                                                  <div class="form-group">
                                                     <input type="text" class="form-control" id="" name="Last Name">
                                                 </div>  
                                                </div>
                                 </div>
        
                                 <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                        <label class="form-label">Preferences</label>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                    <label class="form-check-label" for="customCheck1">In-App Notifications </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                    <label class="form-check-label" for="customCheck2">Email Notifications </label>
                                                                </div>
                                                             
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="customCheck4">
                                                                    <label class="form-check-label" for="customCheck4"> Sign Documents </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="customCheck5">
                                                                    <label class="form-check-label" for="customCheck5"> Invite to the Investor Portal                                                                </label>
                                                                </div>
                                                             
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                         </div>
                                </div>
                               </div>
                       

                        <h4 class="modal-title">Distributions </h4>
                        <div class="Distributions ">
                                <div class="row">
                                        <div class="col-md-12">
                                                <label for="behName1" class="form-label">Distribution Method</label>
                                                <h6 style="font-size: 10px; color: #eb1c39ef;">Important: This will not be used to fund your investments.</h6>
                                                <div class="form-group">
                                                        <select class="form-select form-control" id="participants1" name="location">
                                                                <option value="">ACH</option>
                                                                <option value="">Check</option>
                                                                <option value="">Others</option>
                                                            </select> 
                                                         </div>  
                                            </div>
        
                                            <div class="col-md-12">
                                                    <label for="behName1" class="form-label">Distribution Notification Email</label>
                                                    <h6 style="font-size: 10px; color: #eb1c39ef;">Email IDs mentioned below will receive distribution notifications for this profile.</h6>

                                              <div class="form-group">
                                                 <input type="Email" class="form-control" id="" name="Email">
                                             </div>  
                                        </div>
        
                                 </div>
                            </div>
          
                </div>
                <div class="modal-footer">
                        <div class="d-flex no-block align-items-center">
                                <a href="" class="btn btn-rounded btn-outline-primary  waves-effect waves-light"  data-bs-dismiss="modal">Cancel </a>
                                <a href="" class="btn btn-rounded btn-outline-primary  waves-effect waves-light"  data-bs-dismiss="modal">Save Profile</a>  
                        </div>
               </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
   @endsection     
