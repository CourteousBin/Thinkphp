<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>角色分配权限</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo ADMIN_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：角色管理-》角色分配权限[<?php echo ($role_info["role_name"]); ?>]</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/ThinkPHP/shop/index.php/Admin/Role/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/ThinkPHP/shop/index.php/Admin/Role/fenpei/role_id/51" method="post" enctype="multipart/form-data">
                <input type="hidden" name="role_id[]" value="<?php echo ($role_info["role_id"]); ?>" />
            <table border="1" width="100%" class="table_a">
                <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$A): ?><tr>
                    <td width="18%">
                        <input type="checkbox" name="authid[]" value="<?php echo ($A["auth_id"]); ?>" />
                    <?php echo ($A["auth_name"]); ?></td>
                    				<!--name 要和数据表 字段保持一致-->
                    <td>
                        <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$B): if($B['auth_pid'] == $A['auth_id']): ?><div style="width: 200px;float: left;">
<input type="checkbox" name="authid[]" value="<?php echo ($B["auth_id"]); ?>" />
                            <?php echo ($B["auth_name"]); ?></div><?php endif; endforeach; endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="分配权限">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>