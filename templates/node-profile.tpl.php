<?php
/**
 * @file
 * Template to render profile nodes.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">

	<?php if ($node->title):	?>
	  <h2><?php print $title;?></h2>
	<?php endif; ?>

  <div class="profile-info clearfix">
    <?php echo $field_image[0]['view']; ?>

    <dl>
      <dt>Arbejdssted:</dt>
      <dd><?php echo $field_multi_library_ref[0]['view']; ?></dd>

      <dt>Stilling:</dt>
      <dd class="section-end"><?php echo $field_staff_title[0]['view']; ?></dd>

      <?php if (!empty($author->mail)): ?>
      <dt>E-mail:</dt>
      <dd><?php echo l($author->mail, 'mailto:' . $author->mail); ?></dd>
      <?php endif; ?>

      <?php if (!empty($field_staff_phone[0]['view'])): ?>
      <dt>Telefon:</dt>
      <dd class="section-end"><?php echo $field_staff_phone[0]['view']; ?></dd>
      <?php endif; ?>

      <dt>Arbejder med:</dt>
      <dd><?php echo $field_work_area[0]['view']; ?></dd>
    </dl>
  </div>

	<div class="content">
    <?php echo $node->content['body']['#value']; ?>
	</div>

  <?php print l(t('Contact @name', array('@name' => $node->title)), 'user/' . $node->uid . '/contact', $options = array('attributes' => array('class' => 'contact')));?>

</div>
