<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>角色列表</title>

        <link href="<?php echo ADMIN_CSS_URL; ?>mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：角色管理-》角色列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                	<!--从 sholist 打开 tianjia.html 因为是同一控制器下 , 所以 /ThinkPHP/shop/index.php/Admin/Role-->
                    <a style="text-decoration: none;" href="/ThinkPHP/shop/index.php/Admin/Role/tianjia">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>角色名称</td>
                        <td align="center" colspan="3">操作</td>
                    </tr>
                    <?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr id="product1">
                        <td><?php echo ($vo["role_id"]); ?></td>
                        <td><a href="#"><?php echo ($vo["role_name"]); ?></a></td>
                        <td><a href="/ThinkPHP/shop/index.php/Admin/Role/fenpei/role_id/<?php echo ($vo["role_id"]); ?>">分配权限</a></td>
                        <td><a href="">修改</a></td>
                        <td><a href="">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            <?php echo ($pagelist); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>