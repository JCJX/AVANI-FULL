(function() {
	tinymce.PluginManager.add('my_mce_button', function(editor, url) {  /*注意my_mce_button也就是插件的命名必须与function.php中的插件数组对应*/
		editor.addButton('my_mce_button', {
			text: '附件下载',
			icon: false,
			onclick: function() {
				function getNowFormatDate() {
					var date = new Date();
					var seperator1 = "-";
					var seperator2 = ":";
					var year = date.getFullYear();
					var month = date.getMonth() + 1;
					var strDate = date.getDate();
					if (month >= 1 && month <= 9) {
						month = "0" + month;
					}
					if (strDate >= 0 && strDate <= 9) {
						strDate = "0" + strDate;
					}
					var currentdate = year + "年" + month + "月" + strDate + "日";
					return currentdate;
				}
				editor.windowManager.open({
					title: '下载面板',
					body: [{
						type: 'textbox',
						name: 'sourceName',
						label: '文件来源',
						value: '网络'
					}, {
						type: 'textbox',
						name: 'fileinfoName',
						label: '文件描述',
						value: '文件大小 / 提取码： / 密码：',
						multiline: true,
						minWidth: 300,
						minHeight: 60
					}, {
						type: 'textbox',
						name: 'magnetName',
						label: '磁力链接',
						value: '例如:magnet:?xt=urn:btih:hash'
					}, {
						type: 'textbox',
						name: 'downname',
						label: '载点名称',
						value: '例如：百度网盘',
					}, {
						type: 'textbox',
						name: 'downlink',
						label: '下载地址',
						value: 'http://pan.baidu.com/',
					}, ],
					onsubmit: function(e) {
						editor.insertContent("[dltable source='" + e.data.sourceName + "' uptime='" + getNowFormatDate() + "' fileinfo='" + e.data.fileinfoName + "' magnet='" + e.data.magnetName + "']<a href='" + e.data.downlink + "' target='_blank' rel='nofollow'>" + e.data.downname + "</a> [/dltable]");

					}
				});
			}
		});
	});
})();
