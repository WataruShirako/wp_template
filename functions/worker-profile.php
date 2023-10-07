<?php

function custom_user_profile_fields($user)
{
?>
<h3>追加ユーザー情報</h3>
<table class="form-table">
    <tr>
        <th><label for="department">担当部署</label></th>
        <td>
            <input type="text" name="department" id="department"
                value="<?php echo esc_attr(get_the_author_meta('department', $user->ID)); ?>"
                class="regular-text" /><br />
            <span class="description">あなたの担当部署を入力してください(UIデザイナー, フロントエンドエンジニア など)</span>
        </td>
    </tr>
</table>
<?php
}
add_action('show_user_profile', 'custom_user_profile_fields');
add_action('edit_user_profile', 'custom_user_profile_fields');

function save_custom_user_profile_fields($user_id)
{
    # security check
    if (!current_user_can('edit_user', $user_id))
        return false;

    # saves our custom field
    update_user_meta($user_id, 'department', $_POST['department']);
}
add_action('personal_options_update', 'save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'save_custom_user_profile_fields');