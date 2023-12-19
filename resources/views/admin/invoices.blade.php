@extends('layouts.admin_container')
@section('content')

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Invoice List</a></li>

            </ol>
          </nav>



          <div class="col-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>Invoice List</h6>
              </div>
              <div class="ms-panel-body">

                <div class="table-responsive">
                  <table class="table table-hover thead-primary">
                    <thead>
                      <tr>
                        <th scope="col">Invoice ID</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Invoice Date</th>
                          <th scope="col">Quantity</th>
                            <th scope="col">Total Bill</th>
                             <th scope="col">Send Invoice</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="/admin/dashboard/invoices/invoice/detail">123456</a></th>
                        <td>French Fries</td>
                        <td> 001</td>
                          <td> 19/02/2019</td>

                          <td>10</td>
                            <td>$10</td>
                             <td><a href='#'><i class='fas fa-paper-plane text-success'></i></a>
                            <a href='a'><i class='far fa-trash-alt ms-text-danger'></i></a></td>

                      </tr>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>







 @endsection
