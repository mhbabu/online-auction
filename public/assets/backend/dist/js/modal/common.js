/******************************
 Image preview
 *****************************/

 $('.imageChange').on('change',function(){
     let parentHtml = $(this).parent().parent();
     let viewImageId  = parentHtml.find('.viewImage');
     let errorImageId = parentHtml.find('.errorImage');
     errorImageId .html('');
     if (this.files && this.files[0])
     {
      var mime_type = this.files[0].type;
      if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
          errorImageId .html("Invalid file format Only jpg jpeg png is allowed");
          viewImageId.attr('src','/assets/backend/img/upload.png');
          viewImageId.addClass('custom-error');
          this.value = null;
          return false;
      }
      var size = this.files[0].size;
      if(size > 3000000){
       errorImageId .html("Please upload image must less than 1MB!!");
       viewImageId.attr('src','/assets/backend/img/upload.png');
       viewImageId.addClass('custom-error');
       this.value = null;
       return false;
      }
      var reader = new FileReader();
      reader.onload = function (e) {
          viewImageId.attr('src', e.target.result);
          viewImageId.removeClass('custom-error');
      };
      reader.readAsDataURL(this.files[0]);
    }
 });
