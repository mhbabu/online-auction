/***********************
 DATEPICKER START HERE
 **********************/
$('.date-picker').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
});

/*************************************
 DATEPICKER TOP POSITION CHANGE HERE
 ***********************************/
let originalCoordinate = 0;
$('.date-picker,#dob,#vehicle-model-year,#vehicle-manufacturing-year').click(function(e){
  if(originalCoordinate != $('.datepicker').position().top)
  {
    $('.datepicker').css({'top':$('.datepicker').position().top+55});
    originalCoordinate = $('.datepicker').position().top;
  }

});

/************************
 SWEET ALERT START HERE
 ************************/
$(document.body).on('click','.action-delete',function(ev){
    ev.preventDefault();
    let URL = $(this).attr('href');
    let redirectURL = $(this).attr('redirect-url');
    warnBeforeAction(URL, redirectURL);
});


/******************************
 Image preview
 *****************************/

 $('.imageChange').on('change',function(){
     let parentHtml = $(this).parent().parent();
     let  viewImageId  = parentHtml.find('.viewImage');
     let  errorImageId = parentHtml.find('.errorImage');
     errorImageId .html('');
     if (this.files && this.files[0])
     {
      let mime_type = this.files[0].type;
      if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
          this.value = null;
          errorImageId .html("Invalid file format Only jpg jpeg png is allowed");
          return false;
      }
      let size = this.files[0].size;
      if(size > 3000000){
        this.value = null;
        errorImageId .html("Please upload image must less than 1MB!!");
        return false;
      }
      let reader = new FileReader();
      reader.onload = function (e) {
          viewImageId.attr('src', e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
    }
 });

/**************************
 PHOTO PREVIEW SCRIPT HERE
 **************************/
function changePhoto(input) {
    if (input.files && input.files[0]) {
        $("#photo_err").html('');
        let mime_type = input.files[0].type;
        if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
            $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
            return false;
        }
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#photoViewer').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



/*****************************
 EDIT MODAL EFFECT START HERE
 *****************************/
$(document.body).on('click','.AppModal',function(e){
    e.preventDefault();
    $('#ModalContent').html('<div style="text-align:center;"><h3 class="text-primary">Loading Form...</h3></div>');
    $('#ModalContent').load(
        $(this).attr('href'),
        function (response, status, xhr) {
            if (status === 'error') {
                alert('error');
                $('#ModalContent').html('<p>Sorry, but there was an error:' + xhr.status + ' ' + xhr.statusText + '</p>');
            }
            return this;
        }
    );
});
