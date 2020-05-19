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


### Join Room as Admin

```php
<?php
$res=call("join", [
	"fullName"=>"Admin",
	"meetingID"=>$room[1]["meetingID"],
	"password"=>"mp",
	"join_via_html5"=>true,
	"redirect"=>true,
]);
print_r($res);
?>
```

### Join Room as User

```php
<?php
$res=call("join", [
	"fullName"=>"Member",
	"meetingID"=>$room[1]["meetingID"],
	"password"=>"ap",
	"join_via_html5"=>true,
	"redirect"=>true,
]);
print_r($res);
?>
```

## Relateds

- https://mconf.github.io/api-mate/

---------

# Max Base

My nickname is Max, Programming language developer, Full-stack programmer. I love computer scientists, researchers, and compilers. ([Max Base](https://maxbase.org/))

## Asrez Team

A team includes some programmer, developer, designer, researcher(s) especially Max Base.

[Asrez Team](https://www.asrez.com/)
