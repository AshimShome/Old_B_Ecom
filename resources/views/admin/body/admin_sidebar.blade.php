@php
     $prefix = Request::route()->getPrefix();
     $route = Route::current()->getName();
 @endphp

 @php
     $currentUser = auth()
         ->guard(config('fortify.guard'))
         ->user();
     $brand = isset($currentUser->brand) && $currentUser->brand == 1 ? true : false;
     $category = isset($currentUser->category) && $currentUser->category == 1 ? true : false;
     $product = isset($currentUser->product) && $currentUser->product == 1 ? true : false;
     $slider = isset($currentUser->slider) && $currentUser->slider == 1 ? true : false;
     $cupons = isset($currentUser->cupons) && $currentUser->cupons == 1 ? true : false;
     $setting = isset($currentUser->setting) && $currentUser->setting == 1 ? true : false;
     $returnorder = isset($currentUser->returnorder) && $currentUser->returnorder == 1 ? true : false;
     $review = isset($currentUser->review) && $currentUser->review == 1 ? true : false;
     $orders = isset($currentUser->orders) && $currentUser->orders == 1 ? true : false;
     $stock = isset($currentUser->stock) && $currentUser->stock == 1 ? true : false;
     $reports = isset($currentUser->reports) && $currentUser->reports == 1 ? true : false;
     $alluser = isset($currentUser->alluser) && $currentUser->alluser == 1 ? true : false;
     $adminuserrole = isset($currentUser->adminuserrole) && $currentUser->adminuserrole == 1 ? true : false;
     $expense = isset($currentUser->expence) && $currentUser->expence == 1 ? true : false;
     $pos = isset($currentUser->pos) && $currentUser->pos == 1 ? true : false;
     $employee = isset($currentUser->employee) && $currentUser->employee == 1 ? true : false;
     $supplier = isset($currentUser->supplier) && $currentUser->supplier == 1 ? true : false;
      $manager_add = isset($currentUser->manager_add) && $currentUser->manager_add == 1 ? true : false;
     $websetting = isset($currentUser->websetting) && $currentUser->websetting == 1 ? true : false;
     $supplier_dashboard = isset($currentUser->supplier_dashboard) && $currentUser->supplier_dashboard == 1 ? true : false;
     $shop_owner = isset($currentUser->shop_owner) && $currentUser->shop_owner == 1 ? true : false;
     $owner_dashboard = isset($currentUser->owner_dashboard) && $currentUser->owner_dashboard == 1 ? true : false;
     $agent_panel = isset($currentUser->agent_panel) && $currentUser->agent_panel == 1 ? true : false;
     $agent_add = isset($currentUser->agent_add) && $currentUser->agent_add == 1 ? true : false;
     $admin_dashboard = isset($currentUser->admin_dashboard) && $currentUser->admin_dashboard == 1 ? true : false;
     $manage_panel  = isset($currentUser->manage_panel ) && $currentUser->manage_panel  == 1 ? true:false;
     $list_info = isset($currentUser->list_info) && $currentUser->list_info == 1 ? true : false;
      $employee_order_processing = isset($currentUser->employee_order_processing) && $currentUser->employee_order_processing == 1 ? true : false;
     $pickup_boy_order = isset($currentUser->pickup_boy_order) && $currentUser->pickup_boy_order == 1 ? true : false;
     $courier = isset($currentUser->courier) && $currentUser->courier == 1 ? true : false;
     $manage_return_product = isset($currentUser->manage_return_product) && $currentUser->manage_return_product == 1 ? true : false;

 @endphp
 <div class="left-side-menu" >
     <div class="h-100" data-simplebar>
         <!--- Sidemenu -->
         <div id="sidebar-menu">

             <ul id="side-menu">

                 @if ($admin_dashboard == true)
                     <li>
                         <a href="{{ route('admin.dashboard') }}">
                             <i class="fas fa-calculator"></i>
                             <span  style="font-size:18px; font-family:Ubuntu"> Dashboard </span>
                         </a>
                     </li>
                 @else
                 @endif

                 @if ($manage_panel == true)
                 <li>
                     <a href="{{ route('admin.dashboard') }}">
                         <i class="fas fa-calculator"></i>
                         <span style="font-size:18px; font-family:Ubuntu">manager Dashboard </span>
                     </a>
                 </li>
                @else
                @endif


              @if ($employee_order_processing == true)
                     <li>
                         <a href="{{route('role.order.employeeOrderProcessing','admin')}}">
                             <i class="fas fa-cart-arrow-down"></i>
                             <span style="font-size:18px; font-family:Ubuntu"> Order Processing List </span>
                         </a>
                     </li>
                 @else
                 @endif


                    @if ($pickup_boy_order == true)
                     <li>
                         <a href="{{route('role.order.pickUpBoyOrderProcessing','admin')}}">
                             <i class="fas fa-cart-arrow-down"></i>
                             <span style="font-size:18px; font-family:Ubuntu"> Order Processing List </span>
                         </a>
                     </li>
                 @else
                 @endif



                 @if ($pos == true)
                     <li>
                         <a href="{{ route('role.pos', config('fortify.guard')) }}">
                             <i class="fas fa-calculator"></i>
                             <span style="font-size:18px; font-family:Ubuntu"> POS </span>
                         </a>
                     </li>
                 @else
                 @endif


                 @if ($agent_panel == true)
                     <li>
                         <a href="{{ route('role.agent_panel.dashboard', config('fortify.guard')) }}">
                          <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('role.pos_agent', config('fortify.guard')) }}">
                             <i class="fas fa-calculator"></i>
                             <span> POS </span>
                         </a>
                     </li>

                     <li>
                         <a href="#customer" data-bs-toggle="collapse">
                             <i class="fas fa-user"></i>
                             Customer
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="customer">
                             <ul class="nav-second-level">
                                 <li>
                                     <a href="{{ route('role.agent_panel.add_customer', config('fortify.guard')) }}">
                                         Add Customer</a>
                                 </li>
                                 <li>
                                     <a href="{{ route('role.agent_panel.view_customer', config('fortify.guard')) }}">
                                         Customer List</a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                     <li>
                         <a href="{{ route('role.agent_panel.order_history', config('fortify.guard')) }}">
                            <i class="fas fa-cart-plus"></i>
                             Order History
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('role.agent_panel.my_commission', config('fortify.guard')) }}">
                             <i class="fas fa-money-check-alt"></i>
                             <span>My Commission</span>
                         </a>
                     </li>

                       <li>
                         <a href="{{ route('role.agent_panel.start_shopping_agent', config('fortify.guard')) }}" target="_blank">
                             <i class="fas fa-money-check-alt"></i>
                             <span>Start Shopping</span>
                         </a>
                     </li>



                 @else
                 @endif



                 @if ($courier == true)
                 <li style="font-size:17px; font-family:Ubuntu">
                    <a href="#Courier" data-bs-toggle="collapse">
                        <i class="fa fa-building"></i>
                        <span style="font-size:18px; font-family:Ubuntu"> Manage Curieer</span>
                        <span class="menu-arrow"></span>
                    </a>

                    <div class="collapse" id="Courier">
                        <ul class="nav-second-level">

                           <!--=============================================== Courier Panel list=================================-->
                             <li>
                                <a href="{{ route('role.courierDashboardPanel_new', config('fortify.guard')) }}">Courier Dashboard</a>
                           </li>


                             <li>
                               <a href="{{ route('role.new_all_merchant_list', config('fortify.guard')) }}">Merchant List</a>
                           </li>


                              <li>
                               <a href="{{ route('role.merchant_package_list', config('fortify.guard')) }}">Merchant Package List</a>
                           </li>

                              <li>
                               <a href="{{ route('role.sendbymerchantpercellist', config('fortify.guard')) }}">Send by Merchant Parcel List</a>
                           </li>

                              <li>
                               <a href="{{ route('role.all_parcel_received_list_from_merchant', config('fortify.guard')) }}">All Parcel Received List from Merchant</a>
                           </li>


                            <li>
                               <a href="{{ route('role.all_package_details_frommerchant', config('fortify.guard')) }}">All Package Details List from Merchant</a>
                           </li>


                            <li>
                               <a href="{{ route('role.vehicle_driver_confirmationlist', config('fortify.guard')) }}">Zone Wise Vehicle & Driver Confirmation List</a>
                           </li>

                            <li>
                               <a href="{{ route('role.zone_supervisor_parcel_receive_driver', config('fortify.guard')) }}">Zone Supervisor Parcel Receive from Driver</a>
                           </li>



                             <li>
                               <a href="{{ route('role.zone_wise_ackages_delivery_complete', config('fortify.guard')) }}">Zone Wise Packages Delivery Complete List</a>
                           </li>


                             <li>
                               <a href="{{ route('role.payment_received_deposit_statement', config('fortify.guard')) }}">All Zone Payment Received & Deposit Statement</a>
                           </li>
                               <!--=============================================== Courier Panel list end =================================-->
                               <!--=============================================== Courier Panel Business Category Table list start =================================-->

                             <li>
                               <a href="{{ route('role.merchant.businesscategory', config('fortify.guard')) }}">All Business Category Show</a>
                           </li>
                               <!--=============================================== Courier Panel Business Category Table list end =================================-->

                        </ul>
                    </div>
                </li>
                 @else
                 @endif




                 @if ($list_info == true)
                 <li>
                     <a href="#rrr" data-bs-toggle="collapse">
                         <i class="fas fa-shopping-cart"></i>
                         <span style="font-size:18px; font-family:Ubuntu"> Brand & Category List </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="rrr">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('role.listbrandCategory.manage', config('fortify.guard')) }}">All
                                     List</a>
                             </li>
                         </ul>
                     </div>
                 </li>







                 @else
                 @endif




                 @if ($supplier == true)
                     <li>
                         <a href="#supplier" data-bs-toggle="collapse">
                             <i class="fas fa-shopping-cart"></i>
                             <span style="font-size:18px; font-family:Ubuntu">Supplier Panel </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="supplier">
                             <ul class="nav-second-level" style="font-size:18px; font-family:Ubuntu">



                                 <li>
                                     <a href="{{ route('role.supplierDashboardForOwner', config('fortify.guard')) }}">
                                         Supplier Dashboard</a>
                                 </li>


                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.suppliers.show', config('fortify.guard')) }}">All
                                         Supplier List</a>
                                 </li>


                                     <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.shop_owner.ownerProductList', config('fortify.guard')) }}">
                                         Product List For Return
                                     </a>

                                </li>


                                    <li style="font-size:17px; font-family:Ubuntu">
                                        <a href="{{ route('role.shop_owner.ownerReturnProduct', config('fortify.guard')) }}">
                                            Return Product List
                                        </a>

                                    </li>
                                    <li style="font-size:17px; font-family:Ubuntu">
                                        <a href="{{ route('role.shop_owner.paymentHistory', config('fortify.guard')) }}">
                                            Supplier Payment History
                                        </a>

                                    </li>
                                    <li style="font-size:17px; font-family:Ubuntu">
                                        <a href="{{ route('role.shop_owner.profitReport', config('fortify.guard')) }}">
                                           Product Wise Profit Report
                                        </a>

                                    </li>

                             </ul>
                         </div>
                     </li>
                 @else
                 @endif

                 @if ($product == true)
                     <li>
                         <a href="#product" data-bs-toggle="collapse">
                             <i class="fas fa-list-alt"></i>
                             <span style="font-size:18px; font-family:Ubuntu"> Manage Product </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="product">
                             <ul class="nav-second-level">

                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.manage-product', config('fortify.guard')) }}">
                                         All Product List </a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu"> <a href="{{ route('role.new-product', config('fortify.guard')) }}">Add New Product</a>
                            </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.porduct.hotDeals', config('fortify.guard')) }}">
                                         Products Hot
                                         Deals
                                     </a>
                                 </li>
                                  <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.productCount', config('fortify.guard')) }}">
                                         Product Count
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>






                 @else
                 @endif
                 @if ($orders == true)



        <!--======================= new Order Panel =============================-->
        <li>
                    <a href="#rrr" data-bs-toggle="collapse">
                        <i class="fas fa-cart-plus"></i>
                        <span style="color:red"> Order Panel </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="rrr">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('role.order.getAllOrderList','admin')}}">All Order List</a>
                            </li>
                            <li>
                                <a href="{{route('role.order.pendingOrdersList','admin')}}">Pending Orders List</a>
                            </li>
                            <li>
                                <a href="{{route('role.order.confirmedOrdersList','admin')}}">Confirmed Orders List</a>
                            </li>
                            <li>
                                <a href="{{route('role.order.processingOrdersList','admin')}}">Processing Orders List</a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{route('role.order.pickedOrdersList','admin')}}">Picked Orders List</a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{route('role.order.pickedOrdersProcessingList','admin')}}">Picked Orders Processing List</a>
                            </li>
                            <li>
                                <a href="{{route('role.order.pickedOrdersCompleteList','admin')}}">Picked Orders Complete List</a>
                            </li>
                            <li>
                                <a href="{{route('role.order.readyToShipList','admin')}}">Ready To Shipped List</a>
                            </li>
                            <li>
                                <a href="{{route('role.order.cancelOrderList','admin')}}">Cancel Order List</a>
                            </li>

                        </ul>
                    </div>
                </li>
        <!--======================= New Order Panel End ============================-->



                 @else
                 @endif
                 @if ($returnorder == true)
                     <li style="font-size:18px; font-family:Ubuntu">
                         <a href="#product-stock" data-bs-toggle="collapse">
                             <i class="fa fa-undo"></i>
                             <span style="font-size:18px; font-family:Ubuntu">Customer Return Order </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="product-stock">
                             <ul class="nav-second-level">
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.return.request', config('fortify.guard')) }}">Return
                                         Request</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.all.request', config('fortify.guard')) }}">All
                                         Return</a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @else
                 @endif



                 @if ($agent_add == true)
                     <li style="font-size:18px; font-family:Ubuntu">
                         <a href="#shop_owners" data-bs-toggle="collapse">
                             <i class="fas fa-store"></i>
                             <span style="font-size:18px; font-family:Ubuntu">Agent Panel </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="shop_owners">



                            <ul class="nav-second-level">
                                <li style="font-size:17px; font-family:Ubuntu">
                                    <a href="{{ route('role.manager_panel.manager_dashboard', config('fortify.guard')) }}">
                                        Agent Dashboard</a>
                                </li>
                            </ul>

                            <ul class="nav-second-level">
                                    <li style="font-size:17px; font-family:Ubuntu">
                                 <a href="{{ route('role.agent_panel.view', config('fortify.guard')) }}">

                                     <span>Add Agent & List </span>
                                 </a>
                             </li>
                            </ul>

                            <ul class="nav-second-level">
                                <li style="font-size:17px; font-family:Ubuntu">
                                    <a href="{{ route('role.manager_panel.customerList', config('fortify.guard')) }}">
                                      Agent Customer List</a>
                                </li>
                            </ul>
                            <ul class="nav-second-level">
                                <li style="font-size:17px; font-family:Ubuntu">
                                    <a href="{{ route('role.manager_panel.agent_commission', config('fortify.guard')) }}">
                                       Agent Commission</a>
                                </li>
                            </ul>
                            <ul class="nav-second-level">
                                <li style="font-size:17px; font-family:Ubuntu">
                                    <a href="{{ route('role.manager_panel.agent_order_history', config('fortify.guard')) }}">
                                      Total Agent Order History</a>
                                </li>
                            </ul>
                        </div>
                     </li>
                 @else
                 @endif



                 @if ($stock == true)
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="#return-order" data-bs-toggle="collapse">
                             <i class="fa fa-list"></i>
                             <span style="font-size:18px; font-family:Ubuntu"> Manage Stock </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="return-order">
                             <ul class="nav-second-level">
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.product.stock', config('fortify.guard')) }}">Product
                                         Stock</a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @else
                 @endif

                 @if ($employee == true)
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="#add-employee" data-bs-toggle="collapse">
                             <i class="fa fa-building"></i>
                             <span style="font-size:18px; font-family:Ubuntu"> Employee Manage </span>
                             <span class="menu-arrow"></span>
                         </a>

                         <div class="collapse" id="add-employee">
                             <ul class="nav-second-level">


                            <li style="font-size:17px; font-family:Ubuntu">
                                <a href="{{ route('role.department.view', config('fortify.guard')) }}">Add Department</a>
                            </li>


                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.employee.addform', config('fortify.guard')) }}">Add
                                         Employee</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.employee.view', config('fortify.guard')) }}">Manage
                                         Employee</a>
                                 </li>


                                 <li style="font-size:17px; font-family:Ubuntu">
                                    <a href="{{ route('role.salary-add', config('fortify.guard')) }}">Pay Salary</a>
                                </li>

                                <li style="font-size:17px; font-family:Ubuntu">
                                    <a href="{{ route('role.paid_salary', config('fortify.guard')) }}">Paid Salary List</a>
                                </li>

                                   <li>
                                    <a href="{{ route('role.trackingHistory', config('fortify.guard')) }}">Employee Tracking History</a>
                                </li>

                             </ul>
                         </div>
                     </li>
                 @else
                 @endif


                 @if ($expense == true)
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="#expense" data-bs-toggle="collapse">
                             <i class="fas fa-shopping-cart"></i>
                             <span> Expense </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="expense">
                             <ul class="nav-second-level">
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.expense.add', config('fortify.guard')) }}">Add
                                         Expence</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.expense.list', config('fortify.guard')) }}">View
                                         Expence</a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @else
                 @endif
                 @if ($reports == true)
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="#sidebarReport" data-bs-toggle="collapse">
                             <i class="fas fa-file"></i>
                             <span> All Reports </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="sidebarReport">
                             <ul class="nav-second-level">
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.all-reports', config('fortify.guard')) }}">Order
                                         Reports</a>
                                 </li>

                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.sale.report', config('fortify.guard')) }}">Sales
                                         Reports</a>
                                 </li>


                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.return-report-view', config('fortify.guard')) }}">Return
                                         Product Reports</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.User-activity-view', config('fortify.guard')) }}">User
                                         Active
                                         Reports</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.sallary-report-view', config('fortify.guard')) }}">Salary
                                         Reports</a>
                                 </li>

                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.profit.report', config('fortify.guard')) }}">Profit
                                         Reports</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.purchase.report', config('fortify.guard')) }}">Purchase
                                         Reports</a>
                                 </li>

                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.catwiseproduct.report', config('fortify.guard')) }}">Categpry
                                         Wise Product
                                         Reports</a>

                                 </li>

                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a href="{{ route('role.gy.report', config('fortify.guard')) }}">Product
                                         Stock
                                         Reports</a>

                                 </li>

                             </ul>
                         </div>
                     </li>
                 @else
                 @endif



                        @if ($alluser == true)
                    <li style="font-size:17px; font-family:Ubuntu">

                        <a href="{{ route('role.all-users', config('fortify.guard')) }}">   <i class="fas fa-user"></i> Customer List
                        </a>
                    </li>

                 @else
                @endif

                @if ($adminuserrole == true)

                 <li style="font-size:17px; font-family:Ubuntu">
                    <a href="{{ route('role.all.admin.user', config('fortify.guard')) }}"> <i class="fas fa-lock"></i>Manage Role & Permission
                    </a>
                 </li>

              @else
              @endif


                 @if ($websetting == true)
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="#web_site_setting" data-bs-toggle="collapse">
                             <i class="fe-settings"></i>
                             <span> Web Settings </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="web_site_setting">
                             <ul class="nav-second-level">

                                 <li style="font-size:17px; font-family:Ubuntu">
                                     <a
                                     href="{{ route('role.manage.slider', config('fortify.guard')) }}">Add
                                     Slider</a>
                                 </li>
                                 <li style="font-size:17px; font-family:Ubuntu">
                                   <a href="{{ route('role.bennar.manage', config('fortify.guard')) }}">Top Banner</a>

                                 </li>

                                     <li style="font-size:17px; font-family:Ubuntu">
                                            <a href="{{ route('role.banner.view.manage', config('fortify.guard')) }}">Manage
                                                Sub Category And Shop Now Banner</a>

                                        </li>

                                 <li>

                              </li>

                                 <li style="font-size:17px; font-family:Ubuntu">
                                 <a href="{{ route('role.bannerCategory.manage', config('fortify.guard')) }}">Ads Banner</a>

                                 </li>


                             </ul>
                         </div>
                     </li>
                 @else
                 @endif



             @if ($cupons == true)
                            <li style="font-size:17px; font-family:Ubuntu"> <a  href="{{ route('role.manage.coupon', config('fortify.guard')) }}">     <i class="fe-file"></i>Manage  Coupon</a>  </li>
                @else
               @endif




                 @if ($setting == true)
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="#software_setting_main" data-bs-toggle="collapse">
                             <i class="fe-settings"></i>
                             <span> Software Settings </span>
                             <span class="menu-arrow"></span>
                         </a>
                         <div class="collapse" id="software_setting_main">
                             <ul class="nav-second-level">

                                     <li style="font-size:17px; font-family:Ubuntu">
                                         <a href="{{ route('role.site.setting', config('fortify.guard')) }}">
                                             General Setting</a>
                                     </li>
                                     <li style="font-size:17px; font-family:Ubuntu">
                                         <a href="{{ route('role.seo.setting', config('fortify.guard')) }}">
                                             SEO Setting</a>
                                     </li>
                                     <li style="font-size:17px; font-family:Ubuntu">
                                        <a href="{{ route('role.subscribe.view',config('fortify.guard')) }}">
                                           Subscribers Email
                                        </a>
                                     </li>


                                 </ul>
                             </div>
                             </li>
                         @else
                             @endif

     @if ($owner_dashboard == true)

                 <ul class="nav-second-level">
                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="{{ route('role.shop_owner.dashboard', config('fortify.guard')) }}">
                             Owner Dashboard
                         </a>

                     </li>

                     <li style="font-size:17px; font-family:Ubuntu">
                         <a href="{{ route('role.shop_owner.ownerProductList', config('fortify.guard')) }}">
                             Product List
                         </a>

                    </li>


                <li style="font-size:17px; font-family:Ubuntu">
                    <a href="{{ route('role.shop_owner.ownerSupplierList', config('fortify.guard')) }}">
                        Supplier List
                    </a>

                </li>

                <li style="font-size:17px; font-family:Ubuntu">
                    <a href="{{ route('role.shop_owner.ownerReturnProduct', config('fortify.guard')) }}">
                        Return Product
                    </a>

                </li>
                <li style="font-size:17px; font-family:Ubuntu">
                    <a href="{{ route('role.shop_owner.paymentHistory', config('fortify.guard')) }}"> <i class="fas fa-file-invoice-dollar"></i>
                        Payment History
                    </a>

                </li>
                <li style="font-size:17px; font-family:Ubuntu">
                    <a href="{{ route('role.shop_owner.profitReport', config('fortify.guard')) }}">
                        Profit Report
                    </a>
                </li>
            </ul>
        @else
        @endif
        @if ($supplier_dashboard == true)

                    <li style="font-size:17px; font-family:Ubuntu">
                        <a href="{{ route('role.demo', config('fortify.guard')) }}">
                           <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>

                    </li>

                    <li style="font-size:17px; font-family:Ubuntu">
                        <a href="{{ route('role.orderConfirmationList', config('fortify.guard')) }}">
                           <i class="fas fa-tachometer-alt"></i> Order Confirmation List
                        </a>

                    </li>

                    <li style="font-size:17px; font-family:Ubuntu">
                        <a href="{{ route('role.supplier.product', config('fortify.guard')) }}">
                          <i class="fab fa-product-hunt"></i>   All Product List
                        </a>

                    </li>
                    <li style="font-size:17px; font-family:Ubuntu">
                        <a href="{{ route('role.supplier.payment', config('fortify.guard')) }}"> <i class="fas fa-file-invoice-dollar"></i>
                            Payment
                        </a>

                    </li>

                    <li style="font-size:17px; font-family:Ubuntu">
                        <a href="{{ route('role.supplier.return_product', config('fortify.guard')) }}">
                            <i class="fas fa-undo"></i> Return Product List
                        </a>

                    </li>

        @else
        @endif













        </ul>
    </div>
    </li>

    </ul>

 </div>
 <!-- End Sidebar -->
 </div>
 <!-- Sidebar -left -->
 </div>
