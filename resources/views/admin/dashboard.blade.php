@extends('layouts.admin_container')
@section('content')
  <!-- Main Content -->
<style>
  .nav-tabs.has-gap li:last-child a{
    margin-right:14px !important;
  }
</style>

    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1 class="db-header-title">{{__('menu.Welcome, Admin')}}</h1>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget" >

            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> {{number_format((getTotalSales()/100000)*100 ,2)}}%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>{{__('menu.Total Sales')}}</strong></span>
                <h2>{{$total_sales}} {{__('menu.SAR')}}</h2>
              </div>
            </div>
            <canvas id="line-chart"></canvas>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> {{number_format((getTotalMeals()/100000)*100 ,2)}}%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>{{__('menu.Total Meals')}}</strong></span>
                <h2>{{getTotalMeals()}}</h2>
              </div>
            </div>
            <canvas id="line-chart-2"></canvas>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> {{number_format((getNewUsers()/100000)*100 ,2)}}%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>{{__('menu.New Users')}}</strong></span>
                <h2>{{getNewUsers()}}</h2>
              </div>
            </div>
            <canvas id="line-chart-3"></canvas>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> {{number_format((getTotalOrders()/100000)*100 ,2)}}%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>{{__('menu.Total Orders')}}</strong></span>
                <h2>{{getTotalOrders()}}</h2>
              </div>
            </div>
            <canvas id="line-chart-4"></canvas>
          </div>
        </div>

        <div class="col-xl-6 col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <div class="d-flex justify-content-between">
                <div class="align-self-center align-left">
                  <h6>{{__('menu.Meals Sales')}}</h6>
                </div>
                <a href="{{route('sales')}}" type="button" class="btn btn-primary">{{__('menu.View All')}}</a>
              </div>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">{{__('menu.Food Item')}}</th>
                      <th scope="col">{{__('menu.Orders')}}</th>
                      <th scope="col">{{__('menu.Price')}}</th>
                      <th scope="col">{{__('menu.Product ID')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count(getSalesExample()) > 0)
                      @foreach(getSalesExample() as $sale)
                        <tr>
                          <td class="ms-table-f-w">
                              @if(count($sale->images) > 0)
                            <img src="{{$sale->meal_image}}" alt="people">&nbsp;&nbsp;{{$sale->meal_name_en}}</td>
                            @endif
                          <td>{{$sale->carts->sum('quantity')}}</td>
                          <td>{{$sale->meal_price}}</td>
                          <td>{{$sale->id}}</td>
                        </tr>
                      @endforeach
                    @else
                        <tr><td colspan="5" class="text-center">{{__('menu.No Data Here')}}</td></tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header new">
              <h6>{{__('menu.Monthly Revenue')}}</h6>
              <select class="form-control new" id="exampleSelect">
              <option selected disabled>{{__('menu.Choose Month')}}</option>
                <option value="01">{{__('menu.January')}}</option>
                <option value="02">{{__('menu.February')}}</option>
                <option value="03">{{__('menu.March')}}</option>
                <option value="04">{{__('menu.April')}}</option>
                <option value="05">{{__('menu.May')}}</option>
                <option value="06">{{__('menu.June')}}</option>
                <option value="07">{{__('menu.July')}}</option>
                <option value="08">{{__('menu.August')}}</option>
                <option value="09">{{__('menu.September')}}</option>
                <option value="10">{{__('menu.October')}}</option>
                <option value="11">{{__('menu.November')}}</option>
                <option value="12">{{__('menu.December')}}</option>
              </select>
            </div>
            <div class="ms-panel-body WeeklyOrders">
              <span class="progress-label"> <strong>{{__('menu.week')}} 1</strong> </span>

              <div class="progress firstWeek">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div>

              <span class="progress-label"> <strong>{{__('menu.week')}} 2</strong> </span>

              <div class="progress secondWeek">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
              </div>

              <span class="progress-label"> <strong>{{__('menu.week')}} 3</strong> </span>

              <div class="progress thirdWeek">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
              </div>

              <span class="progress-label"> <strong>{{__('menu.week')}} 4</strong> </span>

              <div class="progress fourthWeek">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
              </div>

            </div>
          </div>
        </div>

{{--        <div class="col-md-12">--}}
{{--          <div class="ms-panel">--}}
{{--            <div class="ms-panel-header">--}}
{{--              <h6>{{__('menu.Most Selling Meals')}}</h6>--}}
{{--            </div>--}}
{{--            <div class="ms-panel-body">--}}
{{--              <div class="row">--}}
{{--                  {{geCountOrdersOfMeal()}}--}}
{{--                @if(count(getMealsPercentage()) > 0)--}}
{{--                  @foreach(getMealsPercentage() as $meal)--}}

{{--                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">--}}
{{--                      <div class="ms-card no-margin">--}}
{{--                        <div class="ms-card-img">--}}
{{--                          <img src="{{asset('uploads/' . $meal->meal_images)}}" style="object-fit:cover;height:157px;width:300px;" alt="card_img">--}}
{{--                        </div>--}}
{{--                        <div class="ms-card-body">--}}
{{--                          <div class="ms-card-heading-title">--}}
{{--                            <h6>{{Str::limit($meal->meal_name_en , 12)}}</h6>--}}
{{--                            <span class="green-text">{{__('menu.SAR')}} <strong>{{$meal->meal_price}}</strong></span>--}}
{{--                          </div>--}}

{{--                          <div class="ms-card-heading-title">--}}
{{--                            <p>Orders <span class="red-text">{{geCountOrdersOfMeal($meal->id)}}</span></p>--}}
{{--                            <p>Income <span class="red-text">{{__('menu.SAR')}} {{geCountOrdersOfMeal() * $meal->meal_price}}</span></p>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  @endforeach--}}
{{--                @else--}}

{{--                @endif--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <div class="d-flex justify-content-between">
                <div class="ms-header-text">
                  <h6>{{__('menu.Order Timing Chart')}}</h6>
                </div>
              </div>

            </div>
            <div class="ms-panel-body pt-0">
              <div class="d-flex justify-content-between ms-graph-meta">
                <ul class="ms-list-flex mt-3 mb-5">
                  <li>
                    <span>{{__('menu.Total Orders')}}</span>
                    <h3 class="ms-count">{{getTotalOrdersInChart()}}</h3>
                  </li>
                  <li>
                    <span>{{__('menu.New Orders')}}</span>
                    <h3 class="ms-count">{{getNewOrders()}}</h3>
                  </li>
                  <li>
                    <span>{{__('menu.Canceled Orders')}}</span>
                    <h3 class="ms-count">{{getCanceledOrders()}}</h3>
                  </li>
                </ul>
              </div>
              <!-- <canvas id="youtube-subscribers"></canvas> -->
              <canvas id="canvas" height="280" width="600"></canvas>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-md-12">
          <div class="ms-panel ms-widget ms-crypto-widget">
            <div class="ms-panel-header">
              <h6>{{__('menu.Daily Orders Branches')}}</h6>
            </div>
            <div class="ms-panel-body p-0">
              <ul class="nav nav-tabs nav-justified has-gap px-4 pt-4" role="tablist">
                <li role="presentation" class="fs-12"><a href="" id="monday" data-id="" class="" role="tab" data-toggle="tab"> Mon </a></li>
                <li role="presentation" class="fs-12"><a href="" id="tuesday" data-id="" class="" role="tab" data-toggle="tab"> Tue </a></li>
                <li role="presentation" class="fs-12"><a href="" id="wednesday" data-id="" class="" role="tab" data-toggle="tab"> Wed </a></li>
                <li role="presentation" class="fs-12"><a href="" id="thursday" data-id="" class="" role="tab" data-toggle="tab"> Thu </a></li>
                <li role="presentation" class="fs-12"><a href="" id="friday" data-id="" class="" role="tab" data-toggle="tab"> Fri </a></li>
                <li role="presentation" class="fs-12"><a href="" id="saturday" data-id="" class="" role="tab" data-toggle="tab"> SAT </a></li>
                <li role="presentation" class="fs-12"><a href="" id="sunday" data-id="" class="" role="tab" data-toggle="tab"> SUN </a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active show fade in" id="btc">
                  <div class="table-responsive">
                    <table class="table table-hover thead-light">
                      <thead>
                        <tr>
                          <th scope="col">{{__('menu.Branch Name')}}</th>
                          <th scope="col">{{__('menu.Qty')}}</th>
                          <th scope="col">{{__('menu.Orders')}}</th>
                          <th scope="col">{{__('menu.Profit')}}</th>
                        </tr>
                      </thead>
                      <tbody class="tbodayForAjax">
                        @if(count(getBranchesSandwich()) > 0)
                          @foreach(getBranchesSandwich() as $branch)
                            <tr>
                              <td>{{$branch->branch_name_en}}</td>
                              <td>{{$branch->quantityPercentage}}</td>
                              <td class="ms-text-success">{{$branch->orders}}</td>
                              <td>{{number_format($branch->quantityPercentage * $branch->orders)}}</td>
                            </tr>
                          @endforeach
                        @else
                          <tr><td colspan="5" class="text-center">{{__('menu.No Data Here')}}</td></tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>{{__('menu.Earnings')}}</h6>
            </div>
            <div class="ms-panel-body p-0">
              <div class="ms-quick-stats">
                <div class="ms-stats-grid">
                  <i class="fa fa-star"></i>
                  @if(getEarningsTodayOrders() > 0)
                  <p class="ms-text-dark">{{__('menu.SAR')}} {{getEarningsTodayOrders()}}</p>
                  @else
                  <p class="ms-text-dark">{{__('menu.SAR')}} 0</p>
                  @endif
                  <span>{{__('menu.Today')}}</span>
                </div>
                <div class="ms-stats-grid">
                  <i class="fa fa-university"></i>
                  @if(getEarningsYesterdayOrders() > 0)
                  <p class="ms-text-dark">{{__('menu.SAR')}} {{getEarningsYesterdayOrders()}}</p>
                  @else
                  <p class="ms-text-dark">{{__('menu.SAR')}} 0</p>
                  @endif
                  <span>{{__('menu.Yesterday')}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>


{{--        <div class="col-12">--}}
{{--          <div class="ms-panel">--}}
{{--            <div class="ms-panel-header">--}}
{{--              <h6>{{__('menu.Recent Orders')}}</h6>--}}
{{--            </div>--}}
{{--            <div class="ms-panel-body">--}}
{{--              <div class="table-responsive">--}}
{{--                <table class="table table-hover thead-primary">--}}
{{--                  <thead>--}}
{{--                    <tr>--}}
{{--                      <th scope="col">Order ID</th>--}}
{{--                      <th scope="col">Order Name</th>--}}
{{--                      <th scope="col">Customer Name</th>--}}
{{--                      <th scope="col">Location</th>--}}
{{--                      <th scope="col">Order Status</th>--}}
{{--                      <th scope="col">Delivered Time</th>--}}
{{--                      <th scope="col">Price</th>--}}
{{--                    </tr>--}}
{{--                  </thead>--}}
{{--                  <tbody>--}}
{{--                    <tr>--}}
{{--                      <th scope="row">1</th>--}}
{{--                      <td>French Fries</td>--}}
{{--                      <td>Jhon Leo</td>--}}
{{--                      <td>New Town</td>--}}
{{--                      <td><span class="badge badge-primary">Pending</span>--}}
{{--                      </td>--}}
{{--                      <td>10:05</td>--}}
{{--                      <td>$10</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                      <th scope="row">2</th>--}}
{{--                      <td>Mango Pie</td>--}}
{{--                      <td>Kristien</td>--}}
{{--                      <td>Old Town</td>--}}
{{--                      <td><span class="badge badge-dark">Cancelled</span>--}}
{{--                      </td>--}}
{{--                      <td>14:05</td>--}}
{{--                      <td>$9</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                      <th scope="row">3</th>--}}
{{--                      <td>FrieD Egg Sandwich</td>--}}
{{--                      <td>Jack Suit</td>--}}
{{--                      <td>Oxford Street</td>--}}
{{--                      <td><span class="badge badge-success">Delivered</span>--}}
{{--                      </td>--}}
{{--                      <td>12:05</td>--}}
{{--                      <td>$19</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                      <th scope="row">4</th>--}}
{{--                      <td>Lemon Yogurt Parfait</td>--}}
{{--                      <td>Alesdro Guitto</td>--}}
{{--                      <td>Church hill</td>--}}
{{--                      <td><span class="badge badge-success">Delivered</span>--}}
{{--                      </td>--}}
{{--                      <td>12:05</td>--}}
{{--                      <td>$18</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                      <th scope="row">5</th>--}}
{{--                      <td>Spicy Grill Sandwich</td>--}}
{{--                      <td>Jacob Sahwny</td>--}}
{{--                      <td>palace Road</td>--}}
{{--                      <td><span class="badge badge-success">Delivered</span>--}}
{{--                      </td>--}}
{{--                      <td>12:05</td>--}}
{{--                      <td>$21</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                      <th scope="row">6</th>--}}
{{--                      <td>Chicken Sandwich</td>--}}
{{--                      <td>Peter Gill</td>--}}
{{--                      <td>Street 21</td>--}}
{{--                      <td><span class="badge badge-primary">Pending</span>--}}
{{--                      </td>--}}
{{--                      <td>12:05</td>--}}
{{--                      <td>$15</td>--}}
{{--                    </tr>--}}
{{--                  </tbody>--}}
{{--                </table>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

        <!-- <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Restaurant Most Popular Meals</h6>
            </div>
            <div class="ms-panel-body">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="ms-card">
                    <div class="ms-card-body">
                      <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                          <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <h6>Hunger House </h6>
                          <div class="dropdown float-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Sales</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Details</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Remove</span>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <p class="fs-12 my-1 text-disabled">30 seconds ago</p>
                        </div>
                      </div>
                      <ul class="ms-star-rating rating-fill rating-circle ratings-new">
                        <li class="ms-rating-item"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc velit, dictum eget nulla a, sollicitudin rhoncus orci. Vivamus nec commodo turpis.</p>
                    </div>
                    <div class="ms-card-img">
                      <img src="https://via.placeholder.com/530x240" alt="card_img">
                    </div>
                    <div class="ms-card-footer text-disabled d-flex">
                      <div class="ms-card-options"> <i class="material-icons">favorite</i> 982</div>
                      <div class="ms-card-options"> <i class="material-icons">comment</i> 785</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="ms-card">
                    <div class="ms-card-body">
                      <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                          <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <h6>Food Lounge</h6>
                          <div class="dropdown float-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Sales</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Details</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Remove</span>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <p class="fs-12 my-1 text-disabled">30 seconds ago</p>
                        </div>
                      </div>
                      <ul class="ms-star-rating rating-fill rating-circle ratings-new">
                        <li class="ms-rating-item"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc velit, dictum eget nulla a, sollicitudin rhoncus orci. Vivamus nec commodo turpis.</p>
                    </div>
                    <div class="ms-card-img">
                      <img src="https://via.placeholder.com/530x240" alt="card_img">
                    </div>
                    <div class="ms-card-footer text-disabled d-flex">
                      <div class="ms-card-options"> <i class="material-icons">favorite</i> 982</div>
                      <div class="ms-card-options"> <i class="material-icons">comment</i> 785</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="ms-card">
                    <div class="ms-card-body">
                      <div class="media fs-14">
                        <div class="mr-2 align-self-center">
                          <img src="https://via.placeholder.com/270x270" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <h6>Delizious </h6>
                          <div class="dropdown float-right">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                              <li class="ms-dropdown-list">
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Sales</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Details</span>
                                  </div>
                                </a>
                                <a class="media p-2" href="#">
                                  <div class="media-body"> <span>Remove</span>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <p class="fs-12 my-1 text-disabled">30 seconds ago</p>
                        </div>
                      </div>
                      <ul class="ms-star-rating rating-fill rating-circle ratings-new">
                        <li class="ms-rating-item"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                        <li class="ms-rating-item rated"> <i class="material-icons">star</i>
                        </li>
                      </ul>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nunc velit, dictum eget nulla a, sollicitudin rhoncus orci. Vivamus nec commodo turpis.</p>
                    </div>
                    <div class="ms-card-img">
                      <img src="https://via.placeholder.com/530x240" alt="card_img">
                    </div>
                    <div class="ms-card-footer text-disabled d-flex">
                      <div class="ms-card-options"> <i class="material-icons">favorite</i> 982</div>
                      <div class="ms-card-options"> <i class="material-icons">comment</i> 785</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Recent Support Tickets -->

        <!-- <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <div class="d-flex justify-content-between">
                <div class="align-self-center align-left">
                  <h6>Recent Contact Tickets</h6>
                </div>
                <a href="#" class="btn btn-primary"> View All</a>
              </div>
            </div>
            <div class="ms-panel-body p-0">
              <ul class="ms-list ms-feed ms-twitter-feed ms-recent-support-tickets">
                <li class="ms-list-item">
                  <a href="#" class="media clearfix">
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round ms-img-small" alt="This is another feature">
                    <div class="media-body">
                      <div class="d-flex justify-content-between">
                        <h6 class="ms-feed-user mb-0">Lorem ipsum dolor</h6>
                        <span class="badge badge-success"> Open </span>
                      </div>
                      <span class="my-2 d-block"> <i class="material-icons">date_range</i> February 24, 2019</span>
                      <p class="d-block"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus lectus a facilisis bibendum. Duis quis convallis sapien ... </p>
                      <div class="d-flex justify-content-between align-items-end">
                        <div class="ms-feed-controls">
                          <span>
                            <i class="material-icons">chat</i> 16
                          </span>
                          <span>
                            <i class="material-icons">attachment</i> 3
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="ms-list-item">
                  <a href="#" class="media clearfix">
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round ms-img-small" alt="This is another feature">
                    <div class="media-body">
                      <div class="d-flex justify-content-between">
                        <h6 class="ms-feed-user mb-0">Lorem ipsum dolor</h6>
                        <span class="badge badge-success"> Open </span>
                      </div>
                      <span class="my-2 d-block"> <i class="material-icons">date_range</i> February 24, 2019</span>
                      <p class="d-block"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus lectus a facilisis bibendum. Duis quis convallis sapien ... </p>
                      <div class="d-flex justify-content-between align-items-end">
                        <div class="ms-feed-controls">
                          <span>
                            <i class="material-icons">chat</i> 11
                          </span>
                          <span>
                            <i class="material-icons">attachment</i> 1
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="ms-list-item">
                  <a href="#" class="media clearfix">
                    <img src="https://via.placeholder.com/270x270" class="ms-img-round ms-img-small" alt="This is another feature">
                    <div class="media-body">
                      <div class="d-flex justify-content-between">
                        <h6 class="ms-feed-user mb-0">Lorem ipsum dolor</h6>
                        <span class="badge badge-danger"> Closed </span>
                      </div>
                      <span class="my-2 d-block"> <i class="material-icons">date_range</i> February 24, 2019</span>
                      <p class="d-block"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus lectus a facilisis bibendum. Duis quis convallis sapien ... </p>
                      <div class="d-flex justify-content-between align-items-end">
                        <div class="ms-feed-controls">
                          <span>
                            <i class="material-icons">chat</i> 21
                          </span>
                          <span>
                            <i class="material-icons">attachment</i> 5
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div> -->

        <!-- Recent Support Tickets -->
        <!-- Chat -->

      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var year = <?php echo $year; ?>;
        var totla_orders = <?php echo $totla_orders; ?>;
        var new_orders = <?php echo $new_orders; ?>;
        var cancel_orders = <?php echo $cancel_orders; ?>;
        var barChartData = {
            labels: year,
            datasets: [
              {
                label: 'totla orders',
                backgroundColor: "#6653ff",
                data: totla_orders
              },
              {
                label: 'new orders',
                backgroundColor: "black",
                data: new_orders
              },
              {
                label: 'cancel orders',
                backgroundColor: "#c1c1c1",
                data: cancel_orders
              }
            ]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Monthly Order Created'
                    }
                }
            });
        };
        $(document).ready(function(){

          $.ajax({
            url:'/admin/dashboard/getDay',
            method:'GET',
            success:function(data){
              console.log(data);
              if(data == "Monday"){
                $('#monday').attr('class' , 'active show');
                $('#tuesday').attr('class' , '');
                $('#wednesday').attr('class' , '');
                $('#thursday').attr('class' , '');
                $('#friday').attr('class' , '');
                $('#saturday').attr('class' , '');
                $('#sunday').attr('class' , '');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#monday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#tuesday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#wednesday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#thursday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#friday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#saturday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#sunday').attr('data-id' , date6);

              }else if(data == "Tuesday"){
                $('#monday').attr('class' , '');
                $('#tuesday').attr('class' , 'active show');
                $('#wednesday').attr('class' , '');
                $('#thursday').attr('class' , '');
                $('#friday').attr('class' , '');
                $('#saturday').attr('class' , '');
                $('#sunday').attr('class' , '');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#tuesday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0 ; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#wednesday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#thursday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#friday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#saturday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#sunday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#monday').attr('data-id' , date6);
              }else if(data == "Wednesday"){
                $('#monday').attr('class' , '');
                $('#tuesday').attr('class' , '');
                $('#wednesday').attr('class' , 'active show');
                $('#thursday').attr('class' , '');
                $('#friday').attr('class' , '');
                $('#saturday').attr('class' , '');
                $('#sunday').attr('class' , '');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#wednesday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0 ; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#thursday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#friday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#saturday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#sunday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#monday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#tuesday').attr('data-id' , date6);
              }else if(data == "Thursday"){
                $('#monday').attr('class' , '');
                $('#tuesday').attr('class' , '');
                $('#wednesday').attr('class' , '');
                $('#thursday').attr('class' , 'active show');
                $('#friday').attr('class' , '');
                $('#saturday').attr('class' , '');
                $('#sunday').attr('class' , '');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#thursday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0 ; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#friday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#saturday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#sunday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#monday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#tuesday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#wednesday').attr('data-id' , date6);
              }else if(data == "Friday"){
                $('#monday').attr('class' , '');
                $('#tuesday').attr('class' , '');
                $('#wednesday').attr('class' , '');
                $('#thursday').attr('class' , '');
                $('#friday').attr('class' , 'active show');
                $('#saturday').attr('class' , '');
                $('#sunday').attr('class' , '');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#friday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0 ; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#saturday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#sunday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#monday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#tuesday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#wednesday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#thursday').attr('data-id' , date6);
              }else if(data == "Saturday"){
                $('#monday').attr('class' , '');
                $('#tuesday').attr('class' , '');
                $('#wednesday').attr('class' , '');
                $('#thursday').attr('class' , '');
                $('#friday').attr('class' , '');
                $('#saturday').attr('class' , 'active show');
                $('#sunday').attr('class' , '');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#saturday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0 ; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#sunday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#monday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#tuesday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#wednesday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#thursday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#friday').attr('data-id' , date6);
              }else{
                $('#monday').attr('class' , '');
                $('#tuesday').attr('class' , '');
                $('#wednesday').attr('class' , '');
                $('#thursday').attr('class' , '');
                $('#friday').attr('class' , '');
                $('#saturday').attr('class' , '');
                $('#sunday').attr('class' , 'active show');

                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                $('#sunday').attr('data-id' , date);

                $.ajax({
                  url:'/admin/dashboard/getbranchesWithOrders/'+date,
                  method:'GET',
                  success:function(data){
                    $('.tbodayForAjax').empty();
                    if(data.length > 0){
                      for(var i = 0 ; i < data.length ; i++){
                          $('.tbodayForAjax').append(`
                            <tr>
                              <td>`+data[i].branch_name_en+`</td>
                              <td>`+data[i].quantityPercentage+`</td>
                              <td class="ms-text-success">`+data[i].orders+`</td>
                              <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                            </tr>
                          `);
                      }
                    }else{
                      $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                    }
                  },error:function(error){
                    console.log(error);
                  }
                });

                var tomorrow1 = new Date();
                tomorrow1.setDate(tomorrow1.getDate()+1);
                var date1 = tomorrow1.getFullYear()+'-'+(tomorrow1.getMonth()+1)+'-'+tomorrow1.getDate();
                $('#monday').attr('data-id' , date1);

                var tomorrow2 = new Date();
                tomorrow2.setDate(tomorrow2.getDate()+2);
                var date2 = tomorrow2.getFullYear()+'-'+(tomorrow2.getMonth()+1)+'-'+tomorrow2.getDate();
                $('#tuesday').attr('data-id' , date2);

                var tomorrow3 = new Date();
                tomorrow3.setDate(tomorrow3.getDate()+3);
                var date3 = tomorrow3.getFullYear()+'-'+(tomorrow3.getMonth()+1)+'-'+tomorrow3.getDate();
                $('#wednesday').attr('data-id' , date3);

                var tomorrow4 = new Date();
                tomorrow4.setDate(tomorrow4.getDate()+4);
                var date4 = tomorrow4.getFullYear()+'-'+(tomorrow4.getMonth()+1)+'-'+tomorrow4.getDate();
                $('#thursday').attr('data-id' , date4);

                var tomorrow5 = new Date();
                tomorrow5.setDate(tomorrow5.getDate()+5);
                var date5 = tomorrow5.getFullYear()+'-'+(tomorrow5.getMonth()+1)+'-'+tomorrow5.getDate();
                $('#friday').attr('data-id' , date5);

                var tomorrow6 = new Date();
                tomorrow6.setDate(tomorrow6.getDate()+6);
                var date6 = tomorrow6.getFullYear()+'-'+(tomorrow6.getMonth()+1)+'-'+tomorrow6.getDate();
                $('#saturday').attr('data-id' , date6);
              }
            },error:function(error){
              console.log(error);
            }
          });

          $('#exampleSelect').on('change' ,function(e){
            var month = e.target.value;
            $.ajax({
              url:'/admin/dashboard/ordersFirstWeeklyStat/'+month,
              method:'GET',
              success:function(data1){
                console.log(data1);
                $('.firstWeek').empty();
                $('.firstWeek').append(`
                  <div class="progress-bar bg-primary" role="progressbar" style="width: `+data1+`%" aria-valuenow="`+data1+`" aria-valuemin="0" aria-valuemax="100">`+data1+`%</div>
                `);
              },error:function(error){
                console.log(error);
              }
            });

            $.ajax({
              url:'/admin/dashboard/ordersSecondWeeklyStat/'+month,
              method:'GET',
              success:function(data2){
                console.log(data2);
                $('.secondWeek').empty();
                $('.secondWeek').append(`
                  <div class="progress-bar bg-primary" role="progressbar" style="width: `+data2+`%" aria-valuenow="`+data2+`" aria-valuemin="0" aria-valuemax="100">`+data2+`%</div>
                `);
              },error:function(error){
                console.log(error);
              }
            });

            $.ajax({
              url:'/admin/dashboard/ordersThirdWeeklyStat/'+month,
              method:'GET',
              success:function(data3){
                console.log(data3);
                $('.thirdWeek').empty();
                $('.thirdWeek').append(`
                  <div class="progress-bar bg-primary" role="progressbar" style="width: `+data3+`%" aria-valuenow="`+data3+`" aria-valuemin="0" aria-valuemax="100">`+data3+`%</div>
                `);
              },error:function(error){
                console.log(error);
              }
            });

            $.ajax({
              url:'/admin/dashboard/ordersFourthWeeklyStat/'+month,
              method:'GET',
              success:function(data4){
                console.log(data4);
                $('.fourthWeek').empty();
                $('.fourthWeek').append(`
                  <div class="progress-bar bg-primary" role="progressbar" style="width: `+data4+`%" aria-valuenow="`+data4+`" aria-valuemin="0" aria-valuemax="100">`+data4+`%</div>
                `);
              },error:function(error){
                console.log(error);
              }
            });

          });

          $('#monday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
                }else{
                  $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                }
              },error:function(error){
                console.log(error);
              }
            });
          });

          $('#tuesday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
                }else{
                  $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                }
              },error:function(error){
                console.log(error);
              }
            });
          });

          $('#wednesday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
                }else{
                  $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                }
              },error:function(error){
                console.log(error);
              }
            });
          });

          $('#thursday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
                }else{
                  $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                }
              },error:function(error){
                console.log(error);
              }
            });
          });

          $('#friday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
                }else{
                  $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                }
              },error:function(error){
                console.log(error);
              }
            });
          });

          $('#saturday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
              }else{
                $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
              }
              },error:function(error){
                console.log(error);
              }
            });
          });

          $('#sunday').on('click' , function(e){
            var date = e.target.getAttribute('data-id');
            console.log(date);
            $.ajax({
              url:'/admin/dashboard/getbranchesWithOrders/'+date,
              method:'GET',
              success:function(data){
                $('.tbodayForAjax').empty();
                if(data.length > 0){
                  for(var i = 0 ; i < data.length ; i++){
                      $('.tbodayForAjax').append(`
                        <tr>
                          <td>`+data[i].branch_name_en+`</td>
                          <td>`+data[i].quantityPercentage+`</td>
                          <td class="ms-text-success">`+data[i].orders+`</td>
                          <td>`+data[i].quantityPercentage * data[i].orders+`</td>
                        </tr>
                      `);
                  }
                }else{
                  $('.tbodayForAjax').append('<tr><td colspan="5" class="text-center">No Orders This Day</td></tr>');
                }
              },error:function(error){
                console.log(error);
              }
            });
          });

        });
    </script>
@endsection
