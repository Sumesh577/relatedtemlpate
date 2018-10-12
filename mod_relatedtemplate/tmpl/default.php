<?php
// No direct access
defined('_JEXEC') or die;
$limit 					= 	$params->get('limit');
$templateCategory 	= 	$params->get('templateCategory');
 $id 	= JRequest::getVar('id'); 
$modJdtemplateOject	=  new modJdRetaltedtemplateHelper();
$templatelates			=	$modJdtemplateOject->getall($id,$templateCategory,$limit);

?>

<?php  if($templatelates){ ?>
	<div class="row jdtemplatelist">
		<?php  foreach($templatelates as $templatelate){ ?>
			<div data-wow-delay="1s" class="col-lg-4 col-md-6 col-sm-12 p-3">
				<div class="card h-100 shadow-sm bg-white border-0 pb-3">
					<a href="/products/templates/<?php echo $templatelate->alias; ?>">
						<?php if(!empty($templatelate->scrollphoto)){?>
							<img class="card-img-top" src="<?php echo $templatelate->scrollphoto; ?>" alt="<?php echo $templatelate->templatename; ?>">
						<?php } ?>
					</a>
					<div class="card-body text-center">
						<h5 class="card-title">
							<a class="text-body" href="/products/templates/<?php echo $templatelate->alias; ?>"><?php echo $templatelate->templatename; ?></a>
						</h5>
						<p class="card-text"><?php echo $templatelate->shortdescription; ?></p>
					</div>
					<div class="card-footer text-center bg-white border-0 pb-3">
						<a class="btn btn-rounded btn-outline-secondary" href="/products/templates/<?php echo $templatelate->alias; ?>">View Details</a>
					</div>
				</div>
			</div>
		<?php  } ?>
	</div>

<?php } ?>
