<?php head(); ?>


<div id="primary">
<h1>File #<?php echo h($file->id); ?></h1>

<?php echo display_file($file); ?>

<?php

function display_definition_list_for_elements($file, $elements)
{
    $html = '';
    foreach ($elements as $element): 
        $html .= '<dt>' . $element->name . '</dt>';
        $texts = $file->getTextsByElement($element);
        $html .= '<dd>';
        foreach ($texts as $textRecord): 
            $html .= $textRecord->text; 
        endforeach;
        $html .= '</dd>';
    endforeach; 
    return $html;
}

function display_definition_list_for_elements_by_set($file, $elementSetName)
{
    $elements = $file->getElementsBySetName($elementSetName);
    return display_definition_list_for_elements($file, $elements);
}

?>
	
<div id="core-metadata" class="section">
<h2>Core Metadata</h2>
<dl>
<?php echo display_definition_list_for_elements_by_set($file, 'Dublin Core'); ?>
</dl>
</div>

<div id="format-metadata" class="section">
<h2>Format Metadata</h2>
<dl>
<?php echo display_definition_list_for_elements_by_set($file, 'Omeka Legacy File'); ?>
<dt>Archive Filename:</dt> <dd><?php if ($file->archive_filename): ?><?php echo h($file->archive_filename); ?><?php endif; ?></dd>
<dt>Original Filename:</dt> <dd><?php if ($file->original_filename): ?><?php echo h($file->original_filename); ?><?php endif; ?></dd>
<dt>File Size:</dt> <dd><?php if ($file->size): ?><?php echo h($file->size); ?> bytes<?php endif; ?></dd>
</dl>
</div>

<div id="type-metadata" class="section">
<h2>Type Metadata</h2>
<dl>
<dt>Mime Type / Browser:</dt> <dd><?php if ($file->mime_browser): ?><?php echo h($file->mime_browser); ?><?php endif; ?></dd>
<dt>Mime Type / OS:</dt> <dd><?php if ($file->mime_os): ?><?php echo h($file->mime_os); ?><?php endif; ?></dd>
<dt>File Type / OS:</dt> <dd><?php if ($file->type_os): ?><?php echo h($file->type_os); ?><?php endif; ?></dd>
</dl>
</div>
	
<div id="file-history" class="section">
<h2>File History</h2>
<dl>
<dt>Date Added:</dt> <dd><?php if ($file->added): ?><?php echo h($file->added); ?><?php endif; ?></dd>
<dt>Date Modified:</dt> <dd><?php if ($file->modified): ?><?php echo h($file->modified); ?><?php endif; ?></dd>
<dt>Authentication:</dt> <dd><?php if ($file->authentication): ?><?php echo h($file->authentication); ?><?php endif; ?></dd>
</dl>
</div>

</div><!--end primary-->
<?php foot();?>