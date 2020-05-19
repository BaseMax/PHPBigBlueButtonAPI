<?php
include "_core.php";
$url=buildQuery([
	"allowStartStopRecording"=>true,
	"attendeePW"=>"ap",
	"autoStartRecording"=>false,
	"meetingID"=>"random-4302986",
	"moderatorPW"=>"mp",
	"name"=>"random-4302986",
	"record"=>false,
	"voiceBridge"=>75501,
	"welcome"=>"<br>Welcome to <b>%%CONFNAME%%</b>!",
	// "checksum"=>"4bb18b6cac3bf5fe**d*****e635e80acf24",
]);
$url="name=Test+Meeting&meetingID=abc123&attendeePW=111222&moderatorPW=333444";
// print $host."api/create?".$url."\n";
$method="create";
$url=$url."&checksum=".sha1($method . $url . $key);
print $url."\n";
$res=get($host."api/".$method."?".$url);
print_r($res);
/*
<response>
<returncode>SUCCESS</returncode>
<meetingID>random-****86</meetingID>
<internalMeetingID>****-1589900446510</internalMeetingID>
<parentMeetingID>bbb-none</parentMeetingID>
<attendeePW>ap</attendeePW>
<moderatorPW>mp</moderatorPW>
<createTime>1589900446510</createTime>
<voiceBridge>75501</voiceBridge>
<dialNumber>613-555-1234</dialNumber>
<createDate>Tue May 19 19:30:46 IRDT 2020</createDate>
<hasUserJoined>false</hasUserJoined>
<duration>0</duration>
<hasBeenForciblyEnded>false</hasBeenForciblyEnded>
<messageKey></messageKey>
<message></message>
</response>
*/
