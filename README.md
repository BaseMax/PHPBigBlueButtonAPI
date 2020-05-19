# BigBlueButton API

A small tools to connect with BigBlueButton api and create room and join and more works.

## Using

```php
<?php
include "_core.php";
$res=call("create", []);
print_r($res);
?>
```

## Example

### Create room

```php
<?php
$res=call("create", [
	"allowStartStopRecording"=>true,
	"attendeePW"=>"ap",
	"autoStartRecording"=>false,
	"meetingID"=>"random-4302986".rand(10,9999),
	"moderatorPW"=>"mp",
	"name"=>"random-4302986".rand(10,9999),
	"record"=>false,
	"voiceBridge"=>75501,
	"welcome"=>"<br>Welcome to <b>%%CONFNAME%%</b>!",
]);
$room=$res;
print_r($res);
?>
```
