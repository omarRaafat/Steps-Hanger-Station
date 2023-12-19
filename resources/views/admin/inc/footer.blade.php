    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Steps.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        {{__('messages.Design & Develop by Steps')}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script src="/assetsAdmin/libs/jquery/jquery.min.js"></script>
    <script src="/assetsAdmin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assetsAdmin/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assetsAdmin/libs/simplebar/simplebar.min.js"></script>
    <script src="/assetsAdmin/libs/node-waves/waves.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

    <!-- App js -->
    <script src="/assetsAdmin/js/app.js"></script>
    <!-- <script src="assetsAdmin/js/ajax.js"></script> -->
    <script>
        $(document).ready(function(){
            $.ajax({
                url:'/app()->getLocale()/admin/notificationsCount',
                method:'GET',
                success:function(data){
                    if(data == 0){
                        $('.noti-icon .badge').empty();
                        $('.noti-icon .badge').text('');
                    }else{
                        $('.noti-icon .badge').empty();
                        $('.noti-icon .badge').html(data);
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });

            $.ajax({
                url:'/app()->getLocale()/admin/notifications',
                method:'GET',
                success:function(data){
                    $('.notificationsHere .simplebar-content').empty();
                    $('.notificationsHere .simplebar-content').html(data);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
        // Pusher.logToConsole = true;

        var pusher = new Pusher('a6d2c7d89b93ffd80d88', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            $.ajax({
                url:'/app()->getLocale()/admin/notificationsCount',
                method:'GET',
                success:function(data){
                    if(data != null){
                        $('.noti-icon .badge').empty();
                        $('.noti-icon .badge').html(data);
                    }else{
                        $('.noti-icon .badge').empty();
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });

            $.ajax({
                url:'/app()->getLocale()/admin/notifications',
                method:'GET',
                success:function(data){
                    $('.notificationsHere .simplebar-content').empty();
                    $('.notificationsHere .simplebar-content').html(data);
                },
                error:function(error){
                    console.log(error);
                }
            });

            console.log(data);
        });
    </script>
</body>

</html>
