{include file='sections/header.tpl'}
{if isset($notify)}
{$notify}
{/if}
<div class="row-fluid">
      <div class="span12">
     <p>&nbsp;</p>
      <form class="form-inline" action="{$app_url}/datasheet/create" method="post">
 
   
 <input type="text" name="title" class="input-medium" placeholder="Title...">
<input name="act" type="hidden" value="add">
  <button type="submit" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add New</button>
  </form>
     
    </div>
   
  </div>

<div class='row-fluid'>
<div class='span12 box bordered-box'>
<div class='box-header'>
    <div class='lead'>
        List Data Grid
    </div>
</div>
<div class='thumbnail'>
<div class='inner-spacer'>
<div class='responsive-table'>
<div class='scrollable-area'>
<table class='data-table table table-bordered table-striped'>
<thead>
<tr>
    <th>S/L</th>
    <th>ID</th>
    <th width="70%">Title</th>
    <th></th>
</tr>
</thead>
<tbody>
                            {foreach $rows as $r name=i}
<tr>
<td>{$smarty.foreach.i.index+1}</td>
                                <td>{$r['id']}</td>
                                <td>{$r['name']}</td>
                               
                                <td>
                                    <div class='text-right'>
                                        <a class='btn btn-success btn-mini' href='datasheet/open/{$r['id']}'>
                                            <i class='icon-ok'></i>
                                        </a>
                                        <a class='btn btn-warning btn-mini' href='{$app_url}/datasheet/edit/{$r['id']}'>
                                            <i class='icon-edit'></i>
                                        </a>
                                        <a class='btn btn-danger btn-mini' href='{$app_url}/datasheet/delete/{$r['id']}'>
                                            <i class='icon-remove'></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
 
{/foreach}
                            
                            
                            
                            
                            
                            </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
{include file='sections/footer.tpl'}