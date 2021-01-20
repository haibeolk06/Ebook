(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
	})

	// Fix cart dropdown from closing
	$('.cart-dropdown').on('click', function (e) {
		e.stopPropagation();
	});

	/////////////////////////////////////////

	// Products Slick
	$('.products-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			infinite: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
			responsive: [{
	        breakpoint: 991,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      },
	    ]
		});
	});

	// Products Widget Slick
	$('.products-widget-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			infinite: true,
			autoplay: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
		});
	});

	/////////////////////////////////////////

	// Product Main img Slick
	$('#product-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-imgs',
  });

	// Product imgs Slick
  $('#product-imgs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
		centerPadding: 0,
		vertical: true,
    asNavFor: '#product-main-img',
		responsive: [{
        breakpoint: 991,
        settings: {
					vertical: false,
					arrows: false,
					dots: true,
        }
      },
    ]
  });

	// Product img zoom
	var zoomMainProduct = document.getElementById('product-main-img');
	if (zoomMainProduct) {
		$('#product-main-img .product-preview').zoom();
	}

	/////////////////////////////////////////

	// Input number
	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
		});

		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
			$input.change();
		});
	});

	$("#gioHang").on('change', '.chiTietSP', function() {
		
		// var up = $(this).find('.input-number .qty-up');
		// var down = $(this).find('.input-number .qty-down');
		// var inputNumber = $(this).find('.input-number input[type="number"]');

		// up.one('click', function () {
		// 	var value = parseInt(inputNumber.val()) + 1;	
		// 	console.log('Sau khi tăng 1: ' + value);		
		// 	inputNumber.val(value);
		// 	inputNumber.change();		
		// });

		// down.one('mouseup', function () {
		// 	var value = parseInt(inputNumber.val()) - 1;
		// 	value = value < 1 ? 1 : value;
		// 	console.log('Sau khi giảm 1: ' + value);	
		// 	inputNumber.val(value);
		// 	inputNumber.change();	
		// });

		var soLuong = parseInt($(this).find(".input-number input[type='number']").val());				
		var maSP = $(this).find(".product_id").text();
		var tongTien1SP = $(this).find(".tongTien1SP");

		$.ajax({
				url: "pages-handle/xlTangSoLuongSP.php",
				method: "POST",
				data: {
					maSP: maSP,
					soLuong: soLuong,
				},
				dataType: "json",
				success: function(data){
					data.tongTien1SP = new Intl.NumberFormat('de-DE').format(data.tongTien1SP);
					data.tongTien = new Intl.NumberFormat('de-DE').format(data.tongTien);
					tongTien1SP.html(data.tongTien1SP + '₫');				
					$("#tamTinh-GioHang").html(data.tongTien + '₫');
					$("#tongTien-GioHang").html(data.tongTien + '₫');

					$("#dsSanPham-DropDown").html(data.productsDropDown);
					$("#tamTinh-GioHang-DropDown").html(data.tongTien + '₫');
				},
				error: function (xhr, ajaxOptions, thrownError) {
						console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				},	
		});							
	});
	
})(jQuery);


function cartAction(action, product_id)
{
	var quantity = $("#slSanPham").val();
	if(quantity == null)
		quantity = 1;
	$.ajax({
    	url: "pages-handle/xlGioHang.php",
		method: "POST",
		data: {
			action: action,
			product_id: product_id,
			quantity: quantity,
		},
    	dataType: "json",	
		success: function(data){
			$('#dsSanPham-DropDown').html(data.productsDropDown);
			$('#tamTinh-GioHang-DropDown, #tamTinh-GioHang, #tongTien-GioHang').html(data.subtotal);
			$('#slSanPham1, #slSanPham2').html(data.qty);
			$('#gioHang').html(data.products);
			$('#sectionThanhToan').load(' #sectionThanhToan');			
			if (action === 'add')
				$( "div#alert-boxAdd" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
			else
				$( "div#alert-boxRemove" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
		},
		error: function (xhr, ajaxOptions, thrownError) {
	            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	    },	
	});	
}

function validateFormDangKy()
{
    var last_name = $('#last-name').val();
    var first_name = $('#first-name').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var phone = $('#phone').val();
    var password = $('#password').val();
	var confirm_password = $('#confirm-password').val();

    var prefix = email.substring(email.lastIndexOf("@") + 1);
    var regExp = /^(0[234][0-9]{8}|1[89]00[0-9]{4})$/;
	var flag = 1;
	
    if (last_name == ''){
        $('#last-name').css('border-color', "red");
        flag = 0;
    }
    if (first_name == '')
    {
		$('#first-name').css('border-color', "red");
        flag = 0;
    }
    if (address == '')
    {
		$('#address').css('border-color', "red");
        flag = 0;
    }
    if (!regExp.test(phone))
    {
        $('#phone').css('border-color', "red");
        flag = 0;
    }
    if (prefix == "")
    {
        $('#email').css('border-color', "red");
        flag = 0;
    }
	if(password == ''){
		$('#password').css('border-color', "red");
		flag = 0;
	}
	if(confirm_password == ''){
		$('#confirm-password').css('border-color', "red");
		flag = 0;
	}
	if(password != confirm_password){
		$('#confirm-password').css('border-color', "red");
		flag = 0;
	}

	

    if(flag == 1)
        return true;
    else
        return false;
}