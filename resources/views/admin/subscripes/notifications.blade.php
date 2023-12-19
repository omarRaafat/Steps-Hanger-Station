<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($notifications as $notification)
        @if($notification->subscripe_id != null)
            <a href="" data-id="{{$notification->subscriptions->id}}" class="text-reset clickSubscripe notification-item">
                @if($notification->viewed == 0)
                    <div class="d-flex" style="background-color:#eee;">
                        <div class="avatar-xs me-3" style="width:4rem;height:2.8rem;">
                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                <i class="bx bx-plus"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mt-0 mb-1" key="t-your-order">{{$notification->subscriptions->email}}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1 subscripeMessage" key="t-grammer">{{__('messages.This Member Subscriped')}}</p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                        key="t-min-ago">{{$notification->created_at->diffForHumans()}}</span></p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex" style="background-color:#fff;">
                        <div class="avatar-xs me-3" style="width:4rem;height:2.8rem;">
                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                <i class="bx bx-plus"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mt-0 mb-1" key="t-your-order">{{$notification->subscriptions->email}}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1 subscripeMessage" key="t-grammer">{{__('messages.This Member Subscriped')}}</p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                        key="t-min-ago">{{$notification->created_at->diffForHumans()}}</span></p>
                            </div>
                        </div>
                    </div>
                @endif
            </a>

            @elseif($notification->contact_id != null)
                <a href="" data-id="{{$notification->contacts->id}}" class="text-reset clickContact notification-item">
                    @if($notification->viewed == 0)
                        <div class="d-flex" style="background-color:#eee;">
                            <div class="avatar-xs me-3" style="width:4rem;height:2.8rem;">
                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="bx bx-plus"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mt-0 mb-1" key="t-your-order">{{$notification->contacts->email}}</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1 contactMessage" key="t-grammer">{{__('messages.This Member Contacted')}}</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                            key="t-min-ago">{{$notification->created_at->diffForHumans()}}</span></p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex" style="background-color:#fff;">
                            <div class="avatar-xs me-3" style="width:4rem;height:2.8rem;">
                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="bx bx-plus"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mt-0 mb-1" key="t-your-order">{{$notification->contacts->email}}</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1 contactMessage" key="t-grammer">{{__('messages.This Member Contacted')}}</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                            key="t-min-ago">{{$notification->created_at->diffForHumans()}}</span></p>
                                </div>
                            </div>
                        </div>
                    @endif
                </a>
            @else

            @endif
    @endforeach
</body>
<script>
    $(document).ready(function(){
        var lang = window.location.pathname.replace(/^\/([^\/]*).*$/, '$1');
        var idSubscripe = $('.clickSubscripe').attr('data-id');
        $('.clickSubscripe').attr('href' , '/'+lang+'/admin/edit/subscripes/'+idSubscripe);

        var idContact = $('.clickContact').attr('data-id');
        $('.clickContact').attr('href' , '/'+lang+'/admin/edit/contacts/'+idContact);

        if(lang == "en"){
            $('.subscripeMessage').text('This Member Subscriped Into Your System Click To Show Details !!');
            $('.contactMessage').text('This Member Contacted Into Your System Click To Show Details !!');
        }else{
            $('.subscripeMessage').text('هذا العضو قام بالاشتراك في النظام أضغط لمعرفة التفاصيل !!');
            $('.contactMessage').text('هذا العضو قام بالتواصل مع النظام أضغط لمعرفة التفاصيل !!');
        }

    });
</script>
</html>
