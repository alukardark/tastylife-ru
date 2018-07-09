(function($) {
$(function() {

	$('ul.tabs__caption').each(function(i) {
		/*var storage = localStorage.getItem('tab' + i);
		if (storage) {
			$(".catalog").hide();
			$(this).find('li').removeClass('active').eq(storage).addClass('active')
				.closest('div.tabs').find('div.tabs__content').removeClass('active').eq(storage).addClass('active');
		}*/
	});

	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		$(".catalog").hide();
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()-1).addClass('active');
		var ulIndex = $('ul.tabs__caption').index($(this).parents('ul.tabs__caption'));
		//localStorage.removeItem('tab' + ulIndex);
		//localStorage.setItem('tab' + ulIndex, $(this).index());
	});

	$('.tabs__caption-all').on('click', function() {
		$(".catalog").show();
		$(this).addClass('active').siblings().removeClass('active');
		$('div.tabs__content').removeClass('active');
	});

});
})(jQuery);