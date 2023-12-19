 <style>
   .media-heading a{
     color: whitesmoke
   }
   .myclass {
       text-transform: lowercase;
   }
   </style>

 <!-- Footer
@php($settings = \App\Models\Setting::first())
 @php($branches = \App\Models\Branch::latest()->get())

    ============================================= -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous">

 <footer id="footer" class="padding-50 "   style="background-color:{{$settings->theme_colour}};color: white;">
            <div class="container">
              <div class="row">
                <!-- Our location !-->
                <div class="col-md-3 col-sm-6 col-xs-12 our_location">
                  <h3>{{__('menu.HeadQuarter Location')}}</h3>
                  <p>{{$settings->resName()}} {{__('menu.Head Office')}}:</p>
                  <span>{{$settings->location()}}</span>
                  <p class="mt30">{{__('menu.Call for Reservations')}}:<span >{{$settings->phone}}</span></p>
                  <p>{{__('menu.E-mail')}}: <span>{{$settings->email}}</span> </p>
                  <ul class="social mt30">
                    <li><a href="{{$settings->facebook}}" target="_blank" data-toggle="tooltip" title="Facebook" style="background-color: {{$settings->text_colour}}"><i class="fab fa-facebook" ></i></a></li>
                    <li><a href="{{$settings->twitter}}" target="_blank" data-toggle="tooltip" title="Twitter" style="background-color: {{$settings->text_colour}}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{$settings->instagram}}" target="_blank" data-toggle="tooltip" title="Instgram" style="background-color: {{$settings->text_colour}}"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{{$settings->youtube}}" target="_blank" data-toggle="tooltip" title="Youtube" style="background-color: {{$settings->text_colour}}"><i class="fab fa-youtube"></i></a></li>
                  </ul>
                </div>
                <!-- End our location -->
                <!-- Latest Post !-->
                <div class="col-md-3 col-sm-6 col-xs-12 latest_post ">
                  <h3>{{__('menu.Branches')}}</h3>
                    @foreach($branches as $branch)
                  <div class="media">
                    {{-- <div class="media-left"> <a href="blog_single_image.html" > <img class="media-object" rel="prettyPhoto" src="img/post_thumb.jpg" alt="post thumb"> </a> </div> --}}
                    <div class="media-body" style="color:#ededed" >
                      <h4 class="media-heading"><a href="#">{{$branch->branchName()}}</a></h4>
{{--                        {{$branch->branchDesc()}}--}}
                    </div>
                  </div>
                  <!-- End media -->
                 @endforeach
                  <!-- End media -->
                </div>
                <!-- End latest Post -->
                <!-- Opening time !-->
                <div class="col-md-3 col-sm-6 col-xs-12 ">
                  <h3>{{__('menu.Working Times')}}</h3>
                  <ul>

                    <li>
   <p>

       {{__('menu.from')}}
       <time datetime="00:01" style="float: initial">  {{date('h:i A' , strtotime($settings->cat_time_from_1))}}  </time>
   </p>


                    </li>

                      <li>


                          <p>

                              {{__('menu.to')}}
                              <time datetime="00:01" style="float: initial">  {{date('h:i A' , strtotime($settings->cat_time_to_4))}}  </time>
                          </p>


                      </li>


                  </ul>
                </div>
                  <div class="col-md-3 col-sm-6 col-xs-12 opening_time">
                      <h3>{{__('menu.Working Days')}}</h3>
                      <ul>
                          @foreach(json_decode($settings->opening_days) as $day)
                              <li>
                                  <p>{{__('menu.'.$day)}}

                                      {{--                        <time datetime="00:01" style="float: initial;margin-right: 20px">1:00 AM - 1:00 PM</time>--}}
                                  </p>
                              </li>
                          @endforeach

                      </ul>
                  </div>
                <!-- End opening time -->
                {{-- <!-- Flickr !-->
                <div class="col-md-3 col-sm-6 col-xs-12 flickr">
                  <h3>Flickr Photos</h3>
                  <ul id="flickrbox" class="thumbs">
                  </ul>
                </div>
                <!-- End flickr --> --}}
              </div>
            </div>
            <!-- End container -->
            <!-- Footer logo !-->
            <div class="footer_logo text-center"> <img  src="{{$settings->footer_logo}}"  alt="logo" style="width:85px;background-color: {{$settings->theme_colour}}">
              <p> {{__('menu.ALL RIGHT RESERVED FOR')}} | {{$settings->resName()}} © {{date("Y")}}</p>
            </div>
            <!-- End Footer logo !-->

          </footer>
          <!-- End footer -->
          <!--  scroll to top of the page-->
          <a href="#" id="scroll_up" style="background: {{$settings->theme_colour}}"><i class="fa fa-angle-up"></i></a> </div>
        <!-- End wrapper -->
        <!-- Core JS Libraries -->


