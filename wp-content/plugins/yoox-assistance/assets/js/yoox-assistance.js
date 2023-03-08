(function($){
    'use strict';
    
    $('.post_like' ).on( 'click', function(e) {
        e.preventDefault();
        
        var post_id = $(this).attr('href');
        var $this = $(this);
        
        $this.html('Wait...');
        
        $.post(
            yoox_ajax.ajaxurl, 
            {
                'action': 'post_like',
                'pid': post_id
            }, 
            function(response){
                $this.html(response);
            }
        );
    });
})(jQuery);