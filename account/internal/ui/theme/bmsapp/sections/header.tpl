<!DOCTYPE html>
<html>
<head>
    <title>Data Grid</title>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <!--[if lt IE 9]>
    <script src='http://html5shim.googlecode.com/svn/trunk/html5.js' type='text/javascript'></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/ie8.css" media="screen" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/bootstrap-responsive.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/bootstrap-datatable.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="{$app_url}/ui/theme/bmsapp/assets/css/style.css" media="all" rel="stylesheet" type="text/css"/>
{if isset($xheader)}
{$xheader}
{/if}
</head>
<body>
<header>
    <div class='navbar navbar-fixed-top'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href='{$app_url}/datasheet'>
                    
                    <span class='hidden-phone'>DataSheets</span>
                </a>
                <ul class='nav pull-right'>
                    <li class='dropdown user'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            
                            <span>My Account</span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='{$app_url}/password'>Change Password</a>
                            </li>
                             <li>
                                <a href='{$app_url}/docs'>Documentation</a>
                            </li>
                         
                            <li class='divider'></li>
                            <li>
                                <a href='{$app_url}/logout'>Logout</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
               
            </div>
        </div>
    </div>
</header>
<section id='content'>
<div class='container-fluid'>
<div class='row-fluid'>
<div class='span12'>