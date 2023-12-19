@extends('layouts.admin_container')
@section('content')
  <!-- Main Content -->


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
            </ol>
          </nav>
        </div>
         <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Product Details</h6>
            </div>
            <div class="ms-panel-body">

              <div id="arrowSlider" class="ms-arrow-slider carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="https://via.placeholder.com/1600x500" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h3 class="text-white">Pizaa img 1</h3>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/1600x500" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                      <h3 class="text-white">Pizaa img 2</h3>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/1600x500" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                      <h3 class="text-white">Pizaa img 3</h3>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#arrowSlider" role="button" data-slide="prev">
                  <span class="material-icons" aria-hidden="true">keyboard_arrow_left</span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#arrowSlider" role="button" data-slide="next">
                  <span class="material-icons" aria-hidden="true">keyboard_arrow_right</span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>


        <div class=" col-md-6">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-body">


              <h2 class="section-title bold">Product Info</h2>
              <table class="table ms-profile-information">
                <tbody>

                  <tr>
                    <th scope="row">Price</th>
                    <td>$15</td>
                  </tr>
                  <tr>
                    <th scope="row">Product Category</th>
                    <td>Veg</td>
                  </tr>
                  <tr>
                    <th scope="row">Availiblity</th>
                 <td><span class="badge badge-pill badge-primary">In stock</span></td>
                  </tr>
                  <tr>
                    <th scope="row">Delivery Charges</th>
                    <td>Free</td>
                  </tr>

                  <tr>
                    <th scope="row">SKU Identification</th>
                    <td>23445</td>
                  </tr>

                </tbody>
              </table>
              <div class="new">
                <button type="button" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-secondary">Delete</button>
              </div>


            </div>
          </div>
        </div>

        <div class=" col-md-6">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-body">

              <h4 class="section-title bold">Product Details </h4>
              <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book type and scrambled it to make a type specimen book.</p>


            </div>
            <div class="ms-quick-stats">
                <div class="ms-stats-grid">
                  <i class="fa fa-bullhorn"></i>
                  <p class="ms-text-dark">1,033</p>
                  <span>Today Order</span>
                </div>
                <div class="ms-stats-grid">
                  <i class="fa fa-heart"></i>
                  <p class="ms-text-dark">3,039</p>
                  <span>Favourite</span>
                </div>
              </div>
          </div>
        </div>


      </div>
    </div>





@endsection


