<?php 
$u = new Bookmark();
$u->get_where(array('akun_id'=>$user->id, 'buku_id'=>$model->id));
if($u->exists()){
	echo anchor('bookmarks/delete/'.$u->id.'/'.$model->id, '<i class="icon-bookmark icon-white"></i> Hapus', 'class="btn btn-danger"');
} else {
	echo anchor('bookmarks/create/'.$model->id, '<i class="icon-bookmark"></i> Selipkan', 'class="btn"');
}
?>