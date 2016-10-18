{include file='sections/header.tpl'}
{if isset($notify)}
{$notify}
{/if}
<div class='row-fluid'>
    <div class='span12'>
        <form method="post" action="{$app_url}/password">
  <fieldset>
    <legend>Change Password</legend>
    <label>Current Password</label>
    <input name="oldpass" type="password" id="oldpass">
   <label>New Password</label>
    <input name="newpass" type="password" id="newpass">
    <label>Confirm New Password</label>
    <input name="newpassc" type="password" id="newpassc">
    <div class="form-actions">
  <button type="submit" class="btn btn-primary">Save</button>
  <button type="reset" class="btn">Cancel</button>
</div>
  </fieldset>
</form>
    </div>
</div>
{include file='sections/footer.tpl'}