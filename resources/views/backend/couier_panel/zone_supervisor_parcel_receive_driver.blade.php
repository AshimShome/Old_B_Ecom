  @extends('admin.admin_master')

@section('css')
  <style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Inter', sans-serif;
    }

    table tr {
      vertical-align: middle;
      font-family: 'Inter', sans-serif;
      font-family: 'Tahoma';
    }

    /* .dataTables_length {
      display: none;
    } */

    table tr td {
      vertical-align: middle;
      text-align: center;
    }

    table tr td .pending {
      color: #D25600;
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
    }

    .jfss-edit-btn,
    .jfss-edit-btn:hover {
      background: #B8E6F0;
      border-radius: 10px;
      padding: 7px 12px;
      color: #000;
    }

    .dataTables_length {
      display: none;
    }

    /* .dataTables_filter {
      display: none;
    } */

    .package-list {
      background: #00666C;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
    }

    .package-list h6 {
      background: #00666C;
      border-radius: 5px;
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-size: 16px;
      line-height: 19px;

      color: #FFFFFF;
    }

    .add-package-btn-hlder {
      margin-bottom: 20px;
    }

    .add-package-btn-hlder .add-package-btn {
      background: #16A085;
      border-radius: 5px;
      font-weight: 400;
      font-size: 16px;
      line-height: 19px;
      padding: 8px 20px;
      color: #FFFFFF;

    }

    .pending {
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
    }

    .complete {
      background: rgba(4, 210, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
      color: #04D200;

    }
  </style>

@endsection

@section('main-content')
  <div class="container-fluid mt-3">
          <div class="row">
            <h3 class="header-title">Zone Supervisor Parcel Receive from Driver</h3>
            <div class="col-12">
              <div class="card">
                <div class="card-body">


                  <table id="datatable-buttons" class="table table-striped nowrap w-100">

                    <thead>
                      <tr>
                        <th>Date & Time</th>
                        <th>Zone</th>
                        <th>Driver Invoice Number <br> or Order Number</th>
                        <th>Driver Name</th>
                        <th>Vehicle No.</th>
                        <th>Total Quantity of Package <br> Handover to Driver</th>
                        <th>Total Package Weight</th>
                        <th>Zone Supervisor Parcel receive <br> from Driver Process by</th>
                        <th>Parcel Receive Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2022-05-21 12:53:57</td>
                        <td>Mohakhali</td>
                        <td>011254682</td>
                        <td>Mr. Abdul Hakim</td>
                        <td>Moghbazar, Dhaka 1217</td>
                        <td>50</td>
                        <td>70 kg</td>
                        <td>Mr. Kamal azad</td>
                        <td>
                          <span class="pending">Pending</span>
                        </td>
                        <td> <a href="mirpurZonePackageList.html" class=" jfss-edit-btn"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>

                      <tr>
                        <td>2022-05-21 12:53:57</td>
                        <td>Mohakhali</td>
                        <td>011254682</td>
                        <td>Mr. Abdul Hakim</td>
                        <td>Moghbazar, Dhaka 1217</td>
                        <td>50</td>
                        <td>70 kg</td>
                        <td>Mr. Kamal azad</td>
                        <td>
                          <span class="complete">Complete</span>
                        </td>
                        <td> <a href="mirpurZonePackageList.html" class="edit jfss-edit-btn"><i
                              class="fas fa-eye"></i></a></td>
                      </tr>

                    </tbody>
                  </table>
                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
        </div>

@endsection