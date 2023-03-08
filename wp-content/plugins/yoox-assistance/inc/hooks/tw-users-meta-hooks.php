<?php
if (!defined('ABSPATH')) die('Direct access forbidden.');

class Tw_Users_Meta_Hooks
{
    public function __construct()
    {
        add_action('show_user_profile', array($this, 'yoox_user_avater'));
        add_action('edit_user_profile', array($this, 'yoox_user_avater'));
        add_action('personal_options_update', array($this, 'yoox_user_avatar_src'));
        add_action('edit_user_profile_update', array($this, 'yoox_user_avatar_src'));
    }

    public function yoox_user_avater($user)
    {
        ?>

        <table class="form-table">
            <tr>
                <th><h3>User Avatar</h3></th>
                <td>
                    <?php
                    $avater_src = get_the_author_meta('user_avatar', $user->ID);
                    $user_av_ID = get_the_author_meta('user_av_ID', $user->ID);
                    if ($avater_src != '') {
                        $av = $avater_src;
                        $vis = 'block';
                    } else {
                        $av = '';
                        $vis = 'none';
                    }
                    ?>
                    <img class="user_logo upImg" src="<?php echo esc_url($av); ?>" height="100" width="100"
                         style="display: <?php echo esc_attr($vis); ?>;"/>
                    <div class="clear"></div>
                    <input type="text" name="user_avatar" value="<?php echo esc_url($av); ?>"
                           class="regular-text user_avater_url"/>
                    <input type="hidden" name="user_av_ID" value="<?php echo esc_attr($user_av_ID); ?>"
                           id="user_av_ID"/>
                    <a href="#" class="useravatar_upload button">Upload</a>
                </td>
            </tr>
        </table>
        <?php
    }

    function yoox_user_avatar_src($user_id)
    {
        update_user_meta($user_id, 'user_avatar', sanitize_text_field($_POST['user_avatar']));
        update_user_meta($user_id, 'user_av_ID', sanitize_text_field($_POST['user_av_ID']));
    }
}

?>