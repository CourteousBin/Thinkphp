<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo ADMIN_CSS_URL; ?>admin.css" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table height="100%" cellspacing=0 cellpadding=0 width=170 
               background=<?php echo ADMIN_IMG_URL; ?>menu_bg.jpg border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                            <td height=10></td></tr></table>

                    <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$A): ?><table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo ADMIN_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(<?php echo ($A["auth_id"]); ?>) 
                                    href="javascript:void(0);"><?php echo ($A["auth_name"]); ?></a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    
                    <table id=child<?php echo ($A["auth_id"]); ?> style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                           <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$B): ?><!-- 因为 子菜单有很多选择 , 如果 不作判断 5个选择全部出来 -->
                            <!-- 我们 要的是 不同权限 相对应 不同子菜单出来 所以 做一个判断 -->
                            <?php if($B['auth_pid'] == $A['auth_id']): ?><tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo ADMIN_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="/ThinkPHP/shop/index.php/Admin/<?php echo ($B["auth_c"]); ?>/<?php echo ($B["auth_a"]); ?>" 
                                   target=right><?php echo ($B["auth_name"]); ?></a></td></tr><?php endif; endforeach; endif; ?>
                        <tr height=4><td colspan=2></td></tr>
                    </table><?php endforeach; endif; ?>
                    
                  </td>
                <td width=1 bgcolor=#d1e6f7></td>
            </tr>
        </table>
    </body>
</html>