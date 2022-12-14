@extends('admin.admin_master')
@section('main-content')
{{-- <div class="row" style="margin-top: -100px"> --}}
    <div class="content-page" style="margin:-30px 0px 0px 0px">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-9 m-auto">
                        <div class="card">
                            <div class="card-title banner-header-title">Ads Banner</div>
                            <div class="card-body">
                                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable-buttons"
                                                class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed"
                                                role="grid" aria-describedby="datatable-buttons_info"
                                                style="width: 1168px;">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Ecommerce Name</th>
                                                        <th>Banner Title </th>
                                                        <th>Banner Image </th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bennars_category as $bennar_category)
                                                    <tr>
                                                        <td>
                                                            {{$bennar_category->ecommerce->ecom_name}}
                                                        </td>
                                                        <td>
                                                            {{$bennar_category->banner_title}}
                                                        </td>
                                                        <td>
                                                            <img src="{{asset($bennar_category->bennar_img)}}"
                                                                width="200px;" height="100px;">
                                                        </td>


                                                        <td>
                                                            @if($bennar_category->status === 1)
                                                            <p>Active</p>
                                                            @else
                                                            <p>Inactive</p>
                                                            @endif
                                                        </td>


                                                        <td>
                                                            <a href="{{route('role.bannerCategory.edit',[config('fortify.guard'),$bennar_category->id ])}}"
                                                                class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                            <a href="{{route('role.bannerCategory.delete',[config('fortify.guard'),$bennar_category->id ])}}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                            @if($bennar_category->status ==1)

                                                            <a href="{{route('role.bannerCategory.deactive',[config('fortify.guard'),$bennar_category->id])}}"
                                                                class="btn btn-danger"><i
                                                                    class="fas fa-arrow-down"></i></a>
                                                            @else
                                                            <a href="{{route('role.bannerCategory.active',[config('fortify.guard'),$bennar_category->id])}}"
                                                                class="btn btn-success"><i
                                                                    class="fas fa-long-arrow-alt-up"></i></a>

                                                            @endif



                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card body-->
                        </div><!-- end card -->
                    </div><!-- end col-->
                    <div class="col-lg-3">
                        <form method="POST" action="{{ route('role.bannerCategory.store',config('fortify.guard'))  }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="add-banner-container">
                                <h3>ADD BANNER</h3>
                                <div class="form-group">
                                    <h5> Ecommerce Name <b style="color:red; font-weight:bold">*</b> <span class="text-danger"></span></h5>
                                    <div class="controls">
                          <select name="ecom_id" class=" form-select form-control " required  
                          oninvalid="this.setCustomValidity('Please Select E-com Name')" oninput="this.setCustomValidity('')">
                              
                                            <option value="" selected="" disabled="">Select Ecommerce Name
                                            </option>
                                            @foreach($ecom as $ecoms)
                                            <option value="{{ $ecoms->id }}">
                                                {{ $ecoms->ecom_name }}</option>
                                            @endforeach
            
                                        </select>
                                        
                                         
                                    </div>
                                    <h5> Banner Title <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" id="banner_title" name="banner_title" class="form-control">
                                    </div>
                                    @error('banner_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <h5> Banner Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="bennar_img" name="bennar_img" class="form-control">
                                    </div>
                                    @error('bennar_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>
                                <button type="submit" class="add-banner-btn" style="background-color:#269746">Add Ads
                                    Banner</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end row-->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>2022 ?? Bpp Shops Admin <a href="https://excelitai.com/">Excel IT AI Team</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
@endsection
