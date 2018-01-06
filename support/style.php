<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
      filter: none;
    }
  </style>
<![endif]-->
<script type="text/javascript">
  $(document).ready(function(){
    // Algoritmo e tecnologia di Francesco Sorge. Vietata la riproduzione.
    $(".automated").each(function(){
      var value = $(this).html();
      var title = $(this).attr("title");
      
      if(!title){
	$(this).attr("title", 'Link per "' + value + '" creato automaticamente');
      }
    });
  });
</script>
<style type="text/css">
  @import url(//fonts.googleapis.com/css?family=Roboto:300);
  html{
    overflow-x: hidden;
    overflow-y: scroll;
  }
  
  *{
    outline: none !important;
  }
  
  .tab_no_border .nav-tabs, .tab_no_border .nav-tabs li a, .tab_no_border .tab-content{
    border: none !important;
  }
  
  .tab_no_border .glyphicon{
    padding-left: 5px;
    font-size: 2em;
    display: block;
    margin-bottom: 10px;
  }
  
  <?php if($current_page == 'overview'){ ?>
  .nav-tabs > li, .nav-pills > li {
    float: none;
    display: inline-block;
    *display: inline; /* ie7 fix */
    zoom: 1; /* hasLayout ie7 trigger */
  }

  .nav-tabs, .nav-pills {
    text-align: center;
  }
  <?php } ?>
  
  .gradient_bkg{
    background: #499bea; /* Old browsers */
    /* IE9 SVG, needs conditional override of 'filter' to 'none' */
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iMjMlIiBzdG9wLWNvbG9yPSIjNDk5YmVhIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iNzIlIiBzdG9wLWNvbG9yPSIjMjA3Y2U1IiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L3JhZGlhbEdyYWRpZW50PgogIDxyZWN0IHg9Ii01MCIgeT0iLTUwIiB3aWR0aD0iMTAxIiBoZWlnaHQ9IjEwMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-radial-gradient(center, ellipse cover,  #499bea 23%, #207ce5 72%); /* FF3.6+ */
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(23%,#499bea), color-stop(72%,#207ce5)); /* Chrome,Safari4+ */
    background: -webkit-radial-gradient(center, ellipse cover,  #499bea 23%,#207ce5 72%); /* Chrome10+,Safari5.1+ */
    background: -o-radial-gradient(center, ellipse cover,  #499bea 23%,#207ce5 72%); /* Opera 12+ */
    background: -ms-radial-gradient(center, ellipse cover,  #499bea 23%,#207ce5 72%); /* IE10+ */
    background: radial-gradient(ellipse at center,  #499bea 23%,#207ce5 72%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
  }
  
  .image_bkg{
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: contain;
  }
  
  .navbar .navbar-nav {
    display: inline-block !important;
    float: none !important;
    vertical-align: top !important;
  }

  .navbar .navbar-collapse {
    text-align: center !important;
  }
  
  .navbar-default {
    background: #0156a4 !important;
    border: none !important;
  }
  .navbar-default .navbar-brand {
    color: #fafafa !important;
    margin-right: 10px;
  }
  .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
    background: #01376a !important;
  }
  .navbar-default .navbar-text {
    color: #fafafa !important;
  }
  .navbar-default .navbar-nav > li {
    margin-right: 10px;
  }
  .navbar-default .navbar-nav > li > a {
    color: #fafafa !important;
  }
  .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    background: #01376a !important;
  }
  .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    background: #01376a !important;
  }
  .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    background: #01376a !important;
  }
  .navbar-default .navbar-toggle {
    border: none !important;
  }
  .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background-color: #01376a !important;
  }
  .navbar-default .navbar-toggle .icon-bar {
    background-color: #fafafa !important;
  }
  .navbar-default .navbar-collapse,
  .navbar-default .navbar-form {
    border: none !important;
  }
  .navbar-default .navbar-link {
    color: #fafafa !important;
  }
  .navbar-default .navbar-link:hover {
    background: #01376a !important;
  }

  @media (max-width: 767px) {
    .navbar-default .navbar-nav .open .dropdown-menu > li > a {
      color: #fafafa !important;
    }
    .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    background: #01376a !important;
    }
    .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    background: #01376a !important;
    }
    .navbar-header > .hide_control{
      display: block !important;
    }
    .navbar-nav > .show_control{
      display: none !important;
    }
    .owl-pagination, .owl-buttons{
      display: none !important;
    }
    .navbar-nav > .hide_control{
      display: block !important;
    }
    figure{
      margin-bottom: 10px !important;
    }
  }
  
  
  
  @media (min-width: 767px) {
    .modal {
      text-align: center;
    }

    .modal:before {
      display: inline-block;
      vertical-align: middle;
      content: " ";
      height: 100%;
    }

    .modal-dialog {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
    }
  }
  
  .label_for_email_contacts, .label_for_useful_link{
    display: inline-block;
    margin-top: 10px;
  }
  .label_for_email_contacts{
    width: 150px;
  }
  .label_for_useful_link{
    width: 300px;
  }
  
  a{
    cursor: pointer;
  }
  
  .owl-carousel div{
    padding: 0px 5px 0px 0px;
  }
  
  .tab-content{
    border: 1px solid #DDDDDD;
    border-top: none;
    border-radius: 0px 0px 4px 4px;
  }
  .tab-pane{
    padding: 20px;
  }
  
  .modal-open{
    padding-right: 0 !important;
  }
  
  .timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}

.group_selector{
  background-color: transparent;
  color: #2A6496 !important;
  transition: .1s ease-in-out;
  text-align: center;
  display: inline-block;
  width: 190px;
  color: white;
  padding: 20px 0px;
  margin: 0px -3px;
}
.group_selector:hover{
  background-color: #2A6496;
  color: white !important;
  text-decoration: none !important;
}

.glyphicon{
  margin-right: 10px;
}
figcaption > .glyphicon{
  margin-left: 10px;
}

.group_title, .sub_descr{
  display: inline-block;
}
.group_title{
  font-size: 20pt;
  font-family: 'Roboto', arial;
  margin-top: 20px;
}

.sub_descr{
  margin-bottom: 10px;
  margin-left: 38px;
}

.sub_descr img{
  width: 16px;
  height: 16px;
}

label{
  font-weight: bold;
  display: block;
  padding-bottom: 4px;
}
input,select{
  margin-bottom: 20px;
}
.submit_button{
  float: right;
  padding: 5px 30px 5px 30px;
}
textarea{
  resize: none;
  margin-bottom: 20px;
}

.minititle{
  display: block;
  text-transform: uppercase;
}
.automated{
  border-bottom: 1px dashed #0156a4;
}
.automated:hover{
  text-decoration: none;
  border-bottom: 1px dashed #01376a;
}

figure{
  margin-bottom: 100px;
}

.request{
  margin-bottom: 5px;
  margin-top: 5px;
  cursor: pointer;
  padding: 10px 0px;
}
.request:hover{
  background-color: <?= $USER_accent ?>;
  color: <?= $COL1 ?>;
  transition: .2s ease-in-out;
}
.request img{
  width: 14px;
  height: 14px;
}
.request > .title{
  font-family: 'Roboto';
  font-size: 15pt;
}
.request > .title, .request > .descr{
  padding: 5px 20px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: 100%;
}
</style>