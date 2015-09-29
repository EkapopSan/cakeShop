var ProductAddController = {
    currentAttrId: null,
    currentInputAttrId: null
}

$(function () {
    /*
	* Dynatree Plug-in
	* Configurations and Handle
	* 
	*/
    $("#tree").dynatree({
        minExpandLevel: 2,
        clickFolderMode: 1,
        onActivate: function (node) {
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

    $('#modalChooseCategory')
        .on('show.bs.modal', function (e) {
            $("label[for=ProductCategoryId]").remove();
        }).on('hidden.bs.modal', function (e) {
            //to do something...
        });

    $('#modalAttrPickup')
        .on('show.bs.modal', function (e) {
        Pickup(ProductAddController.currentInputAttrId);
    }).on('hidden.bs.modal', function (e) {
        $('#modalAttrPickup').find('.modal-body').empty();
    });

    $('#ProductAddForm').validate({
        ignore: [],
        rules: {
            "data[Product][category_id]": {
                required: true,
                number: true,
                min: 1
            },
            "data[Product][name]": {
                required: true
            },
            "data[Product][price]": {
                required: true,
                number: true,
                min: 0
            }
        },
        messages: {
            'data[Product][category_id]': 'Please select category before.!'
        },
        submitHandler: function (form) {
            $("#addConfirm").modal("show");
            $("#addConfirm").find('button[type=submit]').on('click', function () {
                form.submit();
            });
            return false;
        },
        success: function () {
        }
    });
});

function modalCategoryOnSubmit() {
    var navCategory = '';
    function navigateNode(node) {
        if (node.data.key > 0) {
            var separate = ' <i class="icon-share-alt"></i> ';
            if (navCategory == '') separate = '';
            navCategory = '<h4 style="display:inline; color:#2C5E7B;">' + node.data.title + '</h4>' + separate + navCategory;
            navigateNode(node.parent);
        } else {
            return false;
        }
    }

    var node = $("#tree").dynatree("getTree").getActiveNode();
    navigateNode(node);

    loadCategoryAttribute(node.data.key);
    $("#ProductCategoryId").val(node.data.key);
    $("#CategoryName").html(navCategory);
}

function loadCategoryAttribute(categoryId) {
    if (categoryId > 0) {
        var url = document.location.origin + $("#BaseURL").val() + "/categoryAttributes/findAttributeByCategoryId.json";
        $.getJSON(url, { id: categoryId }).done(function (data) {
            var html = '';
            $(data.CategoryAttributes).each(function (index, obj) {
                html += '<div class="control-group">';
                html += '<label for="' + obj.Attribute.name + '" class="control-label">' + obj.Attribute.name + '</label>';
                html += '<div class="controls">';
                html += '<div class="input-append">';
                html += '<input type="hidden" name="data[ProductAttributes][' + obj.Attribute.id + '][category_attribute_id]" value="' + obj.CategoryAttribute.id + '"> ';
                html += '<input type="text" id="attr-id-' + obj.Attribute.id + '" name="data[ProductAttributes][' + obj.Attribute.id + '][value]" placeholder="' + obj.Attribute.description + '" class="input-xlarge autocomplete" attr-id="' + obj.Attribute.id + '"> ';
                html += '<a class="btn btn-default"  data-toggle="modal" data-target="#modalAttrPickup" alt="pickup attribute" onclick="ProductAddController.currentInputAttrId = ' + obj.Attribute.id + '" ><i class="icon icon-magnet"></i></a>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
            });

            if (html !== '') {
                $('#attribute-list').html(html);
            } else {
                $('#attribute-list').html('');
            }

            autoPickup($('.autocomplete'));

        }).fail(function (jqxhr, textStatus, error) {
            console.log(jqxhr);
        });
    } else {
        $('#attribute-list').empty();
        return false;
    }
}

function Pickup(attr_id) {
    var url = document.location.origin + $("#BaseURL").val() + "/productAttributes/pickup.json";
    $.getJSON(url, { attr_id: attr_id }).done(function (data) {
        var html = '';
        $(data).each(function (index, obj) {
            if (index === 0) html += '<ul class="nav nav-list">';
            html += '<li><a onclick="setAttrValue(' + obj.value + ')">' + obj.value + '</a></li>';
            if (index === data.length) html += '</ul>';
        });
        $('#modalAttrPickup').find('.modal-body').html(html);
    });
}

function setAttrValue(value) {
    $('#attr-id-' + ProductAddController.currentInputAttrId).val(value);
    $('#modalAttrPickup').modal('hide');
}

function autoPickup(elem) {
    $(elem).autocomplete({
        search: function (event, ui) {
            ProductAddController.currentAttrId = $(this).attr('attr-id');;
        },
        source: function (request, response) {
            $.ajax({
                url: document.location.origin + $("#BaseURL").val() + "/productAttributes/autoPickup.json",
                dataType: "json",
                data: {
                    attr_id: function () {
                        if (ProductAddController.currentAttrId !== null) return ProductAddController.currentAttrId
                    },
                    value: request.term
                },
                success: function (data) {
                    ProductAddController.currentAttrId = null;
                    response(data);
                }
            });
        }
    });
}