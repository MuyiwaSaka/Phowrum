<div class='row'><span>Breadcrumbs Here</span></div>
<div class='row'>
    <?= form_open('url', ''); ?>
    <div class='form-group'>
        <span class='new_post_banner'>Enter Post Content here and please remember the following rules around post creation 
            <ul>
                <li>NO racist comments</li>
                <li>No unauthorised advertising or spam. You will be banned.</li>
                <li>Except where permitted, no posting of nude or pornographic content.</li>
                <li>Posts with personal phone numbers will be hidden.</li>
                <li>If you post an affiliate list, you must make full disclosure or the post will be hidden.</li>
                <li>No insults. You'll get banned</li>
                <li>Keep images under 4MB. Only GIFs, PNG, BMP and JPEGs allowed</li>
            </ul>
        </span>
     </div>   
     <div class="form-group">
         <input type="text" id='title'/>      
     </div>
     <div class="form-group">
         <?= form_textarea('new_entry', '...', 'newpost'); ?>
     </div>
     <div class="form-group">
         <span>Upload Images:</span>
        <?= form_upload('post_images'); ?>
     </div>
        
     <div class="form-group">
         <span class="formlabel">Enter your post tags separated by commas.</span><br/>
        <?= form_input('newposttags', 'Enter Tags'); ?>
       
     </div> 
     <div class="form-group">
        <button type="reset">Reset</button>
        <button type="submit">Create Post</button> 
     </div>
    <?= form_close();?>

</div>

