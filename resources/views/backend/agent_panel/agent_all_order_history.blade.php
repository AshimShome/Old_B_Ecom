@extends('admin.admin_master')
@section('css')
    <style>
        .avatar-title {
            align-items: center;
            color: #fff;
            display: flex;
            height: 100%;
            justify-content: center;
            width: 100%;
        }

        .left-side-menu {
            width: 255px;
        }

        .footer {
            left: 255px;
        }

        .header-title {
            margin-bottom: 20px;
        }

        #datatable-buttons a {
            color: #0D6EFD;
        }

        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
            position: absolute;
            right: 20px;
            top: 23px;
        }

        @media (max-width: 767px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                justify-content: center;
            }
        }

        @media (max-width: 636px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 60px;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                margin-top: 20px;
            }

            .header-title {
                text-align: center;
            }
        }

        #datatable-buttons .edit {
            font-size: 17px;
        }

    </style>
@endsection
@section('main-content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex justify-content-lg-between mb-2">
                            <div class="col-lg-6 col-md-6 col-12">
                                <h4 class="header-title">Customer Order History </h4>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-lg-flex d-inline justify-content-lg-end">
                                <!-- <div class="col-lg-4 col-12">
                                <input type="text" id="basic-datepicker" class="form-control flatpickr-input active"
                                  placeholder="Select Date" readonly="readonly">
                              </div> -->
                            </div>
                        </div>
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="datatable-buttons_length"><label
                                            class="form-label">Show <select name="datatable-buttons_length"
                                                aria-controls="datatable-buttons" class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                    <div class="dt-buttons btn-group flex-wrap"> <button
                                            class="btn btn-secondary buttons-copy buttons-html5 btn-light" tabindex="0"
                                            aria-controls="datatable-buttons" type="button"><span>Copy</span></button>
                                        <button class="btn btn-secondary buttons-print btn-light" tabindex="0"
                                            aria-controls="datatable-buttons" type="button"><span>Print</span></button>
                                        <button class="btn btn-secondary buttons-pdf buttons-html5 btn-light" tabindex="0"
                                            aria-controls="datatable-buttons" type="button"><span>PDF</span></button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="datatable-buttons"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                    <table id="datatable-buttons"
                                        class="table table-striped nowrap w-100 dataTable no-footer" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                    aria-sort="descending"
                                                    aria-label="Customer ID: activate to sort column descending"
                                                    style="width: 152.672px;">Customer ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Customer Name: activate to sort column ascending"
                                                    style="width: 191.812px;">Customer Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Total Order: activate to sort column ascending"
                                                    style="width: 141.594px;">Total Order</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Total Commission: activate to sort column ascending"
                                                    style="width: 210px;">Total Commission</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 132.953px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--@php-->
                                            <!--dd($customerOrderHistoryGet);-->
                                            <!--@endphp-->
                                            
                                            @foreach($customerOrderHistoryGet as $users)
                                             @php
                                              $totalCommission =App\Models\AgentCommission::where('order_user_id','!=','null')->where('order_user_id',$users->id)
                                              ->select('commission_amount')->sum('commission_amount');
                                          
                                               
                                            @endphp
                                                
                                                @if(($users->customer_order_history_count)>0)
                                                <tr class="odd">
                                                    <td class="sorting_1">{{$users->customer_id}}</td>
                                                    <td class="sorting_1">{{$users->name}}</td>
                                                    <td class="sorting_1">{{$users->customer_order_history_count}}</td>
                                                    <td>{{$totalCommission}} TK</td>
                                                    <td><a href="{{ route('role.agent_panel.single_history_order',[config('fortify.guard'),$users->id],) }}">
                                                        Coustomer All Orders</a>
                                                    </td>
                                                   
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>
@endsection
