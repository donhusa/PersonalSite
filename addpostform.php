<form method='post' action='addpost.php'>
Admin login: <input type="password" name='pwd' /><br />
Blog Post ID: <input type='text' name='blogID' /><br />
Blog Post Title: <input type='text' name='title' /><br />
Blog Post Content: <br />
<textarea name='blogpost' rows='10' cols='80'>
</textarea>


<br />
Post type:
<input type='radio' name='posttype' value='updatepost' />Update Post
<input type='radio' name='posttype' value='newpost' />New Post <br />
<input type='submit' name='formsubmit' value='Submit' />

</form>