{{-- <script>--}}
{{--     function fireToasting(meal){--}}
{{--         var mealObj = JSON.parse(meal);--}}
{{--         $.ajax({--}}
{{--             headers: {--}}
{{--                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--             },--}}
{{--             url:"/user/menu/meal/cart",--}}
{{--             method:"POST",--}}
{{--             data:{meal:mealObj},--}}
{{--             success:function (response){--}}
{{--                 $(".cart_count").text(response.length);--}}
{{--                 var checkout_total_price = 0;--}}
{{--                 $('.cart_items').empty();--}}
{{--                 for (let i =0; i<response.length ; i++){--}}
{{--                     $('.cart_items').append(`<div class="item clearfix"> <a href="#"><img src="`+response[i].meal_image+`" alt=""></a>--}}
{{--                         <div class="item_desc">--}}
{{--                         <a href="#">`+response[i].meal_name.substring(0,14)+`</a>--}}
{{--                     <span class="item_price">$ `+response[i].price+`</span>--}}
{{--                     <span class="item_quantity">x `+response[i].quantity+`</span>--}}
{{--                 </div>`);--}}
{{--                     checkout_total_price+= response[i].total_price;--}}
{{--                 }--}}

{{--                 $(".shop_checkout_price").text("$"+parseFloat(checkout_total_price));--}}
{{--                 toastr.success("Success Added to Cart ");--}}
{{--             }--}}
{{--         })--}}

{{--     }--}}
{{-- </script>--}}
 <script>
     const phoneInputField = document.querySelector("#phone");
     const phoneInput = window.intlTelInput(phoneInputField, {
         onlyCountries: ['sa'],
         utilsScript:
             "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
     });
 </script>
 <script src="{{url('/javascripts/libs/jquery.min.js')}}" type="text/javascript"></script>
 <script src="{{url('/javascripts/libs/plugins.js')}}"></script>
 <!-- JS Plugins -->
 {{-- <script src="http://maps.googleapis.com/maps/api/js"></script>--}}
 <script src="{{url('/javascripts/libs/modernizr.js')}}"></script>
 <!-- JS Custom Codes -->
 <script src="{{url('/javascripts/custom/main.js')}}" ></script>
 <script src="{{url('/admin/assets/js/toastr.min.js')}}"> </script>
 <script src="{{url('/admin/assets/js/toast.js')}}"> </script>
 <script src="{{url('/admin/assets/js/promise.min.js')}}"> </script>
 <script src="{{url('/admin/assets/js/sweetalert2.min.js')}}"> </script>
 <script src="{{url('/admin/assets/js/sweet-alerts.js')}}"> </script>

