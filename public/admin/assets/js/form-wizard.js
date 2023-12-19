(function($) {
  'use strict';

  $("#default-wizard").steps({
    headerTag: "h3",
    bodyTag: "div",
    autoFocus: true,
    titleTemplate: '#title#',
    labels: {
      current: "",
      finish: 'Submit',
      previous: 'Back'
    },
    onFinished: function(event, currentIndex) {
        var formData = new FormData(document.getElementById("default-wizard"));
       $.ajax({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:"/admin/images/slider",

           data:formData,
           dataType:'JSON',
           cache: false,
           contentType: false,
           processData: false,
           method:"POST",
           type:'POST',
           success:function(response){
               alert.success(response.message);
           }
       })
        Swal.fire(
            'Slider Updated Successfully',
            '',
            'success'
        )
        // setTimeout(function (){
        //
        //     location.reload();
        // },2000)


    }
  });

  $(".style2-wizard, .style3-wizard, .style4-wizard").steps({
    headerTag: "h3",
    bodyTag: "div",
    autoFocus: true,
    titleTemplate: '<span class="number">#index#</span> #title#',
    labels: {
      current: "",
      finish: 'Submit',
      previous: 'Back'
    },
    onFinished: function(event, currentIndex) {
      alert("Form Submitted Successfully!");
    }
  });

})(jQuery);
