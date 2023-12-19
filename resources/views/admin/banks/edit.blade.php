@extends('layouts.admin_container')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
 .vodiapicker{
  display: none;
}

#a{
  padding-left: 0px;
}

#a img, .btn-select img{
  width: 26px;

}

#a li{
  list-style: none;
  padding-top: 5px;
  padding-bottom: 5px;
  cursor:pointer;
}

#a li:hover{
 background-color: #F4F3F3;
}

#a li img{
  margin: 5px;
}

#a li span, .btn-select li span{
  margin-left: 30px;
}

/* item list */

.b{
  display: none;
  width: 105.5%;
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  border: 1px solid rgba(0,0,0,.15);
  border-radius: 5px;
}

.open{
  display: show !important;
}

.btn-select{
  margin-top: 10px;
  width: 105.5%;
  height: 34px;
  border-radius: 5px;
  background-color: #fff;
  border: 1px solid #ccc;
  cursor: pointer;

}
.btn-select li{
  list-style: none;
  float: right;
  padding-bottom: 0px;
}

.btn-select:hover li{
  margin-left: 0px;
}

.btn-select:hover{
  background-color: #F4F3F3;
  border: 1px solid transparent;
  box-shadow: inset 0 0px 0px 1px #ccc;


}

.btn-select:focus{
   outline:none;
}

