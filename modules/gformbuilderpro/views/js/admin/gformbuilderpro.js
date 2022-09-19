/**
* This is main js file. Don't edit the file if you want to update module in future.
* 
* @author    Globo Software Solution JSC <contact@globosoftware.net>
* @copyright 2015 GreenWeb Team
* @link	     http://www.globosoftware.net
* @license   please read license in file license.txt
*/
if (typeof PS_ALLOW_ACCENTED_CHARS_URL == 'undefined') PS_ALLOW_ACCENTED_CHARS_URL = 0;
function copyToClipboard(text) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(text).select();
  document.execCommand("copy");
  $temp.remove();
  showSuccessMessage(copyToClipboard_success);      
}
function changeSildeValue(){
    minval = parseInt($('#minval').val(), 10);
    if(isNaN(minval)){
        minval = 0;
    }
    $('#minval').val(minval);
    maxval = parseInt($('#maxval').val(), 10);
    if(isNaN(maxval) || maxval <= minval){
        maxval = minval+1;
    }
    $('#maxval').val(maxval);
    rangeval = parseInt($('#rangeval').val(), 10);
    if(isNaN(rangeval) || rangeval < 1){
        rangeval = 1;
    }
    $('#rangeval').val(rangeval);
    if($('#multi_on').is(':checked')){
        defaultval = $('#defaultval').val();
        defaultvals = defaultval.split(';');
        defaultmin = minval;
        defaultmax = maxval;
        if (defaultvals.length > 0){
            defaultmin = parseInt(defaultvals[0], 10);
            if(isNaN(defaultmin) || defaultmin < minval || defaultmin > maxval){
                defaultmin = Math.floor((minval + maxval)/2);
            }
        }
        if (defaultvals.length > 1){
            defaultmax = parseInt(defaultvals[1], 10);
            if(isNaN(defaultmax) || defaultmax < minval || defaultmax > maxval){
                defaultmax = Math.ceil((minval + maxval)/2);
            }
        }
        $('#defaultval').val(defaultmin+';'+defaultmax);
        $('#slidervalue').val(minval+';'+maxval+';'+rangeval+';'+defaultmin+';'+defaultmax);
    }else{
        defaultval = parseInt($('#defaultval').val(), 10);
        if(isNaN(defaultval) || defaultval < minval || defaultval > maxval){
            defaultval = Math.floor((minval + maxval)/2);
        }
        $('#defaultval').val(defaultval);
        $('#slidervalue').val(minval+';'+maxval+';'+rangeval+';'+defaultval);
    }
}
$(document).ready(function(){
    $('.add_multival_newval').live('click',function(){
        rel = $(this).parents('.multival_box').attr('rel');
        default_val = $('#multival_'+rel+' .multival_newval_'+default_language).val();
        if(default_val == ''){
            /* get other data val*/
            $.each(languages,function(key,val){
                default_val = $('#multival_'+rel+' .multival_newval_'+val.id_lang).val();
                if(default_val != '') return false;
            })
        }
        
        if(default_val == ''){
            $('#multival_'+rel+' .value_invalid').stop().slideDown(500);
        }else{
            $('#multival_'+rel+' .value_invalid').slideUp(500);
            if($(this).hasClass('updatebt')){
                /*update*/
                $.each(languages,function(key,val){
                    _val = $('#multival_'+rel+' .multival_newval_'+val.id_lang).val();
                    if(_val == '') _val = default_val;
                    $('#multival_'+rel+' .multival.inedit .lang-'+val.id_lang).html(_val);
                });
                $('#multival_'+rel+' .cancel_multival_newval').slideUp(500);
                $('#multival_'+rel+' .updatelabel').css('display','none');
                $('#multival_'+rel+' .addlabel').css('display','inline-block');
                $.each(languages,function(key,val){
                    $('#multival_'+rel+' .multival_newval_'+val.id_lang).val('');
                });
                $('#multival_'+rel+' .multival').removeClass('inedit');
                $('#multival_'+rel+' .add_multival_newval').removeClass('updatebt');
            }else{
                /*add new*/
                new_val = '<div class="multival">';
                    $.each(languages,function(key,val){
                        
                        new_val+='<div class="translatable-field lang-'+val.id_lang+'" ';
                        if(id_language != val.id_lang) new_val+=' style="display:none"';
                        new_val+='>';
                        
                        newval = $('.multival_newval_'+val.id_lang).val();
                        if(newval == '') newval = default_val;
                        new_val+=newval;
                        new_val+='</div>';
                    });
                new_val +=$('#multival_'+rel+' .multival_action_wp').html();
                new_val += '</div>';
                $(new_val).appendTo($('#multival_'+rel+' .multival_wp'));
                $.each(languages,function(key,val){
                    $('#multival_'+rel+' .multival_newval_'+val.id_lang).val('');
                });
            }
        }
        return false;
    });
    $('.multival_edit').live('click',function(){
        rel = $(this).parents('.multival_box').attr('rel');
        $('#multival_'+rel+' .multival').removeClass('inedit');
        $(this).parents('.multival').addClass('inedit');
        $.each(languages,function(key,val){
            $('#multival_'+rel+' .multival_newval_'+val.id_lang).val($('#multival_'+rel+' .multival.inedit .lang-'+val.id_lang).text());
        });
        $('#multival_'+rel+' .cancel_multival_newval').slideDown(500);
        $('#multival_'+rel+' .updatelabel').css('display','inline-block');
        $('#multival_'+rel+' .addlabel').css('display','none');
        $('#multival_'+rel+' .add_multival_newval').addClass('updatebt');
        $('#multival_'+rel+' .value_invalid').slideUp(500);
        return false;
    });
    $('.cancel_multival_newval').live('click',function(){
        rel = $(this).parents('.multival_box').attr('rel');
        $('#multival_'+rel+' .updatelabel').css('display','none');
        $('#multival_'+rel+' .addlabel').css('display','inline-block');
        $.each(languages,function(key,val){
            $('#multival_'+rel+' .multival_newval_'+val.id_lang).val('');
        });
        $('#multival_'+rel+' .multival').removeClass('inedit');
        $('#multival_'+rel+' .add_multival_newval').removeClass('updatebt');
        $('#multival_'+rel+' .cancel_multival_newval').slideUp(500);
        $('#multival_'+rel+' .value_invalid').slideUp(500);
        return false;
    });
    $('.multival_delete').live('click',function(){
        $(this).parents('.multival').remove();
        return false;
    });
    $('.formbuilder_minify').live('click',function(){
        itemfield_wp = $(this).parents('.formbuilder_group');
        if(itemfield_wp.hasClass('has_minify')){
            itemfield_wp.removeClass('has_minify');
        }else{
            itemfield_wp.addClass('has_minify');
        }
        return false;
    });
    $('#gformbuilderpro_change_status').change(function(){
        val = $(this).val();
        id = $(this).attr('rel');
        $.ajax({
            url: currentIndex +'&token='+token+'&changeStatus=1&id='+id+'&val='+val,
            type: 'POST',
            dataType: 'json',
            success: function(datas) {
                if(datas.success){
                    showSuccessMessage(datas.warrning); 
                }else{
                    showErrorMessage(datas.warrning); 
                }
            }
        });
        
    });
    
    if(typeof psversion15 === 'undefined'){ 
    }else 
    if(psversion15 == -1){
        $('body').addClass('psversion15');
    }
    gformbuilderpro_overlay = '<div id="gformbuilderpro_overlay"><div class="container"><div class="content"><div class="circle"></div></div></div></div></div>';
    var selectedProduct;
    var beforeShow_call = 0;
    $("#popup_field_config_link").fancybox({
        'closeBtn' : false ,
        helpers: {
            overlay: { closeClick: false } //Disable click outside event
        },
        'beforeShow': function(){
            beforeShow_call = 1;
            default_config = {
        		selector: ".textareatiny" ,
        		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor anchor",
        		browser_spellcheck : true,
        		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,anchor,|,media,image",
        		toolbar2: "",
        		external_filemanager_path: ad+"/filemanager/",
        		filemanager_title: "File manager" ,
        		external_plugins: { "filemanager" : ad+"/filemanager/plugin.min.js"},
        		language: iso,
        		skin: "prestashop",
        		statusbar: false,
        		relative_urls : false,
        		convert_urls: false,
        		entity_encoding: "raw",
        		extended_valid_elements : "em[class|name|id]",
        		valid_children : "+*[*]",
        		valid_elements:"*[*]",
        		menu: {
        			edit: {title: 'Edit', items: 'undo redo | cut copy paste | selectall'},
        			insert: {title: 'Insert', items: 'media image link | pagebreak'},
        			view: {title: 'View', items: 'visualaid'},
        			format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
        			table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
        			tools: {title: 'Tools', items: 'code'}
        		}
        	};
	       tinyMCE.init(default_config);
           
        $('.mColorPickerInput').mColorPicker();  
        
        if($('#loadjqueryselect2').val() == '1'){   
            $('#curPackItemName').select2({
        			placeholder: search_product_msg,
        			minimumInputLength: 2,
        			width: '100%',
        			dropdownCssClass: "bootstrap",
        			ajax: {
        				url:$('#ajaxaction').val(),
        				dataType: 'json',
        				data: function (term) {
        					return {
        						q: term,
                                gformgetproduct: true
        					};
        				},
        				results: function (data) {
        					var excludeIds = getSelectedIds();
        					var returnIds = new Array();
        					if (data) {
        						for (var i = data.length - 1; i >= 0; i--) {
        							var is_in = 0;
        							for (var j = 0; j < excludeIds.length; j ++) {
        								if (data[i].id == excludeIds[j][0] && (typeof data[i].id_product_attribute == 'undefined' || data[i].id_product_attribute == excludeIds[j][1]))
        									is_in = 1;
        							}
        							if (!is_in)
        								returnIds.push(data[i]);
        						}
        						return {
        							results: returnIds
        						}
        					} else {
        						return {
        							results: []
        						}
        					}
        				}
        			},
        			formatResult: productFormatResult,
        			formatSelection: productFormatSelection,
        		})
        		.on("select2-selecting", function(e) {
        			selectedProduct = e.object
        		});
                $('#add_pack_item').on('click', addPackItem);
          }else{
                    $('#curPackItemName').autocomplete('ajax_products_list.php', {
                		delay: 100,
                		minChars: 1,
                		autoFill: true,
                		max:20,
                		matchContains: true,
                		mustMatch:true,
                		scroll:false,
                		cacheLength:0,
                		// param multipleSeparator:'||' ajouté à cause de bug dans lib autocomplete
                		multipleSeparator:'||',
                		formatItem: function(item) {
                			return item[1]+' - '+item[0];
                		},
                		extraParams: {
                			excludeIds : getSelectedIds(),
                			excludeVirtuals : 1,
                			exclude_packs: 1
                		}
                	}).result(function(event, item){
                		$('#curPackItemId').val(item[1]);
                	});
                    $('#add_pack_item').on('click', addPackItem);
                }
            },
            'onComplete': function(){
            if(beforeShow_call !=1){
                
            beforeShow_call = 0;
            default_config = {
        		selector: ".textareatiny" ,
        		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor anchor",
        		browser_spellcheck : true,
        		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,anchor,|,media,image",
        		toolbar2: "",
        		external_filemanager_path: ad+"/filemanager/",
        		filemanager_title: "File manager" ,
        		external_plugins: { "filemanager" : ad+"/filemanager/plugin.min.js"},
        		language: iso,
        		skin: "prestashop",
        		statusbar: false,
        		relative_urls : false,
        		convert_urls: false,
        		entity_encoding: "raw",
        		extended_valid_elements : "em[class|name|id]",
        		valid_children : "+*[*]",
        		valid_elements:"*[*]",
        		menu: {
        			edit: {title: 'Edit', items: 'undo redo | cut copy paste | selectall'},
        			insert: {title: 'Insert', items: 'media image link | pagebreak'},
        			view: {title: 'View', items: 'visualaid'},
        			format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
        			table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
        			tools: {title: 'Tools', items: 'code'}
        		}
        	};
	       tinyMCE.init(default_config);
           
        $('.mColorPickerInput').mColorPicker();  
        
        if($('#loadjqueryselect2').val() == '1'){   
            $('#curPackItemName').select2({
        			placeholder: search_product_msg,
        			minimumInputLength: 2,
        			width: '100%',
        			dropdownCssClass: "bootstrap",
        			ajax: {
        				url:$('#ajaxaction').val(),
        				dataType: 'json',
        				data: function (term) {
        					return {
        						q: term,
                                gformgetproduct: true
        					};
        				},
        				results: function (data) {
        					var excludeIds = getSelectedIds();
        					var returnIds = new Array();
        					if (data) {
        						for (var i = data.length - 1; i >= 0; i--) {
        							var is_in = 0;
        							for (var j = 0; j < excludeIds.length; j ++) {
        								if (data[i].id == excludeIds[j][0] && (typeof data[i].id_product_attribute == 'undefined' || data[i].id_product_attribute == excludeIds[j][1]))
        									is_in = 1;
        							}
        							if (!is_in)
        								returnIds.push(data[i]);
        						}
        						return {
        							results: returnIds
        						}
        					} else {
        						return {
        							results: []
        						}
        					}
        				}
        			},
        			formatResult: productFormatResult,
        			formatSelection: productFormatSelection,
        		})
        		.on("select2-selecting", function(e) {
        			selectedProduct = e.object
        		});
                $('#add_pack_item').on('click', addPackItem);
          }else{
                    $('#curPackItemName').autocomplete('ajax_products_list.php', {
                		delay: 100,
                		minChars: 1,
                		autoFill: true,
                		max:20,
                		matchContains: true,
                		mustMatch:true,
                		scroll:false,
                		cacheLength:0,
                		// param multipleSeparator:'||' ajouté à cause de bug dans lib autocomplete
                		multipleSeparator:'||',
                		formatItem: function(item) {
                			return item[1]+' - '+item[0];
                		},
                		extraParams: {
                			excludeIds : getSelectedIds(),
                			excludeVirtuals : 1,
                			exclude_packs: 1
                		}
                	}).result(function(event, item){
                		$('#curPackItemId').val(item[1]);
                	});
                    $('#add_pack_item').on('click', addPackItem);
                }
            }
          }
    });
    function productFormatResult(item) {
		itemTemplate = "<div class='media'>";
		itemTemplate += "<div class='pull-left'>";
		itemTemplate += "<img class='media-object' width='40' src='" + item.image + "' alt='" + item.name + "'>";
		itemTemplate += "</div>";
		itemTemplate += "<div class='media-body'>";
		itemTemplate += "<h4 class='media-heading'>" + item.name + "</h4>";
		itemTemplate += "</div>";
		itemTemplate += "</div>";
		return itemTemplate;
	}
    function productFormatSelection(item) {
			return item.name;
		}
    function delGformproductItem(id) {

			var reg = new RegExp(',', 'g');
			var input = $('#inputPackItems');
			var name = $('#namePackItems');

			var inputCut = input.val().split(reg);
			input.val(null);
			name.val(null);
			for (var i = 0; i < inputCut.length; ++i)
				if (inputCut[i]) {
					if (inputCut[i] != id) {
						input.val( input.val() + inputCut[i] + ',' );
					}
				}
			var elem = $('.product-pack-item[data-product-id="' + id + '"]');
			elem.remove();
		}
    function getSelectedIds()
		{
			var reg = new RegExp(',', 'g');
			var input = $('#inputPackItems');
			if (input.val() === undefined)
				return '';
			var inputCut = input.val().split(reg);
			if($('#loadjqueryselect2').val() == '1')
			     return inputCut;
            else{
                return inputCut.join(',');
            }
		}
    
		function addPackItem() {
		  if($('#loadjqueryselect2').val() == '1'){
			if (selectedProduct) {
				if (typeof selectedProduct.id_product_attribute === 'undefined')
					selectedProduct.id_product_attribute = 0;

				var divContent = $('#divPackItems').html();
				divContent += '<div class="product-pack-item media-product-pack" data-product-name="' + selectedProduct.name + '" data-product-id="' + selectedProduct.id + '">';
				divContent += '<img class="media-product-pack-img" src="' + selectedProduct.image +'"/>';
				divContent += '<span class="media-product-pack-title">' + selectedProduct.name + '</span>';
				divContent += '<button type="button" class="btn btn-default delGformproductItem media-product-pack-action" data-delete="' + selectedProduct.id + '"><i class="icon-trash"></i></button>';
				divContent += '</div>';
				var line = selectedProduct.id;
				var lineDisplay = selectedProduct.name;

				$('#divPackItems').html(divContent);
				$('#inputPackItems').val($('#inputPackItems').val() + line  + ',');
                
				$('.delGformproductItem').live('click', function(e){
					e.preventDefault();
					e.stopPropagation();
					delGformproductItem($(this).data('delete'));
                    return false;
				})
				selectedProduct = null;
				$('#curPackItemName').select2("val", "");
				$('.pack-empty-warning').hide();
			} else {
				return false;
			}
            }else{
                curPackItemId = $('#curPackItemId').val();
                curPackItemName = $('#curPackItemName').val();
                if(curPackItemId > 0){
                    var divContent = $('#divPackItems').html();
    				divContent += '<div class="product-pack-item media-product-pack" data-product-name="' + curPackItemName + '" data-product-id="' + curPackItemId + '">';
    				divContent += '<span class="media-product-pack-title">' + curPackItemName + '</span>';
    				divContent += '<button type="button" class="btn btn-default delGformproductItem media-product-pack-action" data-delete="' + curPackItemId + '"><i class="icon-trash"></i></button>';
    				divContent += '</div>';
                    $('#divPackItems').html(divContent);
                    $('#inputPackItems').val($('#inputPackItems').val() + curPackItemId  + ',');
                    $('#curPackItemId').val('');
                    $('#curPackItemName').val('');
                    $('#curPackItemName').setOptions({
        				extraParams: {
        					excludeIds :  getSelectedIds()
        				}
        			});
                }
            }
		}  
        $('.delGformproductItem').live('click', function(){
			delGformproductItem($(this).data('delete'));
            return false;
		})  
    function clearBeforeSave(){
        content = $('#formbuilder').clone();
        content.find('.itemfield_wp').removeClass('ui-sortable');
        content.find('.itemfield').removeAttr('style').removeClass('ui-draggable');
        content.find('.control_box_wp').remove();
        $('#formbuilder_content').html(content.html());
        var myString = content.html();
        var returnIds = [];
        var pattern = /\[gformbuilderpro:(\d+)\]/gi;
        var match;
        while (match = pattern.exec(myString)){
            id_match = parseInt(match[1]);
            returnIds.push(id_match);
        }
        $('#fields').val(returnIds.join());
    }
    function addControlBt(field,width,widthsm,widthxs){
        if(field.hasClass('formbuilder_group'))
            control = $('#control_group').clone();
        else
            control = $('#control_box').clone();
        control.find('.formbuilder_group_width_md option').filter(function() {return this.value == width;}).attr('selected', 'selected').end();
        control.find('.formbuilder_group_width_sm option').filter(function() {return this.value == widthsm;}).attr('selected', 'selected').end();
        control.find('.formbuilder_group_width_xs option').filter(function() {return this.value == widthxs;}).attr('selected', 'selected').end();
        field.append(control.html());
    }
    function removeField(id_field,multi,group){
        if(id_field){
            deletefields = $('#deletefields').val();
            if(deletefields !='') 
                $('#deletefields').val(deletefields+'_'+id_field);
            else
                $('#deletefields').val(id_field);
            if(multi){
                group.remove();
            }else{
                $("#gformbuilderpro_"+id_field).remove();
            }
        }else{
            if(multi)
                group.remove();
        }
    }
    $('#add_thumb_item_fromlist').live('click',function(){
        formURL = $(this).parents('form').attr('action');
        $.ajax({
            url: formURL+'&getThumb=true',
            type: 'POST',
            success: function(thumbs) {
                if(thumbs !=''){
                    divThumbItems = '';
                    thumbsdata = thumbs.split(',');
                    $.each(thumbsdata, function( index, value ) {
                        divThumbItems += '<div class="gthumb_item">';
                        divThumbItems += '<img src="'+$('#thumb_url').val()+value+'" alt="">';
                        divThumbItems += '<input type="checkbox" name="item_fromlist[]" value="'+value+'" class="item_fromlist" />';
                        divThumbItems += '</div>';
                    });
                    $('#thumbs_fromlist').html(divThumbItems);
                }
            }
        });
        return false;
    });
    $('#add_thumb_item').live('click',function(){
        thumbs = $('#thumbchoose').val();
        thumbsdata = [];
        if(thumbs !=''){
            thumbsdata = thumbs.split(',');
        }
        if($('.item_fromlist').length > 0){
            $('.item_fromlist').each(function(){
                if(this.checked){
                    
                    item_fromlist_val = $(this).val();
                    thumbsdata = $.grep(thumbsdata, function(val) {
                        return item_fromlist_val != val;
                    });
                    thumbsdata.push(item_fromlist_val);
                }
            })
        }
        var filedata = $("#imagethumbupload").prop("files");
        formURL = $(this).parents('form').attr('action');
        if (window.FormData !== undefined) {
            var formData = new FormData();
            len = filedata.length;
            if(len > 0){
                for (var i = 0; i < len; i++) {
                        formData.append("file[]", filedata[i]);
                }
                $.ajax({
                    url: formURL+'&addThumb=true',
                    type: 'POST',
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {
                        if(data !=''){
                            datas = data.split(',');
                            
                            $.each(datas, function( index, value ) {
                                thumbsdata = $.grep(thumbsdata, function(val) {
                                  return value != val;
                                });
                                thumbsdata.push(value);
                            });
                            _allfields = thumbsdata.join(',');
                            if(_allfields.charAt(0) == ',')
                                $('#thumbchoose').val(_allfields.slice(1));
                            else
                                $('#thumbchoose').val(_allfields);
                            divThumbItems = '';
                            $.each(thumbsdata, function( index, value ) {
                                divThumbItems += '<div class="gthumb_item">';
                                divThumbItems += '<img src="'+$('#thumb_url').val()+value+'" alt="">';
                                divThumbItems += '<button type="button" class="btn btn-default delThumbItem" data-delete="'+value+'"><span><i class="icon-trash"></i></button>';
                                divThumbItems += '</div>';
                            });
                            $('#divThumbItems').html(divThumbItems);
                            $("#imagethumbupload").val('');
                            $('#thumbs_fromlist').html('');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        var err = eval("(" + jqXHR.responseText + ")");
                        alert(err.Message);
                        
                    }
                });
            }else{
                _allfields = thumbsdata.join(',');
                if(_allfields.charAt(0) == ',')
                    $('#thumbchoose').val(_allfields.slice(1));
                else
                    $('#thumbchoose').val(_allfields);
                divThumbItems = '';
                $.each(thumbsdata, function( index, value ) {
                    divThumbItems += '<div class="gthumb_item">';
                    divThumbItems += '<img src="'+$('#thumb_url').val()+value+'" alt="">';
                    divThumbItems += '<button type="button" class="btn btn-default delThumbItem" data-delete="'+value+'"><span><i class="icon-trash"></i></button>';
                    divThumbItems += '</div>';
                });
                $('#divThumbItems').html(divThumbItems);
                $("#imagethumbupload").val('');
                $('#thumbs_fromlist').html('');
            }
        }
        return false;
    });
    $('.delThumbItem').live('click',function(){
        data = $(this).data('delete');
        thumbs = $('#thumbchoose').val();
        thumbsdata = [];
        if(thumbs !=''){
            thumbsdata = thumbs.split(',');
        }
        thumbsdata = $.grep(thumbsdata, function(val) {
          return data != val;
        });
        _allfields = thumbsdata.join(',');
        if(_allfields.charAt(0) == ',')
            $('#thumbchoose').val(_allfields.slice(1));
        else
            $('#thumbchoose').val(_allfields);
        divThumbItems = '';
        $.each(thumbsdata, function( index, value ) {
            divThumbItems += '<div class="gthumb_item">';
            divThumbItems += '<img src="'+$('#thumb_url').val()+value+'" alt="">';
            divThumbItems += '<button type="button" class="btn btn-default delThumbItem" data-delete="'+value+'"><span><i class="icon-trash"></i></button>';
            divThumbItems += '</div>';
        });
        $('#divThumbItems').html(divThumbItems);
        return false;
    });
    $('#add_color_item').live('click',function(){
        data = $('.mColorPickerinput').val();
        if(data !='' && /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(data)){
            colors = $('#colorchoose').val();
            colorsdata = [];
            if(colors !=''){
                colorsdata = colors.split(',');
            }
            colorsdata = $.grep(colorsdata, function(value) {
              return value != data;
            });
            colorsdata.push(data);
            _allfields = colorsdata.join(',');
            if(_allfields.charAt(0) == ',')
                $('#colorchoose').val(_allfields.slice(1));
            else
                $('#colorchoose').val(_allfields);
            divColorItems = '';
            
            $.each(colorsdata, function( index, value ) {
                divColorItems += '<div style="background-color: '+value+';" class="color_item">';
                divColorItems += '<button type="button" class="btn btn-default delColorItem" data-delete="'+value+'"><span><i class="icon-trash"></i> '+value+'</button>';
                divColorItems += '</div>';
            });
            $('#divColorItems').html(divColorItems);
        }
        return false;
    });
    $('.delColorItem').live('click',function(){
            data = $(this).data('delete');
            colors = $('#colorchoose').val();
            colorsdata = [];
            if(colors !=''){
                colorsdata = colors.split(',');
            }
            colorsdata = $.grep(colorsdata, function(value) {
              return value != data;
            });
            _allfields = colorsdata.join(',');
            if(_allfields.charAt(0) == ',')
                $('#colorchoose').val(_allfields.slice(1));
            else
                $('#colorchoose').val(_allfields);
            divColorItems = '';
            
            $.each(colorsdata, function( index, value ) {
                divColorItems += '<div style="background-color: '+value+';" class="color_item">';
                divColorItems += '<button type="button" class="btn btn-default delColorItem" data-delete="'+value+'"><span><i class="icon-trash"></i> '+value+'</button>';
                divColorItems += '</div>';
            });
            $('#divColorItems').html(divColorItems);
            return false;
    });
    
    $('#formbuilder .itemfield').each(function(){
        width = $(this).attr("class").match(/col-md-(\d*)/)[1];
        widthsm = $(this).attr("class").match(/col-sm-(\d*)/)[1];
        widthxs = $(this).attr("class").match(/col-xs-(\d*)/)[1];
        if(width < 1 || width > 12 || width == '') width = 12;
        if(widthsm < 1 || widthsm > 12 || widthsm == '') widthsm = 12;
        if(widthxs < 1 || widthxs > 12 || widthxs == '') widthxs = 12;
        addControlBt($(this),width,widthsm,widthxs);
    });
    $('#formbuilder .formbuilder_group').each(function(){
        width = $(this).attr("class").match(/col-md-(\d*)/)[1];
        widthsm = $(this).attr("class").match(/col-sm-(\d*)/)[1];
        widthxs = $(this).attr("class").match(/col-xs-(\d*)/)[1];
        if(width < 1 || width > 12 || width == '') width = 12;
        if(widthsm < 1 || widthsm > 12 || widthsm == '') widthsm = 12;
        if(widthxs < 1 || widthxs > 12 || widthxs == '') widthxs = 12;
        addControlBt($(this),width,widthsm,widthxs);
    });
    if($("#formbuilder").length > 0)
    $("#formbuilder").sortable({
        opacity:0.5,
        cursor:'move',
        handle: '.formbuilder_move',
        update:function() {
            clearBeforeSave();
        },
    });
    if($(".itemfield_wp").length > 0)
    $(".itemfield_wp").sortable({
        connectWith: '.itemfield_wp',
        handle: '.formbuilder_move',
        opacity:0.5,
        cursor:'move',
        update: function(event, ui) {
            clearBeforeSave();
        },
        beforeStop: function (event, ui) { 
          newItem = ui.item;
        },
        receive: function(event,ui) {
            type = newItem.data('type');
            newitem = ui.item.data('newitem');
            if(newitem=='1'){
                width = newItem.attr("class").match(/col-md-(\d*)/)[1];
                widthsm = newItem.attr("class").match(/col-sm-(\d*)/)[1];
                widthxs = newItem.attr("class").match(/col-xs-(\d*)/)[1];
                if(width < 1 || width > 12 || width == '') width = 12;
                if(widthsm < 1 || widthsm > 12 || widthsm == '') widthsm = 12;
                if(widthxs < 1 || widthxs > 12 || widthxs == '') widthxs = 12;
                addControlBt(newItem,width,widthsm,widthxs);
                newItem.removeAttr('data-newitem');
                $(gformbuilderpro_overlay).appendTo('body');
                $.ajax({
                      url: $('#ajaxurl').val(),
                      type : 'POST',                      
                      data: 'typefield='+type,
                })
                .done(function(data) {
                    $('#gformbuilderpro_overlay').remove();
                    if(data !=''){
                        $("#popup_field_config #content").html(data);
                        $("#popup_field_config_link").click();
                        newItem.attr('id','newfield'); 
                    }else{
                        newItem.remove();
                    }
                });
            }
        }
    }); 
    
    $('#addnewgroup').click(function(){
        group_width_default = $('#group_width_default').val();
        if(group_width_default > 12 || group_width_default < 1 || group_width_default == '') group_width_default = 12;
        control = $('#control_group').clone();
        control.find('.formbuilder_group_width option')
        .filter(function() { 
            return this.value == group_width_default;
        })
        .attr('selected', 'selected') 
        .end();
        newgroup = '<div class="formbuilder_group col-md-'+group_width_default+' col-sm-12 col-xs-12"><div class="itemfield_wp row"></div>'+control.html()+'</div>';
        $('#formbuilder').append(newgroup);
        $('.itemfield_wp').each(function(){
            if(!$(this).hasClass('ui-sortable')){
                $(this).sortable({
                    connectWith: '.itemfield_wp',
                    handle: '.formbuilder_move',
                    opacity:0.5,
                    cursor:'move',
                    update: function(event, ui) {
                        clearBeforeSave();
                    },
                    beforeStop: function (event, ui) { 
                      newItem = ui.item;
                    },
                    receive: function(event,ui) {
                        type = newItem.data('type');
                        newitem = ui.item.data('newitem');
                        if(newitem){
                            width = newItem.attr("class").match(/col-md-(\d*)/)[1];
                            widthsm = newItem.attr("class").match(/col-sm-(\d*)/)[1];
                            widthxs = newItem.attr("class").match(/col-xs-(\d*)/)[1];
                            if(width < 1 || width > 12 || width == '') width = 12;
                            if(widthsm < 1 || widthsm > 12 || widthsm == '') widthsm = 12;
                            if(widthxs < 1 || widthxs > 12 || widthxs == '') widthxs = 12;
                            addControlBt(newItem,width,widthsm,widthxs);
                            newItem.removeAttr('data-newitem');
                            $(gformbuilderpro_overlay).appendTo('body');
                            $.ajax({
                                  url: $('#ajaxurl').val(),
                                  type : 'POST',                      
                                  data: 'typefield='+type,
                            })
                            .done(function(data) {
                                $('#gformbuilderpro_overlay').remove();
                                if(data !=''){
                                    $("#popup_field_config #content").html(data);
                                    $("#popup_field_config_link").click();
                                    newItem.attr('id','newfield'); 
                                }else{
                                    newItem.remove();
                                }
                            });
                        }
                    }
                }); 
            }
        })
        $("#formbuilder").sortable("refresh");
        $(".itemfield_wp").sortable("refresh");
    });
    $('#addnewgroupbreak').click(function(){
        newgroup = '<div class="formbuilder_group formbuilder_group_break col-md-12 col-sm-12 col-xs-12">'+control.html()+'</div>';
        $('#formbuilder').append(newgroup);
        $("#formbuilder").sortable("refresh");
    });
    if($("#itemfieldparent .itemfield").length > 0)
    $("#itemfieldparent .itemfield").draggable({
        connectToSortable: '.itemfield_wp',
        helper: 'clone',
        revert: 'invalid'
    });
    //edit field
    $('.formbuilder_edit').live('click',function(){
        $(gformbuilderpro_overlay).appendTo('body');
        id = $(this).parents('.itemfield').attr("id").match(/gformbuilderpro_(\d*)/)[1];
        if(id){
            $.ajax({
                  url: $('#ajaxurl').val(),
                  type : 'POST',                      
                  data: 'typefield=true&id_gformbuilderprofields='+id,
            })
            .done(function(data) {
                $('#gformbuilderpro_overlay').remove();
                if(data !=''){
                    $("#popup_field_config #content").html(data);
                    $("#popup_field_config_link").click();
                }
            });
        }
        return false;
    });
    //delete field
    $('.formbuilder_delete').live('click',function(){
        if($(this).hasClass('formbuilder_delete_group')){
            group = $(this).parents('.formbuilder_group');
            itemfields = group.find(".itemfield");
            ids = [];
            allfields = $('#fields').val().split(',');
            if(itemfields)
                itemfields.each(function(){
                    id = $(this).attr("id").match(/gformbuilderpro_(\d*)/)[1];
                    if(id>0){
                        ids.push(id);
                        allfields = $.grep(allfields, function(value) {
                          return value != id;
                        });
                        $('#fields').val(allfields);
                    } 
                });
            removeField(ids.join('_'),1,group);
        }else{
            id = $(this).parents('.itemfield').attr("id").match(/gformbuilderpro_(\d*)/)[1];
            if(id){
                removeField(id,0,null);
                allfields = $('#fields').val().split(',');
                allfields = $.grep(allfields, function(value) {
                  return value != id;
                });
                $('#fields').val(allfields);
            }
        }
        return false;
    });
    $('.label_lang').attr('style','');
    $('.label_lang_'+$('#idlang_default').val()).css('display','block');
    $('button[name="addShortcode"],input[name="addShortcode"]').live('click',function(){
        if($('.slidervalue').length > 0) changeSildeValue();
        form = $(this).parents('form');
        if(form.find('.textareatiny').length > 0) tinyMCE.triggerSave();
        form.find('.alert-danger').remove();
        formok = true;
        form.find('.tagify').each(function(){
            $(this).val($(this).tagify('serialize'));
        });
        if($('.multival_wp').length > 0){
            /*
            if(languages.length > 1){*/
                $.each(languages,function(key,val){
                    if($('#multival_value').length > 0){
                        multival_wp = [];
                        $('#multival_value .multival_wp .multival').each(function(){
                            multival_wp.push($(this).find('.lang-'+val.id_lang).html());
                        });
                        $('#multival_value #value_'+val.id_lang).val(multival_wp.join());
                    }
                    if($('#multival_description').length > 0){
                        multival_wp = [];
                        $('#multival_description .multival_wp .multival').each(function(){
                            multival_wp.push($(this).find('.lang-'+val.id_lang).html());
                        });
                        $('#multival_description #description_'+val.id_lang).val(multival_wp.join());
                    }
                });
            /*
            }else{
                if($('#multival_value').length > 0){
                    multival_wp = [];
                    $('#multival_value .multival_wp .multival').each(function(){
                        multival_wp.push($(this).find('.lang-'+gdefault_language).html());
                    });
                    $('#multival_value #value').val(multival_wp.join());
                }
                if($('#multival_description').length > 0){
                    multival_wp = [];
                    $('#multival_description .multival_wp .multival').each(function(){
                        multival_wp.push($(this).find('.lang-'+gdefault_language).html());
                    });
                    $('#multival_description #description').val(multival_wp.join());
                }
            }
            */
        }
        form.find('.gvalidate_isRequired').each(function(){
            if($(this).val() == ''){
                namenolang = $(this).attr('name').split('_');
                if(namenolang.length > 1){
                    if($('input[name="'+namenolang[0]+'_'+gdefault_language+'"]').length > 0 && $('input[name="'+namenolang[0]+'_'+gdefault_language+'"]').val() !=''){
                        $(this).val($('input[name="'+namenolang[0]+'_'+gdefault_language+'"]').val());
                    }else{
                        langerror = '';
                        $.each( languages, function( index, value ){
                            if(value.id_lang == namenolang[1]){
                                langerror = '('+value.name+')';
                            }
                        });
                        if( typeof psversion15 != 'undefined' && psversion15 != -1)
                            form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+langerror+empty_danger+'</div>');
                        else 
                            form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+langerror+empty_danger+'</div>');
                        formok = false;
                    }
                }else{
                    if( typeof psversion15 != 'undefined' && psversion15 != -1)
                        form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                    else 
                        form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                    formok = false;
                }
            }
        });
        form.find('.gvalidate_isRequired2').each(function(){
            if($(this).val() == ''){
                namenolang = $(this).attr('name').split('_');
                if(namenolang.length > 1){
                    if($('input[name="'+namenolang[0]+'_'+gdefault_language+'"]').length > 0 && $('input[name="'+namenolang[0]+'_'+gdefault_language+'"]').val() !=''){
                        $(this).val($('input[name="'+namenolang[0]+'_'+gdefault_language+'"]').val());
                    }else
                        if($('#extra').val() == ''){
                            langerror = '';
                            $.each( languages, function( index, value ){
                                if(value.id_lang == namenolang[1]){
                                    langerror = '('+value.name+')';
                                }
                            });
                            if( typeof psversion15 != 'undefined' && psversion15 != -1)
                                form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+langerror+empty_danger+'</div>');
                            else
                                form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+langerror+empty_danger+'</div>');
                            formok = false;
                        }
                }else{
                    if($('#extra').val() == ''){
                        if( typeof psversion15 != 'undefined' && psversion15 != -1)
                            form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                        else
                            form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                        formok = false;
                    }
                }
                
            }
        });
        form.find('.gvalidate_isRequired3').each(function(){
            val = $(this).val();
            if($(this).val() == ''){
                if( typeof psversion15 != 'undefined' && psversion15 != -1)
                    form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                else form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                formok = false;
            }else{
                vals =val.split(',');
                if (vals[0] == "undefined") {
                    if( typeof psversion15 != 'undefined' && psversion15 != -1)
                        form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                    else form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                    formok = false;
                }else
                if (vals[1] == "undefined") {
                    if( typeof psversion15 != 'undefined' && psversion15 != -1)
                        form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                    else form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                    formok = false;
                }else
                if (vals[2] == "undefined") {
                    if( typeof psversion15 != 'undefined' && psversion15 != -1)
                        form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                    else form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                    formok = false;
                }else
                if (vals[3] == "undefined") {
                    if( typeof psversion15 != 'undefined' && psversion15 != -1)
                        form.find('.form-wrapper').append('<div class="alert alert-danger">'+$(this).parents('.form-group').find('.control-label').html()+empty_danger+'</div>');
                    else form.find('fieldset').append('<div class="alert alert-danger">'+$(this).parents('.margin-form').prev('label').html()+empty_danger+'</div>');
                    formok = false;
                }
            }
        });
        if(!formok){
            return false;
        } 
        btform =  $(this);
        btform.attr('disable','disable');
        action = form.attr('action');
        serializedForm = form.serialize();
        name = form.find('#name').val();
        labels = '';
        $.each(languages, function( index, value ) {
            labels += '<span class="label_lang label_lang_'+value.id_lang+'">'+form.find('#label_'+value.id_lang).val()+'</span>';
        });
        $(gformbuilderpro_overlay).appendTo('body');
        $.ajax({
             type: 'POST',
             url: action,
             data: serializedForm,
             async: false,
             success: function (data, textStatus, request) {
                btform.removeAttr('disable');
                $('#gformbuilderpro_overlay').remove();
                 if(data > 0){
                    $('#newfield .shortcode').html('[gformbuilderpro:'+data+']');
                    $('#newfield').removeAttr('id').attr('id','gformbuilderpro_'+data);
                    $('#gformbuilderpro_'+data).find('.feildname').html('{'+name+'}');
                    $('#gformbuilderpro_'+data).find('.feildlabel').html(labels);
                    $('.label_lang').attr('style','');
                    $('.label_lang_'+$('#idlang_default').val()).css('display','block');
                    fields =  $('#fields').val().split(',');
                    fields = $.grep(fields, function(value) {
                      return value != data;
                    });
                    fields.push(data);
                    _allfields = fields.join(',');
                    if(_allfields.charAt(0) == ',')
                        $('#fields').val(_allfields.slice(1));
                    else
                        $('#fields').val(_allfields);
                    $.fancybox.close();
                 }else{
                    alert&("Error occurred!");
                 }
             },
             error: function (req, status, error) {
                $('#gformbuilderpro_overlay').remove();
                 alert&("Error occurred!");
             }
        });
        return false;
    });
    $('button[name="cancelShortcode"],input[name="cancelShortcode"]').live('click',function(){
        $('#newfield').remove();
        $.fancybox.close();
        return false;
    });
    
    // change width group box
    $('.formbuilder_group_width').live('change',function(){
        rel = $(this).attr('rel');
        width = $(this).val();
        if($(this).hasClass('control_box_select')){
            if(rel == 'sm'){
                $(this).parents('.itemfield').attr('class',$(this).parents('.itemfield').attr('class').replace(/(^|\s)col-sm-\S+/g, ' col-sm-'+width+' '));
            }else if(rel == 'xs'){
                $(this).parents('.itemfield').attr('class',$(this).parents('.itemfield').attr('class').replace(/(^|\s)col-xs-\S+/g, ' col-xs-'+width+' '));
            }else{
                $(this).parents('.itemfield').attr('class',$(this).parents('.itemfield').attr('class').replace(/(^|\s)col-md-\S+/g, ' col-md-'+width+' '));
            }
        }else{
            if(rel == 'sm'){
                $(this).parents('.formbuilder_group').attr('class',$(this).parents('.formbuilder_group').attr('class').replace(/(^|\s)col-sm-\S+/g, ' col-sm-'+width+' '));
            }else if(rel == 'xs'){
                $(this).parents('.formbuilder_group').attr('class',$(this).parents('.formbuilder_group').attr('class').replace(/(^|\s)col-xs-\S+/g, ' col-xs-'+width+' '));
            }else{
                $(this).parents('.formbuilder_group').attr('class',$(this).parents('.formbuilder_group').attr('class').replace(/(^|\s)col-md-\S+/g, ' col-md-'+width+' '));
            }
        }
        clearBeforeSave();
    });
    
    $('#gformbuilderpro_form').submit(function(){
        clearBeforeSave();
        if($('#title_'+gdefault_language).val() == ''){
            alertdanger = '<div class="alert alert-danger">'+gtitleform+' '+empty_danger+'</div>';
            $(alertdanger).insertBefore( ".gformbuilderpro_admintab" );
            return false;
        }else{
            $.each( languages, function( index, value ){
                if($('#title_'+value.id_lang).val() == ''){
                    $('#title_'+value.id_lang).val($('#title_'+gdefault_language).val());
                }
            });
        }
        $.each( languages, function( index, value ){
            if($('#rewrite_'+value.id_lang).val() == ''){
                val = $('#title_'+value.id_lang).val();
                val = val.replace(/[^0-9a-zA-Z:._-]/g, '').replace(/^[^a-zA-Z]+/, '');
                $('#rewrite_'+value.id_lang).val(val.toLowerCase());
            }
        });
        return true;
    });
    //admin tab
    $('.gformbuilderpro_admintab .tab-page').click(function(){
        if(!$(this).parent('.tab-row').hasClass('active')){
            $('.gformbuilderpro_admintab .tab-row').removeClass('active');
            $(this).parent('.tab-row').addClass('active');
            $('.formbuilder_tab').removeClass('activetab');
            idtabactive = $(this).attr('href');
            if($(idtabactive).length > 0) $(idtabactive).addClass('activetab');
        }
        return false;
    });
    
    $('select[name="groupaccessbox[]"]').change(function(){
        $('#groupaccess').val($(this).val().join(','));
    });
    $('#gfromloaddefault').click(function(){
        tinyMCE.triggerSave();
        form = $(this).parents('form');
        action = form.attr('action');
        serializedForm = form.serialize();
        $(gformbuilderpro_overlay).appendTo('body');
        $.ajax({
             type: 'POST',
             url: action,
             data: serializedForm+'&gfromloaddefault=true',
             async: false,
             success: function (data, textStatus, request) {
                $('#gformbuilderpro_overlay').remove();
                var result = $.parseJSON(data);
                if(result.errors=='0'){
                    $.each(result.datas,function(index, value){
                        if($('iframe[id^="emailtemplate_'+index+'_ifr"]').length > 0)
                            $('iframe[id^="emailtemplate_'+index+'_ifr"]').contents().find('body').html(value);
                        if($('#emailtemplate_'+index+' .mceIframeContainer iframe').length > 0)
                            $('#emailtemplate_'+index+' .mceIframeContainer iframe').contents().find('body').html(value);
                    });
                    $.each(result.datassender,function(index, value){
                        if($('iframe[id^="emailtemplatesender_'+index+'_ifr"]').length > 0)
                            $('iframe[id^="emailtemplatesender_'+index+'_ifr"]').contents().find('body').html(value);
                        if($('#emailtemplatesender_'+index+' .mceIframeContainer iframe').length > 0)
                            $('#emailtemplatesender_'+index+' .mceIframeContainer iframe').contents().find('body').html(value);
                    });
                    $.each(result.datassendersubject,function(index, value){
                        if($('textarea[name="subjectsender_'+index+'"]').length > 0)
                            $('textarea[name="subjectsender_'+index+'"]').html(value);
                        if($('#subjectsender_'+index+' .mceIframeContainer iframe').length > 0)
                            $('#subjectsender_'+index+' .mceIframeContainer iframe').contents().find('body').html(value);
                    });
                    $.each(result.subject,function(index, value){
                        if($('textarea[name="subject_'+index+'"]').length > 0)
                            $('textarea[name="subject_'+index+'"]').html(value);
                        if($('#subject_'+index+' .mceIframeContainer iframe').length > 0)
                            $('#subject_'+index+' .mceIframeContainer iframe').contents().find('body').html(value);
                    });
                }else
                    alert&("Error occurred!");
                
             },
             error: function (req, status, error) {
                $('#gformbuilderpro_overlay').remove();
                 alert&("Error occurred!");
             }
        });
        return false;
    });
    $('#gfromloadshortcode').click(function(){
        tinyMCE.triggerSave();
        form = $(this).parents('form');
        action = form.attr('action');
        serializedForm = form.serialize();
        $(gformbuilderpro_overlay).appendTo('body');
        $.ajax({
             type: 'POST',
             url: action,
             data: serializedForm+'&gfromloadshortcode=true',
             async: false,
             success: function (data, textStatus, request) {
                $('#gformbuilderpro_overlay').remove();
                var result = $.parseJSON(data);
                if(result.errors=='0'){
                    $.each(result.datas,function(index, value){
                        htmlshortcode = '<table>';
                        $.each(value,function(_index, _value){
                            if(parseInt(_index%2) == 1){
                                htmlshortcode+='<tr class="odd"><td class="label">'+_value.label+'</td><td>'+_value.shortcode+'</td></tr>';
                            }else{
                                htmlshortcode+='<tr  class="even"><td class="label">'+_value.label+'</td><td>'+_value.shortcode+'</td></tr>';
                            }
                         });
                        htmlshortcode += '</table>';
                        if($('.emailshortcode_wp .translatable-field.lang-'+index).length > 0){
                            $('.emailshortcode_wp .translatable-field.lang-'+index+' .emailshortcode').html(htmlshortcode);
                        }else{
                            $('.emailshortcode_wp .emailshortcode').html(htmlshortcode);
                        }
                    }
                    );
                    
                }else
                    alert&("Error occurred!");
                
             },
             error: function (req, status, error) {
                $('#gformbuilderpro_overlay').remove();
                 alert&("Error occurred!");
             }
        });
        return false;
    });
    
    $('.emailshortcode_panel .panel-heading').click(function(){
        if($(this).next('.emailshortcode').css('display') !='none'){
            $(this).removeClass('active');
            $(this).next('.emailshortcode').stop(true,true).slideUp(300);
        }else{
            $(this).addClass('active');
            $(this).next('.emailshortcode').stop(true,true).slideDown(300);
        }
    });
    if(psversion15 != -1){
        $('#itemfieldparent .itemfield').each(function(){
            if($(this).data('image') !='')
                $(this).tooltip({ 
                    title: '<img style="display:block;clear:both;" src="'+$(this).data('image')+'" />',
                    html:true 
                });
        });
    }else{
        
    }
        
    
    $('#multi_on').live('change',function(){
        if($('.slidervalue').length > 0) changeSildeValue();
    });
    $('#multi_off').live('change',function(){
        if($('.slidervalue').length > 0) changeSildeValue();
    });
    $('.click_to_copy').live('click',function(){
        content_copy = $(this).html();
        copyToClipboard(content_copy);
        return false;
    });
    $('input[name="autoredirect"]').change(function(){
        if($('input[name="autoredirect"]:checked').val() == '1'){
            $('.autoredirect_config').stop(true,true).slideDown(500);
        }else{
            $('.autoredirect_config').stop(true,true).slideUp(500);
        }
    });
});
$(document).on('focusout', '.rewrite_url', function() {
	val = $(this).val();
    val = val.replace(/[^0-9a-zA-Z:._-]/g, '').replace(/^[^a-zA-Z]+/, '');
    $(this).val(val.toLowerCase());
});
$(document).on('focusout', '.slidervalue', function() {
    changeSildeValue();
});