<?php

// カテゴリにカラーを追加
function add_category_field()
{
?>
    <div class="form-field">
        <label for="category_color">カテゴリーの色</label>
        <input type="text" name="category_color" id="category_color">
        <p>カテゴリーに関連付ける色を選択してください</p>
    </div>
<?php
}
add_action('category_add_form_fields', 'add_category_field', 10, 2);

// セーブした時にカラーを保存
function save_category_field($term_id)
{
    if (isset($_POST['category_color'])) {
        $color = $_POST['category_color'];
        update_term_meta($term_id, 'category_color', $color);
    }
}
add_action('created_category', 'save_category_field', 10, 2);

// 編集画面にも追加
function edit_category_field($term)
{
    $color = get_term_meta($term->term_id, 'category_color', true);
?>
    <tr class="form-field">
        <th><label for="category_color">カテゴリーの色</label></th>
        <td>
            <input type="text" name="category_color" id="category_color" value="<?php echo esc_attr($color); ?>">
            <p class="description">カテゴリーに関連付ける色を選択してください</p>
        </td>
    </tr>
<?php
}
add_action('category_edit_form_fields', 'edit_category_field', 10, 2);

// 編集した時にカラーを保存
function update_category_field($term_id)
{
    if (isset($_POST['category_color'])) {
        $color = $_POST['category_color'];
        update_term_meta($term_id, 'category_color', $color);
    }
}
add_action('edited_category', 'update_category_field', 10, 2);
