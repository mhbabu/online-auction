
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">@yield('title','Form Title') </h4>

    <label style="cursor:pointer" class="close" data-dismiss="modal">
        <span aria-hidden="true"><i class="fa fa-times"></i></span>
        <span class="sr-only">Close</span>
    </label>
</div>

<div class="modal-body">
    <div class="errorMessage alert alert-danger alert-dismissible d-none">
        <label aria-hidden="true" data-dismiss="alert" class="close"><i class="fa fa-times"></i></label>
    </div>

    <div class="successMessage alert alert-success alert-dismissible d-none">
        <label aria-hidden="true" data-dismiss="alert" class="close"><i class="fa fa-times"></i></label>
    </div>

    @yield('content')
</div>

@yield('external-css')
<script type="text/javascript">
    $(document.body).ready(function () {

        $("#dataForm").validate({
            errorPlacement: function () {
                return true;
            },
        });

        let form = $("#dataForm"); //Get Form ID
        let url = form.attr("action"); //Get Form action
        let method = form.attr("method"); //get form's data send method
        let errorMessage = $('.errorMessage'); //get error message div
        let successMessage = $('.successMessage'); //get success message div

        //============Ajax Setup===========//
        form.on('submit', function(event){
          if(form.valid())
          {
            let actionButton = form.find(".actionButton").html();
            $.ajax({
                url:url,
                data:new FormData(this),
                dataType:'JSON',
                method :method,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function (msg) {
                    form.find(".actionButton").html('<i class="fa fa-cog fa-spin"></i> Processing...');
                    form.find(".actionButton").prop('disabled', true); // disable button
                },
                success: function (data) {
                    //==========validation error===========//
                    if (data.success == false) {
                        errorMessage.hide().empty();
                        $.each(data.error, function (index, error) {
                            errorMessage.removeClass('d-none').append('<li>' + error + '</li>');
                        });
                        errorMessage.slideDown('slow');
                        form.find(".actionButton").html(actionButton);
                        form.find(".actionButton").prop('disabled', false);
                    }
                    //==========if data is saved=============//
                    if (data.success == true) {
                        successMessage.hide().empty();
                        successMessage.removeClass('d-none').html(data.status);
                        successMessage.slideDown('slow');
                        successMessage.delay(2000).slideUp(800, function () {
                            window.location.href = data.link;
                        });
                        form.trigger("reset");

                    }
                    //=========if data already submitted===========//
                    if (data.error == true) {
                        errorMessage.hide().empty();
                        errorMessage.removeClass('d-none').html(data.status);
                        errorMessage.slideDown('slow');
                        errorMessage.delay(1000).slideUp(800, function () {
                            form.find(".actionButton").html(actionButton);
                            form.find(".actionButton").prop('disabled', false);
                        });
                    }
                },
                error: function (data) {
                    let errors = data.responseJSON;
                    form.find(".actionButton").prop('disabled', false);
                    console.log(errors);
                    alert('Sorry, an unknown Error has been occurred ! Please try again later.');
                }
            });
            return false;
          }
        });
    });
</script>
@yield('external-js')
