<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Orca</title>
<link href="/css/JF.css" rel="stylesheet" type="text/css" />
</head>
<!---Cfdump var="#form#"--->
<body>
<cfoutput>
<Cfparam name="code" default="">
<Cfparam name="name" default="">
<Cfparam name="city" default="">
<Cfparam name="prov" default="">
<Cfparam name="Market" default="">
<Cfparam name="FSA" default="">

<cfparam name="url.P" default="1">
<cfparam name="page" default="1">
<cfparam name="pagelen" default="25">

<Cfparam name="key" default="">
<Cfparam name="by" default="">

<Cfif isdefined("form.submit")>
	<cfif form.by eq "code"><cfset code=form.key></cfif>
	<cfif form.by eq "name"><cfset name=form.key></cfif>
	<cfif form.by eq "Market"><cfset market=form.key></cfif>
	<cfif form.by eq "prov"><cfset prov=form.key></cfif>
	<cfif form.by eq "FSA"><cfset FSA=form.key></cfif>
	<cfset by=form.by>
	<cfset key=form.key>
</cfif>
<Table width=90%>
<tr><td align="right"><a href="/orca_sub/index.cfm"><img src="/images/orca_logo.jpg" height=100 border=0 /></a></td></tr>
</Table>

<table width=90% align="center"><cfform name="search" action="index.cfm"><tr>
<td class="BBigTitle">Distributor Search</td>
<td class="smalltext">Search by: 
<Cfselect name="By" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 10px;">
<option <cfif by eq "Name">selected</cfif>>Name</option>
<option <cfif by eq "code">selected</cfif>>code</option>
<!---option <cfif by eq "City">selected</cfif>>City</option--->
<option <cfif by eq "Market">selected</cfif>>Market</option>
<option <cfif by eq "Province">selected</cfif>>Province</option>
<option <cfif by eq "FSA">selected</cfif>>FSA</option>
</Cfselect>
<Cfinput name="Key" size=20 Value="#Key#"style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 10px;">
<Cfinput name="submit" value="Go" type="submit" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 10px;">
</td></tr></cfform></table>
<table width=90% align="center" class="databox">

<Tr bgcolor="C8DAF2"><td class="text" align="center">Code</td>
<td class="text">Parent</td>
<td class="text">Name</td>
<td class="text">Address</td>
<td class="text">City</td>
<td class="text">Prov</td>
<td class="text">Pcode</td>
<td class="text">Telephone</td>
<!---td class="text">Fax</td---></Tr>

<Cfif isdefined("form.submit")>
	<cfif form.by eq "code"><cfset code=form.key></cfif>
	<cfif form.by eq "name"><cfset name=form.key></cfif>
	<cfif form.by eq "city"><cfset city=form.key></cfif>
	<cfif form.by eq "Market"><cfset market=form.key></cfif>
	<cfif form.by eq "Province"><cfset prov=form.key></cfif>
	<cfif form.by eq "FSA"><cfset FSA=form.key></cfif>
	
</cfif>


		<CFstoredProc 
			procedure="DISTRIBUTION_LOOK_UP.DBO.p_Distribution_LookUp"
			datasource="ORCA" 
			username="hmsservice" 
			password="RetailMFD4You!">

		<cfprocparam value="#code#" cfsqltype="cf_sql_varchar">		<!--- Code --->
		<cfprocparam value="#name#" cfsqltype="cf_sql_varchar">		<!--- Name --->
		<cfprocparam value="#city#" cfsqltype="cf_sql_varchar">		<!--- CITY --->
		<cfprocparam value="#prov#" cfsqltype="cf_sql_varchar">		<!--- PROV --->
		<cfprocparam value="#market#" cfsqltype="cf_sql_varchar">	<!--- MARKET --->
		<cfprocparam value="#FSA#" cfsqltype="cf_sql_varchar">		<!--- FSA --->
		<cfprocresult name="ORCA">

		</CFstoredProc>
<!---Cfdump var="#orca#"--->
<Cfset page=url.p>
<cfset Start= Page * Pagelen - (Pagelen-1)>
<cfset Finis= Start + Pagelen - 1>
<!--- debug ---tart=#start# finis=#finis# Records=#orca.recordcount#--->
<Cfloop query="ORCA" startrow="#start#" endrow="#finis#">
<Cfif ORCA.currentrow MOD 2><Cfset bg="##FFFFFF"><Cfelse><cfset bg="##cccccc"></Cfif>
<Tr bgcolor="#bg#"><td align="center" class="smalltext"><a href="dsp_Distrib.cfm?C=#ORCA.CODE#">#ORCA.code#</a></td>
<td class="smalltext" align="left">#ORCA.PARENT#</td>
<td class="smalltext" align="left">#ORCA.Distributor#</td>
<td class="smalltext" align="left">#ORCA.Address1#</td>
<td class="smalltext" align="left">#ORCA.City#</td>
<td class="smalltext" align="left">#ORCA.Prov#</td>
<td class="smalltext" align="left">#ORCA.Postal#</td>
<td class="smalltext" align="left">#ORCA.Phone#</td>
<!---td class="smalltext" align="left">#ORCA.FAX#</td--->
</Tr>

</Cfloop>
<tr><td colspan="9" align="right" class="">
<Cfif Page GT 1><cfset prev=Page-1><a href="index.cfm?P=#prev#">prev</a>&nbsp;</Cfif>
<Cfif (Page+1) * Pagelen LT ORCA.Recordcount><cfset next = page+1><a href="index.cfm?P=#next#">next</a></Cfif>
</td></tr>
</table>
</cfoutput>
</body>
</html>
