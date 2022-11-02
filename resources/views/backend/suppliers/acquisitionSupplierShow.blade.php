@extends('admin.admin_master')
{{-- section id is yeild name --}}
@section('main-content')
<div class="container-full">
    <section class="content">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="box">
                                        <div style="font-size:18px;" class="col-lg-6 col-12 paymentInfo">
                                        <h4 class="header-title">Acquisition Employee Information</h4>
                                        <p><b>Employee Name : </b>{{optional($employee_informition)->employee_name}}</p>
                                        <p><b>Contact No : </b>{{optional($employee_informition)->employee_phone}}</p>
                                        <p><b> Designation : </b>{{optional($employee_informition)->designation}}</p>
                                        <p><b> Address : </b>{{optional($employee_informition)->employee_permanent_address}}</p>
                                         <p ><b>Total Supplier: </b>{{$acquisitionsupplierCount}}</p>
                                        </div>
                                                         
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="datatable-buttons"
                                            class=" datatable-buttons table table-striped">
                                            <thead>
                                                <tr>
                                                     <th>Supplier Name</th>
                                                     <th>Supplier Id</th>
                                                     <th>Company Name</th>
                                                     <th>Email</th>
                                                     <th>Phone</th>
                                                     <th>Zone</th>
                                                     <th>Address</th>
                                            
                                                    
                                                </tr>
                                            </thead>
                                            
                                          
                                            
                                                <tbody >
                                                    @foreach ($acquisitionsupplierDetails as $acquisitionsupplierDetail)
                                                <tr>
                                                    
                                                    <td>{{optional($acquisitionsupplierDetail)->supplyer_name}}</td>
                                                    <td>{{optional($acquisitionsupplierDetail)->supplyer_id_code}}</td>
                                                    <td>{{optional($acquisitionsupplierDetail)->company_name}}</td>
                                                    <td>{{optional($acquisitionsupplierDetail)->supplyer_email}}</td>
                                                    <td>{{optional($acquisitionsupplierDetail)->supplyer_phone}}</td>
                                                    <td>{{optional($acquisitionsupplierDetail->zone)->postOffice}}</td>
                                                    <td>{{optional($acquisitionsupplierDetail)->supplyer_address}}</td>
                                                    
                                                
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- table res.. end -->
                                </div> <!-- box body end -->
                            </div> <!-- box end -->
                        </div> <!-- col end -->
                    </div>
                </div>
            </div> <!--  row end-->
        </div>
    </section>
</div>

@endsection
