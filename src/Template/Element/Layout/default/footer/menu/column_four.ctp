<ul class="footer-menu">
    <li class="menu-title"><i class="fa fa-menu-title fa-tags"></i><?= __('Marketplace')?></li>
    <li class="menu-sub hide"><?= __('Service Providers')?>	</li>
	<?= $this->App->menuItems($this->Menu->serviceProvidersItems()); ?>
    <li class="menu-sub"><?= __('Jobs')?></li>
    <?= $this->App->menuItems($this->Menu->jobsItems()); ?>
</ul>
