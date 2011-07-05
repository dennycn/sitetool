<?php $hu="jsformat" ; @require_once ( 'header.php'); ?>
    <div class="main">
        <script src="images/globals.js?ver=20100621" type="text/javascript">
        </script>
        <script src="js/jquery.js" type="text/javascript">
        </script>
        <script src="js/base.js" type="text/javascript">
        </script>
        <script src="js/jsformat.js" type="text/javascript">
        </script>
        <script src="js/jsformat2.js" type="text/javascript">
        </script>
        <script src="js/htmlformat.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            function do_js_beautify() {
                $("#beautify").attr("disabled", true);
                document.getElementById('beautify').disabled = true;
                js_source = document.getElementById('content').value.replace(/^\s+/, '');
                var tabsize = document.getElementById('tabsize').value;
                tabchar = ' ';
                if (tabsize == 1) {
                    tabchar = '\t';
                }
                if (js_source && js_source.charAt(0) === '<') {
                    $("#content").attr("value", style_html(js_source, tabsize, tabchar, 80));
                } else {
                    $("#content").attr("value", js_beautify(js_source, tabsize, tabchar));
                }
                $("#beautify").attr("disabled", false);
                return false;
            }
            function pack_js(base64) {
                var input = $("#content").val();
                if ($.trim(input) == "") return;
                var packer = new Packer;
                if (base64) {
                    var output = packer.pack(input, 1, 0);
                } else {
                    var output = packer.pack(input, 0, 0);
                }
                document.getElementById('content').value = output;
            }
            function copy() {
                var Result = document.getElementById('content').value;
                if (document.getElementById('content').value != '') {
                    window.clipboardData.setData("Text", Result);
                    document.getElementById('content').select();
                    window.alert('已复制成功！');
                }
            }
            function Empty() {
                document.getElementById('content').value = '';
                document.getElementById('content').select();
            }
            function GetFocus() {
                document.getElementById('content').focus();
            }

            function decode() {
                var input = $("#content").val();
                if (input.indexOf('eval') == 0) {
                    eval("output=String" + input.slice(4));
                    $("#content").val(output)
                }

                do_js_beautify();
            }
        </script>
        <div class="box">
            <h1>
                <div class="titleft">
                    Js/Html格式化工具
                </div>
            </h1>
            <div class="box1" style="text-align:center;">
                <div class="WSt">
                    <textarea id="content" name="content" style="width: 850px; border: 1px solid #c5e2f2;
                    height: 300px; overflow: visible;" cols="20" rows="20"></textarea>
                    <script type="text/javascript">
                        setTimeout("GetFocus();", 10)
                    </script>
                </div>
                <div class="WSt1">
                    <select name="tabsize" id="tabsize">
                        <option value="1">
                            制表符缩进
                        </option>
                        <option value="2">
                            2个空格缩进
                        </option>
                        <option value="4" selected="selected">
                            4个空格缩进
                        </option>
                        <option value="8">
                            8个空格缩进
                        </option>
                    </select>
                    <input class="but2" type="button" value="格式化" onclick="return do_js_beautify()"
                    id="beautify" />
                    <input class="but2" type="button" value="普通压缩" onclick="pack_js(0)" />
                    <input class="but2" type="button" value="加密压缩" onclick="pack_js(1)" />
                    <input class="but2" type="button" value="解压缩" onclick="decode();" />
                    <input class="but2" type="button" value=" 复 制 " onclick="copy();" />
                    <input class="but2" type="button" value="清空结果" onclick="Empty();" />
                </div>
            </div>
        </div>
        <div class="box">
            <div id="b_14">
                <h1>
                    工具简介
                </h1>
                <div class="box1">
                    <span class="info2">
                        <p>
                            Js/Html格式化，美化
                        </p>
                    </span>
                </div>
            </div>
            <?php @require_once ( 'foot.php'); ?>