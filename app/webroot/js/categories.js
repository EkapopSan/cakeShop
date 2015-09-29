var GLOBAL_VAR = {
    editAttrHasChange: false,
}
$(function () {
    /*
    * Dynatree Plug-in
    * Configurations and Handle
    */
    // Initialize the tree in the onload event
    $("#category").dynatree({
        minExpandLevel: 2,
        clickFolderMode: 1,
        onActivate: function (node) {
            var form = $("#CategoryAddForm");
            $(form).find("#CategoryParentId").val(node.data.key);
            LoadCategoryAttributeAddForm();
        },
        onPostInit: function () {

        },
        onQueryExpand: function (node) {
            //return false;
        },
        onDeactivate: function (node) {
            //to do something...
        },
        onDblClick: function (node, event) {
            node.toggleExpand();
        }
    });

	$("#tree").dynatree({
		minExpandLevel: 2,
		clickFolderMode: 1,
		onActivate: function (node) {

			//Edit Form
			if (node.data.key > 0) {
			    var form = $('#CategoryEditForm');
			    replaceLastFormURL(form, node.data.key);
			    $(form).find('#CategoryId').val(node.data.key);
			    $(form).find('#CategoryName').val(node.data.title);
			    $(form).find('#CategoryParentId').val(node.parent.data.key);
			    $(form).find('#CategoryDescription').val(node.data.tooltip);

			    $('#updateCurrentCategory').prop('disabled', false);
			} else {
			    $('#updateCurrentCategory').prop('disabled', true);
			}


			//Delete Form
			$('#deleteCategory').prop('disabled', false);
			replaceLastFormURL($('#CategoryDeleteForm'), node.data.key);


		    //Category Template Information.
			var form = $("#CategoryEditForm");
			if (node.data.key > 0) {
			    $(form).find('#CategoryId').val(node.data.key);
			    LoadAttributeByCategoryId();
			    $('#loadCategoryModal').prop('disabled', false);
			} else {
			    $(form).find('#CategoryId').val(0);
			    $(form).find('#CategoryName').val('');
			    $(form).find('#CategoryDescription').val('');
			    $('#updateCurrentCategory').prop('disabled', true);
			    $('#deleteCategory').prop('disabled', true);
			    $('#loadCategoryModal').prop('disabled', true);
			    $("#CategoryTable").find("tbody").empty();
			}
		},
		onPostInit: function() {
			    		
		},
		onQueryExpand: function(node) {
			//return false;
		},
		onDeactivate: function(node) {
			//to do something...
		},
		onDblClick: function(node, event) {
			node.toggleExpand();
		}
	});    


    /*
    * Formwizard step plug-in
    * http://thecodemine.org/
    */
	$("#CategoryAddForm").formwizard({
	    formPluginEnabled: false,
	    validationEnabled: true,
	    focusFirstInput: true,
	    disableUIStyles: true
	});

	$('#CategoryAddForm').bind("step_shown", function (event, data) {
	    if (!data.isBackNavigation && data.currentStep == 'chooseattribute') {
	        $("#CategoryAddForm").find("#CategoryAttribute").multiSelect('refresh');
	        $('#CategoryAddForm').find("#CategoryAttribute").fadeIn('fast');
	    }
    });
    
	$('#modalCategoryManagement').on('hidden.bs.modal', function (e) {
        if(GLOBAL_VAR.editAttrHasChange)
            LoadAttributeByCategoryId();
            GLOBAL_VAR.editAttrHasChange = false;
	});

	$('#CategoryEditForm').validate({
	    rules: {
	        "data[Category][parent]": {
	            required: true,
	            number: true
	        },
	        "data[Category][name]": {
	            required: true
	        }
	    }
	});

	$("#updateCurrentCategory").click(function () {
	    var form = $("form#CategoryEditForm");
	    var categoryId = $(form).find("#CategoryId").val();
	    if (categoryId > 0) $(form).submit();
	});

	$('#loadCategoryModal').click(function () {

	    ajaxLoader($("#modalCategoryManagement").find("loader-state"));

	    var url = document.location.origin + $("#BaseURL").val() + "/categoryAttributes/findAllByCategoryId.json";
	    var id = $('#CategoryEditForm').find('#CategoryId').val();
	    $('#CategoryAttributeEditForm').find('#CategoryId').val(id);
	    $("#CategoryAttributeEditForm").find('button[type=submit]').prop('disabled', true);

	    $.getJSON(url, { id: id })
            .done(function (data) {
                if (typeof data != 'undefined') {
                    if (data.hasAttribute) {
                        var html = '';
                        $.each(data.Attributes, function (i, attrObj) {
                            var select = '';
                            $.each(data.CategoryAttributes, function (i, tempObj) {
                                if (attrObj.Attribute.id == tempObj.CategoryAttribute.attribute_id)
                                    select = 'selected';
                            });
                            html += '<option ' + select + ' name="data[Category][attribute_id][' + attrObj.Attribute.id + ']" value="' + attrObj.Attribute.id + '">' + attrObj.Attribute.name + '</option>';
                        });
                        $("#CategoryAttributeEditForm").find("#CategoryAttributeId").html(html);
                    } else {
                        var html = '';
                        $.each(data.Attributes, function (i, attrObj) {
                            html += '<option name="data[Category][attribute_id][' + attrObj.Attribute.id + ']" value="' + attrObj.Attribute.id + '">' + attrObj.Attribute.name + '</option>';
                        });
                        $("#CategoryAttributeEditForm").find("#CategoryAttributeId").html(html);
                    }

                    $("#CategoryAttributeEditForm").find("#CategoryAttributeId").multiSelect('refresh');
                }
            }).fail(function (jqxhr, textStatus, error) {
                console.log(textStatus);
            });

	});

	$('#CategoryAttributeId').change(function () {
	    CategoryAttrOnChange();
	});
    
	$('#CategoryAttributeEditForm').submit(function () {
	    CategoryAttrEditFormOnSubmit(this);
	    return false;
	});

	$(document).on('submit', 'form#CategoryDeleteForm', function () {
	    $(this).find('button[type="submit"], button[type="reset"]').attr('disabled', true);
	});

});

