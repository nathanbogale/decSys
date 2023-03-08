jQuery(document).ready(function($) {
    $('.useravatar_upload').click(function(e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Custom Image',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.user_logo').fadeIn('slow').attr('src', attachment.url);
                $('.user_avater_url').val(attachment.url);
                $('#user_av_ID').val(attachment.id);

            })
            .open();
    });
});
