<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
<head>
    <script type="text/javascript">
        function f1() {
            $('#iframe').attr("src", "./子页面1.html");
        }
    </script>
        </head>
        <body>
        <div>
        <ul>
        <li>
        首页
        </li>
        <li>
        <a>模块1</a>
        <ul>
        <li>
        <a onclick="f1()" href="#">子页面1</a>
            </li>
            </ul>
            <ul>
            <li>
            <a href="#">子页面2</a>
            </li>
            </ul>
            <ul>
            <li>
            <a href="#">子页面3</a>
            </li>
            </ul>
            </li>
            <li>
            <a>模块1</a>
            <ul>
            <li>
            <a href="#">子页面1</a>
            </li>
            </ul>
            <ul>
            <li>
            <a href="#">子页面2</a>
            </li>
            </ul>
            </li>
            </ul>
            </div>
            <div>
            <iframe id="iframe">

            </iframe>
            </div>
            </body>
            <html>