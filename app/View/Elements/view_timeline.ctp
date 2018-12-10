<?php
	$mayModify = (($isAclModify && $event['Event']['user_id'] == $me['id'] && $event['Orgc']['id'] == $me['org_id']) || ($isAclModifyOrg && $event['Orgc']['id'] == $me['org_id']));
	$mayPublish = ($isAclPublish && $event['Orgc']['id'] == $me['org_id']);
?>

<div>
	<div id="timeline-header" class="eventgraph_header">
		<label id="timeline-scope" class="btn center-in-network-header network-control-btn">
			<span class="useCursorPointer fa fa-object-group" style="margin-right: 3px;"></span><?php echo __('Time scope')?>
		</label>
		<label id="timeline-display" class="btn center-in-network-header network-control-btn">
			<span class="useCursorPointer fa fa-list-alt" style="margin-right: 3px;"></span><?php echo __('Display')?>
			<span id="timeline-display-badge" class="badge"></span>
		</label>
				
		<span id="seenNotEnabledBanner" class="alert-danger center-in-network-header" style="border: 1px solid #fbeed5; text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5); border-radius: 4px; padding: 4px; display:none">
			<b>First_seen</b>/<b>Last_seen</b>
			<?php echo __('feature is not supported by this instance.'); ?><sup class="fa fa-question" title="<?php echo __('Only objects with first-seen attribute in their template can be viewed and edited.'); ?>"></sup>
                        <?php if ($isAdmin): ?>
                            <?php echo __('You can update MISP to support it by clicking'); ?>
			    <a href="<?php echo $baseurl . '/servers/advancedUpdate/#seenOnAttributeAndObject'; ?>"><?php echo __('here'); ?></a>
                        <?php endif; ?>
		</span>

		<input type="text" id="timeline-typeahead" class="center-in-network-header network-typeahead flushright" data-provide="typeahead" size="20" placeholder="Search for an item">
	</div>


	<div id="event_timeline" data-user-manipulation="<?php echo $mayModify || $isSiteAdmin ? 'true' : 'false'; ?>" data-extended="<?php echo $extended; ?>">
		<div class="loadingTimeline">
			<div class="spinner"></div>
			<div class="loadingText"><?php echo __('Loading');?></div>
		</div>
	</div>
	<span id="fullscreen-btn-timeline" class="fullscreen-btn-timeline btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" data-title="<?php echo __('Toggle fullscreen');?>"><span class="fa fa-desktop"></span></span>
</div>

<?php 
	echo $this->Html->script('moment-with-locales');
	echo $this->Html->script('event-timeline');
	echo $this->Html->css('event-timeline');
?>