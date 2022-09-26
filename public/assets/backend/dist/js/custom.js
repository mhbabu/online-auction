/*********************************
 CONVERT TO DATE FORMAT FUNCTION
 *********************************/
function toDate(dateStr) {
    let dateArr = dateStr.split('/');
    return `${dateArr[2]}-${dateArr[1]}-${dateArr[0]}`;
}

/*********************************
 CONVERT TO DATE FORMAT DB TO DATAPICKER FUNCTION
 *********************************/
function dbToDatepicker(dateStr) {
    let dateArr = dateStr.split('-');
    return `${dateArr[2]}/${dateArr[1]}/${dateArr[0]}`;
}
/*********************************
 CONVERT TO DATE FORMAT FUNCTION
 *********************************/
function dateFormat(date){
  var dd = String(date.getDate()).padStart(2, '0');
  var mm = String(date.getMonth() + 1).padStart(2, '0');
  var yyyy = date.getFullYear();
  return yyyy + '-' + mm + '-' + dd;
}
/*********************************
 INCREASE DATE DAY FUNCTION
 *********************************/
function dateIncrease(toDayDate){
  var date = new Date(Date.parse(toDayDate));
  date.setDate(date.getDate()+1);
  var newDate = date.toDateString();
  return newDate = dateFormat(new Date( Date.parse(newDate)));
}
/*********************************
 DECREASE DATE DAY FUNCTION
 *********************************/
function dateDecrease(toDayDate){
  var date = new Date(Date.parse(toDayDate));
  date.setDate(date.getDate()-1);
  var newDate = date.toDateString();
  return newDate = dateFormat(new Date( Date.parse(newDate)));
}

// Warn before remove data and redirect
function warnBeforeAction(URL, redirectURL) {
    swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Yes, proceed!",
            cancelButtonText: "No, cancel!",
            cancelButtonClass: "btn-danger",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                setTimeout(function () {
                    $.ajax({
                        type: "GET",
                        url: URL,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success: function(){
                            swal("Done!", "Action done successfully!", "success");
                            window.location.href = redirectURL;
                        }
                    })
                }, 1000);

            } else {
                swal("Cancelled", "Action Cancelled :)", "error");
            }
        });
}

function subcategoriesByCategory(e,route){
    $('.loading_data').hide();
    $(e).after('<span class="loading_data">Loading...</span>');
    let self = $(e);
    let parentHtml = $(e).parent().parent().parent();
    let categoryId = $(e).val();
    $.ajax({
        type: "GET",
        url: route,
        data: {
            category_id: categoryId
        },
        success: function (response) {
            let option = '<option value="">Select subcategory</option>';
            if (response.responseCode == 1){
                $.each(response.data, function (id, value) {
                    option += '<option value="' + id + '">' + value + '</option>';
                });
            }
            $(parentHtml).find('.subcategoryId').html(option);
            $(self).next().hide();
        }
    });
}


function upazilasByDistrict(e,route,targetHtml){
    $(e).after('<span class="loading_data">Loading...</span>');
    let self = $(e);
    let districtId = $(e).val();
    $.ajax({
        type: "GET",
        url: route,
        data: {
            district_id: districtId
        },
        success: function (response) {
            let option = '<option value="">Select police station</option>';
            if (response.responseCode == 1) {
                $.each(response.data, function (id, value) {
                    option += '<option value="' + id + '">' + value + '</option>';
                });
            }
            $(targetHtml).html(option);
            $(self).next().hide();
        }
    });
}
