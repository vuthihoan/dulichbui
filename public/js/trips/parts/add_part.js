function initMap(){v_map.initMap();};
var c_mapping = {
	///doi tuong controller - bang quan ly , mapping giua v_map va v_block 
	"blockId_number_current": -1,
	"numbers_block":0,
	"buttonId_number_current": -1,
	"button_type":null,
	"numbers_button":0
}; 

var v_map = {
	//doi tuong view. quan ly map
	"geocoder" : null,
	"map":null,
	"marker":null,
	"initMap": function initMap() {
	    this.map = new google.maps.Map(document.getElementById('map_canvas'), {
	        center: {lat: 21.0245, lng: 105.84117},
	        zoom: 8
	    });
	    this.geocoder = new google.maps.Geocoder();
		},
	"getadress" : function getadress(element,latLng){
		this.geocoder.geocode({'latLng': latLng},
			function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						element.html(results[0].formatted_address);
					} else {
						element.html("No results");
					}
				} else {
					element.html(status);
				}
			});
		}
	};
var v_block = {
	//doi tuong view. quan ly bang thong tin
	"index": '<div id ="block'+'">',

	"html":'<div class="form-group" >'
				+'<label class="control-label col-sm-2" >Vị trí</label>'
					+'<div class="col-sm-7">'
						+'<label class="control-label col-sm-7" id="vitri">Vị tría </label>'
					+'</div>'
				+'</div>'
			+'<div class="form-group" >'
			+'<label class="control-label col-sm-2" >Hoạt động</label>'
					+'<div class="col-sm-7">'
						+'<button type="button" class="btn btn-default" aria-label="Left Align">'
  							+'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'
						+'</button>'
					+'</div>'
			+'</div >'						
		+'</div>',
	"addBlock": function(){
		c_mapping.numbers_block++;
		this.index= '<div id ="block'+c_mapping.numbers_block+'">';
		return this.index+this.html;
		}
    };
var v_button_add = {
	//doi tuong view. quan ly button them block
	// <button type="button" class="btn btn-primary" id="#" >Thêm điểm</button>
	"index": '<button type="button" class="btn btn-primary" id="button">',
	"html": 'Thêm điểm</button>',
	"addButton": function(id_number){
		c_mapping.numbers_button++;
		this.index= '<button type="button" class="btn btn-primary" id="button'+id_number+'">';
		return this.index+this.html;
		}
	};
var c_event = {
	//them su kien click cho button add
	addClickEventForButtonAdd : function addClickEventForButtonAdd(button){
		button.click(function(){
			console.log('xoa di');
		v_map.marker=null;
    	//sau khi click vao button phai click vao map
    	v_map.map.addListener('click', function(event) {
    		//danh dau tren ban do
    		if (v_map.marker== null ) {
    			//neu la 1 diem hoan toan moi: them block va dua vi tri vao #vitri
    			v_map.marker = new google.maps.Marker({ 
    				position: event.latLng, 
    				map: v_map.map,
    			});
    			$('#tripinfo').append(v_block.addBlock());

    			c_mapping.blockId_number_current=c_mapping.numbers_block;

    			v_map.getadress($('#block'+c_mapping.blockId_number_current).find("#vitri"),event.latLng);
    			//them xong. di chuyen button xuong duoi
    			c_mapping.numbers_button--;
    			$('#button'+c_mapping.buttonId_number_current).remove();
	    		c_mapping.buttonId_number_current=c_mapping.buttonId_number_current+1;
	    		$("#block"+c_mapping.blockId_number_current).append(v_button_add.addButton(c_mapping.buttonId_number_current));
	    		addClickEventForButtonAdd($('#button'+c_mapping.buttonId_number_current));
    		}else{
    			//neu la mot diem da mark. chi thay doi, khong them moi
    			v_map.marker.setPosition(event.latLng);
    			v_map.getadress($('#block'+c_mapping.blockId_number_current).find("#vitri"),event.latLng);
    		}
    		}); 

 		});
	}
}

$( document ).ready(function() {
//sau khi tai xong. thuc hien:
	//add button 
	c_mapping.buttonId_number_current=1;
	$('#tripinfo').append(v_button_add.addButton(c_mapping.buttonId_number_current));
	c_mapping.buttonId_number_current=c_mapping.numbers_button;
	c_mapping.button_type = 'add';
	//add su kien click vao button
	c_event.addClickEventForButtonAdd($('#button'+c_mapping.buttonId_number_current));
	});
