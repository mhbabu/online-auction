$(document).ready(function () {

    /****************************************
      Account info > Credit Card loan Structure
      ****************************************/
       if($("#credit-loan-beftn-yes").is(":checked"))
         $('#credit-loan-beftn').show();
        else
        $('#credit-loan-beftn').hide();

       $("#credit-loan-beftn-yes,#credit-loan-beftn-no").click(function() {
           let $box = $(this);
           if($box.is(":checked") && $box.val() == true)
           {
             $('#credit-loan-beftn').show();
           }
          else
          {
            $('#credit-loan-beftn').hide();
          }
       });

    /***********************************
      PROPERTIES PROPERTY NATURE START
      ***********************************/

     $(document).on("change","#property-nature", function() {
         let propertyNature = $(this).val();
         if(propertyNature == "structured building")
         {
           $('#structure-building').show();
           $('#flat').hide();
           $('#vacant-land').hide();
         }
         else if (propertyNature == "flat")
         {
           $('#flat').show();
           $('#structure-building').hide();
           $('#vacant-land').hide();
         }
         else
         {
           $('#vacant-land').show();
           $('#structure-building').hide();
           $('#flat').hide();
         }

     });

     $("#property-nature").trigger("change");

     /******************
      MANUFACTURER TYPE
      ******************/

     $(document).on("change", "#manufacturer-type", function () {
         let manufacturerType = $(this).val();
         if (manufacturerType == 'History With Other Manufacturer')
         {
           $('#history-manufacturer').show();
           $('#manufacturer').hide();
         }
         else
         {
           $('#manufacturer').show();
           $('#history-manufacturer').hide();
         }
     });

     $("#manufacturer-type").trigger("change");



    /*******************************
     ACCOUNT PROPOSAL GROUP CHECKBOX
     ******************************/

    $("input:checkbox").on('click', function () {
        let $box = $(this);
        if ($box.is(":checked")) {
            let group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });

    /*******************************
     ACCOUNT PROPOSAL MODAL EFFECT
     ******************************/
    $('.cas-id-generate').hide(); // first step
    $(".proposalCasId").trigger("change");

    $('.profile-type-div').show(); //second step
    $('.organization-type-div').hide();
    $(".profileType").trigger("change");


    $(document).on('click', '.proposalCasId', function () { // first step functionality
        $('.proposal-cas-div').hide();
        $('.cas-id-generate').show();
    });
    $(document).on('click', '.back', function () {
        $('.proposal-cas-div').show();
        $('.cas-id-generate').hide();
    });

    $(document).on('change', '.profileType', function () { //second step functionality
        let profileType = $(this).val();
        if (profileType == 'person') {
            $('.profile-type-div').show();
            $('.organization-type-div').hide();
        } else {
            $('.profile-type-div').hide();
            $('.organization-type-div').show();
        }

    });

    /***********************************
     LOAN STRUCTURING DIABURSEMENT MODE
     ***********************************/
    let disbursementMode = $('#diabursement-mode').find('option:selected').val();
    if (disbursementMode == "Single" || disbursementMode == "")
        $('#diabursement-multiple').hide();

    $(document).on("change", "#diabursement-mode", function () {
        let mode = $(this).val();
        if (mode == 'Multiple')
            $('#diabursement-multiple').show();
        else
            $('#diabursement-multiple').hide();
    });
    let i = 1;
    $('#diabursement-multiple-add').click(function () {
        i++;
        $('#diabursement-multiple').append('<div id="row' + i + '" class="row mt-2"><div class="col-9"><input type="text" required name="diabursement_multiple[]" placeholder="Disbursment multiple" class="form-control"/></div><div class="col-3"><button type="button" id="' + i + '" class="btn btn-danger btn_remove form-control" name="button">X</button></div></div>');
    });
    $(document).on('click', '.btn_remove', function () {
        let button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });


    /****************************
     Vehicle DATEPICKER ONLY YEAR FORMAT
     ****************************/
    $('#vehicle-model-year,#vehicle-manufacturing-year').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
    });

    /****************************
     NEXT PREVIEW BUTTON ACTION
     ***************************/
     $('.btnNext').click(function () {
       let parent_ref = $('#pills-tab:first li a.active').attr('href');
         $(parent_ref+' .nav-pills > .active').next('a').trigger('click');
     });

     $('.btnPrevious').click(function () {
        let parent_ref = $('#pills-tab:first li a.active').attr('href');
        $(parent_ref+' .nav-pills > .active').prev('a').trigger('click');
     });


    /*************************
     SELECT BOX WITH SEARCH
     ***********************/
    $('.countryId,.districtId').select2({
        width: "100%"
    });

    let alert;
    $('#v-pills-tab a').click(function(){
        let url = document.location.toString();
        if ('#'+url.split('#')[1] == $(this).attr('href'))
            $(alert).show()
        else
            alert = $('.alert').hide();
    })

    /************************
     REDIRECT URL START HERE
     ************************/
    let url = document.location.toString();
    if (url.match('#')) {
        $('.nav-pills a[href="#' + url.split('#')[2] + '"]').tab('show');
        $('.nav-pills a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    /************************************
     CHARGE CREATION  LABEL SCRIPT HERE
     ************************************/
    $('.chargeCreationType,.chargeCreationOn').on('change', function(){
        let parent = $(this).parent().parent().parent().parent();
        let chargeCreationType = parent.find('.chargeCreationType').val();
        let chargeCreationOn = parent.find('.chargeCreationOn').val();

        if(chargeCreationType || chargeCreationOn){
        let chargeCreationLabel = `${chargeCreationType} on ${chargeCreationOn} Assets of the Company`;
            parent.find('.chargeCreationLabel').html(chargeCreationLabel);
            parent.find('.chargeCreation').val(chargeCreationLabel);
        }
    })
    $(".chargeCreationType,.chargeCreationOn").trigger("change");

    /**************************************
     CPV REQUEST VERIFICATION  START HERE
     *************************************/
    $('.add-more-row').on('click',function(){
        let parentHtml = $(this).parent().parent().parent();
        let additionalRow  = parentHtml.find('.additional-row').eq(0).clone();
        let additionalRowIndex = parentHtml.find('.additional-row').length;
        additionalRow.find('.add-more-row')
            .removeClass('btn-primary')
            .addClass('remove-additional-row')
            .addClass('btn-danger')
            .html('<i class="fa fa-minus-circle"></i>');

        additionalRow.find('select').each(function(i,input){
            input.name = input.name.replace('[0]', '[' + additionalRowIndex + ']');
            $(input).find('option:selected').removeAttr('selected');
        });
        $('.cpv-request-table').append(additionalRow);
    });
    $(document).on('click','.remove-additional-row',function(){
        $(this).parent().parent().remove();
    });

    /************************************
     FINANCIAL ENTRY SCRIPT START HERE
     ************************************/
    $('.financialStatementType,.financialTypeId').on('change', function(){
        let financialStatementType = $('.financialStatementType').val();
        let financialTypeId = $('.financialTypeId').val();

        if(financialStatementType == 'Audited'){
           $(".auditor").show();
           $('.method-label').removeClass('col-sm-4').addClass('col-sm-3 ml-sm-auto');
           $('.assessment-date-label').removeClass('ml-sm-auto').addClass('col-sm-4');
        }
        else{
            $(".auditor").hide();
            $('.method-label').removeClass('col-sm-3 ml-sm-auto').addClass('col-sm-4')
            $('.assessment-date-label').removeClass('col-sm-4').addClass('ml-sm-auto');
        }

        if(financialTypeId == 4 ){
            $(".financial-balance-type").show();
            $(".assessment-date").hide();
        }
        else{
            $(".financial-balance-type").hide();
            $(".assessment-date").show();
            $('.assessment-date-label').addClass('ml-sm-auto');
        }
    })
    $(".financialStatementType,.financialTypeId").trigger("change");

    /*****************************************
     PRODUCTS BY PRODUCT TYPE ONCHANGE SELECT
     ****************************************/
    $(".productTypeId").change(function () {
        let route = "/settings/products-by-product-type";
        let targetHtml = '.productId';
        productByProductType(this,route,targetHtml);
    });

    /******************************
     VEHICLE COLLATERAL ID SEARCH
     *****************************/
    $('.vehicleCollateralId').on('keyup',function(){
        let parentHtml = $(this).parent().parent().parent().parent();
        let vehicleCollateralId = parentHtml.find('.vehicleCollateralId').val();

        let params = {'collateralId':vehicleCollateralId,'source':'vehicles'};

        let route = "/proposals/collateral-id/search";
        if(vehicleCollateralId.length>5){
            vehicleCollateralIdSearch(this,route,params,parentHtml);
        }

    });

    /******************************
     PDC UDC DDI COLLATERAL ID SEARCH
     *****************************/
     $('.pdcUdcDdiCollateralId').on('keyup',function(){
         let parentHtml = $(this).parent().parent().parent().parent();
         let pdcUdcDdiCollateralId = parentHtml.find('.pdcUdcDdiCollateralId').val();
         let params = {'collateralId':pdcUdcDdiCollateralId,'source':'pdc_udc_ddis'};
         let route = "/proposals/collateral-id/search";
         if(pdcUdcDdiCollateralId.length>5){
             parentHtml.find('.searchResponseSection').show();
             pdcUdcDdiCollateralIdSearch(this,route,params,parentHtml);
         }else{
             parentHtml.find('.formSection').show();
             parentHtml.find('.searchResponseSection').hide();
         }
        });

    /*****************************************
     TDR COLLATERAL ID SEARCH
     ****************************************/
    $('.tdrCollateralId').on('keyup',function(){
        let parentHtml = $(this).parent().parent().parent().parent();
        let tdrCollateralId = parentHtml.find('.tdrCollateralId').val();

        let params = {'collateralId':tdrCollateralId,'source':'tdrs'};

        let route = "/proposals/collateral-id/search";
        if(tdrCollateralId.length>5){
            tdrCollateralIdSearch(this,route,params,parentHtml);
        }

    });

    /*****************************************
     SND COLLATERAL ID SEARCH
     ****************************************/
    $('.sndCollateralId').on('keyup',function(){
        let parentHtml = $(this).parent().parent().parent().parent();
        let sndCollateralId = parentHtml.find('.sndCollateralId').val();

        let params = {'collateralId':sndCollateralId,'source':'snds'};
        let route = "/proposals/collateral-id/search";
        if(sndCollateralId.length>5){
            sndCollateralIdSearch(this,route,params,parentHtml);
        }

    });


    /************************************
     HYPOTHECATION COLLATERAL ID SEARCH
     ************************************/
    $('.hypothecationCollateralId').on('keyup',function(){
        let parentHtml = $(this).parent().parent().parent().parent();
        let hypothecationCollateralId = parentHtml.find('.hypothecationCollateralId').val();

        let params = {'collateralId':hypothecationCollateralId,'source':'hypothecations'};

        let route = "/proposals/collateral-id/search";
        if(hypothecationCollateralId.length>5){
            hypothecationCollateralIdSearch(this,route,params,parentHtml);
        }

    });

    /************************************
     PROPERTY COLLATERAL ID SEARCH
     ************************************/
    $('.propertyCollateralId').on('keyup',function(){
        let parentHtml = $(this).parent().parent().parent().parent();
        let propertyCollateralId = parentHtml.find('.propertyCollateralId').val();

        let params = {'collateralId':propertyCollateralId,'source':'properties'};

        let route = "/proposals/collateral-id/search";
        if(propertyCollateralId.length>5){
            propertyCollateralIdSearch(this,route,params,parentHtml);
        }
    })

    /************************************
    FINANCIAL TYPE WISE SUBHEAD AUTOLOAD
     ************************************/
    $(".financialTypeId").change(function () {
        let route = "/proposal/financial-entry-form-load";
        let parentHtml = $(this).parent().parent().parent().parent().parent();
        financialEntryFormByFinancialType(this,route,parentHtml);
    });
    $(".financialTypeId").trigger('change');

    $(document.body).ready(function () {

        $("#financialEntryForm").validate({
            errorPlacement: function () {
                return true;
            },
//            submitHandler to ajax function
            submitHandler: formSubmit
        });

        let form = $("#financialEntryForm"); //Get Form ID
        let url = form.attr("action"); //Get Form action
        let type = form.attr("method"); //get form's data send method
        let errorMessage = $('.errorMessage'); //get error message div
        let successMessage = $('.successMessage'); //get success message div

        //============Ajax Setup===========//
        function formSubmit() {
            let actionButton = $("#financialEntryForm").find(".actionButton").html();
            $.ajax({
                type: type,
                url: url,
                data: form.serialize(),
                dataType: 'json',
                beforeSend: function (msg) {
                    $("#financialEntryForm").find(".actionButton").html('<i class="fa fa-cog fa-spin"></i> Processing...');
                    $("#financialEntryForm").find(".actionButton").prop('disabled', true); // disable button
                },
                success: function (data) {
                    //==========validation error===========//
                    if (data.success == false) {
                        errorMessage.hide().empty();
                        $.each(data.error, function (index, error) {
                            errorMessage.removeClass('d-none').append('<li>' + error + '</li>');
                        });
                        errorMessage.slideDown('slow');
                        errorMessage.delay(2000).slideUp(1000, function () {
                            $("#financialEntryForm").find(".actionButton").html(actionButton);
                            $("#financialEntryForm").find(".actionButton").prop('disabled', false);
                        });
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
                            $("#financialEntryForm").find(".actionButton").html(actionButton);
                            $("#financialEntryForm").find(".actionButton").prop('disabled', false);
                        });
                    }
                },
                error: function (data) {
                    let errors = data.responseJSON;
                    $("#financialEntryForm").find(".actionButton").prop('disabled', false);
                    console.log(errors);
                    alert('Sorry, an unknown Error has been occurred ! Please try again later.');
                }
            });
            return false;
        }
    });


    /************************************
     CIB REQUEST TABLE CLICK VIEW MODAL
     ************************************/
    $(document.body).on('click','.CibModal',function(e){
        e.preventDefault();
        $('#ModalContent').html('<div style="text-align:center;"><h3 class="text-primary">Loading Form...</h3></div>');
        $('#ModalContent').load(
            $(this).attr('data-href'),
            function (response, status, xhr) {
                if (status === 'error') {
                    alert('error');
                    $('#ModalContent').html('<p>Sorry, but there was an error:' + xhr.status + ' ' + xhr.statusText + '</p>');
                }
                return this;
            }
        );
    });

    /*********************************************
     PROFILE TAGGING - SEARCH BY NID / CAS CIF ID
     *********************************************/
    $('.profile_tagging_cas_cif_id_search, .profile_tagging_nid_search').on('click',function(){
        let profileTagging = $(this).parent().parent().parent().parent();
        let casCifId = profileTagging.find('.profile_tagging_cas_cif_id').val();
        let nid = profileTagging.find('.profile_tagging_nid').val();
        let params = {'casCifId':casCifId,'nid':nid};
        let route = "/settings/customer-search-by-cas-cif-id";
        profileTaggingByCasCifIdOrNID(this,route,params,profileTagging);

    });

    /*********************************************
     NOMINEE - SEARCH BY CAS CIF ID
     *********************************************/
     $(document).on("click","#nominee_cas_cif_id_search", function() {
        let nominee = $(this).parent().parent().parent().parent();
        let casCifId = nominee.find('.nominee_cas_cif_id').val();
        if(casCifId)
        {
          let params = {'cas_cif_id':casCifId};
          let route = "/settings/customer-search-by-cas-cif-id";
          nomineeByCasCifId(this,route,params,nominee);
        }
        else
        return false;
    });
    $("#nominee_cas_cif_id_search").trigger("click");


    /*********************************************
     FINANCIAL TABLE AUTOLOAD DATE-PICKER
     *********************************************/
    $(document.body).on('focus', '.financial-date-picker', function () {
        $(this).datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
    });
});
