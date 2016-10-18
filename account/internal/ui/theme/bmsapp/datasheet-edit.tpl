{include file='sections/header.tpl'}
{if isset($notify)}
{$notify}
{/if}
<div class="row-fluid">
      <div class="span12">
      
  <form action="{$app_url}/datasheet/create" method="post">
  <fieldset>
    <legend>{$data.name}</legend>
    <label>Sheet Name</label>
    <input name="title" type="text" class="input-medium" placeholder="Title..." value="{$data.name}">
    <label>Access Permission</label>
    <label class="radio">
  <input type="radio" name="access" id="optionsRadios1" value="Private" {if $data.access eq 'Private'} checked {/if} >
  Private
</label>
<label class="radio">
  <input type="radio" name="access" id="optionsRadios2" value="Public" {if $data.access eq 'Public'} checked {/if} >
  Public
</label>
{if $data.access eq 'Public'} 
<span class="help-block">Public Share URL: <a href="{$app_url}/datasheet/view/{$data.id}/{$data.token}" target="_blank">{$app_url}/datasheet/view/{$data.id}/{$data.token}</a></span>
{/if}
  </fieldset>
  <div class="form-actions">
  <input name="act" type="hidden" value="edit">
<input name="sid" type="hidden" value="{$data.id}">
   <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
   <a href="{$app_url}/datasheet" class="btn btn-warning"><i class="icon-th-list icon-white"></i> Cancel</a>
   <a href="{$app_url}/datasheet/open/{$data.id}" class="btn btn-info"><i class="icon-th-list icon-white"></i> Open</a>
</div>
</form>   
    </div>
   
  </div>
{include file='sections/footer.tpl'}