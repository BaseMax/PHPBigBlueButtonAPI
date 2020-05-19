<?php
include "_phpnet.php";
$host="https://maxbase.org/bigbluebutton/"; // you need to change domain
$key="********"; // you need to change secret key
function buildQuery($values) {
	$query="";
	foreach($values as $k=>$v) {
		$query.=$k."=".urlencode($v)."&";
	}
	$query=rtrim($query, "&");
	return $query;
}
function call($method, $query=[]) {
	global $host;
	global $key;
	$url=buildQuery($query);
	$url="$url&checksum=".sha1($method . $url . $key);
	$link=$host."api/".$method."?".$url;
	print "[Request] $link\n";
	$res=get($link);
	if(is_bool($res[0])) {
		// return "";
		return [false, [], ""];
	}
	return array_merge(parseOutput($res[0]), [$res[1]]);
}
function parseOutput($response) {
	$result=[];
	$response=trim($response);
	if($response == "") {
		return [false, $result];
		// return $result;
	}
	preg_match('/<response>(?<content>.*?)<\/response>/si', $response, $data);
	if(isset($data["content"]) and $data["content"] != "") {
		preg_match_all('/<(?<key>[^\>]+)>(?<value>[^\<]+|)<\/(?<keyEnd>[^\>]+)>/i', $response, $matches);
		foreach($matches["key"] as $i=>$key) {
			$value=$matches["value"][$i];
			$result[$key]=$value;
		}
	}
	if(isset($result["returncode"]) and $result["returncode"] == "SUCCESS") { // FAILED
		return [true, $result];
	}
	else {
		return [false, $result];
	}
	// return $result;
}
