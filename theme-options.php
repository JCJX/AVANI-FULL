<?php
    add_action('admin_menu', 'option_page');
     
    function option_page()
    {
        if (count($_POST) > 0 && isset($_POST['fullblog_settings'])) {
            $options = array('fullblog_keywords', 'fullblog_description', 'fullblog_analytics');
            foreach ($options as $opt) {
                delete_option($opt, $_POST[$opt]);
                add_option($opt, $_POST[$opt]);
            }
        }
        add_menu_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'fullblog_settings');
    }
     
    function fullblog_settings()
    {
?>

<div class="wrap">
    <h2>主题选项</h2> 
    <form method="post" action="">
        <fieldset>
            <legend><strong>SEO设置</strong></legend>
            <table class="form-table">
                <tr>
                    <td>
                        <textarea name="fullblog_keywords" id="fullblog_keywords" rows="1" cols="70">
                            <?php echo get_option('fullblog_keywords'); ?>
                        </textarea>
                        <span>首页keywords标签</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="fullblog_description" id="fullblog_description" rows="3" cols="70">
                            <?php echo get_option('fullblog_description'); ?>
                        </textarea>
                        <span>首页description标签</span>
                    </td>
                </tr>
            </table>
        </fieldset>
 
        <fieldset>
            <legend><strong>统计代码</strong></legend>
            <table class="form-table">
                <tr>
                    <td>
                        <textarea name="fullblog_analytics" id="fullblog_analytics" rows="5" cols="70">
                            <?php echo stripslashes(get_option('fullblog_analytics')); ?>
                        </textarea>
                        <span>记录网站数据</span>
                    </td>
                </tr>
            </table>
        </fieldset>

        
        <p class="submit" >
            <input type="submit" name="Submit" class="button-primary" value="保存设置"/>
            <input type="hidden" name="fullblog_settings" value="save" style="display:none;"/>
        </p>
    </form>
    
</div>
<?php
}