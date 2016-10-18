{include file='sections/header.tpl'}
<div class="row-fluid">
      <div class="span6">
      <h4>Are you sure, You want to Delete this Data Sheet ?</h4>
      <form class="form-inline" action="{$app_url}/datasheet/delete/{$data.id}" method="post">
 
   
 <input name="title" type="text" class="input-medium" disabled placeholder="Title..." value="{$data.name}">
<input name="act" type="hidden" value="edit">
<input name="sid" type="hidden" value="{$data.id}">
  <button type="submit" class="btn btn-danger"><i class="icon-ok icon-white"></i> Confirm</button>
   <a href="{$app_url}/datasheet" class="btn btn-warning"><i class="icon-th-list icon-white"></i> Cancel</a>
  </form>
     
    </div>
   
  </div>
{include file='sections/footer.tpl'}