<script>  var language =  "{{ \Illuminate\Support\Facades\Session::get("locale")}}";</script>
 <script>
     function fireToasting(meal,type=null,row_id=null,vat=null){
         // alert(vat);
         var mealObj = JSON.parse(meal);
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url:"/user/menu/meal/cart",
             method:"POST",
             data:{meal:mealObj,type:type},
             success:function (response){
                 $(".cart_count").text(response.length);
                 var checkout_total_price = 0;
                 var vat_value = 0;
                     $('.cart_items').empty();
                 for (let i =0; i<response.length ; i++){
                     $('.cart_items').append(`<div class="item clearfix cart_item_`+response[i].id+`"> <a href="#"><img src="`+response[i].meal_image+`" alt=""></a>
                         <div class="item_desc">
                         <a href="#">`+response[i].meal_name.substring(0,14)+`</a>
                     <span class="item_price"> `+response[i].price+` @json(__("menu.SAR"))</span>
                     <span class="item_quantity">x `+response[i].quantity+`</span>
                 </div>`);
                     checkout_total_price = parseFloat(parseFloat(checkout_total_price) + parseFloat(response[i].total_price));
                     $("#qnt_"+response[i].meal_id).val(response[i].quantity);
                     $("#total_"+response[i].meal_id).text(response[i].total_price +' '+ @json(__("menu.SAR")));

                 }

                 $(".shop_checkout_price").text(checkout_total_price.toFixed(2) +' '+ @json(__("menu.SAR")));
                   vat_value =  parseFloat(checkout_total_price* vat/100);
                 $("#vat_value").text(vat_value  +' '+  @json(__("menu.SAR")));
                 $(".shop_checkout_price_inc_vat").text(parseFloat(checkout_total_price + vat_value ).toFixed(2)  +' '+ @json(__("menu.SAR")));
                 $("#checkout_route").attr("href" , "/checkout");

                 if (type == null)
                 toastr.success(@json(__("menu.Meal added to Cart")));
                 if (language === 'ar')
                 $("*[class*='toast-top-left']").removeClass('toast-top-left').addClass('toast-top-right').css('text-align' , 'right');
                 else
                     $("*[class*='toast-top-right']").removeClass('toast-top-right').addClass('toast-top-left').css('text-align' , 'left');

             }
         })

     }
 </script>

 <script >

     function myFunction(id) {
         copyToClipboard(window.location.origin+"/user/menu/meal/detail/"+id);
         toastr.success("COPIED !");

     }

     function myFunction2(id) {
         copyToClipboard(id);
         toastr.success("COPIED !");

     }


 </script>
 <script type="text/javascript">

     var copyToClipboard = function(secretInfo) {
         var $body = document.getElementsByTagName('body')[0];
         var $tempInput = document.createElement('input');


         $body.appendChild($tempInput);
         $tempInput.setAttribute('value', secretInfo)
         $tempInput.setAttribute('class', "myclass")
         $tempInput.select();
         document.execCommand('copy');
         $body.removeChild($tempInput);

         var tooltip = document.getElementById("myTooltip");
         // tooltip.innerHTML = "link Copied ☺";
     }

     // refresh tooltip message value on second mouse hover
     function outFunc() {
         var tooltip = document.getElementById("myTooltip");
         tooltip.innerHTML = "Copy to clipboard";
     }
 </script>
 <script>
     function changeLocal(){
         $.ajax({
             url:'/change/local',
             method:'GET',
             success:function(data){
                 location.reload();
             }
         })
     }
 </script>

 <script>
     function increase(meal,type ,row_id,vat){
         if($("#qnt_"+row_id).val() > 10)
             toastr.warning('YOU HAVE REACHED MAXIMUM LIMIT !');

         else{
             fireToasting(meal,type,row_id,vat);
             toastr.success(@json(__("menu.quantity increased")));
         }



     }

     function decrease(meal ,type ,row_id,vat){
         if($("#qnt_"+row_id).val() == 1)
             toastr.warning('YOU HAVE REACHED MINIMUM LIMIT !');


         else{
             fireToasting(meal,type,row_id,vat);
             toastr.success(@json(__('menu.quantity decreased')));
         }



     }

     function removeItem(row_id,vat){
         $.ajax({
             url:"/user/menu/meal/cart/"+row_id,
             method:"GET",
             success:function (response){

                 if (response['cartItems'].length == 0){
                     $("#cart_view").empty();
                     $("#cart_view").html('<span class="alert alert-warning alert-brand btn-block">EMPTY CART</span>')

                 }
                     $(".cart_item_"+row_id).remove();



                 $(".cart_count").text(response['cartItems'].length);
                 $(".shop_checkout_price").text(response['checkout_total_price'] +' '+ @json(__("menu.SAR")));
                 vat_value =  parseFloat(response['checkout_total_price']* vat/100);
                 $("#vat_value").text(vat_value +' '+ @json(__("menu.SAR")));
                 $(".shop_checkout_price_inc_vat").text(parseFloat(response['checkout_total_price']+vat_value).toFixed(2) +' '+  @json(__("menu.SAR")));
                 $("#checkout_route").attr("href" , "/checkout");
                 toastr.success("MEAL REMOVED");
             }
         })
     }
 </script>
 <script>
     function checkout(){

             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 url:"/checkout",
                 method:'post',
                 data:$("#checkout_form").serialize(),
                 success:function (response){
                     if (response.status == 3){
                         $(".message").text(response.message);
                         // $("#code").text(response.code);
                         $(".code").val(response.code);
                         $(".phone").val($("#phone").val());
                         $("#verification_modal").modal({"show" : true});
                     }else if(response.status ==2){
                         $(".message").text(response.message);
                         $("#alert_message").modal({"show" : true});
                     }else{


                         window.location.replace(response.message)
                     }


                 }
             })


     }

     function verify(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/user/checkout/verify",
             method: "POST",
             data:$("#verify_form").serialize(),
             success:function (response){
// alert(response)
               if (response.status == 1){

                 toastr.success(response.message);

                   window.location.replace("/checkout/payment");
               }else{
                   toastr.warning(response.message)
               }
             }
         })
     }


     function userVerify(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/user/verify",
             method: "POST",
             data:$("#user_verify_form").serialize(),
             success:function (response){
// alert(response)
                 if (response.status == 1){

                     toastr.success(response.message);

                     window.location.replace("/user/login/");
                 }else{
                     toastr.warning(response.message)
                 }
             }
         })
     }

     function userVerify2(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/user/verify2",
             method: "POST",
             data:$("#user_verify_form").serialize(),
             success:function (response){
// alert(response)
                 if (response.status == 1){



                     window.location.replace(response.message);
                 }else{
                     toastr.warning(response.message)
                 }
             }
         })
     }
 </script>
 <script>
     function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
     }
 </script>

 <script>
     function getOrders(){
         $.ajax({
             url: "/user/past/orders",
             method:'GET',
             success:function(response){
                 $("#ordersBody").empty();
                 for (let i =0 ; i<response.length ; i++)
                 $("#ordersBody").append(`<tr><td style="background-color: #2A72DC"><a style="cursor: pointer" onclick="orderDetails(`+response[i].id+`)"> #`+response[i].id+`</td><td>`+response[i].date+`</td><td>`+response[i].status+`</a></td></tr>`)

             }
         })
       $("#pastOrders").fadeIn(500).show();
     }
     function orderDetails(order_id){
         $.ajax({
             url: "/user/past/order/details/"+order_id,
             method:'GET',
             success:function(response){
                 $("#orderDetailsBody").empty();
                 for (let i =0 ; i<response.length ; i++)
                     $("#orderDetailsBody").append(`<tr><td>`+response[i].name+`</td><td>`+response[i].price+`</td><td>`+response[i].quantity+`</a></td><td>`+response[i].total_price+`</td></tr>`)

             }
         })
         $("#pastOrders").fadeOut(500).hide();
         $("#pastOrderDetail").fadeIn(500).show();
     }
 </script>

 <script>
     function updatePassword(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/user/profile/password/update",
             method : 'POST' ,
             data:$("#password_form").serialize(),
             success:function (response){
                 if (response.status == 1){
                     $('#password').text('')
                     $('#passwords').text('')
                     $("#InputPassword").val('');
                     $("#newInputPassword").val('');
                     $("#confirmInputPassword").val('');
                     toastr.success(response.message)
                 }

                 else if (response.status == 2){
                     $('#passwords').text(response.message)
                     $('#password').text('')
                 }

                     else{
                     $('#password').text(response.message)
                     $('#passwords').text('')
                 }



                 // toastr.success(response.message)
             },
             error:function (response){
                 toastr.error(response)
             }
         })
     }

     function changeInfo(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/user/profile/info/update",
             method : 'POST' ,
             data:$("#infoForm").serialize(),
             success:function (response){
                 $("#inputName").val(response.user.username);
                 $("#inputEmail").val(response.user.email);
                 $("#inputCity").val(response.user.city);
                 toastr.success(response.message)
             },
             error:function (response){
                 toastr.error(response.message)
             }
         })
     }
 </script>

 <script>
     $('.card').on('click', function() {
         if ($(this).hasClass('open')) {
             $('.card').removeClass('open');
             $('.card').removeClass('shadow-2');
             $(this).addClass('shadow-1');
             return false;
         } else {
             $('.card').removeClass('open');
             $('.card').removeClass('shadow-2');
             $(this).addClass('open');
             $(this).addClass('shadow-2');
         }
     });
 </script>

 <script>
     function rate(meal_id , rate){

         $.ajax({
             url: "/user/menu/meal/rating/"+meal_id+"/"+rate,
             method : 'GET' ,
             error:function (response){
                 toastr.error(response.message)
             }
         })
     }
 </script>
