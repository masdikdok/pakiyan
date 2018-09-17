var kemana;
var id;
var operasi;

function kembali(kemana){
	return document.location="?page="+kemana;
}

function lihat_detail(kemana, id){
	return document.location="?page="+kemana+"_detail&id="+id;
}

function update(kemana, id){
	return document.location="?page="+kemana+"&id="+id;
}

function deleted(kemana, id, operasi){
	return document.location="?page="+kemana+"&id="+id+"&operasi="+operasi;
}

function hapus(id, apa){
  var hap = confirm("Apa kamu yakin ingin menghapus data ini?");
  if(hap == true){
		deleted(apa,id, "delete");
  }
}

function show(satu, dua){
	var internal = document.getElementById(satu);
	var eksternal = document.getElementById(dua);
	internal.style.display = "block";
	eksternal.style.display = "none";
}

function batascheckbox(checkgroup, limit){
	var checkgroup = checkgroup;
	var limit = limit;
	for(var i=0;i<checkgroup.length;i++){
		checkgroup[i].onclick=function(){
			var checkedcount = 0;
			for(var i=0;i<checkgroup.length;i++){
				checkedcount += (checkgroup[i].checked)? 1:0;
				if(checkedcount>limit){
					this.checked = false;
				}
			}
		}
	}
}
