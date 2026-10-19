<!DOCTYPE html>
<html><head>
  <title>login</title><meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="robots" content="index,follow">
<style>
* {box-sizing: border-box;}body {margin: 0;}
	:root {--gjs-t-color-primary: #cf549e;--gjs-t-color-secondary: #b9227d;
		--gjs-t-color-accent: #ffb347;--gjs-t-color-success: #28a745;
		--gjs-t-color-warning: #ffc107;--gjs-t-color-error: #dc3545;}
	.gjs-t-body {background-color: inherit;color: inherit;
		font-size: 1rem;line-height: 1.75rem;}
	.gjs-t-h1 {color: var(--gjs-t-color-secondary);font-size: 1.5rem;
		line-height: 2.5rem;}
	.gjs-t-h2 {color: #601843;font-size: 1.2rem;line-height: 1.75rem;}
	.gjs-t-button {background-color: var(--gjs-t-color-primary);color: white;
		border-radius: 0.3rem;}
	.gjs-t-link {color: var(--gjs-t-color-primary);text-decoration: underline;}
	.gjs-t-border {border-radius: 0.3rem;border-color: #e0e0e0;}
	#i386e1 {padding-top: 0.016px;padding-right: 0px;
		padding-bottom: 0px;padding-left: 0px;}
	.gjs-plg-flex-column {flex-grow: 1;}
	.gjs-plg-flex-row {display: flex;align-items: stretch;flex-wrap: nowrap;}
	#i8v6vz {
		width: 100%;height: 1044px;gap: 0%;}
	#iwt5rk {
		flex-basis: 100%;padding-top: 5px;padding-right: 5px;
		padding-bottom: 0px;padding-left: 5px;margin-top: 0px;
		margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}
	#inykpi {width: 100%;}
	#ifea8k {flex: 1 1 0%;align-self: center;display: flex;
		flex-direction: column;justify-content: space-around;
		align-items: center;padding-top: 96px;
		padding-right: 0px;padding-bottom: 0px;
		padding-left: 0px;}
	#iz2fiy {display: flex;flex-direction: column;
		align-items: center;justify-content: center;
		padding-top: 20px;padding-right: 20px;
		padding-bottom: 20px;padding-left: 20px;}
	#iebizo {display: flex;flex-direction: column;
		align-items: center;justify-content: center;}
	#i3izfn {margin-top: 15px;margin-right: 15px;
		margin-bottom: 15px;margin-left: 15px;
		font-family: Helvetica, sans-serif;
		font-weight: 600;letter-spacing: 1.5px;}
	#iyz6yd {justify-content: space-around;align-items: stretch;
		width: 250px;height: 250px;}
	#iev81o {margin-top: 15px;margin-right: 15px;margin-bottom: 15px;
		margin-left: 15px;font-family: Helvetica, sans-serif;
		font-weight: 600;letter-spacing: 1.5px;}
	#ifo447 {border-top-left-radius: 15px;
	border-top-right-radius: 15px;border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;border-top-style: solid;
	border-right-style: solid;border-bottom-style: solid;
	border-left-style: solid;border-bottom-width: 3px;
	border-top-color: rgb(0, 0, 0);
	border-right-color: rgb(0, 0, 0);
	border-bottom-color: rgb(0, 0, 0);
	border-left-color: rgb(0, 0, 0);
	border-top-width: 3px;border-right-width: 3px;
	border-left-width: 3px;width: 165px;height: 30px;}
	#i8m24m {border-top-left-radius: 15px;
	border-top-right-radius: 15px;border-bottom-left-radius: 15px;
	border-bottom-right-radius: 15px;border-top-style: solid;
	border-right-style: solid;border-bottom-style: solid;
	border-left-style: solid;border-top-color: rgb(0, 0, 0);
	border-right-color: rgb(0, 0, 0);border-bottom-color: rgb(0, 0, 0);
	border-left-color: rgb(0, 0, 0);border-top-width: 3px;
	border-right-width: 3px;border-bottom-width: 3px;
	border-left-width: 3px;width: 165px;height: 30px;}
	#iebizo-2 {display: flex;flex-direction: column;
		align-items: center;justify-content: center;
		padding-top: 40px;padding-right: 40px;
		padding-bottom: 40px;padding-left: 40px;}
	#imrovd {border-top-style: solid;border-right-style: solid;
	border-bottom-style: solid;border-left-style: solid;
	border-top-width: 2px;border-right-width: 2px;
	border-bottom-width: 2px;border-left-width: 2px;
	font-family: Courier New, Courier, monospace;
	font-weight: 600;width: 100px;height: 40px;font-size: 23px;
	background-color: rgba(236, 139, 47, 0.81);
	border-top-left-radius: 20px;border-top-right-radius: 20px;
	border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;
	cursor: pointer;}
	@media (max-width:768px) {#iwt5rk {
		padding-top: 5px;padding-right: 5px;
		padding-bottom: 0px;padding-left: 5px;
		margin-top: 0px;margin-right: 0px;
		margin-bottom: 0px;margin-left: 0px;}}
</style></head>
<body id="i386e1">
  <div data-type-role="flex-row" id="i8v6vz" class="gjs-plg-flex-row">
    <div data-type-role="flex-column" id="iwt5rk" class="gjs-plg-flex-column">
      <div data-type-role="flex-row" id="inykpi" class="gjs-plg-flex-row">
        <div data-type-role="flex-column" id="ifea8k" class="gjs-plg-flex-column"><img src="logo.png" id="iyz6yd"/></div></div>
      <form method="post" id="i5j9uv" action="proses_login.php">
        <div id="iz2fiy"><label id="i3izfn">Username</label><input type="text" id="ifo447" name="username" placeholder="Username"/></div>
        <div id="iebizo"><label id="iev81o">Password</label><input type="password" id="i8m24m" placeholder="Password" name="password"/>
        </div><div id="iebizo-2"><button type="submit" id="imrovd">Login</button></div>
      </form></div></div></body></html>