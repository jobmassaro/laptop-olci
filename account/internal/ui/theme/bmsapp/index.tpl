<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Sheets Login</title>
     <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link href="{$app_url}/ui/theme/bmsapp/css/logincss.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div class="container">

    <div class="wrapper">

        <div>
<div class="logo"><img src="{$app_url}/apps/uploads/logo/logo.png" alt="logo" /></div>





          <div>

                <form class="login" method="post" action="login">
                    <fieldset>
                    
                        <div class="row">
                            <input type="text" class="login" id="username" name="username" placeholder="{$_L.placeholder_username}" />
                       
                        </div>
                        <div class="row">
                            <input type="password" class="password" id="password" name="password" placeholder="{$_L.placeholder_password}"/>
                            
                        </div>
                        <div class="row">
                         <button class="btn btn-primary" name="login" type="submit">{$_L.button_login}</button>
  
                        </div>

                    </fieldset>
                </form>
            <div style="clear: both; color:#F00">{if isset($notify)}
{$notify}
{/if}</div>

            </div>

        </div>

    </div>
</div>
</body>
</html>
