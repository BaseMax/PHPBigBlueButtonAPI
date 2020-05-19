# BBBPHP

A small tools to connect with BigBlueButton api and create room and join and more works.

# BigBlueButton API

For connect to BBB, you will need a secret key and BBB url.

## How find secret key and URL of bbb?

Let's go to your server and run command below:

#### $ bbb-conf --secret
```
URL: https://****************/bigbluebutton/
Secret: FGOqT60v**************d02wLn2NFO8zyoI

Link to the API-Mate:
https://mconf.github.io/api-mate/#server=https://********/bigbluebutton/&sharedSecret=FGOqT60v**************d02wLn2NFO8zyoI
```

## Using

```php
<?php
include "_bbbapi.php";
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

-----------

## Depends on

- https://github.com/BaseMax/netphp

## Relateds

- https://mconf.github.io/api-mate/
- https://github.com/mconf/api-mate/
- https://github.com/omarshammas/bigbluebutton-API-Buddy

## What's Big Blue Button or BBB?

BigBlueButton is an open-source web conferencing system. It is based on GNU/Linux operating system and runs on Ubuntu 16.04. In addition to various web conferencing services, it has integrations for many of the major learning and content management systems.

## Reffrence

I success to implement these function after read this article carefully:
https://docs.bigbluebutton.org/dev/api.html

---------

# Max Base

My nickname is Max, Programming language developer, Full-stack programmer. I love computer scientists, researchers, and compilers. ([Max Base](https://maxbase.org/))

## Asrez Team

A team includes some programmer, developer, designer, researcher(s) especially Max Base.

[Asrez Team](https://www.asrez.com/)