<script>

    function generateQR(val){

        $("#gen_qr_btn").text('View Menu QR')
    }
</script>

 <script>
     function reviewMeal(meal_id , user_id){

         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: "/user/menu/meal/review",
             method : 'POST' ,
             data:$("#review_form").serialize(),
             success:function (response){
                 var removeBtn =  null

                 $("#comments-list").empty();
                 for (let i = 0 ;i<response.reviews.length;  i++){
                       if (response.reviews[i].user_id == user_id)
                           removeBtn = `<button class="btn btn-black" onclick="removeReview(`+meal_id+` , `+user_id+`)" style="float: right;background: #6653ff">remove review</button>`
                    else
                        removeBtn = null
                     $("#comments-list").append(`<ol id="comments-list">

                         <li id="comment-2" class="comment-x byuser">
                             <div class="the-comment">
                                 <div class="comment-author vcard"> <img src="/img/comment.png" class="avatar" alt="">
                                     <span class="fn n">`+response.reviews[i].username+`</span>
                                 </div>
                                 <div class="comment-meta"> <span> `+response.reviews[i].date+`</span> </div>
                                 <div class="comment-content">
                                     <p> `+response.reviews[i].review+`. </p>
                                 </div>
`+removeBtn+`

                             </div>

                         </li>
                     </ol>
                     `)
                 }
$("#reviews_count").text("REVIEWS ["+response.reviews.length+"]");
                 $("#respond").css("display" , 'none');

                 toastr.success(response.message)
             },
             error:function (response){
                 toastr.error(response.message)
             }
         });
     }

     function removeReview(meal_id , user_id){
         $.ajax({
             url: "/user/menu/meal/review/remove/"+meal_id+"/"+user_id,
             method : 'GET' ,
             success:function (response){
                 $("#comments-list").empty();
                 for (let i = 0 ;i<response.reviews.length;  i++){
                     $("#comments-list").append(`

                         <li id="comment-2" class="comment-x byuser">
                             <div class="the-comment">
                                 <div class="comment-author vcard"> <img src="/img/comment.png" class="avatar" alt="">
                                     <span class="fn n">

`+response.reviews[i].username+`
</span>
                                 </div>
                                 <div class="comment-meta"> <span> `+response.reviews[i].date+`</span> </div>
                                 <div class="comment-content">
                                     <p> `+response.reviews[i].review+`. </p>
                                 </div>

                             </div>

                         </li>

                     `)
                 }
                 $("#reviews_count").text("REVIEWS ["+response.reviews.length+"]");
                 $("#respond").css("display" , 'block');

                 toastr.success(response.message)
             },
             error:function (response){
                 toastr.error(response.message)
             }
         })
     }

 </script>
 <script>
     function checkPasswords(){

             var password = $("#password_register").val();
             var confirm_password = $("#password_confirm_register").val();
             if (password == confirm_password){
                 $('#send_register').prop('disabled' , false);
                 $('#passwords_register').hide();
             }

             else if ((password && confirm_password) == ' '){
                 $('#send_register').prop('disabled' , true);
                 $('#passwords_register').show();
             }

         else{
                 $('#send_register').prop('disabled' , true);
                 $('#passwords_register').show();
             }



     }
 </script>

 <script>
     function policyCondition(){
         $('#t_c_modal').modal({'show' : true});

     }
 </script>

