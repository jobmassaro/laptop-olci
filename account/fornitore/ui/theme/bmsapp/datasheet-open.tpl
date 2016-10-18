{include file='sections/header.tpl'}
{if isset($notify)}
{$notify}
{/if}
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-file'></i>
                <span>{$data.name}</span>
            </h1>
            <div class='clearfix'></div>
        </div>
    </div>
</div>
<div class="row-fluid">
<div class="span12">
          <p>
            
            <button name="save" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save Data</button> 
            <a href="{$app_url}/datasheet/edit/{$data.id}" class="btn btn-warning"><i class="icon-edit icon-white"></i> Edit Properties</a>
            <a href="{$app_url}/datasheet/delete/{$data.id}" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</a>
            {if $data.access eq 'Private'}
            <a href="{$app_url}/datasheet/public/{$data.id}" class="btn btn-warning"><i class="icon-share icon-white"></i> Set Public</a>
            {else}
             <a href="{$app_url}/datasheet/private/{$data.id}" class="btn btn-warning"><i class="icon-lock icon-white"></i> Set Private</a>
             {/if}
            <a href="{$app_url}/datasheet" class="btn btn-info"><i class="icon-th-list icon-white"></i> Back To The List</a>
            
          </p>

          <pre id="dataconsole" class="console" style="background:#FFF">Click "Load" to load data from server</pre>
          {if $data.access eq 'Public'} <p>Public Share URL: <a href="{$app_url}/datasheet/view/{$data.id}/{$data.token}" target="_blank">{$app_url}/datasheet/view/{$data.id}/{$data.token}</a></p> {/if}
<label><input type="checkbox" name="autosave" checked="checked" autocomplete="off"> Autosave</label>
          <div id="data"></div>

          
        

</div>
</div>
{include file='sections/footer.tpl'}