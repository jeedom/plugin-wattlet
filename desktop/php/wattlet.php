<?php
if (!isConnect('admin')) {
    throw new Exception('{{401 - Accès non autorisé}}');
}
$plugin = plugin::byId('wattlet');
sendVarToJS('eqType', $plugin->getId());
$eqLogics = eqLogic::byType($plugin->getId());
?>

<div class="row row-overflow">
     <div class="col-xs-12 eqLogicThumbnailDisplay">
   <legend><i class="fas fa-cog"></i>  {{Gestion}}</legend>
   <div class="eqLogicThumbnailContainer">
	   <div class="cursor eqLogicAction logoPrimary" data-action="gotoPluginConf">
		   <i class="fas fa-wrench"></i>
		   <br>
		   <span>{{Configuration}}</span>
	   </div>
	<div class="cursor eqLogicAction logoSecondary" id="bt_healthwattlet" >
    	<i class="fas fa-medkit"></i>
		<br>
		<span>{{Santé}}</span>
	</div>
	<div class="cursor eqLogicAction logoSecondary" id="bt_syncEqLogic" >
    	<i class="fas fa-sync"></i>
      	<br>
      	<span>{{Synchroniser}}</span>
    </div>
  </div>
  <legend><i class="techno-cable1"></i> {{Mes Wattcubes}}</legend>
	   <input class="form-control" placeholder="{{Rechercher}}" id="in_searchEqlogic" />
        <?php
        if (count($eqLogics) == 0) {
            echo "<br/><br/><br/><center><span style='color:#767676;font-size:1.2em;font-weight: bold;'>{{Vous n'avez pas encore de wattcube, cliquez sur Synchroniser pour commencer}}</span></center>";
        } else {
            ?>
            <div class="eqLogicThumbnailContainer">
                <?php
                foreach ($eqLogics as $eqLogic) {
					$opacity = ($eqLogic->getIsEnable()) ? '' : jeedom::getConfiguration('eqLogic:style:noactive');
                    echo '<div class="eqLogicDisplayCard cursor" data-eqLogic_id="' . $eqLogic->getId() . '" style="text-align: center; background-color : #ffffff; height : 200px;margin-bottom : 10px;padding : 5px;border-radius: 2px;width : 160px;margin-left : 10px;' . $opacity . '" >';
					if (file_exists('plugins/wattlet/docs/images/' . $eqLogic->getConfiguration('type') . '.png')) {
						echo '<img src="plugins/wattlet/docs/images/' . $eqLogic->getConfiguration('type') . '.png" height="105" width="95" />';
					}else{
						echo '<img src="plugins/wattlet/docs/images/wattlet_icon.png" height="105" width="95" />';
					}
                    echo "<br>";
                    echo '<span style="font-size : 1.1em;position:relative; top : 15px;word-break: break-all;white-space: pre-wrap;word-wrap: break-word;">' . $eqLogic->getHumanName(true, true) . '</span>';
                    echo '</div>';
                }
                ?>
            </div>
        <?php } ?>
    </div>
    <div class="col-xs-12 eqLogic">
      <div class="input-group pull-right" style="display:inline-flex">
			  <span class="input-group-btn">
				  <a class="btn btn-default btn-sm eqLogicAction roundedLeft" data-action="configure"><i class="fas fa-cogs"></i> {{Configuration avancée}}</a>
          <a class="btn btn-default btn-sm eqLogicAction" data-action="copy"><i class="fas fa-copy"></i> {{Dupliquer}}</a>
          <a class="btn btn-sm btn-success eqLogicAction" data-action="save"><i class="fas fa-check-circle"></i> {{Sauvegarder}}</a>
          <a class="btn btn-danger btn-sm eqLogicAction roundedRight" data-action="remove"><i class="fas fa-minus-circle"></i> {{Supprimer}}</a>
			  </span>
		   </div>
       <ul class="nav nav-tabs" role="tablist">
         <li role="presentation"><a href="#" class="eqLogicAction" aria-controls="home" role="tab" data-toggle="tab" data-action="returnToThumbnailDisplay"><i class="fas fa-arrow-circle-left"></i></a></li>
         <li role="presentation" class="active"><a href="#eqlogictab" aria-controls="home" role="tab" data-toggle="tab"><i class="fas fa-tachometer-alt"></i> {{Equipement}}</a></li>
        <li role="presentation"><a href="#commandtab" aria-controls="profile" role="tab" data-toggle="tab"><i class="fas fa-list-alt"></i> {{Commandes}}</a></li>
      </ul>
      <div class="tab-content" style="height:calc(100% - 50px);overflow:auto;overflow-x: hidden;">
        <div role="tabpanel" class="tab-pane active" id="eqlogictab">
        <br/>
		        <form class="col-md-6 form-horizontal">
		            <fieldset>
                  <legend><i class="fas fa-wrench"></i>  {{Général}}</legend>
		                <div class="form-group">
		                    <label class="col-sm-3 control-label">{{Nom de l'équipement wattlet}}</label>
		                    <div class="col-sm-3">
		                        <input type="text" class="eqLogicAttr form-control" data-l1key="id" style="display : none;" />
		                        <input type="text" class="eqLogicAttr form-control" data-l1key="name" placeholder="{{Nom de l'équipement wattlet}}"/>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-3 control-label" >{{Objet parent}}</label>
		                    <div class="col-sm-3">
                          <select id="sel_object" class="eqLogicAttr form-control" data-l1key="object_id">
      											<option value="">{{Aucun}}</option>
      											<?php
      											$options = '';
      											foreach ((jeeObject::buildTree(null, false)) as $object) {
      												$options .= '<option value="' . $object->getId() . '">' . str_repeat('&nbsp;&nbsp;', $object->getConfiguration('parentNumber')) . $object->getName() . '</option>';
      											}
      											echo $options;
      											?>
      										</select>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-sm-3 control-label">{{Catégorie}}</label>
		                    <div class="col-sm-9">
		                        <?php
		                        foreach (jeedom::getConfiguration('eqLogic:category') as $key => $value) {
		                            echo '<label class="checkbox-inline">';
		                            echo '<input type="checkbox" class="eqLogicAttr" data-l1key="category" data-l2key="' . $key . '" />' . $value['name'];
		                            echo '</label>';
		                        }
		                        ?>

		                    </div>
		                </div>
		                <div class="form-group">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-3">
					          <input type="checkbox" class="eqLogicAttr" data-label-text="{{Activer}}" data-l1key="isEnable" checked/>{{Activer}}
					          <input type="checkbox" class="eqLogicAttr" data-label-text="{{Visible}}" data-l1key="isVisible" checked/>{{Visible}}
					        </div>
				      </div>
		       </fieldset>
		     </form>

      <form class="form-horizontal col-md-6">
    	<fieldset>
				<legend><i class="fas fa-info"></i>  {{Informations}}</legend>
        <div class="form-group">
                    <label class="col-sm-3 control-label">{{Adresse}}</label>
                    <div class="col-sm-3">
                        <input type="text" id="address" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="address" placeholder="{{Adresse}}" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{Type}}</label>
                    <div class="col-sm-3">
                        <input type="text" id="type" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="type" placeholder="{{Type}}" disabled/>
                    </div>
                </div>
        <div class="form-group">
                    <label class="col-sm-3 control-label">{{IO}}</label>
                    <div class="col-sm-3">
                        <input type="text" id="io" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="io" placeholder="{{IO}}" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{Direction}}</label>
                    <div class="col-sm-3">
                        <input type="text" id="type" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="direction" placeholder="{{Direction}}" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{Version Software}}</label>
                    <div class="col-sm-3">
                        <input type="text" id="soft" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="soft" placeholder="{{Version Software}}" disabled/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{Version Hardware}}</label>
                    <div class="col-sm-3">
                        <input type="text" id="hard" class="eqLogicAttr form-control" data-l1key="configuration" data-l2key="hard" placeholder="{{Version Hardware}}" disabled/>
                    </div>
                </div>
  </fieldset>
</form>
</div>
<div role="tabpanel" class="tab-pane" id="commandtab">
<a class="btn btn-success btn-sm cmdAction pull-right" data-action="add" style="margin-top:5px;"><i class="fas fa-plus-circle"></i> {{Commandes}}</a><br/><br/>
<table id="table_cmd" class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>{{Nom}}</th>
                    <th>{{Type}}</th>
                    <th>{{Parametre(s)}}</th>
                    <th>{{Options}}</th>
                    <th>{{Action}}</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        </div>
</div>
</div>
</div>
<?php include_file('desktop', 'wattlet', 'js', 'wattlet'); ?>
<?php include_file('core', 'plugin.template', 'js'); ?>
