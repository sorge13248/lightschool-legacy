<?php $LS_MAIN_DIRECTORY = '//MAIN_HTTP_ADDRESS/sub_os'; 
if (isset($_SERVER['HTTPS']) &&
  ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {

}else{
  $redirect2 = basename($_SERVER['REQUEST_URI']);
  header("location: https:$LS_MAIN_DIRECTORY/".$redirect2);
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css">
  @font-face{
    font-family: 'open-sans-light';
    src: url('<?= $LS_MAIN_DIRECTORY ?>/font/open-sans-light.eot');
    src: url('<?= $LS_MAIN_DIRECTORY ?>/font/open-sans-light.eot?#iefix') format('embedded-opentype'),
    url('<?= $LS_MAIN_DIRECTORY ?>/font/open-sans-light.woff') format('woff'),
    url('<?= $LS_MAIN_DIRECTORY ?>/font/open-sans-light.ttf') format('truetype'),
    url('<?= $LS_MAIN_DIRECTORY ?>/font/open-sans-light.svg#pt-sans') format('svg');
    font-weight: normal;
    font-style: normal
  }
  *{
    font-family: open-sans-light, arial, tahoma, sans-serif;
    color: white;
    cursor: default;
    transition: 0.1s ease-in-out;
  }
  html{
    background: rgb(51, 123, 206);
    background: -moz-linear-gradient(90deg, rgb(51, 123, 206) 30%, rgb(62, 86, 183) 70%);
    background: -webkit-linear-gradient(90deg, rgb(51, 123, 206) 30%, rgb(62, 86, 183) 70%);
    background: -o-linear-gradient(90deg, rgb(51, 123, 206) 30%, rgb(62, 86, 183) 70%);
    background: -ms-linear-gradient(90deg, rgb(51, 123, 206) 30%, rgb(62, 86, 183) 70%);
    background: linear-gradient(180deg, rgb(51, 123, 206) 30%, rgb(62, 86, 183) 70%);
  }
  a{
    cursor: pointer;
  }
  .content{
    margin: 0 auto;
    margin-top: 40px;
    width: 70%;
    min-width: 600px;
    max-width: 1000px;
    padding: 20px;
  }
  .center{
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  hr{
    border: 1px solid white;
    margin-top: 10px;
    margin-bottom: 10px;
    box-shadow: none;
  }
  p{
    line-height: 20px;
  }
  .title{
    /* text-transform: uppercase; */
    font-size: 30pt;
    color: white;
    text-align: center;
  }
  .error{
    background-color: #B40404;
    padding: 10px;
  }
  .container{
    background-color: rgba(0, 0, 94, 0.1);
    margin-top: 20px;
    padding: 10px;
    padding-left: 30px;
    padding-right: 30px;
  }
  .subtitle{
    /* text-transform: uppercase; */
    font-size: 15pt;
    color: white;
    text-align: center;
  }
</style>