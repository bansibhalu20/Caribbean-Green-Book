"use strict";var KTModalOfferADeal=function(){var e,t,o;return{init:function(){e=document.querySelector("#kt_modal_offer_a_deal_stepper"),o=document.querySelector("#kt_modal_offer_a_deal_form"),t=new KTStepper(e)},getStepper:function(){return e},getStepperObj:function(){return t},getForm:function(){return o}}}();KTUtil.onDOMContentLoaded((function(){document.querySelector("#kt_modal_offer_a_deal")&&(KTModalOfferADeal.init(),KTModalOfferADealType.init(),KTModalOfferADealDetails.init(),KTModalOfferADealFinance.init(),KTModalOfferADealComplete.init())})),"undefined"!=typeof module&&void 0!==module.exports&&(window.KTModalOfferADeal=module.exports=KTModalOfferADeal);


  /* *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** ***
  /////////////////   Down Load Button Function   /////////////////
  *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** */
 
  (function ($) {
    'use strict';
  
    $('#tm_download_btn').on('click', function () {
      var downloadSection = $('#tm_download_section');
      var cWidth = downloadSection.width();
      var cHeight = downloadSection.height();
      var topLeftMargin = 0;
      var pdfWidth = cWidth + topLeftMargin * 2;
      var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
      var canvasImageWidth = cWidth;
      var canvasImageHeight = cHeight;
      var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;
  
      html2canvas(downloadSection[0], { allowTaint: true }).then(function (
        canvas
      ) {
        canvas.getContext('2d');
        var imgData = canvas.toDataURL('image/png', 1.0);
        var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
        pdf.addImage(
          imgData,
          'PNG',
          topLeftMargin,
          topLeftMargin,
          canvasImageWidth,
          canvasImageHeight
        );
        for (var i = 1; i <= totalPDFPages; i++) {
          pdf.addPage(pdfWidth, pdfHeight);
          pdf.addImage(
            imgData,
            'PNG',
            topLeftMargin,
            -(pdfHeight * i) + topLeftMargin * 0,
            canvasImageWidth,
            canvasImageHeight
          );
        }
        pdf.save('download.pdf');
      });
    });
  
  })(jQuery);
  
