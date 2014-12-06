12月1日 周一
- 关键字高亮搜索的问题：若URL内存在匹配，替换将导致URL错误；
- Parsedown 是否有类似`beginWidget()`和`endWidget()`那样的包裹method?
- created: `DemoController.php`;
- 解决重量 max =5 的bug, 
	- 衍生出很多问题；

----
12月2日 周二
- Yii 心得：通过`renderPartial()`生成内容，而不是在 controllers 中；
- 找到一个完美的解决方案；
- 完善`$.fn.afGet()`
   ```javascript
   //if (!elements[name]) elements[name] = $(this);
   if (!elements[name]) {
   	elements[name] = ((tag == 'INPUT') && ($(this).attr('type') == 'checkbox'))
   		? $('[name=' + prefix + '\\[' + name + '\\]\\[\\]]')
   		: $('[name=' + prefix + '\\[' + name + '\\]]');
   }
   ```
- `decimal(5,2)`对应的 validation rule 如何写？

   ```php
   array('weight, charge', 'numerical', 'max'=> 999.99, 'min' => 0.1),
   ```

   完整验证列表见 Yii 1.1 Guide P.56

----
12月3日 周三

- Bash Shell
	- 发现 shell scripts 中不用手动输入MySQL密码的方法；
	- 学会在 Shell script 内使用 lftp 命令—— here document;
- 根据上面学到的内容，建立新的同步（单位电脑与家里电脑之间）机制。
  具体来说，有原来的'npu→pp→nup'变成现在的'push→pp→pull'，
  不同之处在于用 Github + ECS 替代了U盘;

----
12月4日 周四

- 想重新整理订单提交操作，发现一个 jQuery Step plugin http://www.jquery-steps.com/
- 停电大半天，琢磨改版新建订单的事情；

----
12月5日 周五

- 先在 lookup/batchCreate 内试验 qtip 提示 tabular elements 的 error.

----
12月6日 周六

- tk推荐，强调勤奋，与 eygle 同：http://zhuanlan.zhihu.com/iamcaoz/19909120
	- 在评论中发现一本书，叫《程序员的思维训练》，回头买回来看；
- 学会 Bootstrap Stateful Button 的基本用法，发现其与 jQuery UI 相冲突的 
Bug;
- 在 Lookup Batch Create 上成功验证“服务器端验证，qTip 显示”的效果，
为新版新建订单做好准备；
	- 发现`getErrors()`的一个细节：返回的键值对数组中，“值”本身也是数组；
