<?php
if ( ! function_exists('has_permission')){
	function has_permission($name,$role_id) 
	{
		$permission = DB::table('permissions')
		          ->where('permission', $name)
		          ->where('role_id', $role_id)
				  ->get();
	    if ( ! $permission->isEmpty() ) {
		   return true;
		}
		return false;
	}
}
?>