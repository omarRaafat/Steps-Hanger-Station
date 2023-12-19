@extends('layouts.child')
@section('content')

    <div id="content">
    @php($settings = \App\Models\Setting::first())
        <!-- Single menu
          ============================================= -->
        <section class="single-menu text-left padding-100" style="direction:initial;">
            <div class="container">
                <div class="row">
                    <!-- Menu thumb slider -->
                    <div class="menu-thumb-slide col-md-6">
                        <div id="single-img" class="owl-carousel">
                            <div class="item" ><img  style="width: 100%" src="{{$meal->meal_image}}" alt=""></div>
{{--                            <div class="item"><img style="width: 100%" src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
{{--                            <div class="item"><img style="width: 100%" src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
{{--                            <div class="item"><img style="width: 100%" src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
                        </div>
{{--                        <div id="thumb-img" class="owl-carousel">--}}
{{--                            <div class="item"><img src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
{{--                            <div class="item"><img src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
{{--                            <div class="item"><img src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
{{--                            <div class="item"><img src="{{url('/uploads/'.$meal->meal_image)}}" alt=""></div>--}}
{{--                        </div>--}}
                    </div>
                    <!--End Menu thumb slider -->
                    <!-- Menu Desc -->
                    <div class="menu-desc col-md-6">
                        <h2>{{$meal->mealName()}} <span class="pull-right">{{$meal->meal_price}} {{__('menu.SAR')}}</span></h2>
                        <!-- Rating -->

{{--                        <div class="container d-flex justify-content-center ">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="stars">--}}
{{--                                        <form id="rating_form" action="{{url('/user/menu/meal/rating/'.$meal->id)}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <input class="star star-5" id="star-5" type="radio" onclick="rate('{{$meal->id}}','5')" name="star[]" />--}}
{{--                                            <label class="star star-5 fa fa-star  " for="star-5"></label>--}}
{{--                                            <input class="star star-4" id="star-4" type="radio" onclick="rate('{{$meal->id}}','4')" name="star[]" />--}}
{{--                                            <label class="star star-4 fa fa-star" for="star-4"></label>--}}
{{--                                            <input class="star star-3" id="star-3" type="radio" onclick="rate('{{$meal->id}}','3')" name="star[]" />--}}
{{--                                            <label class="star star-3 fa fa-star" for="star-3"></label>--}}
{{--                                            <input class="star star-2" id="star-2" type="radio" onclick="rate('{{$meal->id}}','2')" name="star[]" />--}}
{{--                                            <label class="star star-2 fa fa-star" for="star-2"></label>--}}
{{--                                            <input class="star star-1" id="star-1" type="radio" onclick="rate('{{$meal->id}}','1')" name="star[]" />--}}
{{--                                            <label for="star-1" class="star star-1 fa fa-star"></label>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- End Rating -->
                        <!-- Tagged -->
                        <div class="tagged">  <span class="label label-default" style="background-color: {{$settings->theme_colour}}">{{$meal->menu_category->CategoryName()}}</span> <span class="label instock" style="background-color: {{$settings->theme_colour}}">{{$meal->status}}</span> </div>
                        <!-- Ends Tagged -->
                        <!-- Description content -->
                        <div class="desc-content">

                            <p>{{$meal->mealDesc()}}.</p>
                            <!-- Meta description -->
                            <div class="meta-desc"> <a class="shop btn btn-gold" onclick="fireToasting('{{$meal}}')" data-toggle="tooltip" title="" data-original-title="Add to Cart" style="width: 25%;background-color: {{$settings->theme_colour}}"><i class="fa fa-shopping-cart" style="color: #ffffff"></i></a>
{{--                                <ul class="social pull-right">--}}
{{--                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    <li><a href="#" data-toggle="tooltip" title="" data-original-title="Behance"><i class="fa fa-behance"></i></a></li>--}}
{{--                                </ul>--}}
                            </div>
                            <!--End Meta description -->
                        </div>
                        <!--End Description content -->
                    </div>
                    <!--End Menu Desc -->
                    <div role="tabpanel" class="reviews-tabs padding-t-100">
                        <!-- Menu tabs -->

                        <!-- Tab panes -->
{{--                        <div class="tab-content">--}}
{{--                            <div role="tabpanel" class="tab-pane active" id="review">--}}
{{--                                <!-- Comments -->--}}
{{--                                <div class="comment-blog">--}}
{{--                                    <h2 id="reviews_count">Reviews [{{$reviews->count()}}]</h2>--}}
{{--                                    <div id="comments">--}}

{{--                                    <div id="comments-list-wrapper" class="comments">--}}

{{--                                            <ol id="comments-list">--}}
{{--                                                @foreach($reviews as $review)--}}
{{--                                                <li id="comment-{{$review->id}}" class="comment-x byuser">--}}
{{--                                                    <div class="the-comment">--}}
{{--                                                        <div class="comment-author vcard"> <img src="{{url('/img/comment.png')}}" class="avatar" alt="">--}}
{{--                                                            <span class="fn n">@if ($review->user->username){{$review->user->username}}@else GUEST @endif</span>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="comment-meta"> <span> {{$review->created_at->diffForHumans()}}</span> </div>--}}
{{--                                                        <div class="comment-content">--}}
{{--                                                            <p> {{$review->review}}. </p>--}}
{{--                                                        </div>--}}
{{--                                                        @auth()--}}
{{--                                                        @if($review->user_id == auth()->guard('web')->user()->id)--}}
{{--                                                        <button class="btn btn-black" onclick="removeReview('{{$meal->id}}' , '{{auth()->guard('web')->user()->id}}')" style="float: right;background: #6653ff">remove review</button>--}}
{{--@endif--}}
{{--                                                        @endauth--}}
{{--                                                    </div>--}}
{{--                                                    <!--the-comment -->--}}
{{--                                                </li>--}}
{{--                                                @endforeach--}}
{{--                                            </ol>--}}

{{--                                    </div>--}}
{{--                                    </div>--}}
{{--                                    @auth()--}}
{{--                                        @if(!$isReviewed)--}}


{{--                                        <div id="respond">--}}
{{--                                            <h3 id="reply-title">add a Review<small> <a rel="nofollow" id="cancel-comment-reply-link" href="#" class="cancelled">Cancel reply</a></small> </h3>--}}
{{--                                            <!-- Contact form -->--}}
{{--                                            <div class="contact-form">--}}
{{--                                                <form id="review_form" method="POST" action="{{url("/user/menu/meal/review")}}">--}}
{{--@csrf--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-md-12">--}}
{{--                                                            <!-- Form Group -->--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <!-- Element -->--}}
{{--                                                                <div class="element">--}}
{{--                                                                    <input type="hidden" value="{{$meal->id}}" name="meal_id">--}}
{{--                                                                    <input type="hidden" value="{{auth()->guard('web')->user()->id}}" name="user_id">--}}
{{--                                                                    <textarea name="review" class="text textarea" placeholder="Comment *" ></textarea>--}}
{{--                                                                </div>--}}
{{--                                                                <!-- End Element -->--}}
{{--                                                            </div>--}}
{{--                                                            <!-- End form Group -->--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- Element -->--}}
{{--                                                    <br>--}}
{{--                                                    <div class="element text-center">--}}
{{--                                                        <input type="button" onclick="reviewMeal('{{$meal->id}}' , '{{auth()->guard('web')->user()->id}}')"  value="Submit" class="btn btn-black " style="    background: #6653ff;"/>--}}
{{--                                                        <div class="loading"></div>--}}
{{--                                                    </div>--}}
{{--                                                    <!-- End Element -->--}}
{{--                                                </form>--}}
{{--                                                <div class="done mt30"> <strong>Thank you!</strong> We have received your message. </div>--}}
{{--                                            </div>--}}
{{--                                            <!-- End contact form -->--}}
{{--                                        </div>--}}

{{--                                            @endif--}}
{{--                                        @endauth--}}
{{--                                </div>--}}
{{--                                <!-- End# Comments -->--}}
{{--                            </div>--}}
{{--                            <!-- Description tab-->--}}
{{--                            <div role="tabpanel" class="tab-pane" id="description">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- End Description tab-->--}}
{{--                        </div>--}}
                        <!-- End Tab panes -->
                    </div>
                    <!-- tab panel -->
                </div>
            </div>
        </section>
        <!-- End single menu -->
        <!-- Interest
        ============================================= -->
        <section class="interest-in padding-100 text-center">
            <div class="container">
                <div class="row">

                    <h1>MAY BE YOU INTEREST IN</h1>
                    <!-- Menu type -->
                    <div class="menu-type dark">
                        @foreach($recommended_meals as $recommended_meal)
                        <!-- Item -->
                            <article class="menu-item col-md-4 col-sm-6 col-xs-12 pf-{{$recommended_meal->meal_category_id}} ">
                                <!-- Overlay Content -->

                                <div class="overlay_content overlay-menu" >

                                    <!-- Overlay Item -->
                                    <div class="overlay_item"> <span class="label" style="color: white" >best seller</span> <img src="{{$recommended_meal->meal_image}}"  alt="">
                                        <!-- Overlay -->
                                        <div class="overlay" >
                                            <!-- Icons -->
                                            <div class="icons" >
                                                <h3 ><a href="{{url('/user/menu/meal/detail/'.$recommended_meal->id)}}" style="color: white" > {{$recommended_meal->mealName()}}</a></h3>
                                                <h3 style="color: white"> {{$recommended_meal->meal_price}} {{__('menu.SAR')}}</h3>
                                                <!-- Rating -->
                                                <fieldset class="rating">
                                                    <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                                </fieldset>
                                                <!-- End Rating -->
                                                <!-- Buttons -->
                                                <div class="button"> <a class="btn btn-gold" onclick="fireToasting('{{$recommended_meal}}')" data-toggle="tooltip" title="" data-original-title="Add to Cart" style="background-color: {{$settings->theme_colour}}"><i class="fa fa-shopping-cart" style="color:#ffffff;"></i></a> <a class="btn btn-gold" href="{{url('/user/menu/meal/detail/'.$meal->id)}}"  data-toggle="tooltip" title="" data-original-title="MEAL DETAILS" style="background-color: {{$settings->theme_colour}} ;"><i class="fa fa-info-circle" style="color: #ffffff"></i>   <span class="tooltiptext" id="myTooltip"></span></a> </div>
                                                <!-- End Buttons -->
                                                <a class="close-overlay hidden">x</a> </div>
                                            <!-- End Icons -->
                                        </div>
                                        <!-- End Overlay -->
                                    </div>
                                    <!-- End Overlay Item -->

                                </div>

                                <!-- End Overlay Content -->

                            </article>
                            @endforeach
                    </div>
                    <!--End Menu type -->
                </div>
            </div>
        </section>
        <!-- End Interest -->
    </div>

    @endsection
