@extends('admin.admin_master')

@section('css')
 <style>
    .card {
      height: 150px;
      font-family: 'Inter';
    }

    .card p {
      font-weight: 400;
      font-size: 16px;
      line-height: 19px;
      color: #6E768E;
    }

    .card h3 {
      font-weight: 500;
      font-size: 26px;
      line-height: 31px;
      color: #343A40;
    }

    .card .img-icon img {
      height: 40%;
      margin: auto;
    }

    .card-1 .card-body {
      background: rgba(139, 107, 232, 0.05);
      border: 1px solid #8B6BE8;
      border-radius: 5px;
    }

    .card-1 .img-icon {
      display: flex;
      justify-content: center;
      background: #D9D5F6;
      border: 2px solid #A088E5;
    }

    .card-2 .card-body {
      background: rgba(39, 186, 216, 0.05);
      border: 1px solid #27BAD8;
      border-radius: 5px;
    }

    .card-2 .img-icon {
      display: flex;
      justify-content: center;
      background: #D3F1F7;
      border: 2px solid #27BAD8;
    }

    .card-3 .card-body {
      background: rgba(246, 177, 60, 0.05);
      border: 1px solid #F6B13C;
      border-radius: 5px;
    }

    .card-3 .img-icon {
      display: flex;
      justify-content: center;
      background: #FDEDD2;
      border: 2px solid #F6B13C;
    }

    .card-4 .card-body {
      background: rgba(26, 188, 156, 0.05);
      border: 1px solid #1ABC9C;
      border-radius: 5px;
    }

    .card-4 .img-icon {
      display: flex;
      justify-content: center;
      background: #C6EEE6;
      border: 2px solid #1ABC9C;
    }

    .card-5 .card-body {
      background: rgba(39, 111, 252, 0.05);
      border: 1px solid #276FFC;
      border-radius: 5px;
    }

    .card-5 .img-icon {
      display: flex;
      justify-content: center;
      background: #E6EEFF;
      border: 2px solid #276FFC;
    }

    .card-6 .card-body {
      background: rgba(138, 240, 36, 0.05);
      border: 1px solid #8AF024;
      border-radius: 5px;
    }

    .card-6 .img-icon {
      display: flex;
      justify-content: center;
      background: #F2FFE4;
      border: 2px solid #8AF024;
    }

    .card-7 .card-body {
      background: rgba(223, 215, 30, 0.05);
      border: 1px solid #DFD71E;
      border-radius: 5px;
    }

    .card-7 .img-icon {
      display: flex;
      justify-content: center;
      background: #FAF9E4;
      border: 2px solid #DFD71E;
    }

    .card-8 .card-body {
      background: rgba(246, 71, 60, 0.05);
      border: 1px solid #F6473C;
      border-radius: 5px;
    }

    .card-8 .img-icon {
      display: flex;
      justify-content: center;
      background: #FFE4E4;
      border: 2px solid #F6473C;
    }

    .card-9 .card-body {
      background: rgba(205, 233, 37, 0.05);
      border: 1px solid #CDE925;
      border-radius: 5px;
    }

    .card-9 .img-icon {
      display: flex;
      justify-content: center;
      background: #F7FCDC;
      border: 2px solid #CDE925;
    }

    .card-10 .card-body {
      background: rgba(241, 39, 221, 0.05);
      border: 1px solid #F127DD;
      border-radius: 5px;
    }

    .card-10 .img-icon {
      display: flex;
      justify-content: center;
      background: #FFECFD;
      border: 2px solid #F127DD;
    }
  </style>
@endsection

@section('main-content')

  <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-12">
              <div class="mb-2">
                <h3 class="header-title">Courier Dashboard</h3>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-1">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img1.png" alt="image1">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Parcel Delivery Complete</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">16,500</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img2.png" alt="image2">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Parcel Delivery Received</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">19</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img3.png" alt="image3">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Parcel Delivery Pending</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">22</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img4.png" alt="image4">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Delivery Zone Inside Dhaka</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">22</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-5">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img5.png" alt="image5">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Delivery Zone Outside Dhaka</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">22</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-6">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img6.png" alt="image6">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Parcel Return</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">27</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-7">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img7.png" alt="image7">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Merchant Inside Dhaka</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">15</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-8">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img8.png" alt="image8">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Number of Merchant Outside Dhaka</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">12</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-9">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img9.png" alt="image9">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Active Number of Merchant Inside Dhaka</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">12</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
              <div class="widget-rounded-circle card card-10">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="avatar-lg rounded-circle img-icon">
                        <img class="img-fluid" src="{{ asset('backend') }}/assets/images/img1.png" alt="image-1.jpg">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="text-end">
                        <p class="text-muted mb-1">Active Number of Merchant Outside Dhaka</p>
                        <h3 class="text-dark mt-1"><span data-plugin="counterup">20</span>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
          </div>
          <!-- end row-->
        </div> <!-- container -->


@endsection
