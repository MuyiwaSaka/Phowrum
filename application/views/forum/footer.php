<div class="container">
    <div class="col">
        <h1>SECTIONS</h1>
        <ul>
            <?php foreach($sections as $section):?>
                <li><?php echo anchor("section/view/${section['section_id']}",$section['section_name'])?></li>
            <?php endforeach; ?>
        </ul>
</div>
<div class="col">
        <h1>SECTIONS</h1>
        <ul>
            <?php foreach($sections as $section):?>
                <li><?php echo $section['section_name']?></li>
            <?php endforeach; ?>
        </ul>
</div>
<div class="col">
<h1>SECTIONS</h1>
        <ul>
            <li>About</li>
            <li>Github</li>
            <li>Bottom Link</li>

        </ul>
</div>
<div class="col"></div>
</div>

