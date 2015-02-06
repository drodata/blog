1. `git clone git@121.42.26.50:git/blog.git`;
2. 在`protected/config/`下新建`pswd.php`文件，将MySQL密码信息输入进去；
可以考虑重建 blog 目录，先将此文件添加上，edit it after clone;
3. Change file permission:
   
   ```bash
   cd blog/
   sudo chgrp -R www-data assets/ 
   chmod g+w assets/
   protected/runtime/
   cd protected/
   sudo chgrp -R runtime/ models/ controllers/ views/ 
   chmod g+w runtime/ models/ controllers/ views/
   ```

4. 步骤一中仅 clone `master` branch, 如果 remote 有多个分支，
还需要逐个运行`git fetch <remote> <branch-name>`, 
注意命令中的`<remote>`
需提前在`blog/.git/config`内配置；
