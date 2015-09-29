<div class="row-fluid">
    <div class="box">
        <div id="acl-title" class="box-title">
            <?php echo $this->element('tab_product'); ?>
            <h3><i class="icon-sitemap"></i>Categories</h3>
        </div>
        <div class="box-content">
            <div class="row-fluid">
                <div class="span3">
                    <fieldset>
                        <legend>
                            Directories
                            <button id="AddCategoryWizard" type="button" role="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modalCategoryAdd">
                                <i class="glyphicon-circle_plus"></i> New
                            </button>
                        </legend>
                        <div id="tree">
                            <ul>
                                <li id="Li1" class="folder expanded" title="Root Categories">Root Categories
						        <?php
                                function recursive($categories, $id = 0) {
                                    echo '<ul>';
                                    foreach ( $categories as $category ) {
                                        $pid = $category ['Category'] ['parent_id'];
                                        $name = $category ['Category'] ['name'];
                                        if ($pid == $id) {
                                            $class = "folder";
                                            echo '<li id="' . $category ['Category'] ['id'] . '" class="' . $class 
                                                . '" title="' . $category ['Category'] ['description'] . '">' . $category ['Category'] ['name'];
                                            recursive ( $categories, $category ['Category'] ['id'] );
                                            echo '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }
                                recursive ( $categories, 0);
                                ?>
                                </li>
                            </ul>
                        </div>
                    </fieldset>
                </div>
                <div class="span3">
                    <div class="content-display">
                        <fieldset>
                            <legend>Details</legend>
                            <?php echo $this->Form->create('Category', array('id' => 'CategoryEditForm', 'url' => array('controller' => 'categories', 'action' => 'edit', 0))); ?>
                            <?php
                            echo $this->Form->input('id');
                            echo $this->Form->input('name', array('autocomplete' => 'off', 'class' => 'ep-inp-btm-dotted'));
                            echo $this->Form->input('description', array('class' => 'ep-inp-btm-dotted'));
                            echo $this->Form->hidden('parent_id');
                            ?>
                            <?php echo $this->Form->end(); ?>
                            <div>
                                <hr />
                                <button id="updateCurrentCategory" type="button" role="button" class="btn btn-default" disabled="disabled"><i class="glyphicon-ok"></i> Update</button>
                                <button id="deleteCategory" type="button" role="button" class="btn btn-danger" disabled="disabled" data-toggle="modal" data-target="#deleteConfirm">
                                    <i class="glyphicon-bin"></i> Delete
                                </button>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="span4">
                    <div class="content-display">
                        <fieldset>
                            <legend>Category</legend>
                            <table id="CategoryTable" class="table table-hover table-nomargin table-condensed">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>description</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <button id="loadCategoryModal" type="button" role="button" class="btn btn-default" disabled="disabled" data-toggle="modal" data-target="#modalCategoryManagement">
                                <i class="glyphicon-edit"></i> Edit Category
                            </button>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalCategoryAdd" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>                
                <h4><i class="icon-magic"></i> Add Category Wizard</h4>
            </div>
            <div class="modal-body">
                <div class="box-content">
                    <?php echo $this->Form->create('Category', array('action' => 'add'), array('enctype'=>'multipart/form-data')); ?>
				        <div id="fieldWrapper">
				        <span class="step" id="selectparentcategory">
                            <div id="category">
                                <ul>
                                    <li id="0" class="folder expanded" title="Root Categories">Root Categories
						                <?php recursive ( $categories, 0); ?>
                                    </li>
                                </ul>
                            </div>
				        </span>
				        <span id="fillinformation" class="step">
                            <?php echo $this->Form->hidden('parent_id', array('value' => 0, 'class' => 'required number')); ?>
                            <?php echo $this->Form->input('name', array('autocomplete' => 'off', 'class' => 'required')); ?>
                            <?php echo $this->Form->input('title', array('autocomplete' => 'off', 'class' => 'required')); ?>
				        </span>
				        <span id="selectImage" class="step">
                            <?php echo $this->Html->image('/path/to/your/image/dir/' . $listShExPainImage['User']['image']); ?>
                            <!--<div class="control-group">
                                <label for="textfield" class="control-label"></label>
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name='imagefile' /></span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </span>
				        <span id="fillDescription" class="step">
                            <?php echo $this->Form->input('description', array('type' => 'textarea')); ?>
                            <?php echo $this->Form->input('link_article'); ?>
                        </span>
				        <span id="chooseattribute" class="step">
                            <div class="loader-state"></div>
                           <select name="data[CategoryAttribute][]" id="CategoryAttribute" multiple class="hide"></select>
				        </span>
				        </div>
                       <div class="form-actions">
							<input type="reset" class="btn" value="Back" id="back">
							<input type="submit" class="btn btn-primary" value="Submit" id="next" disabled>
						</div>
                     <?php echo $this->Form->end(); ?>
				</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="modalCategoryManagement" class="modal fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5>Attribute Category Management</h5>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label for="textfield" class="control-label">Please choose attribute below</label>
                    <div class="loader-state"></div>
                    <div class="controls">
                    <?php echo $this->Form->create('CategoryAttribute', array('id' => 'CategoryAttributeEditForm', 'url' => array('controller' => 'categoryAttributes', 'action' => 'edit.json'))); ?>
                        <?php echo $this->Form->hidden('category_id', array('id' => 'CategoryId')); ?>
                        <select name="data[CategoryAttribute][CategoryAttributeId][]" id="CategoryAttributeId" multiple></select>
                        <hr />
                        <button type="submit" data-loading-text="<i class='icon-save'></i> Save" disabled="disabled" class="btn btn-default">
                            <i class="icon-save"></i> Save
                        </button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="deleteConfirm" class="modal hide fade">
  <div class="modal-body">
    Are you sure you want to delete?
  </div>
  <div class="modal-footer">
    <?php echo $this->Form->create('Category', array('id' => 'CategoryDeleteForm', 'url' => array('controller' => 'categories', 'action' => 'delete', 0))); ?>
    <button type="submit" role="button" class="btn btn-danger">
        <i class="glyphicon-bin"></i> Delete
    </button>
    <button type="reset" data-dismiss="modal" class="btn">Cancel</button>
    <?php echo $this->Form->end(); ?>
  </div>
</div>

<input id="BaseURL" type="hidden" value="<?php echo $this->base; ?>" />
<?php echo $this->Html->script('categories'); ?>