.lang-select{
  margin-left: 50px;
}
</style>

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons"></i> {{__('menu.Home')}}</a></li>
              <li class="breadcrumb-item"><a href="#">{{__('menu.Bank')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{__('menu.Edit Bank Info')}}</li>
            </ol>
          </nav>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>{{__('menu.Edit Bank Info')}}</h6>
            </div>
            <div class="ms-panel-body">
              <form id="submitForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Select Bank Name')}}</label>
                        <select class="form-control vodiapicker">
                            <option @if($banks->bank_name == 'البنك الأهلي التجاري') selected @endif data-thumbnail="/img/banks/Al-ahly Bank.png" value="البنك الأهلي التجاري">البنك الأهلي التجاري</option>
                            <option @if($banks->bank_name == 'البنك السعودي الفرنسي') selected @endif data-thumbnail="/img/banks/Banque Saudi Fransi.png" value="البنك السعودي الفرنسي">البنك السعودي الفرنسي</option>
                            <option @if($banks->bank_name == 'البنك السعودي للاستثمار') selected @endif data-thumbnail="/img/banks/The Saudi Investment Bank.png" value="البنك السعودي للاستثمار">البنك السعودي للاستثمار</option>
                            <option @if($banks->bank_name == 'مصرف الراجحي') selected @endif data-thumbnail="/img/banks/Al Rajhi Bank.png" value="مصرف الراجحي">مصرف الراجحي</option>
                            <option @if($banks->bank_name == 'مصرف الانماء') selected @endif data-thumbnail="/img/banks/Alinma Bank.png" value="مصرف الانماء">مصرف الانماء</option>
                            <option @if($banks->bank_name == 'بنك الجزيرة') selected @endif data-thumbnail="/img/banks/Al Jazeera Bank.png" value="بنك الجزيرة">بنك الجزيرة</option>
                            <option @if($banks->bank_name == 'بنك البلاد') selected @endif data-thumbnail="/img/banks/Al Bilad Bank.png" value="بنك البلاد">بنك البلاد</option>
                            <option @if($banks->bank_name == 'بنك الرياض') selected @endif data-thumbnail="/img/banks/Riyad Bank.png" value="بنك الرياض">بنك الرياض</option>
                            <option @if($banks->bank_name == 'البنك العربي') selected @endif data-thumbnail="/img/banks/Arab National Bank.png" value="البنك العربي">البنك العربي</option>
                            <option @if($banks->bank_name == 'بنك ساب') selected @endif data-thumbnail="/img/banks/SABB Bank.png" value="بنك ساب">بنك ساب</option>
                            <option @if($banks->bank_name == 'بنك سامبا') selected @endif data-thumbnail="/img/banks/Samba Bank.png" value="بنك سامبا">بنك سامبا</option>
                        </select>

                        <div class="lang-select">
                            <div class="btn-select form-control" name="bank_name" id="bank_name" value=""></div>
                            <div class="b">
                                <ul id="a"></ul>
                            </div>
                        </div>

                        <div class="invalid-feedback" style="display:contents;" id="bank_name_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.Account Number')}}</label>
                        <input type="text" name="account_number" id="account_number" class="form-control" value="{{$banks->account_number}}" placeholder="Account Number">
                        <div class="invalid-feedback" style="display:contents;" id="account_number_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>{{__('menu.IBAN')}}</label>
                        <input type="text" name="IBAN" id="IBAN" class="form-control" value="{{$banks->IBAN}}" placeholder="IBAN">
                        <div class="invalid-feedback" style="display:contents;" id="IBAN_error"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button class="btn btn-success" type="submit">{{__('menu.Update')}}</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="application/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="application/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="application/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#submitForm').submit(function(e){
            e.preventDefault();
            var bank_name = $('#bank_name').attr('value');
            var account_number = $('#account_number').val();
            var IBAN = $('#IBAN').val();

            var formData = new FormData();

            formData.append('bank_name' , bank_name);
            formData.append('account_number' , account_number);
            formData.append('IBAN' , IBAN);

            $.ajax({
                url:"{{ url('admin/banks/update/' . $banks->id) }}",
                type:"POST",
                data:formData,
                processData: false,
                contentType: false,
                success:function(data){
                    Swal.fire({
                        title: 'لقد تم تعديل بيانات البنك بنجاح !',
                        confirmButtonText: 'تم',
                        type: 'success',
                        timer:2500
                    }).then(function() {
                        window.location = "{{route('banks.index')}}";
                    });

                    $('#account_number_error').text("");
                    $('#IBAN_error').text("");

                },error:function(error){
                    if(error.responseJSON.errors.bank_name){
                        $('#bank_name_error').text(error.responseJSON.errors.bank_name)
                    }else{
                        $('#bank_name_error').text("");
                    }

                    if(error.responseJSON.errors.account_number){
                        $('#account_number_error').text(error.responseJSON.errors.account_number)
                    }else{
                        $('#account_number_error').text("");
                    }

                    if(error.responseJSON.errors.IBAN){
                        $('#IBAN_error').text(error.responseJSON.errors.IBAN)
                    }else{
                        $('#IBAN_error').text("");
                    }

                    $.each(error.responseJSON.errors, function(key,value) {

                    });
                }
            });
        });

        var langArray = [];
        $('.vodiapicker option').each(function(){
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
            langArray.push(item);
        });

        $('#a').html(langArray);


        var bank = "{{$banks->bank_name}}";
        if(bank == "البنك السعودي للاستثمار"){
            $('.btn-select').html('<li><img src="/img/banks/The Saudi Investment Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "البنك الأهلي التجاري"){
            $('.btn-select').html('<li><img src="/img/banks/Al-ahly Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "البنك السعودي الفرنسي"){
            $('.btn-select').html('<li><img src="/img/banks/Banque Saudi Fransi.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "مصرف الراجحي"){
            $('.btn-select').html('<li><img src="/img/banks/Al Rajhi Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "مصرف الانماء"){
            $('.btn-select').html('<li><img src="/img/banks/Alinma Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "بنك الجزيرة"){
            $('.btn-select').html('<li><img src="/img/banks/Al Jazeera Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "بنك البلاد"){
            $('.btn-select').html('<li><img src="/img/banks/Al Bilad Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "بنك الرياض"){
            $('.btn-select').html('<li><img src="/img/banks/Riyad Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "البنك العربي"){
            $('.btn-select').html('<li><img src="/img/banks/Arab National Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else if(bank == "بنك ساب"){
            $('.btn-select').html('<li><img src="/img/banks/SABB Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }else{
            $('.btn-select').html('<li><img src="/img/banks/Samba Bank.png" alt="" value="'+bank+'"/><span>'+ bank +'</span></li>');
            $('.btn-select').attr('value', bank);
        }


        $('#a li').click(function(){
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $(".b").toggle();
        });

        $(".btn-select").click(function(){
            $(".b").toggle();
        });

        var sessionLang = localStorage.getItem('lang');
        if (sessionLang){
            var langIndex = langArray.indexOf(sessionLang);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        }else {
            var langIndex = langArray.indexOf('ch');
            $('.btn-select').html(langArray[langIndex]);
        }
    });
</script>

@endsection
