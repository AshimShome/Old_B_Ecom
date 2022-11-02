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

    .calender-wrapper {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .calender-wrapper .calender {
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #38414A;
      background: #fff;
    }

    @media(max-width:576px) {

      .calender-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
      }

    }
  </style>
@endsection

@section('main-content')
  <div class="container-fluid mt-3">
          <div class="row">
            <h3 class="header-title">Zone Wise Packages Delivery Complete List</h3>
            <div class="col-12">
              <div class="card">
                <div class="card-body">

                  <div class="calender-wrapper">
                    <input type="date" class="calender">
                  </div>

                  <table id="datatable-buttons" class="table table-striped nowrap w-100">

                    <thead>
                      <tr>
                        <th>Date & Time</th>
                        <th>Zone Name</th>
                        <th>Zone Id</th>
                        <th>Supervisor Name</th>
                        <th>Package Delivery <br> Completed Quantity</th>
                        <th>Product Price</th>
                        <th>Delivery Fee</th>
                        <th>Received Amount from Customer</th>
                        <th>Transfer Money to Company Account</th>
                        <th>Transfer Money Process by</th>
                        <th>Payment Statement Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2022-05-21 12:53:57</td>
                        <td>Mohakhali</td>
                        <td>254682</td>
                        <td>Mr. Abdu l Hakim</td>
                        <td>20</td>
                        <td>1000</td>
                        <td>60</td>
                        <td>10060</td>
                        <td>12000</td>

                        <td>
                          <span class="complete">Complete</span>
                        </td>
                        <td> <a href="courier_bank_account_payment_history.html" class=" jfss-edit-btn"><i
                              class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>2022-05-21 12:53:57</td>
                        <td>Mohakhali</td>
                        <td>254682</td>
                        <td>Mr. Abdu l Hakim</td>
                        <td>20</td>
                        <td>1000</td>
                        <td>60</td>
                        <td>10060</td>
                        <td>12000</td>

                        <td>
                          <span class="pending">Pending</span>
                        </td>
                        <td> <a href="courier_bank_account_payment_history.html" class=" jfss-edit-btn"><i
                              class="fas fa-eye"></i></a>
                        </td>
                      </tr>



                    </tbody>
                  </table>
                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
        </div>

@endsection