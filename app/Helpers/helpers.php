<?php 

function active($prefix, $route)
{
	$route =  $prefix.'/'.$route;
	return request()->is($route) || request()->is($route.'/*') ? 'active' : '';
}

function img($img)
{
	return asset('storage/images/'.$img);
}

function localDate($date)
{
	return date('d M Y', strtotime($date));
}

function site($key)
{
	return Cache::get('setting')->$key;
}

function total($table)
{
	return DB::table($table)->count();
}

 ?>