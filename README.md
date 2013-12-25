Introduce
=====
This project is a blog system for the LAMP architecture. it run in linux, use mysql to store data, use PHP to do background process.<br/>
It provide some blog function, such as: user login、user register、aritcle view、aritcle edit、info show、aritcle category、article archive、aritcle comment、blog config、read statistics，etc.<br/>
It isn't deplend on any other side JS framework and CSS library, and it follow the MVC model.<br/>

Directory
=====
control - core logic module<br/>
images - directory to save the host image<br/>
lang - contury language definition in GUI<br/>
mini-editor - a web editor<br/>
model - database process module<br/>

Run
=====
You can access the root directory of this blog in web browser, it will show the main page of this blog.<br/>

Usage
====
First you should create a directory tinyblog into the Web root directory, such as 'tinyblog'.<br/>
The second, download the source code into the 'tinyblog' directory.<br/>
Third login into the cmd of mysql, create a database 'tinyblog', key in: 'create database tinyblog'; then import into the database file, key in: 'source /home/weigy/work/tinyblog/tinyblog_db.sql;'<br/>
The last you can access the blog system through web browser<br/>


Design
=====
Please refer to my blog(Chinese):<br/>
http://blog.csdn.net/weiganyi/article/details/17533343<br/>
