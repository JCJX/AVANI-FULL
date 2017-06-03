<?php
// 设置选项页
function themeoptions_admin_menu()
{
// 在控制面板的侧边栏添加设置选项页链接
add_theme_page("外观选项", "外观选项", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}
function themeoptions_page()
{
// 这是产生主题选项页面的主要功能
if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }
?>
<div class="wrap">
    <div id="icon-themes" class="icon32"><br /></div>
    <h2>外观选项</h2>
    <form method="POST" action="">
        <input type="hidden" name="update_themeoptions" value="true" />
        <h4>主题配色</h4>
        <select name ="colour">
            <?php $colour = get_option('mytheme_colour'); ?>
            <option value="fullmian" <?php if ($colour=='fullmian') { echo 'selected'; } ?> >透明</option>
            <option value="fullwhite" <?php if ($colour=='fullwhite') { echo 'selected'; } ?>>白色</option>
            <option value="fullnull" <?php if ($colour=='fullnull') { echo 'selected'; } ?>>默认</option>
        </select>
        <p>在使用深色背景图片的时候用透明效果最佳</p>

        <h4>图片广告位（1）</h4>
        <p><input type="text" name="ad1image" id="ad1image" size="32" value="<?php echo get_option('mytheme_ad1image'); ?>"/> 广告图片</p>
        <p><input type="text" name="ad1url" id="ad1url" size="32" value="<?php echo get_option('mytheme_ad1url'); ?>"/> 广告链接</p>
        <h4>图片广告位（2）</h4>
        <p><input type="text" name="ad2image" id="ad2image" size="32" value="<?php echo get_option('mytheme_ad2image'); ?>"/> 广告图片</p>
        <p><input type="text" name="ad2url" id="ad2url" size="32" value="<?php echo get_option('mytheme_ad2url'); ?>"/> 广告链接</p>
        <h4><input type="checkbox" name="display_search" id="display_search" <?php echo get_option('mytheme_display_search'); ?> /> 显示搜索框</h4>
        <p><input type="submit" class="button-primary" name="bcn_admin_options" value="更新数据"/></p>
    </form>
</div>
<?php
}
add_action('admin_menu', 'themeoptions_admin_menu');
function themeoptions_update()
{
    // 数据更新验证
    update_option('mytheme_colour', $_POST['colour']);
    update_option('mytheme_ad1image', $_POST['ad1image']);
    update_option('mytheme_ad1url', $_POST['ad1url']);
    update_option('mytheme_ad2image', $_POST['ad2image']);
    update_option('mytheme_ad2url', $_POST['ad2url']);
    if ($_POST['display_search']=='on') { $display = 'checked'; } else { $display = ''; }
    update_option('mytheme_display_search', $display);
}

?>
