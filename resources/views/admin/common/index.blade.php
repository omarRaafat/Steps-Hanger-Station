@extends('admin.index')
@section('main')
<style>
    .swal2-shown {
        overflow: unset !important;
        padding-right: 0px !important;
    }
</style>
    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Common Questions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Common Questions')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                @if( Config::get('app.locale') == 'en' )
                                                    <tr>                                           
                                                        <th data-priority="2">{{__('messages.Question_en')}}</th>                                                      
                                                        <th data-priority="2">{{__('messages.Answer_en')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th data-priority="2">{{__('messages.Question_ar')}}</th>                                                      
                                                        <th data-priority="2">{{__('messages.Answer_ar')}}</th>                                                       
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if(count($common) > 0)
                                                @foreach($common as $c)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>                                                        
                                                            <td>{{$c->question_en}}</td>                                               
                                                            <td>{{$c->answer_en}}</td>
                                                            <td>
                                                                <a href="edit/common/{{$c->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a data-swal-template="#my-templateEn{{$c->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                        <template id="my-templateEn{{$c->id}}">
                                                            <swal-title>
                                                                Do You Want To Delete This Common Question?
                                                            </swal-title>
                                                            <swal-icon type="warning" color="red"></swal-icon>
                                                            <swal-button type="confirm">
                                                                <a href="{{route('common.delete' , ['language' => app()->getLocale() , 'id' => $c->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
                                                            </swal-button>
                                                            <swal-button type="cancel">
                                                                cancel
                                                            </swal-button>
                                                            <swal-param name="allowEscapeKey" value="false" />
                                                            <swal-param
                                                                name="customClass"
                                                                value='{ "popup": "my-popup" }' />
                                                        </template>
                                                    @else
                                                        <tr>
                                                            <td>{{$c->question_ar}}</td>                                                         
                                                            <td>{{$c->answer_ar}}</td>                                              
                                                            <td>
                                                                <a href="edit/common/{{$c->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a data-swal-template="#my-templateAr{{$c->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                        <template id="my-templateAr{{$c->id}}">
                                                            <swal-title>
                                                                هل تريد مسح  هذا السؤال؟
                                                            </swal-title>
                                                            <swal-icon type="warning" color="red"></swal-icon>
                                                            <swal-button type="confirm">
                                                                <a href="{{route('common.delete' , ['language' => app()->getLocale() , 'id' => $c->id])}}" style="color:white;">{{__('messages.Delete')}}</a> 
                                                            </swal-button>
                                                            <swal-button type="cancel">
                                                                إلغاء
                                                            </swal-button>
                                                            <swal-param name="allowEscapeKey" value="false" />
                                                            <swal-param
                                                                name="customClass"
                                                                value='{ "popup": "my-popup" }' />
                                                        </template>
                                                    @endif
                                                @endforeach
                                            @else
                                                    <tr><td colspan="5" class="text-center">{{__('messages.No Data Yet')}}</td></tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.bindClickHandler()
    
        Swal.mixin({
        modal: true,
        }).bindClickHandler('data-swal-template')
    </script>
@endsection