function LoadAttributeByCategoryId() {

    ajaxLoader($("#CategoryTable").find("tbody"));

    var url = document.location.origin + $("#BaseURL").val() + "/categoryAttributes/findAttributeByCategoryId.json";
    var id = $('#CategoryEditForm').find('#CategoryId').val();

    if (id > 0) {
        var request = $.ajax({
            url: url,
            dataType: "json",
            abortOnRetry: true,
            data: { id: id }
        })
        .done(function (data, textStatus, xhr) {
            if (typeof data != 'undefined') {
                var html = "";
                $(data.CategoryAttributes).each(function (index, obj) {
                    html += "<tr>";
                    html += "<td>" + obj.Attribute.id + "</td>";
                    html += "<td>" + obj.Attribute.name + "</td>";
                    html += "<td>" + obj.Attribute.description + "</td>";
                    html += "<td></td>";
                    html += "</tr>";
                });
                if (html != "") {
                    $("#CategoryTable").find("tbody").empty().append(html);
                } else {
                    $("#CategoryTable").find("tbody").empty();
                }
            } else {
                $("#CategoryTable").find("tbody").empty();
            }
        }).fail(function (data, textStatus, xhr) {
            console.log(textStatus + ' ' + data.error);
        });

        $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
            if (options.abortOnRetry) {
                if (request[options.url]) {
                    request[options.url].abort();
                }
                request[options.url] = jqXHR;
            }
        });
    } else {
        $("#CategoryTable").find("tbody").find("#ajaxLoader").empty();
    }

    return false;
}

function LoadCategoryAttributeAddForm() {
    var url = document.location.origin + $("#BaseURL").val() + "/categoryAttributes/findAllByCategoryId.json";
    var id = $('#CategoryAddForm').find('#CategoryParentId').val();
    $.getJSON(url, { id: id })
        .done(function (data) {
            if (typeof data != 'undefined') {
                if (data.hasAttribute) {
                    var html = '';
                    $.each(data.Attributes, function (i, attrObj) {
                        var select = '';
                        $.each(data.CategoryAttributes, function (i, tempObj) {
                            if (attrObj.Attribute.id == tempObj.CategoryAttribute.attribute_id)
                                select = 'selected';
                        });
                        html += '<option ' + select + ' name="data[Category][attribute_id][' + attrObj.Attribute.id + ']" value="' + attrObj.Attribute.id + '">' + attrObj.Attribute.name + '</option>';
                    });
                    $("#CategoryAddForm").find("#CategoryAttribute").html(html);
                } else {
                    var html = '';
                    $.each(data.Attributes, function (i, attrObj) {
                        html += '<option name="data[Category][attribute_id][' + attrObj.Attribute.id + ']" value="' + attrObj.Attribute.id + '">' + attrObj.Attribute.name + '</option>';
                    });
                    $("#CategoryAddForm").find("#CategoryAttribute").html(html);
                }
            }
        }).fail(function (jqxhr, textStatus, error) {
            console.log(textStatus);
        });
}

function CategoryAttrEditFormOnSubmit(form) {
    $(form).find('button[type=submit]').addClass('btn-warning').data('loading-text', '<i class="icon-save"></i> Saving...').button('loading');

    var formData = $(form).serialize();
    var formUrl = $(form).attr('action');
    var $btn = $("#CategoryAttributeEditForm").find('button[type=submit]');
    $.ajax({
        type: 'POST',
        url: formUrl,
        data: formData,
        dataType: "json",
        success: function (data, textStatus, xhr) {
            console.log(data.response.message);
            $btn.addClass('btn-success').data('loading-text', '<i class="icon-save"></i> Saved').button('loading');
            GLOBAL_VAR.editAttrHasChange = true;
        },
        error: function (xhr, textStatus, error) {
            $btn.addClass('btn-danger').data('loading-text', '<i class="icon-save"></i> Error').button('loading');
            alert(textStatus);
        }
    });
}

function CategoryAttrOnChange() {
    $("#CategoryAttributeEditForm")
        .find('button[type=submit]')
        .removeClass('btn-warning btn-danger btn-success')
        .button('reset')
        .html('<i class="icon-save"></i> Save');
}

function ajaxLoader(position) {
    if (typeof (position) != 'undefined') {
        var loaderElm = '<div id="ajaxLoader" class="progress progress-striped active"><div class="bar" style="width: 100%;">Loading...</div></div>';
        $(position).empty().html(loaderElm);
    } else {
        return false;
    }
}

function replaceLastFormURL(element, replace) {
	var url = $(element).attr('action');
	var value = url.substring(url.lastIndexOf('/') + 1);
	$(element).attr('action', url.replace(value, replace));
}