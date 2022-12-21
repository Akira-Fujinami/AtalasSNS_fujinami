
    $(function(){$('.accordion dl li').hide();
    $('.accordion dl dt').click(function() {
      $(this).toggleClass('open');
      $('.accordion dl li').slideToggle('normal');
    });
})