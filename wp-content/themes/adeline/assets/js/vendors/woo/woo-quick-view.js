var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {



	if ( typeof dpradelineLocalize === 'undefined' ) {

		return false;

	}



	// Vars

	var qv_modal 		= $j( '#dpr-qv-wrap' ),

		qv_content 		= $j( '#dpr-qv-content' );



	/**

	 * Open quick view.

	 */

	$j( document ).on( 'click', '.dpr-quick-view', function( e ) {

		e.preventDefault();



		var $this 		= $j( this ),

			product_id  = $j( this ).data( 'product_id' );



		$this.parent().addClass( 'loading' );



		$j.ajax( {

			url: dpradelineLocalize.ajax_url,

			data: {

				action : 'dpradeline_product_quick_view',

				product_id : product_id

			},

			success: function( results ) {



				var innerWidth = $j( 'html' ).innerWidth();

				$j( 'html' ).css( 'overflow', 'hidden' );

				var hiddenInnerWidth = $j( 'html' ).innerWidth();

				$j( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );

				$j( 'html' ).addClass( 'dpr-qv-open' );



				qv_content.html( results );



				// Display modal

				qv_modal.fadeIn();

				qv_modal.addClass( 'is-visible' );

				

				// Variation Form

				var form_variation = qv_content.find( '.variations_form' );



				form_variation.trigger( 'check_variations' );

				form_variation.trigger( 'reset_image' );



				var var_form = qv_content.find( '.variations_form' );



				if ( var_form.length > 0 ) {

					var_form.wc_variation_form();

					var_form.find( 'select' ).change();

				}



  				var image_slider_wrap = qv_content.find( '.dpr-qv-image' );



  				if ( image_slider_wrap.find( 'li' ).length > 1 ) {

	  				image_slider_wrap.flexslider();

  				}



			}



		} ).done( function() {

			$this.parent().removeClass( 'loading' );

		} );



	} );



	/**

	 * Close quick view function.

	 */

	var dprCloseQuickView = function() {

		$j( 'html' ).css( {

			'overflow': '',

			'margin-right': '' 

		} );

		$j( 'html' ).removeClass( 'dpr-qv-open' );



		qv_modal.fadeOut();

		qv_modal.removeClass( 'is-visible' );



		setTimeout( function() {

			qv_content.html( '' );

		}, 600);

	};



	/**

	 * Close quick view.

	 */

	$j( '.dpr-qv-overlay, .dpr-qv-close' ).on( 'click', function( e ) {

		e.preventDefault();

		dprCloseQuickView();

	} );



	/**

	 * Check if user has pressed 'Esc'.

	 */

	$j( document ).keyup( function( e ) {

    	if ( e.keyCode == 27 ) {

			dprCloseQuickView();

		}

	} );



	/**

	 * AddToCartHandler class.

	 */

	var dprQVAddToCartHandler = function() {

		$j( document.body )

			.on( 'click', '#dpr-qv-content .product:not(.product-type-external) .single_add_to_cart_button', this.onAddToCart )

			.on( 'added_to_cart', this.updateButton );

	};



	/**

	 * Handle the add to cart event.

	 */

	dprQVAddToCartHandler.prototype.onAddToCart = function( e ) {

		e.preventDefault();



		var button 					= $j( this ),

			product_id 				= $j( this ).val(),

			variation_id 			= $j('input[name="variation_id"]').val(),

			quantity 				= $j('input[name="quantity"]').val(),

			variation_form 			= $j( this ).closest( '.variations_form' ),

			variations 				= variation_form.find( 'select[name^=attribute]' ),

			item 					= {};



		button.removeClass( 'added' );

		button.addClass( 'loading' );



		if ( ! variations.length ) {

			variations = variation_form.find( '[name^=attribute]:checked' );

		}



		if ( ! variations.length ) {

			variations = variation_form.find( 'input[name^=attribute]' );

		}



		variations.each( function() {

			var $this 			= $j( this ),

				attributeName 	= $this.attr( 'name' ),

				attributevalue 	= $this.val(),

				index,

				attributeTaxName;



			$this.removeClass( 'error' );



			if ( attributevalue.length === 0 ) {

				index = attributeName.lastIndexOf( '_' );

				attributeTaxName = attributeName.substring( index + 1 );

				$this.addClass( 'required error' ).before( 'Please select ' + attributeTaxName + '' );

			} else {

				item[attributeName] = attributevalue;

			}

		} );



		// Ajax action.

		if ( variation_id != '' ) {

			$j.ajax ({

				url: dpradelineLocalize.ajax_url,

				type:'POST',

				data : {

			        action : 'dpradeline_add_cart_single_product',

			        product_id : product_id,

			        variation_id: variation_id,

			        variation: item,

			        quantity: quantity

			    },



				success:function(results) {

					$j( document.body ).trigger( 'wc_fragment_refresh' );

					$j( document.body ).trigger( 'added_to_cart', [ results.fragments, results.cart_hash, button ] );

				}

			});

		} else {

			$j.ajax ({

				url: dpradelineLocalize.ajax_url,  

				type:'POST',

				data : {

			        action : 'dpradeline_add_cart_single_product',

			        product_id : product_id,

			        quantity: quantity

			    },



				success:function(results) {

					$j( document.body ).trigger( 'wc_fragment_refresh' );

					$j( document.body ).trigger( 'added_to_cart', [ results.fragments, results.cart_hash, button ] );

				}

			});

		}

	};



	/**

	 * Update cart page elements after add to cart events.

	 */

	dprQVAddToCartHandler.prototype.updateButton = function( e, fragments, cart_hash, $button ) {

		$button = typeof $button === 'undefined' ? false : $button;



		if ( $button ) {

			$button.removeClass( 'loading' );

			$button.addClass( 'added' );



			// View cart text.

			if ( ! dpradelineLocalize.is_cart && $button.parent().find( '.added_to_cart' ).length === 0 ) {

				$button.after( ' <a href="' + dpradelineLocalize.cart_url + '" class="added_to_cart wc-forward" title="' +

					dpradelineLocalize.view_cart + '">' + dpradelineLocalize.view_cart + '</a>' );

			}

		}

	};



	/**

	 * Init dprAddToCartHandler.

	 */

	new dprQVAddToCartHandler();

});