<script>
    function couponCheck(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/user/menu/meal/cart/coupon/check",
            method : 'POST' ,
            data:$("#coupon_form").serialize(),
            success:function (response){
                if (response.value){
                    // alert(response.total_before_vat);
                    $("#checkout_total_price_before_vat").text(parseFloat(response.total_before_vat).toFixed(2) +' '+ @json(__("menu.SAR")));
                    $("#checkout_vat").text(parseFloat(response.vat).toFixed(2) +' '+ @json(__("menu.SAR")));
                    $("#checkout_total_price").text(parseFloat(response.total_after_vat).toFixed(2) +' '+ @json(__("menu.SAR")));
                    toastr.success(response.message)
                }else
                    toastr.error(response.message)

            },
            error:function (response){
                toastr.error(response.message)
            }
        })
    }
</script>

 <script>
     function reservation(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: '/reservation',
             method : 'POST' ,
             data:$("#reservation_form").serialize(),
             success:function (response){

                     $('input').val('');
                     $('textarea').val('');
                     toastr.success(response.message)


             },
             error:function (response){
                 toastr.error('please enter required inputs')
             }
         })
     }
 </script>

 <script>
     function contactNow(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: '/contact',
             method : 'POST' ,
             data:$("#contact_form").serialize(),
             success:function (response){

                 $('input[type=text]').val('');
                 $('textarea').val('');
                 swal.fire(
                     'Successfully '+response.message,
                     '',
                     'success'
                 )


             },
             error:function (){
                 toastr.error('please enter required inputs')
             }
         })
     }
 </script>
 <script>
     function loginNow(){
         $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: '/user/login',
             method : 'POST' ,
             data:$("#login_screen").serialize(),
             success:function (response){

                 $('input[type=text]').val('');

                 swal.fire(
                     response.message,
                     '',
                     'success'
                 )
                 window.location.href = "/menu";

             },
             error:function (){
                 toastr.error('please enter required inputs')
             }
         })
     }
 </script>
 <script>
     function userRegistrationValidate(){


         if (!$('#username_register').val()&&!$('#phone').val()&&!$('#password_register').val()&&!$('#password_confirm_register').val())
             $('#all_required').show();
         else
             $('#all_required').hide();



          if (!$('#username_register').val())
             $('#username_required').show();
          else
              $('#username_required').hide();
          if (!$('#phone').val())
             $('#phone_required').show();
          else
              $('#phone_required').hide();
          if (!$('#password_register').val())
             $('#password_required').show();
          else
              $('#password_required').hide();
          if (!$('#password_confirm_register').val())
             $('#password_confirm_required').show();
          else
              $('#password_confirm_required').hide();

     }

     function checkInputs(){
         $("#phone").on("input", function() {

             if (/^0/.test(this.value)) {
                 this.value = this.value.replace(/^0/, 5)
             }
         })
         if (($('#order_password').val().length&&$('#phone').val().length) ==0 ){
             $('#all_required').show();
             $('#order_button').prop('disabled' , true);
         }else{
             $('#all_required').hide();
             $('#order_button').prop('disabled' , false);
         }
     }

     function checkBeforeOrder(){
         if (($('#order_password').val().length&&$('#phone').val().length) ==0 ){
             $('#all_required').show();
             $('#order_button').prop('disabled' , true);
         }else {
             $('#all_required').hide();
             $('#order_button').prop('disabled', false);
             checkout()
         }
     }


     function userRegistration(){
         if (!$('#username_register').val()&&!$('#phone').val()&&!$('#password_register').val()&&!$('#password_confirm_register').val() && $('#policycheck').val() !== 1){
             $('#all_required').show();
             $('#send_register').prop('disabled' , true);
         }

         else{
             $('#send_register').prop('disabled' , false);
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 url: '/user/register',
                 method : 'POST' ,
                 data:$("#registeration_form").serialize(),
                 success:function (response){
                     // alert(response)
                     if (response.status == 3){
                         $(".message").text(response.message);
                         $("#user_code").text(response.code);
                         $(".code").val(response.code);
                         $(".phone").val($("#phone").val());
                         $("#user_verification_modal").modal({"show" : true});
                         $("#codeBox1").focus();
                     }else if(response.status ==2){
                         $(".message").text(response.message);
                         $("#alert_message").modal({"show" : true});
                     }else{
                         window.location.replace(response.message)
                     }


                 },
                 error:function (response){
                     toastr.error('please enter required inputs')
                 }
             })
         }



     }
    function userResetPassword()
     {
         if (!$('#phone').val() ) {
             $('#all_required').show();
             $('#send_reset').prop('disabled', true);
         } else {
             $('#send_reset').prop('disabled', false);
             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 url: '{{route('userPasswordReset')}}',
                 method: 'POST',
                 data: $("#reset_form").serialize(),
                 success: function (response) {
                     // alert(response)
                     if (response.status == 1) {
                         $("#user_reset_modal").modal({"show": true});
                         $("#codeBox1").focus();
                         $(".code").val(response.code);
                         $(".phone").val(response.phone);
                         $('#all_required').hide();
                     } else
                         $('#all_required').text(response.message).show();



                 },
                 error: function (response) {
                     toastr.error('please enter required inputs')
                 }
             })
         }
     }

 </script>

