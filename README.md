# COMP 3512
### PHP 3 Lab 
Lab exercise files and instructions for PHP Database Lab

**Please view `COMP3512 Lab14 Instructions.pdf` for instructions**

Note: Your version of PHP may be configured in such a way that you are not able to generate the dynamic images is Exercises 10+ (and in Test your Knowledge #2).

The reason why it might not work is that PHP has a library/extension called gd that it used to generate images and such. Your PHP environment (such as XAMPP) might have it disabled so what you need to do is as follows: 
1. stop apache and mysql. 
2. open up the xampp control panel and click on the config button on the apache module.
3. click on "PHP(php.ini)" , that will open a notepad file or a textfile 
4. scroll down until you find the header "Dynamic Extensions" then scroll until you find a list extensions, find the ";extension=gd" line and remove the starting semi-colon so it looks like "extension=gd". 
5. Save everything, exit and start apche and my sql again.
