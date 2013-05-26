<form method='post' action='removepost.php'>
Admin login: <input type="password" name='pwd' /><br />
Blog Post ID: <input type='text' name='blogID' /><br />
Comment: <input type='text' name='comment' /><br />

<br />
Post type:
<input type='radio' name='posttype' value='deletepost' />Delete Post
<input type='radio' name='posttype' value='deletecomment' />Delete Comment <br />
<input type='submit' name='formsubmit' value='Submit' />

</form>