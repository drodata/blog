1. `git clone git@121.42.26.50:git/blog.git`;
2. 在`protected/config/`下新建`pswd.php`文件，将MySQL密码信息输入进去；
3. 修改两个文件的权限：
   
   ```bash
   blog/protected$ chmod g+w runtime
   blog$ chmod g+w assets
   ```

4. 步骤一中仅 clone `master` branch, 如果 remote 有多个分支，
还需要逐个运行`git fetch <remote> <branch-name>`, 注意命令中的`<remote>`
需提前在`blog/.git/config`内配置；