<script>
    function notes(){
        var notes = $('#notes').val();
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:'/checkout/view',
           method:'POST',
           data:{'notes' : notes}
       })

    }
</script>

 <script>
     setTimeout(function ()
     {
         $("#welcomePopup").fadeIn(500).modal({'show' : true})
     }
     , 5000 )

     setTimeout(function ()
         {
             $("#message").fadeOut(500).modal({'show' : false})
         }
         , 5000 )


 </script>
{{-- <script>--}}

{{--     var telInput = $("#phone"),--}}
{{--         errorMsg = $("#error-msg"),--}}
{{--         validMsg = $("#valid-msg");--}}

{{--     // initialise plugin--}}
{{--     telInput.intlTelInput({--}}

{{--         allowExtensions: true,--}}
{{--         formatOnDisplay: true,--}}
{{--         autoFormat: true,--}}
{{--         autoHideDialCode: true,--}}
{{--         autoPlaceholder: true,--}}
{{--         defaultCountry: "auto",--}}
{{--         ipinfoToken: "yolo",--}}

{{--         nationalMode: false,--}}
{{--         numberType: "MOBILE",--}}
{{--         onlyCountries: ['sa'],--}}
{{--         preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],--}}
{{--         preventInvalidNumbers: true,--}}
{{--         separateDialCode: true,--}}
{{--         initialCountry: "auto",--}}
{{--         geoIpLookup: function(callback) {--}}
{{--             $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {--}}
{{--                 var countryCode = (resp && resp.country) ? resp.country : "";--}}
{{--                 callback(countryCode);--}}
{{--             });--}}
{{--         },--}}
{{--         utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"--}}
{{--     });--}}

{{--     var reset = function() {--}}
{{--         telInput.removeClass("error");--}}
{{--         errorMsg.addClass("hide");--}}
{{--         validMsg.addClass("hide");--}}
{{--     };--}}

{{--     // on blur: validate--}}
{{--     telInput.blur(function() {--}}
{{--         reset();--}}
{{--         if ($.trim(telInput.val())) {--}}
{{--             if (telInput.intlTelInput("isValidNumber")) {--}}
{{--                 validMsg.removeClass("hide");--}}
{{--             } else {--}}
{{--                 telInput.addClass("error");--}}
{{--                 errorMsg.removeClass("hide");--}}
{{--             }--}}
{{--         }--}}
{{--     });--}}

{{--     // on keyup / change flag: reset--}}
{{--     telInput.on("keyup change", reset);--}}



{{-- </script>--}}



 <script>


     if(language === 'ar'){

         if($(window).width() <= 2050)
         {
             $(".my_account_inputs").css({"margin-right": "235px","width": "50%"});
             $("#my_accoutn_btn").css("margin-right", "-20px");
             $(".inputs").css({"margin-right" :"135px","width":"55%"});
             $(".coupon_list").css("margin-right" ,"235px");
             $('.checkout_phone').css('padding-left' , '200px')
             $('.checkout_password').css('width' , '395px')
             $('.checkout_type').css('width' , '395px')
             $('.checkout_payment').css('width' , '395px')
             $('.checkout_time').css('width' , '50%')
             $('.checkout_submit').css('width' , '395px')
         }

         if($(window).width() <= 414)
         {
             $(".inputs").css({"margin-right" :"0px","width": "100%"});
             $(".my_account_inputs").css({"margin-right": "30px","width": "80%"});
             $('.checkout_phone').css('padding-left' , '150px')
             $('.checkout_password').css('width' , '')
             $('.checkout_type').css('width' , '')
             $('.checkout_payment').css('width' , '')
             $('.checkout_time').css('width' , '100%')
             $('.checkout_submit').css('width' , '')
         }

         $("#menu_items_ul_li").find('li').css('float' , "right")

         $('#content').css("direction" , "rtl");
         $('.content').css("direction" , "rtl");
         $('.carts-content').css('text-align' , 'right');
         $('#footer').css("direction" , "rtl");
         $("#time").css('text-align' , "right");
         $("#email").css('text-align' , "right");
         $(".invoice-address").css("margin-right" , "0px");
         $('#receipt_summary').css("float" , "right")
         $("#receipt_qr").css("text-align" , "left");
         $(".cart_schedule").css('float' , "initial");
         $("#cart_header").css("float" , "right");
         $(".shop_cart_content").css({'text-align': 'initial' , 'direction': 'rtl'});
         $("#my_account_body").css("text-align" , "end");
         $("#login_password").css("text-align" , "right");
         $("#username_register").css("text-align" , "right");
         $("#password_register").css("text-align" , "right");
         $("#password_confirm_register").css("text-align" , "right");
         $('#locale').text('ENGLISH');
         $("#title").css("text-align" , "right");
         $('#home').text('الرئيسية');
         $('#menu').text('قائمة الطعام');
         $('#reservation').text('الحجز ');
         $('#contact').text('الأستعلام والتواصل');
         $("*[class*='toast-top-left']").removeClass('toast-top-left').addClass('toast-top-right').css('text-align' , 'right');
         // $("table.table-cart tr td img").css('margin-left', '34px')
     }else{

         if($(window).width() <= 2050)
         {
             $(".my_account_inputs").css({"margin-left": "325px","width": "50%"})
             $("#my_accoutn_btn").css("margin-right", "45px");
             $(".inputs").css({"margin-left" :"315px","width":"55%"});
             $(".coupon_list").css("margin-left" ,"300px");

             $('.checkout_phone').css('padding-right' , '200px')
             $('.checkout_password').css('width' , '395px')
             $('.checkout_type').css('width' , '395px')
             $('.checkout_payment').css('width' , '395px')
             $('.checkout_time').css('width' , '50%')
             $('.checkout_submit').css('width' , '395px')


         }
         if($(window).width() <= 414)
         {
             $('.checkout_phone').css('padding-right' , '150px')
             $(".my_account_inputs").css({"margin-left": "0px","width": "100%"});
             $("#my_accoutn_btn").css("margin-right", "0px");
             $(".inputs").css({"margin-right":"135px","margin-left":"0px","width":"100%"});
             $('.checkout_password').css('width' , '')
             $('.checkout_type').css('width' , '')
             $('.checkout_payment').css('width' , '')
             $('.checkout_time').css('width' , '100%')
             $('.checkout_submit').css('width' , '')
         }

         $("#menu_items_ul_li").find('li').css('float' , "left");
         $('#content').css("direction" , "ltr");
         $('.content').css("direction" , "ltr");
         $('.carts-content').css('text-align' , 'left');
         $('#footer').css("direction" , "ltr");
         $("#time").css('text-align' , "left");
         $("#email").css('text-align' , "left");
         $(".invoice-address").css("text-align" , "right");
         $('#receipt_summary').css("float" , "left");
         $("#my_account_body").css("text-align" , "initial");
         $("#login_password").css("text-align" , "left");
         $("#username_register").css("text-align" , "left");
         $("#password_register").css("text-align" , "left");
         $("#password_confirm_register").css("text-align" , "left");
         $('#locale').text('العربية');
         $('#home').text('HOME');
         $('#menu').text('MENU');
         $('#reservation').text('RESERVATION');
         $('#contact').text('CONTACT');
         $("#title").css("text-align" , "left");
         $("*[class*='toast-top-right']").removeClass('toast-top-right').addClass('toast-top-left').css('text-align' , 'left');
         // $("table.table-cart tr td img").css('margin-left', '0px')
     }

 </script>

<script>
    window.onload = function() {

        function setCurrentSlide(ele,index){
            $(".swiper1 .swiper-slide").removeClass("selected");
            ele.addClass("selected");
            //swiper1.initialSlide=index;
        }

        var swiper1 = new Swiper('.swiper1', {
            slidesPerView: 5,
            paginationClickable: true,
            spaceBetween: 10,
            freeMode: true,
            loop: false,
            onTab:function(swiper){
                var n = swiper1.clickedIndex;
            }
        });
        swiper1.slides.each(function(index,val){
            var ele=$(this);
            ele.on("click",function(){

                setCurrentSlide(ele,index);
                swiper2.slideTo(index, 500, false);
                //mySwiper.initialSlide=index;
            });
        });


        var swiper2 = new Swiper ('.swiper2', {
            direction: 'horizontal',
            loop: false,
            autoHeight: true,
            onSlideChangeEnd: function(swiper){

                var n=swiper.activeIndex;
                setCurrentSlide($(".swiper1 .swiper-slide").eq(n),n);
                swiper1.slideTo(n, 500, false);
            }
        });

        var Data="commentary，graphs,matchinfo，overbyover,relatedcontent";
        $(".start").on('click',function(){
            $(".show").html('');
            var flag = true,j = 0;
            //if(flag){
            //flag = false;
            (function Data(){
                if(j < Data.length){
                    setTimeout(function(){
                        $(".show").html(Data.slice(0,j++));
                        Data();
                    },200);
                }
                else{
                    $(".show").html(Data);
                    flag = true;
                }
            })();
            //}
        });


    }

</script>
 <script>
     function getCodeBoxElement(index) {
         return document.getElementById('codeBox' + index);
     }
     function onKeyUpEvent(index, event) {
         const eventCode = event.which || event.keyCode;
         if (getCodeBoxElement(index).value.length === 1) {
             if (index !== 4) {
                 getCodeBoxElement(index+ 1).focus();
             } else {
                 getCodeBoxElement(index).blur();
                 // Submit code
                 console.log('submit code ');
             }
         }
         if (eventCode === 8 && index !== 1) {
             getCodeBoxElement(index - 1).focus();
         }
     }
     function onFocusEvent(index) {
         for (item = 1; item < index; item++) {
             const currentElement = getCodeBoxElement(item);
             if (!currentElement.value) {
                 currentElement.focus();
                 break;
             }
         }
     }
 </script>
 <script>
     function forceZeroRm(){
         $("#phone").on("input", function() {

             if (/^0/.test(this.value)) {
                 this.value = this.value.replace(/^0/, 5)
             }
         })

     }
     $("#phone").on("input", function() {

         if (/^0/.test(this.value)) {
             this.value = this.value.replace(/^0/, 5)
         }
     })

     $("#login_phone").on("input", function() {
         if (/^0/.test(this.value)) {
             this.value = this.value.replace(/^0/, 5)
         }
     })


 </script>
 <script>
     $(document).ready(function(){
         if ({{\Session::get('saleem') != 1}})
             $("#loyalityPointsAlert").modal('show');
         {{\Illuminate\Support\Facades\Session::put('saleem' , 1)}}

     });
 </script>
        </body>
        </html>
