<?php
/*
	STOP! DO NOT MODIFY THIS FILE!
	If you wish to customize the output, you can safely do so by COPYING this file into a new folder called 'gigpress-templates' in your 'wp-content' directory	and then making your changes there. When in place, that file will load in place of this one.
	
	This template displays all of our individual show data in the main shows listing (upcoming and past).

	If you're curious what all variables are available in the $showdata array, have a look at the docs: http://gigpress.com/docs/
*/
?>

<tbody>
	
	<tr class="gigpress-row <?php echo $class; ?>">

		<td class="gigpress-links-cell">
			<?php
			// Only show these links if this show is in the future
			if($scope != 'past') : ?>
			<div class="gigpress-calendar-add">
				<a class="gigpress-links-toggle" href="#calendar-links-<?php echo $showdata['id']; ?>">Add</a>
				<div class="gigpress-calendar-links" id="calendar-links-<?php echo $showdata['id']; ?>">
					<div class="gigpress-calendar-links-inner">
						<span><?php echo $showdata['gcal']; ?></span>
						<span><?php echo $showdata['ical']; ?></span>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</td>
	
		<td class="gigpress-date"><?php echo $showdata['date']; ?>
			<?php if($showdata['end_date']) : ?> - <?php echo $showdata['end_date']; ?><?php endif; ?>
		</td>
		
	<?php if((!$artist && $group_artists == 'no') && $total_artists > 1) : ?>
		<td class="gigpress-artist">
			<?php echo $showdata['artist']; ?>
		</td>
	<?php endif; ?>
	
		<td class="gigpress-time"><?php echo $showdata['time']; ?></td>

		<td class="gigpress-venue"><?php echo $showdata['venue']; ?></td>

		<td class="gigpress-city"><?php echo $showdata['city']; ?>/<?php if(!empty($gpo['display_country'])) : ?><?php echo $showdata['country']; ?><?php endif; ?></td>
		
		<td class="gigpress-more-info"><?php echo $showdata['external_link']; ?></td>
		
	
	</tr>

</tbody>	